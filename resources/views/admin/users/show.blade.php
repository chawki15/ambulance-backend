@extends('admin.layouts.app')

@section('title', 'Profil utilisateur')

@section('content')
@php
$photoUrl = $user->profile_photo ? asset('storage/' . $user->profile_photo) : null;
$isAvailable = (bool) ($profile->is_available ?? $user->status === 'available');
$profileActive = (bool) ($profile->is_active ?? $user->is_active);
$statusLabel = ucfirst($user->status ?? 'available');
$memberSince = $user->created_at?->format('M d, Y') ?? '-';
$lastUpdated = $user->updated_at?->format('M d, Y h:i A') ?? '-';
@endphp

<style>
    .profile-page {
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

    .profile-card,
    .info-card {
        background: #fff;
        border: 1px solid #e4e9f3;
        border-radius: 14px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, .05);
    }

    .profile-card {
        padding: 26px;
    }

    .profile-card-head {
        display: flex;
        justify-content: space-between;
        gap: 16px;
        align-items: flex-start;
        margin-bottom: 26px;
    }

    .profile-card h1,
    .info-card h2 {
        margin: 0;
        color: #0f1f3d;
    }

    .profile-card p {
        margin: 8px 0 0;
        color: #52617a;
    }

    .actions-row {
        display: flex;
        gap: 10px;
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

    .hero {
        display: flex;
        gap: 28px;
        align-items: center;
        margin-bottom: 24px;
    }

    .avatar-wrap {
        position: relative;
        width: 138px;
        height: 138px;
        flex: 0 0 138px;
    }

    .avatar-wrap img,
    .avatar-fallback-large {
        width: 138px;
        height: 138px;
        border-radius: 999px;
        object-fit: cover;
        background: #eef2ff;
        display: grid;
        place-items: center;
        font-size: 44px;
        font-weight: 800;
        color: #4f46e5;
    }

    .online-dot {
        position: absolute;
        right: 9px;
        bottom: 18px;
        width: 22px;
        height: 22px;
        border-radius: 999px;
        background: #22c55e;
        border: 4px solid #fff;
    }

    .hero-details h2 {
        display: flex;
        gap: 14px;
        align-items: center;
        margin: 0 0 14px;
        font-size: 30px;
        color: #111a35;
    }

    .hero-line {
        display: flex;
        gap: 10px;
        align-items: center;
        color: #344767;
        margin: 12px 0;
        font-weight: 600;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        border-radius: 8px;
        padding: 5px 10px;
        font-size: 13px;
        font-weight: 800;
    }

    .badge-blue {
        background: #edf4ff;
        color: #1d4ed8;
        border: 1px solid #93c5fd;
    }

    .badge-green {
        background: #dcfce7;
        color: #15803d;
        border: 1px solid #86efac;
    }

    .badge-red {
        background: #fee2e2;
        color: #b91c1c;
        border: 1px solid #fecaca;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .summary-box {
        border: 1px solid #e3e9f5;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        gap: 14px;
        align-items: center;
    }

    .summary-icon {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 19px;
    }

    .summary-box small {
        display: block;
        color: #52617a;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .summary-box strong {
        font-size: 16px;
        color: #13213c;
    }

    .tabs {
        display: flex;
        gap: 26px;
        margin: 22px 0;
        border-bottom: 1px solid #e4e9f3;
    }

    .tab {
        padding: 0 0 14px;
        color: #344767;
        font-weight: 700;
    }

    .tab.active {
        color: #5b35f5;
        border-bottom: 3px solid #5b35f5;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1.05fr 1.6fr;
        gap: 18px;
    }

    .info-card {
        padding: 22px;
    }

    .info-title {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 18px;
    }

    .info-title span {
        width: 38px;
        height: 38px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        background: #f3e8ff;
        color: #7c3aed;
    }

    .rows {
        display: grid;
        gap: 0;
    }

    .row {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        padding: 12px 0;
        border-bottom: 1px solid #edf1f7;
        font-weight: 700;
    }

    .row span:first-child {
        color: #20304d;
    }

    .row span:last-child {
        color: #14213d;
        text-align: right;
    }

    .role-card-body {
        display: grid;
        grid-template-columns: 1fr 240px;
        gap: 30px;
        align-items: center;
    }

    .big-icon {
        width: 210px;
        height: 210px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        background: #f0f4ff;
        color: #76a7ff;
        font-size: 82px;
        justify-self: center;
    }

    .activity-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-top: 18px;
    }

    .activity-box {
        border: 1px solid #edf1f7;
        border-radius: 12px;
        padding: 16px;
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .activity-box i {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        background: #eaf2ff;
        color: #2563eb;
    }

    .activity-box strong {
        display: block;
        font-size: 22px;
    }

    .back-row {
        margin-top: 22px;
    }

    .alert-success {
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 16px;
        font-weight: 700;
    }

    @media (max-width: 1100px) {

        .summary-grid,
        .activity-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .content-grid,
        .role-card-body {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 720px) {

        .hero,
        .profile-card-head {
            flex-direction: column;
        }

        .summary-grid,
        .activity-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="profile-page">
    <div class="crumb">
        <a href="{{ route('admin.users.index') }}">Users</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span>User Profile</span>
    </div>

    @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif

    <section class="profile-card">
        <div class="profile-card-head">
            <div>
                <h1>User Profile</h1>
                <p>View and manage user information</p>
            </div>
            <div class="actions-row">
                <a class="btn-light" href="{{ route('admin.users.edit', $user) }}"><i class="fa-solid fa-pen"></i> Update</a>
                <a class="btn-primary" href="{{ route('admin.users.index') }}"><i class="fa-solid fa-list"></i> Users</a>
            </div>
        </div>

        <div class="hero">
            <div class="avatar-wrap">
                @if($photoUrl)
                <img src="{{ $photoUrl }}" alt="{{ $user->name }}">
                @else
                <div class="avatar-fallback-large">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                @endif
                @if($user->is_active)<span class="online-dot"></span>@endif
            </div>
            <div class="hero-details">
                <h2>{{ $user->name }} <span class="badge badge-blue">{{ $roleLabel }}</span></h2>
                <div class="hero-line"><i class="fa-regular fa-envelope"></i>{{ $user->email }}</div>
                <div class="hero-line"><i class="fa-solid fa-phone"></i>{{ $user->phone ?? '-' }}</div>
                <div class="hero-line"><i class="fa-regular fa-id-badge"></i>User ID: #USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>

        <div class="summary-grid">
            <div class="summary-box">
                <div class="summary-icon"><i class="fa-solid fa-circle"></i></div>
                <div><small>Status</small><strong>{{ $statusLabel }}</strong></div>
            </div>
            <div class="summary-box">
                <div class="summary-icon"><i class="fa-regular fa-user"></i></div>
                <div><small>Role</small><strong>{{ $roleLabel }}</strong></div>
            </div>
            <div class="summary-box">
                <div class="summary-icon"><i class="fa-regular fa-calendar"></i></div>
                <div><small>Member Since</small><strong>{{ $memberSince }}</strong></div>
            </div>
            <div class="summary-box">
                <div class="summary-icon"><i class="fa-regular fa-clock"></i></div>
                <div><small>Last Updated</small><strong>{{ $lastUpdated }}</strong></div>
            </div>
        </div>
    </section>

    <nav class="tabs">
        <div class="tab active"><i class="fa-regular fa-clipboard"></i> Overview</div>
        <div class="tab"><i class="fa-regular fa-user"></i> Profile Information</div>
        <div class="tab"><i class="fa-solid fa-users-gear"></i> {{ $profileTitle }}</div>
        <div class="tab"><i class="fa-regular fa-clock"></i> Activity History</div>
    </nav>

    <section class="content-grid">
        <div class="info-card">
            <div class="info-title"><span><i class="fa-regular fa-user"></i></span>
                <h2>Personal Information</h2>
            </div>
            <div class="rows">
                <div class="row"><span>Full Name</span><span>{{ $user->name }}</span></div>
                <div class="row"><span>Email</span><span>{{ $user->email }}</span></div>
                <div class="row"><span>Phone</span><span>{{ $user->phone ?? '-' }}</span></div>
                <div class="row"><span>Role</span><span class="badge badge-blue">{{ $roleLabel }}</span></div>
                <div class="row"><span>Status</span><span class="badge {{ $isAvailable ? 'badge-green' : 'badge-red' }}">{{ $isAvailable ? 'Available' : 'Unavailable' }}</span></div>
                <div class="row"><span>Account Status</span><span class="badge {{ $profileActive ? 'badge-green' : 'badge-red' }}">{{ $profileActive ? 'Active' : 'Inactive' }}</span></div>
                <div class="row"><span>Created At</span><span>{{ $user->created_at?->format('M d, Y h:i A') ?? '-' }}</span></div>
                <div class="row"><span>Last Updated</span><span>{{ $lastUpdated }}</span></div>
            </div>
        </div>

        <div>
            <div class="info-card">
                <div class="info-title"><span><i class="fa-solid fa-truck-medical"></i></span>
                    <h2>{{ $profileTitle }}</h2>
                </div>
                <div class="role-card-body">
                    <div class="rows">
                        <div class="row"><span>License Number</span><span>{{ $profile->license_number ?? '-' }}</span></div>
                        @if($user->role === 'driver')
                        <div class="row"><span>License Expiry</span><span>{{ $profile->license_expiry ?? '-' }}</span></div>
                        <div class="row"><span>Vehicle Type</span><span>{{ $profile->vehicle_type ?? '-' }}</span></div>
                        <div class="row"><span>Vehicle Plate</span><span>{{ $profile->vehicle_plate ?? '-' }}</span></div>
                        @endif
                        @if($user->role === 'nurse')
                        <div class="row"><span>Diploma</span><span>{{ $profile->diploma ?? '-' }}</span></div>
                        @endif
                        @if(in_array($user->role, ['general_doctor', 'emergency_doctor'], true))
                        <div class="row"><span>Specialty</span><span>{{ $profile->specialty ?? ($user->role === 'general_doctor' ? 'General' : '-') }}</span></div>
                        @endif
                        <div class="row"><span>Experience Years</span><span>{{ $profile->experience_years ?? 0 }}</span></div>
                        <div class="row"><span>Availability</span><span class="badge {{ $isAvailable ? 'badge-green' : 'badge-red' }}">{{ $isAvailable ? 'Available' : 'Unavailable' }}</span></div>
                    </div>
                    <div class="big-icon"><i class="fa-solid fa-truck-medical"></i></div>
                </div>
            </div>

            <div class="info-card" style="margin-top:18px;">
                <div class="info-title"><span><i class="fa-solid fa-chart-line"></i></span>
                    <h2>System Activity</h2>
                </div>
                <div class="activity-grid">
                    <div class="activity-box"><i class="fa-solid fa-users"></i>
                        <div><strong>0</strong><small>Total Logins</small></div>
                    </div>
                    <div class="activity-box"><i class="fa-solid fa-arrows-rotate"></i>
                        <div><strong>0</strong><small>Stock Movements</small></div>
                    </div>
                    <div class="activity-box"><i class="fa-solid fa-truck-medical"></i>
                        <div><strong>0</strong><small>Deliveries Assigned</small></div>
                    </div>
                    <div class="activity-box"><i class="fa-regular fa-file-lines"></i>
                        <div><strong>0</strong><small>Reports Generated</small></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="back-row"><a class="btn-light" href="{{ route('admin.users.index') }}"><i class="fa-solid fa-arrow-left"></i> Back to Users</a></div>
</div>
@endsection