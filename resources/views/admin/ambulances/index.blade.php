@extends('admin.layouts.app')

@section('title', 'Liste des ambulances')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 38px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }

    .breadcrumb {
        margin-top: 8px;
        color: #64748b;
        font-size: 14px;
    }

    .add-btn {
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        padding: 14px 22px;
        border-radius: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: .3s;
    }

    .add-btn:hover {
        background: #1d4ed8;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .icon-blue {
        background: #eaf2ff;
        color: #2563eb;
    }

    .icon-green {
        background: #e8faef;
        color: #16a34a;
    }

    .icon-orange {
        background: #fff3e6;
        color: #f97316;
    }

    .icon-red {
        background: #ffe9e9;
        color: #ef4444;
    }

    .stat-content h2 {
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        color: #0f172a;
    }

    .stat-content p {
        margin-top: 5px;
        color: #64748b;
    }

    .table-card {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .table-title {
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
    }

    .table-tools {
        display: flex;
        gap: 10px;
    }

    .filter-btn {
        border: none;
        background: #f1f5f9;
        padding: 12px 18px;
        border-radius: 10px;
        cursor: pointer;
    }

    .search-input {
        width: 260px;
        height: 45px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 0 15px;
        outline: none;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table thead {
        background: #f8fafc;
    }

    .custom-table th {
        text-align: left;
        padding: 16px;
        color: #0f172a;
        font-weight: 700;
        font-size: 14px;
    }

    .custom-table td {
        padding: 16px;
        border-top: 1px solid #e2e8f0;
        color: #334155;
    }

    .plate {
        background: #edf4ff;
        color: #2563eb;
        padding: 8px 12px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
    }

    .badge {
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-success {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-warning {
        background: #fef3c7;
        color: #b45309;
    }

    .badge-danger {
        background: #fee2e2;
        color: #dc2626;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        transition: .3s;
    }

    .view {
        color: #2563eb;
    }

    .edit {
        color: #f59e0b;
    }

    .delete {
        color: #ef4444;
        background: none;
        cursor: pointer;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #64748b;
    }

    @media(max-width:1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:768px) {

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .table-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .table-tools {
            width: 100%;
        }

        .search-input {
            width: 100%;
        }
    }
</style>

<div class="page-header">

    <div>
        <h1 class="page-title">Liste des ambulances</h1>

        <div class="breadcrumb">
            Accueil / Ambulances / Liste des ambulances
        </div>
    </div>

    <a href="{{ route('ambulances.create') }}" class="add-btn">
        <i class="fa-solid fa-plus"></i>
        Ajouter une ambulance
    </a>

</div>

<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon icon-blue">
            <i class="fa-solid fa-truck-medical"></i>
        </div>

        <div class="stat-content">
            <h2>{{ $ambulances->count() }}</h2>
            <p>Total ambulances</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-green">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="stat-content">
            <h2>{{ $ambulances->where('status','available')->count() }}</h2>
            <p>Disponibles</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-orange">
            <i class="fa-solid fa-wrench"></i>
        </div>

        <div class="stat-content">
            <h2>{{ $ambulances->where('status','mission')->count() }}</h2>
            <p>En mission</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-red">
            <i class="fa-solid fa-screwdriver-wrench"></i>
        </div>

        <div class="stat-content">
            <h2>{{ $ambulances->where('status','maintenance')->count() }}</h2>
            <p>Maintenance</p>
        </div>
    </div>

</div>

<div class="table-card">

    <div class="table-header">

        <h2 class="table-title">
            Liste des ambulances
        </h2>

        <div class="table-tools">

            <button class="filter-btn">
                <i class="fa-solid fa-filter"></i>
                Filtrer
            </button>

            <input
                type="text"
                class="search-input"
                placeholder="Rechercher...">

        </div>

    </div>

    <div class="table-responsive">

        <table class="custom-table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Immatriculation</th>
                    <th>Licence</th>
                    <th>Expiration</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($ambulances as $ambulance)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $ambulance->type }}</td>

                    <td>
                        <span class="plate">
                            {{ $ambulance->registration }}
                        </span>
                    </td>

                    <td>
                        {{ $ambulance->license_number }}
                    </td>

                    <td>
                        {{ $ambulance->license_expiry }}
                    </td>

                    <td>

                        @if($ambulance->status == 'available')
                        <span class="badge badge-success">
                            Disponible
                        </span>

                        @elseif($ambulance->status == 'mission')
                        <span class="badge badge-warning">
                            En mission
                        </span>

                        @else
                        <span class="badge badge-danger">
                            Maintenance
                        </span>
                        @endif

                    </td>

                    <td>
                        {{ $ambulance->created_at?->format('d/m/Y') }}
                    </td>

                    <td>

                        <div class="actions">

                            <a href="{{ route('ambulances.show',$ambulance->id) }}"
                                class="action-btn view">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('ambulances.edit',$ambulance->id) }}"
                                class="action-btn edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form action="{{ route('ambulances.destroy',$ambulance->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="action-btn delete"
                                    onclick="return confirm('Supprimer cette ambulance ?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8" class="empty">
                        Aucune ambulance trouvée
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection