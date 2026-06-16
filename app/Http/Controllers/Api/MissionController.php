<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;

class MissionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_full_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0|max:120',
            'patient_phone' => 'required|string|max:30',
            'patient_address' => 'required|string|max:500',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $mission = Mission::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Mission créée avec succès',
            'data' => $mission,
        ], 201);
    }
}
