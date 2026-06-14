@extends('admin.layouts.app')

@section('title', 'Entrées de stock')

@section('content')
<style>
    .stock-card {
        background: #fff;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, .06);
        padding: 28px;
    }

    .stock-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 22px;
    }

    .stock-header h1 {
        margin: 0 0 8px;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.04em;
    }

    .sub {
        margin: 0;
        color: #53627f;
        font-size: 16px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 48px;
        padding: 0 18px;
        border-radius: 10px;
        border: 1px solid #d1dbef;
        background: #fff;
        color: #111c44;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn.primary {
        border: 0;
        color: #fff;
        background: linear-gradient(135deg, #665cff, #4f46e5);
        box-shadow: 0 14px 26px rgba(79, 70, 229, .22);
    }

    .filters {
        display: grid;
        grid-template-columns: minmax(220px, 1fr) auto minmax(170px, 220px) auto minmax(170px, 220px) auto;
        gap: 14px;
        align-items: center;
        margin-bottom: 14px;
    }

    .search-field,
    .date-field {
        position: relative;
    }

    input {
        width: 100%;
        border: 1px solid #cfdaef;
        border-radius: 10px;
        padding: 13px 42px 13px 14px;
        font: inherit;
        background: #fff;
        outline: none;
    }

    input:focus {
        border-color: #5f54ff;
        box-shadow: 0 0 0 4px rgba(95, 84, 255, .11);
    }

    .field-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #53627f;
    }

    .filter-label {
        font-weight: 800;
    }

    .table-wrap {
        overflow-x: auto;
        border: 1px solid #e4e9f4;
        border-radius: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 860px;
    }

    th,
    td {
        padding: 16px 18px;
        border-bottom: 1px solid #e8edf7;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background: #fafbff;
        font-weight: 900;
        color: #07163d;
        font-size: 14px;
    }

    td {
        color: #111c44;
        font-weight: 600;
    }

    tr:last-child td {
        border-bottom: 0;
    }

    .center {
        text-align: center;
    }

    .creator {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .actions-cell {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn.small {
        min-height: 40px;
        padding: 0 14px;
        font-size: 14px;
    }

    .btn.view {
        color: #3730a3;
    }

    .btn.pdf {
        color: #dc2626;
        border-color: #fecaca;
    }

    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        margin-top: 16px;
        color: #53627f;
        font-weight: 600;
    }

    .pagination {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .page-btn {
        width: 40px;
        height: 40px;
        border: 1px solid #dbe3f1;
        border-radius: 9px;
        background: #fff;
        color: #53627f;
        display: inline-grid;
        place-items: center;
        text-decoration: none;
    }

    .page-btn.active {
        color: #fff;
        border-color: #4f46e5;
        background: linear-gradient(135deg, #665cff, #4f46e5);
    }

    @media (max-width: 900px) {

        .stock-header,
        .table-footer {
            flex-direction: column;
            align-items: stretch;
        }

        .filters {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="stock-page">
    <section class="stock-card">
        <div class="stock-header">
            <div>
                <h1>Entrées de stock</h1>
                <p class="sub">Liste de toutes les entrées de stock enregistrées.</p>
            </div>
            <a class="btn primary" href="{{ route('admin.stock.create') }}">
                <i class="fa-solid fa-plus"></i> Nouvelle entrée
            </a>
        </div>
        <div class="filters" aria-label="Filtres des entrées de stock">
            <div class="search-field">
                <input type="search" placeholder="Rechercher un numéro..." aria-label="Rechercher un numéro de stock">
                <i class="fa-solid fa-magnifying-glass field-icon"></i>
            </div>
            <span class="filter-label">Du</span>
            <div class="date-field">
                <input type="text" placeholder="jj / mm / aaaa" aria-label="Date début">
                <i class="fa-regular fa-calendar field-icon"></i>
            </div>
            <span class="filter-label">Au</span>
            <div class="date-field">
                <input type="text" placeholder="jj / mm / aaaa" aria-label="Date fin">
                <i class="fa-regular fa-calendar field-icon"></i>
            </div>
            <button type="button" class="btn"><i class="fa-solid fa-filter"></i> Filtrer</button>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>N° Stock</th>
                        <th>Date du mouvement</th>
                        <th>Créé par</th>
                        <th class="center">Nombre d’articles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($entries as $entry)
                    <tr>
                        <td>{{ $entry->entry_number }}</td>
                        <td>{{ $entry->movement_date?->format('d/m/Y') }}</td>
                        <td>
                            <span class="creator"><i class="fa-regular fa-circle-user"></i> {{ $entry->creator?->name ?? 'Utilisateur supprimé' }}</span>
                        </td>
                        <td class="center">{{ $entry->items_count }}</td>
                        <td class="actions-cell">
                            <a class="btn small pdf" href="{{ route('admin.stock.pdf', $entry) }}" target="_blank" rel="noopener"><i class="fa-regular fa-file-pdf"></i> PDF</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="center">Aucune entrée de stock enregistrée.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="table-footer">
            <span>
                @if ($entries->total())
                Affichage de {{ $entries->firstItem() }} à {{ $entries->lastItem() }} sur {{ $entries->total() }} entrées
                @else
                Affichage de 0 entrée
                @endif
            </span>
            {{ $entries->links() }}
        </div>
    </section>
</div>
@endsection