<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\Ambulance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    private const ROLE_LABELS = [
        'admin' => 'Admin',
        'driver' => 'Driver',
        'nurse' => 'Nurse',
        'general_doctor' => 'General Doctor',
        'emergency_doctor' => 'Emergency Doctor',
        'specialist_doctor' => 'Specialist Doctor',
    ];

    private const PROFILE_TABLES = [
        'driver' => 'driver_profiles',
        'nurse' => 'nurse_profiles',
        'general_doctor' => 'general_doctor_profiles',
        'emergency_doctor' => 'specialist_doctor_profiles',
        'specialist_doctor' => 'specialist_doctor_profiles',
    ];

    public function index(): View
    {
        $users = User::query()->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create', [
            'ambulances' => Ambulance::orderBy('vehicle_plate')->get(),
        ]);
    }

    public function show(User $user): View
    {
        $profile = $this->profileFor($user);

        return view('admin.users.show', [
            'user' => $user,
            'profile' => $profile,
            'roleLabel' => $this->roleLabel($user->role),
            'profileTitle' => $this->profileTitle($user->role),
        ]);
    }

    public function edit(User $user): View
    {
        $profile = $this->profileFor($user);

        return view('admin.users.edit', [
            'user' => $user,
            'profile' => $profile,
            'roles' => self::ROLE_LABELS,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120', Rule::unique('users', 'name')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users', 'phone')->ignore($user->id)],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'password' => ['nullable', 'min:6', 'confirmed'],
            'role' => ['required', Rule::in(array_keys(self::ROLE_LABELS))],
            'status' => ['required', Rule::in(['available', 'busy', 'offline'])],
            'is_active' => ['required', 'boolean'],
            'license_number' => ['nullable', 'string', 'max:120'],
            'license_expiry' => ['nullable', 'date'],
            'vehicle_type' => ['nullable', 'string', 'max:120'],
            'vehicle_plate' => ['nullable', 'string', 'max:120'],
            'diploma' => ['nullable', 'string', 'max:120'],
            'experience_years' => ['nullable', 'integer', 'min:0', 'max:60'],
            'specialty' => ['nullable', 'string', 'max:120'],
            'is_available' => ['required', 'boolean'],
            'blocked_reason' => ['nullable', 'string', 'max:255'],
            'ambulance_id' => ['nullable', 'exists:ambulances,id'],
        ]);

        $submittedRole = $data['role'];
        $userRole = $submittedRole === 'specialist_doctor' ? 'emergency_doctor' : $submittedRole;

        DB::transaction(function () use ($request, $user, $data, $submittedRole, $userRole) {
            $userData = [
                'name' => $data['name'],
                'email' => strtolower($data['email']),
                'phone' => $data['phone'],
                'role' => $userRole,
                'status' => $data['status'],
                'is_active' => (bool) $data['is_active'],
            ];

            if (! empty($data['password'])) {
                $userData['password'] = Hash::make($data['password']);
            }

            if ($request->hasFile('profile_photo')) {
                if ($user->profile_photo) {
                    Storage::disk('public')->delete($user->profile_photo);
                }

                $userData['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
            }

            $user->update($userData);
            $this->syncProfile($user, $submittedRole, $data);
        });

        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function activate(User $user): RedirectResponse
    {
        $user->update(['is_active' => true]);
        $this->updateProfileStatus($user, true);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur activé avec succès.');
    }

    public function deactivate(User $user): RedirectResponse
    {
        $user->update(['is_active' => false]);
        $this->updateProfileStatus($user, false);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur désactivé avec succès.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    private function profileFor(User $user): ?object
    {
        $table = self::PROFILE_TABLES[$user->role] ?? null;

        if (! $table) {
            return null;
        }

        return DB::table($table)->where('user_id', $user->id)->first();
    }

    private function syncProfile(User $user, string $submittedRole, array $data): void
    {
        $table = self::PROFILE_TABLES[$submittedRole] ?? null;

        if (! $table) {
            $this->deleteProfileRows($user);
            return;
        }

        $this->deleteProfileRows($user, $table);

        $profileData = [
            'user_id' => $user->id,
            'is_available' => (bool) $data['is_available'],
            'is_active' => (bool) $data['is_active'],
            'blocked_reason' => $data['blocked_reason'] ?? null,
            'updated_at' => now(),
        ];

        if ($submittedRole === 'driver') {
            $profileData += [
                'license_number' => $data['license_number'] ?: 'N/A',
                'license_expiry' => $data['license_expiry'] ?? null,
                'ambulance_id' => $data['ambulance_id'] ?? null,
                'vehicle_type' => $data['vehicle_type'] ?? null,
                'vehicle_plate' => $data['vehicle_plate'] ?? null,
            ];
        } elseif ($submittedRole === 'nurse') {
            $profileData += [
                'diploma' => $data['diploma'] ?? null,
                'license_number' => $data['license_number'] ?? null,
                'experience_years' => $data['experience_years'] ?? 0,
            ];
        } elseif ($submittedRole === 'general_doctor') {
            $profileData += [
                'license_number' => $data['license_number'] ?: 'N/A',
                'experience_years' => $data['experience_years'] ?? 0,
            ];
        } else {
            $profileData += [
                'specialty' => $data['specialty'] ?: 'General',
                'license_number' => $data['license_number'] ?: 'N/A',
                'experience_years' => $data['experience_years'] ?? 0,
            ];
        }

        $exists = DB::table($table)->where('user_id', $user->id)->exists();

        if ($exists) {
            DB::table($table)->where('user_id', $user->id)->update($profileData);
            return;
        }

        DB::table($table)->insert($profileData + ['created_at' => now()]);
    }

    private function deleteProfileRows(User $user, ?string $exceptTable = null): void
    {
        foreach (array_unique(self::PROFILE_TABLES) as $table) {
            if ($table === $exceptTable) {
                continue;
            }

            DB::table($table)->where('user_id', $user->id)->delete();
        }
    }

    private function updateProfileStatus(User $user, bool $isActive): void
    {
        $table = self::PROFILE_TABLES[$user->role] ?? null;

        if (! $table) {
            return;
        }

        DB::table($table)
            ->where('user_id', $user->id)
            ->update([
                'is_active' => $isActive,
                'updated_at' => now(),
            ]);
    }

    private function roleLabel(string $role): string
    {
        return self::ROLE_LABELS[$role] ?? ucfirst(str_replace('_', ' ', $role));
    }

    private function profileTitle(string $role): string
    {
        return match ($role) {
            'driver' => 'Driver Information',
            'nurse' => 'Nurse Information',
            'general_doctor' => 'General Doctor Information',
            'emergency_doctor' => 'Doctor Information',
            default => 'Profile Information',
        };
    }
}
