@extends('admin.layouts.app')

@section('title', 'Modifier utilisateur')

@section('content')
@php
$photoUrl = $user->profile_photo ? asset('storage/' . $user->profile_photo) : null;
$selectedRole = old('role', $user->role);
@endphp

<style>
    .edit-page {
        color: #14213d;
    }

    .crumb {
        display: flex;
        gap: 12px;
        align-items: center;
        color: #344767;
        margin: 18px 0 22px;
        font-weight: 600;
    }

    .edit-card {
        background: #fff;
        border: 1px solid #e4e9f3;
        border-radius: 14px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, .05);
        padding: 26px;
    }

    .edit-head {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        align-items: flex-start;
        margin-bottom: 24px;
    }

    .edit-head h1 {
        margin: 0;
        color: #0f1f3d;
    }

    .edit-head p {
        margin: 8px 0 0;
        color: #52617a;
    }

    .btn-light,
    .btn-primary {
        border-radius: 10px;
        padding: 10px 14px;
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #d9e2f2;
        display: inline-flex;
        gap: 8px;
        align-items: center;
        cursor: pointer;
    }

    .btn-light {
        background: #fff;
        color: #0f1f3d;
    }

    .btn-primary {
        background: #5b35f5;
        color: #fff;
        border-color: #5b35f5;
    }

    .form-layout {
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 24px;
    }

    .photo-box {
        border: 1px dashed #cfd8ed;
        border-radius: 14px;
        padding: 18px;
        text-align: center;
        height: max-content;
    }

    .photo-preview {
        width: 138px;
        height: 138px;
        border-radius: 999px;
        background: #eef2ff;
        margin: 0 auto 14px;
        display: grid;
        place-items: center;
        overflow: hidden;
        color: #4f46e5;
        font-size: 44px;
        font-weight: 800;
    }

    .photo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .section {
        border: 1px solid #e4e9f3;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 18px;
    }

    .section h2 {
        display: flex;
        gap: 10px;
        align-items: center;
        margin: 0 0 16px;
        color: #0f1f3d;
        font-size: 20px;
    }

    .section h2 span {
        width: 36px;
        height: 36px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        background: #f3e8ff;
        color: #7c3aed;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    label {
        display: block;
        font-size: 13px;
        font-weight: 800;
        color: #20304d;
        margin-bottom: 7px;
    }

    input,
    select {
        width: 100%;
        border: 1px solid #d6dff0;
        border-radius: 10px;
        padding: 11px 12px;
        color: #14213d;
    }

    .full {
        grid-column: 1/-1;
    }

    .error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 5px;
        font-weight: 700;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 12px;
    }

    .hint {
        color: #64748b;
        font-size: 13px;
        line-height: 1.5;
    }

    @media (max-width: 900px) {

        .form-layout,
        .grid {
            grid-template-columns: 1fr;
        }

        .edit-head {
            flex-direction: column;
        }
    }
</style>

<div class="edit-page">
    <div class="crumb">
        <a href="{{ route('admin.users.index') }}">Users</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="{{ route('admin.users.show', $user) }}">User Profile</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Update</span>
    </div>

    <form class="edit-card" method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="edit-head">
            <div>
                <h1>Update User</h1>
                <p>Modifier les informations de l'utilisateur et son profil métier.</p>
            </div>
            <a class="btn-light" href="{{ route('admin.users.show', $user) }}"><i class="fa-solid fa-eye"></i> Afficher</a>
        </div>

        <div class="form-layout">
            <div class="photo-box">
                <div class="photo-preview" id="photoPreview">
                    @if($photoUrl)
                    <img src="{{ $photoUrl }}" alt="{{ $user->name }}">
                    @else
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>
                <label for="profile_photo">Profile Photo</label>
                <input id="profile_photo" name="profile_photo" type="file" accept="image/png,image/jpeg,image/jpg">
                @error('profile_photo')<div class="error">{{ $message }}</div>@enderror
                <p class="hint">JPG/PNG max 2Mo. Laissez vide pour garder la photo actuelle.</p>
            </div>

            <div>
                <div class="section">
                    <h2><span><i class="fa-regular fa-user"></i></span>Personal Information</h2>
                    <div class="grid">
                        <div><label>Full Name</label><input name="name" value="{{ old('name', $user->name) }}" required>@error('name')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Email</label><input name="email" type="email" value="{{ old('email', $user->email) }}" required>@error('email')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Phone</label><input name="phone" value="{{ old('phone', $user->phone) }}" required>@error('phone')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Role</label><select name="role" id="roleSelect" required>@foreach($roles as $value => $label)<option value="{{ $value }}" @selected($selectedRole===$value)>{{ $label }}</option>@endforeach</select>@error('role')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Status</label><select name="status" required>
                                <option value="available" @selected(old('status', $user->status) === 'available')>Available</option>
                                <option value="busy" @selected(old('status', $user->status) === 'busy')>Busy</option>
                                <option value="offline" @selected(old('status', $user->status) === 'offline')>Offline</option>
                            </select>@error('status')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Account Status</label><select name="is_active" required>
                                <option value="1" @selected((string) old('is_active', (int) $user->is_active) === '1')>Active</option>
                                <option value="0" @selected((string) old('is_active', (int) $user->is_active) === '0')>Inactive</option>
                            </select>@error('is_active')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>New Password</label><input name="password" type="password" minlength="6">@error('password')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Confirm Password</label><input name="password_confirmation" type="password" minlength="6"></div>
                    </div>
                </div>

                <div class="section">
                    <h2><span><i class="fa-solid fa-truck-medical"></i></span>Profile Information</h2>
                    <div class="grid">
                        <div><label>License Number</label><input name="license_number" value="{{ old('license_number', $profile->license_number ?? '') }}">@error('license_number')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="driver-field"><label>License Expiry</label><input name="license_expiry" type="date" value="{{ old('license_expiry', $profile->license_expiry ?? '') }}">@error('license_expiry')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="driver-field"><label>Vehicle Type</label><input name="vehicle_type" value="{{ old('vehicle_type', $profile->vehicle_type ?? '') }}">@error('vehicle_type')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="driver-field"><label>Vehicle Plate</label><input name="vehicle_plate" value="{{ old('vehicle_plate', $profile->vehicle_plate ?? '') }}">@error('vehicle_plate')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="nurse-field"><label>Diploma</label><input name="diploma" value="{{ old('diploma', $profile->diploma ?? '') }}">@error('diploma')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="doctor-field"><label>Specialty</label><input name="specialty" value="{{ old('specialty', $profile->specialty ?? '') }}">@error('specialty')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Experience Years</label><input name="experience_years" type="number" min="0" max="60" value="{{ old('experience_years', $profile->experience_years ?? 0) }}">@error('experience_years')<div class="error">{{ $message }}</div>@enderror</div>
                        <div><label>Availability</label><select name="is_available" required>
                                <option value="1" @selected((string) old('is_available', (int) ($profile->is_available ?? true)) === '1')>Available</option>
                                <option value="0" @selected((string) old('is_available', (int) ($profile->is_available ?? false)) === '0')>Unavailable</option>
                            </select>@error('is_available')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="full"><label>Blocked Reason</label><input name="blocked_reason" value="{{ old('blocked_reason', $profile->blocked_reason ?? '') }}">@error('blocked_reason')<div class="error">{{ $message }}</div>@enderror</div>
                    </div>
                </div>

                <div class="form-actions">
                    <a class="btn-light" href="{{ route('admin.users.show', $user) }}">Cancel</a>
                    <button class="btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const roleSelect = document.getElementById('roleSelect');
    const photoInput = document.getElementById('profile_photo');
    const photoPreview = document.getElementById('photoPreview');

    function syncRoleFields() {
        const role = roleSelect.value;
        document.querySelectorAll('.driver-field').forEach(el => el.style.display = role === 'driver' ? '' : 'none');
        document.querySelectorAll('.nurse-field').forEach(el => el.style.display = role === 'nurse' ? '' : 'none');
        document.querySelectorAll('.doctor-field').forEach(el => el.style.display = ['general_doctor', 'emergency_doctor', 'specialist_doctor'].includes(role) ? '' : 'none');
    }

    photoInput.addEventListener('change', () => {
        const file = photoInput.files?.[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = () => photoPreview.innerHTML = `<img src="${reader.result}" alt="Preview">`;
        reader.readAsDataURL(file);
    });

    roleSelect.addEventListener('change', syncRoleFields);
    syncRoleFields();
</script>
@endsection