@extends('admin.layouts.app')

@section('title', 'Liste des ambulances')

@section('content')

<style>
    .ambulance-page-header {
        align-items: center;
        display: flex;
        justify-content: space-between;
        margin: 20px 1px;
    }

    .ambulance-page-header h1 {
        font-size: 40px;
        margin: 0;
    }

    .ambulance-add-btn {
        background: linear-gradient(135deg, #0a2f67, #1d4ed8);
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(37, 99, 235, .2);
        color: #fff;
        padding: 12px 20px;
        text-decoration: none;
    }

    .ambulance-add-btn:hover {
        background: #1d4ed8;
    }

    .ambulance-stats {
        display: grid;
        gap: 14px;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        margin-bottom: 14px;
    }

    .ambulance-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px;
    }

    .ambulance-card h3 {
        font-size: 36px;
        margin: 7px 0 4px;
    }

    .ambulance-card small {
        color: var(--muted);
    }


    .ambulance-panel {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow-x: auto;
        overflow-y: visible;
        width: 100%;
    }

    .ambulance-panel-head {
        align-items: center;
        border-bottom: 1px solid #edf1f9;
        display: flex;
        justify-content: space-between;
        padding: 16px 18px;
    }

    .ambulance-panel-head h2 {
        margin: 0;
    }

    .ambulance-tools {
        display: flex;
        gap: 10px;
    }

    .ambulance-filter-btn {
        background: #fff;
        border: 1px solid #d8e0f1;
        border-radius: 10px;
        cursor: pointer;
        padding: 10px 14px;
    }

    .ambulance-search-input {
        border: 1px solid #d6dff0;
        border-radius: 10px;
        min-width: 260px;
        padding: 11px 12px;
    }

    .ambulance-table {
        border-collapse: collapse;
        min-width: 900px;
        width: 100%;
    }

    .ambulance-table th,
    .ambulance-table td {
        border-bottom: 1px solid #edf1f9;
        padding: 14px 12px;
        text-align: left;
        vertical-align: middle;
    }

    .ambulance-table th {
        background: #fafbff;
        color: #475569;
        font-size: 14px;
        font-weight: 700;
    }

    .ambulance-table tbody tr {
        transition: .25s;
    }

    .ambulance-table tbody tr:hover {
        background: #f8fbff;
    }

    .plate {
        background: #eff6ff;
        border-radius: 10px;
        color: #2563eb;
        display: inline-block;
        font-weight: 700;
        padding: 8px 12px;
    }

    .badge {
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 12px;
    }

    .badge-success {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-warning {
        background: #fff3e7;
        color: #e07b11;
    }

    .badge-danger {
        background: #fee2e2;
        color: #dc2626;
    }

    .ambulance-actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        align-items: center;
        border: 0;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        height: 38px;
        justify-content: center;
        text-decoration: none;
        transition: .25s;
        width: 38px;
    }

    .btn-icon:hover {
        transform: translateY(-2px);
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

    .ambulance-empty {
        text-align: center !important;
    }

    .ambulance-foot {
        align-items: center;
        color: var(--muted);
        display: flex;
        font-size: 14px;
        justify-content: space-between;
        padding: 14px 18px;
    }

    .success-message {
        background: #dcfce7;
        border: 1px solid #86efac;
        border-radius: 12px;
        color: #15803d;
        font-weight: 700;
        margin-bottom: 14px;
        padding: 14px 18px;
    }

    .pagination-wrapper {
        margin-top: 18px;
    }

    @media(max-width:1100px) {
        .ambulance-stats {
            grid-template-columns: 1fr 1fr;
        }
    }


    @media(max-width:768px) {

        .ambulance-page-header,
        .ambulance-panel-head,
        .ambulance-tools {
            align-items: flex-start;
            flex-direction: column;
        }

        .ambulance-stats {
            grid-template-columns: 1fr;
        }

        .ambulance-search-input {
            min-width: 100%;
            width: 100%;
        }
    }
</style>

<div class="ambulance-page-header">
    <h1>Liste des ambulances</h1>

    <a href="{{ route('ambulances.create') }}" class="ambulance-add-btn">
        + Ajouter une ambulance
    </a>

</div>

<section class="ambulance-stats">
    <div class="ambulance-card">
        <small>Total ambulances</small>
        <h3>{{ $stats['total'] }}</h3>
        <small>Toutes les ambulances</small>
    </div>

    <div class="ambulance-card">
        <small>Disponibles</small>
        <h3>{{ $stats['available'] }}</h3>
        <small>Prêtes au service</small>
    </div>

    <div class="ambulance-card">
        <small>En mission</small>
        <h3>{{ $stats['mission'] }}</h3>
        <small>Ambulances sorties</small>
    </div>

    <div class="ambulance-card">
        <small>Maintenance</small>
        <h3>{{ $stats['maintenance'] }}</h3>
        <small>Hors service</small>
    </div>
</section>


@if(session('success'))
<div class="success-message">{{ session('success') }}</div>
@endif

<section class="ambulance-panel">
    <div class="ambulance-panel-head">
        <h2>Liste des ambulances</h2>
        <div class="ambulance-tools">
            <button class="ambulance-filter-btn" type="button">
                <i class="fa-solid fa-filter"></i>
                Filtrer
            </button>
            <input class="ambulance-search-input" type="text" placeholder="Rechercher...">
        </div>
    </div>
    <table class="ambulance-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Immatriculation</th>
                <th>Licence</th>
                <th>Expiration</th>
                <th>Statut</th>
                <th>Date création</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($ambulances as $ambulance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ambulance->type }}</td>
                <td><span class="plate">{{ $ambulance->registration }}</span></td>
                <td>{{ $ambulance->license_number }}</td>
                <td>{{ $ambulance->license_expiry?->format('d/m/Y') }}</td>
                <td>
                    @if($ambulance->status == 'available')
                    <span class="badge badge-success">Disponible</span>
                    @elseif($ambulance->status == 'mission')
                    <span class="badge badge-warning">En mission</span>
                    @else
                    <span class="badge badge-danger">Maintenance</span>
                    @endif
                </td>
                <td>{{ $ambulance->created_at?->format('d/m/Y') }}</td>
                <td>
                    @if($ambulance->status == 'available')
                    <span class="badge badge-success">Disponible</span>
                    @elseif($ambulance->status == 'mission')
                    <span class="badge badge-warning">En mission</span>
                    @else
                    <span class="badge badge-danger">Maintenance</span>
                    @endif
                <td>{{ $ambulance->created_at?->format('d/m/Y') }}</td>
                <td>
                    <div class="ambulance-actions">
                        <a href="{{ route('ambulances.show', $ambulance->id) }}" class="btn-icon view">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('ambulances.edit', $ambulance->id) }}" class="btn-icon edit">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form action="{{ route('ambulances.destroy', $ambulance->id) }}" method="POST" onsubmit="return confirm('Supprimer cette ambulance ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="ambulance-empty">Aucune ambulance trouvée</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="ambulance-foot">
        <span>Total : {{ $stats['total'] }} ambulance(s)</span>
        {{ $ambulances->links() }}
    </div>
</section>
@endsection