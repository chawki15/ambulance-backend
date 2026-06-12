@extends('admin.layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')
<style>
    table tbody tr {
        transition: .25s;
    }

    table tbody tr:hover {
        background: #f8fbff;
    }

    th {
        font-size: 14px;
        font-weight: 700;
        color: #475569;
    }

    td {
        padding: 18px 12px;
        vertical-align: middle;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        width: 38px;
        height: 38px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: .25s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .view {
        background: #eff6ff;
        color: #2563eb;
    }

    .edit {
        background: #fef3c7;
        color: #d97706;
    }

    .delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-icon:hover {
        transform: translateY(-2px);
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 1px;
    }

    .page-header h1 {
        margin: 0;
    }

    .add-btn {
        background: linear-gradient(135deg, #0a2f67, #1d4ed8);
        color: white;
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(37, 99, 235, .2);
    }

    .add-btn:hover {
        background: #1d4ed8;
    }

    h1 {
        margin: 20px 0 14px;
        font-size: 40px
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 14px
    }

    .card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px
    }

    .card h3 {
        font-size: 36px;
        margin: 7px 0 4px
    }

    .card small {
        color: var(--muted)
    }

    .panel {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow-x: auto;
        overflow-y: visible;
    }

    .panel {
        width: 100%;
    }

    .stats {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 18px;
        border-bottom: 1px solid #edf1f9
    }

    .btn {
        border: 1px solid #d8e0f1;
        background: #fff;
        border-radius: 10px;
        padding: 10px 14px
    }

    .btn.primary {
        background: linear-gradient(90deg, #5f54ff, #4f46e5);
        color: #fff;
        border: 0
    }

    table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse
    }

    th,
    td {
        padding: 14px 12px;
        border-bottom: 1px solid #edf1f9;
        text-align: left
    }

    th {
        background: #fafbff
    }

    .busy {
        background: #fff3e7;
        color: #e07b11
    }

    .badge {
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .role {
        background: #eef2ff;
        color: #4f46e5;
    }

    .ok {
        background: #dcfce7;
        color: #15803d;
    }

    .off {
        background: #fee2e2;
        color: #dc2626;
    }

    .role.doc {
        background: #eaf7ff;
        color: #008bb6;
        border: 1px solid #9adff4
    }

    .actions button {
        border: 1px solid #d9e1f2;
        background: #fff;
        border-radius: 8px;
        padding: 6px 9px;
        margin-right: 4px
    }

    .main {
        margin-left: 245px;
        width: calc(100vw - 245px);
        max-width: none;
        min-height: 100vh;
        padding: 18px 24px 60px;
        overflow-x: hidden;
    }

    .avatar,
    .avatar-fallback {
        width: 42px;
        height: 42px;
        border-radius: 50%;
    }

    .avatar {
        object-fit: cover;
    }

    .avatar-fallback {
        background: #eef2ff;
        color: #4f46e5;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .foot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--muted);
        font-size: 14px;
        padding: 14px 18px
    }

    @media(max-width:1100px) {
        .layout {
            display: block
        }

        .sidebar {
            width: 100%
        }

        .stats {
            grid-template-columns: 1fr 1fr
        }

        .search {
            min-width: 0;
            width: 100%
        }

        .topbar {
            display: grid;
            gap: 10px
        }
    }

    @media (max-width:820px) {
        .main {
            margin-left: 0;
            width: 100%;
            max-width: 100%;
        }
    }
</style>


<div class="page-header">
    <h1>Liste des utilisateurs</h1>

    <a href="{{ route('admin.users.create') }}" class="add-btn">
        + Ajouter utilisateur
    </a>
</div>

<section class="stats">
    <div class="card">
        <small>Total utilisateurs</small>
        <h3>{{ $users->count() }}</h3>
        <small>Tous les comptes</small>
    </div>

    <div class="card">
        <small>Actifs</small>
        <h3>{{ $users->where('is_active', true)->count() }}</h3>
        <small>En service</small>
    </div>

    <div class="card">
        <small>Inactifs</small>
        <h3>{{ $users->where('is_active', false)->count() }}</h3>
        <small>Comptes désactivés</small>
    </div>

    <div class="card">
        <small>Dernier utilisateur</small>
        <h3>{{ $users->count() }}</h3>
        <small>Enregistré récemment</small>
    </div>
</section>

<section class="panel">

    <div class="head">
        <h2>Liste des utilisateurs</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Rôle</th>
                <th>Actif</th>
                <th>Date création</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $user)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($user->profile_photo)
                    <img
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        alt="{{ $user->name }}"
                        class="avatar">
                    @else
                    <span class="avatar-fallback">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </span>
                    @endif
                </td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->phone ?? '-' }}</td>

                <td>
                    <span class="badge role">
                        {{ ucfirst(str_replace('_',' ',$user->role)) }}
                    </span>
                </td>

                <td>
                    @if($user->is_active)
                    <span class="badge ok">Actif</span>
                    @else
                    <span class="badge off">Inactif</span>
                    @endif
                </td>

                <td>
                    {{ $user->created_at?->format('d/m/Y') }}
                </td>

                <td class="actions">

                    {{-- VIEW --}}
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn-icon view">
                        <i class="fa-solid fa-eye"></i>
                    </a>

                    {{-- EDIT (Wizard) --}}
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-icon edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    {{-- DELETE --}}
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Delete user?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-icon delete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    @if($user->is_active)
                    <button class="btn-icon off" onclick="blockUser({{ $user->id }})">
                        <i class="fa-solid fa-ban"></i>
                    </button>
                    @else
                    <button class="btn-icon ok" onclick="unblockUser({{ $user->id }})">
                        <i class="fa-solid fa-check"></i>
                    </button>
                    @endif
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="9" style="text-align:center">
                    Aucun utilisateur trouvé.
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

    <div class="foot">
        Total : {{ $users->count() }} utilisateur(s)
    </div>

</section>

@endsection