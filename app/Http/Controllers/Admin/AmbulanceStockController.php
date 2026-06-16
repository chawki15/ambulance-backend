<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ambulance;
use App\Models\Admin\AmbulanceMedicineStock;
use App\Models\Admin\AmbulanceStockStandard;
use App\Models\Admin\Medicine;
use App\Models\Admin\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AmbulanceStockController extends Controller
{
    public function create(Request $request)
    {
        $ambulances = Ambulance::orderBy('vehicle_plate')->get();

        $selectedAmbulance = $ambulances->firstWhere(
            'id',
            (int) $request->query('ambulance_id')
        ) ?? $ambulances->first();

        $medicines = Medicine::with('category')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $standards = $selectedAmbulance
            ? AmbulanceStockStandard::where('ambulance_id', $selectedAmbulance->id)
            ->pluck('standard_quantity', 'medicine_id')
            : collect();

        $stocks = $selectedAmbulance
            ? AmbulanceMedicineStock::where('ambulance_id', $selectedAmbulance->id)
            ->pluck('quantity', 'medicine_id')
            : collect();

        $items = $medicines->map(function (Medicine $medicine) use ($standards, $stocks) {
            $standard = (int) ($standards[$medicine->id] ?? $medicine->minimum_quantity ?? 0);
            $current = (int) ($stocks[$medicine->id] ?? 0);

            return [
                'id' => $medicine->id,
                'name' => $medicine->name,
                'unit' => $medicine->unit,
                'category' => $medicine->category?->name ?? 'Sans catégorie',
                'image' => $medicine->photo ? Storage::url($medicine->photo) : asset('images/logo.png'),

                // stock général
                'available_quantity' => (int) $medicine->quantity,

                // stock standard ambulance
                'standard_quantity' => $standard,

                // stock actuel ambulance
                'current_quantity' => $current,

                // quantité à charger par défaut
                'quantity_to_fill' => max(0, $standard - $current),
            ];
        });

        return view('admin.ambulance-stock.create', compact(
            'ambulances',
            'selectedAmbulance',
            'items'
        ));
    }

    /**
     * حفظ Standard فقط
     * ما كينقصش stock général ديال medicines
     */
    public function storeStandard(Request $request)
    {
        $validated = $request->validate([
            'ambulance_id' => 'required|exists:ambulances,id',
            'items' => 'required|array|min:1',
            'items.*.medicine_id' => 'required|exists:medicines,id',
            'items.*.standard_quantity' => 'required|integer|min:0',
        ]);

        foreach ($validated['items'] as $item) {
            AmbulanceStockStandard::updateOrCreate(
                [
                    'ambulance_id' => $validated['ambulance_id'],
                    'medicine_id' => $item['medicine_id'],
                ],
                [
                    'standard_quantity' => $item['standard_quantity'],
                ]
            );
        }

        return redirect()
            ->route('admin.ambulance-stock.create', [
                'ambulance_id' => $validated['ambulance_id']
            ])
            ->with('success', 'Stock standard enregistré. Le stock général n’a pas été touché.');
    }

    /**
     * Remplissage ambulance
     * هنا كينقص من stock général medicines
     */
    public function storeFill(Request $request)
    {
        $validated = $request->validate([
            'ambulance_id' => 'required|exists:ambulances,id',
            'items' => 'required|array|min:1',
            'items.*.medicine_id' => 'required|exists:medicines,id',
            'items.*.quantity_to_fill' => 'required|integer|min:0',
        ]);

        $userId = auth()->id();

        try {
            DB::transaction(function () use ($validated, $userId) {
                foreach ($validated['items'] as $item) {
                    $requestedQty = (int) $item['quantity_to_fill'];

                    if ($requestedQty <= 0) {
                        continue;
                    }

                    $standard = (int) AmbulanceStockStandard::where('ambulance_id', $validated['ambulance_id'])
                        ->where('medicine_id', $item['medicine_id'])
                        ->value('standard_quantity');

                    $current = (int) AmbulanceMedicineStock::where('ambulance_id', $validated['ambulance_id'])
                        ->where('medicine_id', $item['medicine_id'])
                        ->lockForUpdate()
                        ->value('quantity');

                    $missing = max(0, $standard - $current);

                    if ($missing <= 0) {
                        continue;
                    }

                    $qtyToFill = min($requestedQty, $missing);

                    $medicine = Medicine::whereKey($item['medicine_id'])
                        ->lockForUpdate()
                        ->firstOrFail();

                    if ($medicine->quantity < $qtyToFill) {
                        throw new \RuntimeException(
                            "Stock insuffisant pour {$medicine->name}. Disponible: {$medicine->quantity}, demandé: {$qtyToFill}."
                        );
                    }

                    $ambulanceStock = AmbulanceMedicineStock::firstOrCreate(
                        [
                            'ambulance_id' => $validated['ambulance_id'],
                            'medicine_id' => $item['medicine_id'],
                        ],
                        [
                            'quantity' => 0,
                            'is_active' => true,
                        ]
                    );

                    $ambulanceStock->increment('quantity', $qtyToFill);
                    $ambulanceStock->update(['is_active' => true]);

                    $medicine->decrement('quantity', $qtyToFill);

                    StockMovement::create([
                        'medicine_id' => $item['medicine_id'],
                        'ambulance_id' => $validated['ambulance_id'],
                        'type' => 'out',
                        'quantity' => $qtyToFill,
                        'reason' => 'Réapprovisionnement intelligent',
                        'created_by' => $userId,
                    ]);
                }
            });
        } catch (\RuntimeException $exception) {
            return back()->withErrors([
                'items' => $exception->getMessage(),
            ])->withInput();
        }

        return redirect()
            ->route('admin.ambulance-stock.create', [
                'ambulance_id' => $validated['ambulance_id']
            ])
            ->with('success', 'Réapprovisionnement effectué avec succès.');
    }
}
