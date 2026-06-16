<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function available(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;

        $drivers = User::where('role', 'driver')
            ->where('status', 'available')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get()
            ->map(function ($driver) use ($lat, $lng) {
                $distance = $this->distanceKm(
                    $lat,
                    $lng,
                    $driver->latitude,
                    $driver->longitude
                );

                return [
                    'id' => $driver->id,
                    'name' => $driver->name,
                    'ambulance' => $driver->ambulance?->vehicle_plate,
                    'rating' => $driver->rating ?? 4.5,
                    'distance_km' => round($distance, 1),
                    'status' => 'Disponible',
                ];
            })
            ->sortBy('distance_km')
            ->values();

        return response()->json($drivers);
    }

    private function distanceKm($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2
            + cos(deg2rad($lat1)) * cos(deg2rad($lat2))
            * sin($dLng / 2) ** 2;

        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1 - $a));
    }
}
