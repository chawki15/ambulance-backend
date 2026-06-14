<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Medicine;
use App\Models\Admin\StockEntry;
use App\Models\Admin\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StockMovementController extends Controller
{
    public function index()
    {
        return $this->stockIn();
    }

    public function stockIn()
    {
        $entries = StockEntry::with('creator')
            ->withCount('items')
            ->withSum('items', 'quantity')
            ->latest('movement_date')
            ->paginate(10);

        return view('admin.stock.index', compact('entries'));
    }

    public function createStockIn()
    {
        $medicines = Medicine::with('category')
            ->where('is_active', true)
            ->orderBy('name')
            ->get()
            ->map(fn(Medicine $medicine) => [
                'name' => $medicine->name,
                'generic' => $medicine->unit,
                'package' => 'Stock actuel : ' . $medicine->quantity,
                'category' => $medicine->category?->name ?? '',
                'image' => $medicine->photo ? Storage::url($medicine->photo) : asset('images/logo.png'),
            ]);

        return view('admin.stock.create', compact('medicines'));
    }


    public function storeStockIn(Request $request)
    {
        $request->validate([
            'movement_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.medicine_id' => 'required|exists:medicines,id',
            'items.*.quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string|max:255',
        ]);

        // هنا تقوم بحفظ البيانات في قاعدة البيانات
        $entry = DB::transaction(function () use ($request) {
            $entry = StockEntry::create([
                'entry_number' => $this->nextEntryNumber(),
                'movement_date' => $request->date('movement_date')->toDateString(),
                'reason' => $request->input('reason'),
                'created_by' => $request->user()->id,
            ]);

            foreach ($request->input('items') as $item) {
                $entry->items()->create([
                    'medicine_id' => $item['medicine_id'],
                    'quantity' => $item['quantity'],
                ]);

                StockMovement::create([
                    'medicine_id' => $item['medicine_id'],
                    'stock_entry_id' => $entry->id,
                    'type' => 'in',
                    'quantity' => $item['quantity'],
                    'reason' => $request->input('reason'),
                    'created_by' => $request->user()->id,
                ]);

                Medicine::whereKey($item['medicine_id'])->increment('quantity', $item['quantity']);
            }

            return $entry;
        });

        return response()->json([
            'success' => true,
            'entry_number' => $entry->entry_number,
            'message' => 'Entrée de stock enregistrée avec succès.'
        ]);
    }

    private function nextEntryNumber(): string
    {
        $lastId = StockEntry::max('id') ?? 0;

        return 'EN-' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
    }
}
