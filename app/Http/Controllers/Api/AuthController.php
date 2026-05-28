<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|max:2048',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:driver,nurse,general_doctor,emergency_doctor,specialist_doctor',
            'is_active' => 'sometimes|boolean',
            'license_number' => 'nullable|string|max:120',
            'license_expiry' => 'nullable|date',
            'vehicle_type' => 'nullable|string|max:120',
            'vehicle_plate' => 'nullable|string|max:120',
            'diploma' => 'nullable|string|max:120',
            'experience_years' => 'nullable|integer|min:0|max:60',
            'specialty' => 'nullable|string|max:120',
            'is_available' => 'sometimes|boolean',
            'blocked_reason' => 'nullable|string|max:255',
        ]);

        $rawRole = $data['role'];
        $userRole = $rawRole === 'specialist_doctor' ? 'emergency_doctor' : $rawRole;
        $data['role'] = $userRole;
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user = DB::transaction(
            function () use ($data, $rawRole) {
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'] ?? null,
                    'profile_photo' => $data['profile_photo'] ?? null,
                    'password' => $data['password'],
                    'role' => $data['role'],
                    'is_active' => $data['is_active'] ?? true,
                ]);

                $profileBase = [
                    'user_id' => $user->id,
                    'is_available' => $data['is_available'] ?? true,
                    'is_active' => $data['is_active'] ?? true,
                    'blocked_reason' => $data['blocked_reason'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                if ($rawRole === 'driver') {
                    DB::table('driver_profiles')->insert(array_merge($profileBase, [
                        'license_number' => $data['license_number'] ?? 'N/A',
                        'license_expiry' => $data['license_expiry'] ?? null,
                        'vehicle_type' => $data['vehicle_type'] ?? null,
                        'vehicle_plate' => $data['vehicle_plate'] ?? null,
                    ]));
                } elseif ($rawRole === 'nurse') {
                    DB::table('nurse_profiles')->insert(array_merge($profileBase, [
                        'diploma' => $data['diploma'] ?? null,
                        'license_number' => $data['license_number'] ?? null,
                        'experience_years' => $data['experience_years'] ?? 0,
                    ]));
                } elseif ($rawRole === 'general_doctor') {
                    DB::table('general_doctor_profiles')->insert(array_merge($profileBase, [
                        'license_number' => $data['license_number'] ?? 'N/A',
                        'experience_years' => $data['experience_years'] ?? 0,
                    ]));
                } elseif (in_array($rawRole, ['specialist_doctor', 'emergency_doctor'], true)) {
                    DB::table('specialist_doctor_profiles')->insert(array_merge($profileBase, [
                        'specialty' => $data['specialty'] ?? 'General',
                        'license_number' => $data['license_number'] ?? 'N/A',
                        'experience_years' => $data['experience_years'] ?? 0,
                    ]));
                }

                return $user;
            }
        );

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email or password incorrect'],
            ]);
        }

        if (!$user->is_active) {
            throw ValidationException::withMessages([
                'email' => ['Your account is inactive'],
            ]);
        }

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}
