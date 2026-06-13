<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AmbulanceController extends Controller
{
    private const TYPES = [
        'Ambulance médicalisée',
        'Ambulance de transport',
        'Ambulance d\'urgence',
        'Réanimation Mobile',
    ];

    public function index()
    {
        $ambulances = Ambulance::latest()->paginate(10);
        $stats = [
            'total' => Ambulance::count(),
            'available' => Ambulance::where('status', 'available')->count(),
            'mission' => Ambulance::where('status', 'mission')->count(),
            'maintenance' => Ambulance::where('status', 'maintenance')->count(),
        ];

        return view('admin.ambulances.index', compact('ambulances', 'stats'));
    }
    /** * Show the form for creating a new resource. */ 
    public function create()
    {
        return view('admin.ambulances.create', [
            'ambulance' => new Ambulance(['status' => 'available']),
            'types' => self::TYPES,
        ]);
    }
    /** * Store a newly created resource in storage. */ 
    public function store(Request $request)
    {
        $validated = $this->validatedData($request);
        Ambulance::create($validated);
        return redirect()->route('ambulances.index')->with('success', 'Ambulance ajoutée avec succès.');
    }
    /** * Display the specified resource. */ 
    public function show(Ambulance $ambulance)
    {
        return view('admin.ambulances.show', compact('ambulance'));
    }
    /** * Show the form for editing the specified resource. */ 
    public function edit(Ambulance $ambulance)
    {
        return view('admin.ambulances.edit', [
            'ambulance' => $ambulance,
            'types' => self::TYPES,
        ]);
    }
    /** * Update the specified resource in storage. */ 
    public function update(Request $request, Ambulance $ambulance)
    {
        $validated = $this->validatedData($request, $ambulance);
        $ambulance->update($validated);

        return redirect()->route('ambulances.index')->with('success', 'Ambulance modifiée avec succès.');
    }
    /** * Remove the specified resource from storage. */ 
    public function destroy(Ambulance $ambulance)
    {
        $ambulance->delete();
        return redirect()->route('ambulances.index')->with('success', 'Ambulance supprimée avec succès.');
    }

    private function validatedData(Request $request, ?Ambulance $ambulance = null): array
    {
        $validated = $request->validate([
            'type' => 'required_without:new_type|nullable|string|max:255',
            'new_type' => 'required_if:type,__other|nullable|string|max:255',
            'registration' => [
                'required',
                'string',
                'max:255',
                Rule::unique('ambulances', 'vehicle_plate')->ignore($ambulance?->id),
            ],
            'license_expiry' => 'required|date',
            'status' => 'nullable|in:available,mission,maintenance',
        ]);

        $registration = strtoupper(trim($validated['registration']));
        $type = ($validated['type'] ?? null) === '__other'
            ? $validated['new_type']
            : $validated['type'];

        return [
            'vehicle_type' => trim($type),
            'vehicle_plate' => $registration,
            'license_number' => $registration,
            'license_expiry' => $validated['license_expiry'],
            'status' => $validated['status'] ?? $ambulance?->status ?? 'available',
        ];
    }
}
