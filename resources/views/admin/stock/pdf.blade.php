@extends('admin.layouts.app')

@section('title', 'PDF entrée de stock ' . $entry->entry_number)

@section('content')
<style>
    .print-card {
        background: #fff;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, .06);
        padding: 32px;
    }

    .print-header,
    .print-actions,
    .meta-grid {
        display: flex;
        gap: 16px;
    }

    .print-header {
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 26px;
    }

    .print-header h1 {
        margin: 0 0 8px;
        font-size: 32px;
        color: #07163d;
    }

    .print-header p,
    .meta-item small {
        margin: 0;
        color: #53627f;
        font-weight: 600;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 44px;
        padding: 0 16px;
        border-radius: 10px;
        border: 1px solid #d1dbef;
        background: #fff;
        color: #111c44;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
    }

    .btn.primary {
        border: 0;
        color: #fff;
        background: linear-gradient(135deg, #665cff, #4f46e5);
    }

    .meta-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        margin-bottom: 24px;
    }

    .meta-item {
        border: 1px solid #e4e9f4;
        border-radius: 12px;
        padding: 14px;
    }

    .meta-item strong {
        display: block;
        margin-top: 6px;
        color: #111c44;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 14px 16px;
        border-bottom: 1px solid #e8edf7;
        text-align: left;
    }

    th {
        background: #fafbff;
        color: #07163d;
    }

    .center {
        text-align: center;
    }

    .total-row td {
        font-weight: 900;
    }

    @media print {

        .sidebar,
        .topbar,
        .print-actions {
            display: none !important;
        }

        .main {
            margin: 0 !important;
            padding: 0 !important;
        }

        .print-card {
            border: 0;
            box-shadow: none;
            padding: 0;
        }
    }
</style>

<section class="print-card">
    <div class="print-header">
        <div>
            <h1>Entrée de stock {{ $entry->entry_number }}</h1>
            <p>Document imprimable pour l’entrée de stock.</p>
        </div>
        <div class="print-actions">
            <a class="btn" href="{{ route('admin.stock.index') }}"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <button type="button" class="btn primary" onclick="window.print()"><i class="fa-regular fa-file-pdf"></i> Imprimer / PDF</button>
        </div>
    </div>

    <div class="meta-grid">
        <div class="meta-item"><small>N° Stock</small><strong>{{ $entry->entry_number }}</strong></div>
        <div class="meta-item"><small>Date</small><strong>{{ $entry->movement_date?->format('d/m/Y') }}</strong></div>
        <div class="meta-item"><small>Créé par</small><strong>{{ $entry->creator?->name ?? 'Utilisateur supprimé' }}</strong></div>
        <div class="meta-item"><small>Raison</small><strong>{{ $entry->reason ?: '—' }}</strong></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Médicament</th>
                <th>Unité</th>
                <th class="center">Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entry->items as $item)
            <tr>
                <td>{{ $item->medicine?->name ?? 'Médicament supprimé' }}</td>
                <td>{{ $item->medicine?->unit ?? '—' }}</td>
                <td class="center">{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection