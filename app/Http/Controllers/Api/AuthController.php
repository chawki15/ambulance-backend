<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\Ambulance;
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
            'name' => 'required|string|max:120|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
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
            'ambulance_id' => 'nullable|exists:ambulances,id',
        ], [
            'name.unique' => 'Nom déjà utilisé.',
            'email.unique' => 'Email déjà utilisé.',
            'phone.unique' => 'Numéro téléphone déjà utilisé.',
            'password.confirmed' => 'Password confirmation does not match.',
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
                    $ambulance = isset($data['ambulance_id'])
                        ? Ambulance::find($data['ambulance_id'])
                        : null;

                    DB::table('driver_profiles')->insert(array_merge($profileBase, [
                        'ambulance_id' => $data['ambulance_id'] ?? null,
                        'license_number' => $ambulance?->license_number ?? $data['license_number'] ?? 'N/A',
                        'license_expiry' => $ambulance?->license_expiry ?? $data['license_expiry'] ?? null,
                        'vehicle_type' => $ambulance?->vehicle_type ?? $data['vehicle_type'] ?? null,
                        'vehicle_plate' => $ambulance?->vehicle_plate ?? $data['vehicle_plate'] ?? null,
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

    public function checkEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        return response()->json([
            'exists' => User::whereRaw('LOWER(email) = ?', [strtolower($data['email'])])->exists(),
        ]);
    }

    public function checkDuplicates(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        return response()->json([
            'name_exists' => User::whereRaw('LOWER(name) = ?', [strtolower($data['name'])])->exists(),
            'email_exists' => User::whereRaw('LOWER(email) = ?', [strtolower($data['email'])])->exists(),
            'phone_exists' => User::where('phone', $data['phone'])->exists(),
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


    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:120|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $id,
            'role' => 'required|in:driver,nurse,general_doctor,emergency_doctor,specialist_doctor',
            'is_active' => 'sometimes|boolean',
        ]);

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }


    public function blockUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'blocked_reason' => 'nullable|string|max:255',
        ]);

        $user->update([
            'is_active' => false,
        ]);

        DB::table('user_blocks')->insert([
            'user_id' => $user->id,
            'blocked_reason' => $data['blocked_reason'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'User blocked successfully'
        ]);
    }
}
