<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::latest()->paginate(10);
        return view('admin.ambulances.index', compact('ambulances'));
    }
    /** * Show the form for creating a new resource. */ public function create()
    {
        return view('admin.ambulances.create');
    }
    /** * Store a newly created resource in storage. */ public function store(Request $request)
    {
        $validated = $request->validate(['type' => 'required|string|max:255', 'registration' => 'required|string|max:255|unique:ambulances,registration', 'license_number' => 'required|string|max:255|unique:ambulances,license_number', 'license_expiry' => 'required|date', 'status' => 'required|in:available,mission,maintenance',]);
        Ambulance::create($validated);
        return redirect()->route('ambulances.index')->with('success', 'Ambulance ajoutée avec succès.');
    }
    /** * Display the specified resource. */ public function show(Ambulance $ambulance)
    {
        return view('admin.ambulances.show', compact('ambulance'));
    }
    /** * Show the form for editing the specified resource. */ public function edit(Ambulance $ambulance)
    {
        return view('admin.ambulances.edit', compact('ambulance'));
    }
    /** * Update the specified resource in storage. */ public function update(Request $request, Ambulance $ambulance)
    {
        $validated = $request->validate(['type' => 'required|string|max:255', 'registration' => ['required', 'string', 'max:255', Rule::unique('ambulances', 'registration')->ignore($ambulance->id),], 'license_number' => ['required', 'string', 'max:255', Rule::unique('ambulances', 'license_number')->ignore($ambulance->id),], 'license_expiry' => 'required|date', 'status' => 'required|in:available,mission,maintenance',]);
        $ambulance->update($validated);
        return redirect()->route('ambulances.index')->with('success', 'Ambulance modifiée avec succès.');
    }
    /** * Remove the specified resource from storage. */ public function destroy(Ambulance $ambulance)
    {
        $ambulance->delete();
        return redirect()->route('ambulances.index')->with('success', 'Ambulance supprimée avec succès.');
    }
}
