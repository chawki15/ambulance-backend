@extends('admin.layouts.app')

@section('title', 'Stocks ambulance')

@section('content')
<style>
    .ambulance-stock-page {
        color: #07163d;
        display: grid;
        gap: 18px;
    }

    .breadcrumb {
        display: flex;
        gap: 10px;
        align-items: center;
        color: #53627f;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .breadcrumb a {
        color: #2457db;
        text-decoration: none;
    }

    .page-title {
        margin: 0;
        font-size: clamp(30px, 3vw, 38px);
        letter-spacing: -.04em;
    }

    .sub {
        margin: 8px 0 0;
        color: #53627f;
    }

    .card {
        background: #fff;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        box-shadow: 0 18px 46px rgba(15, 23, 42, .06);
        padding: 24px;
    }

    .top-grid {
        display: grid;
        grid-template-columns: minmax(260px, 1fr) minmax(220px, .8fr) minmax(220px, .8fr);
        gap: 18px;
        align-items: end;
    }

    label {
        display: block;
        font-weight: 900;
        margin-bottom: 8px;
    }

    select,
    input {
        width: 100%;
        border: 1px solid #cfdaef;
        border-radius: 10px;
        padding: 13px 14px;
        font: inherit;
        background: #fff;
        outline: none;
    }

    select:focus,
    input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
    }

    .readonly {
        background: #f8fafc;
        color: #53627f;
    }

    .info {
        border: 1px solid #b8d2ff;
        background: linear-gradient(135deg, #f8fbff, #eef6ff);
        border-radius: 12px;
        padding: 16px;
        font-weight: 800;
        color: #07318c;
    }

    .info strong {
        display: block;
        margin-top: 6px;
        font-size: 22px;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .choice {
        display: grid;
        grid-template-columns: 58px 1fr;
        gap: 16px;
        align-items: center;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        padding: 22px;
    }

    .choice.primary {
        border-color: #8bb5ff;
        background: #f8fbff;
    }

    .choice-icon {
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        border-radius: 12px;
        background: #eef4ff;
        color: #2457db;
        font-size: 26px;
    }

    .choice h3 {
        margin: 0 0 8px;
        color: #07318c;
    }

    .choice p {
        margin: 0 0 14px;
        color: #53627f;
        line-height: 1.45;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 44px;
        padding: 0 18px;
        border-radius: 9px;
        border: 1px solid #cfdaf0;
        background: #fff;
        color: #07163d;
        font-weight: 900;
        cursor: pointer;
        text-decoration: none;
    }

    .btn.primary {
        border: 0;
        color: #fff;
        background: linear-gradient(135deg, #2f6df6, #1d4ed8);
        box-shadow: 0 12px 24px rgba(29, 78, 216, .22);
    }

    .content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 280px;
        gap: 20px;
        align-items: start;
    }

    .table-tools {
        display: flex;
        justify-content: space-between;
        gap: 14px;
        align-items: center;
        margin-bottom: 14px;
    }

    .search {
        max-width: 420px;
    }

    .category {
        border: 1px solid #dbe3f1;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .category-title {
        background: #f3f7ff;
        padding: 13px 16px;
        font-weight: 900;
        color: #0b45b4;
        display: flex;
        justify-content: space-between;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 13px 16px;
        border-top: 1px solid #edf1f8;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background: #fbfcff;
        font-size: 13px;
        color: #07163d;
    }

    .product {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 800;
    }

    .thumb {
        width: 44px;
        height: 36px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #e5eaf4;
        background: #f8fafc;
    }

    .qty-input {
        max-width: 140px;
    }

    .summary {
        position: sticky;
        top: 20px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #edf1f8;
        font-weight: 800;
    }

    .success {
        padding: 13px 16px;
        border-radius: 10px;
        background: #dcfce7;
        color: #166534;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .notice {
        margin-top: 16px;
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
        padding: 14px;
        border-radius: 10px;
        font-weight: 700;
        line-height: 1.45;
    }

    .bottom-actions {
        display: flex;
        justify-content: space-between;
        gap: 14px;
        margin-top: 20px;
        padding-top: 18px;
        border-top: 1px solid #edf1f8;
    }

    @media (max-width: 1000px) {

        .top-grid,
        .actions-grid,
        .content-grid {
            grid-template-columns: 1fr;
        }

        .summary {
            position: static;
        }
    }
</style>

<form action="{{ route('admin.ambulance-stock.standard') }}"
    method="POST">
    @csrf
    <div class="card">
        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="{{ route('admin.dashboard') }}">Ambulances</a><span>›</span><span>Stocks</span><span>›</span><span>Remplissage initial</span>
        </nav>
        <h1 class="page-title">Remplir une ambulance (remplissage initial)</h1>
        <p class="sub">Sélectionnez une ambulance et chargez le stock standard.</p>
    </div>

    @if (session('success'))
    <div class="success">{{ session('success') }}</div>
    @endif

    <div class="card top-grid">
        <div>
            <label for="ambulance_id">Ambulance *</label>
            <select id="ambulance_id" name="ambulance_id" required onchange="window.location='{{ route('admin.ambulance-stock.create') }}?ambulance_id=' + this.value">
                @foreach ($ambulances as $ambulance)
                <option value="{{ $ambulance->id }}" @selected($selectedAmbulance?->id === $ambulance->id)>{{ $ambulance->registration }} - {{ $ambulance->type }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Type d'ambulance</label>
            <input class="readonly" value="{{ $selectedAmbulance?->type ?? 'Aucune ambulance' }}" readonly>
        </div>
        <div class="info">Le stock standard contient<strong>{{ $items->count() }} produits</strong></div>
    </div>

    <div class="actions-grid">
        <section class="choice primary">
            <div class="choice-icon"><i class="fa-regular fa-file-lines"></i></div>
            <div>
                <h3>Charger le stock standard</h3>
                <p>Charge automatiquement les produits actifs avec leurs quantités requises.</p>
                <button type="button" class="btn primary" id="loadStandard">Charger le stock standard</button>
            </div>
        </section>
        <section class="choice">
            <div class="choice-icon"><i class="fa-solid fa-pen"></i></div>
            <div>
                <h3>Saisir manuellement</h3>
                <p>Ajoutez ou ajustez manuellement les quantités à charger dans cette ambulance.</p>
                <button type="button" class="btn" id="manualEntry">Saisir manuellement</button>
            </div>
        </section>
    </div>

    <div class="content-grid">
        <section class="card">
            <div class="table-tools">
                <h2>Produits du stock standard</h2>
                <input class="search" id="searchProduct" type="search" placeholder="Rechercher un produit...">
            </div>
            @foreach ($items->groupBy('category') as $category => $categoryItems)
            <div class="category">
                <div class="category-title"><span>{{ $category }}</span><span>{{ $categoryItems->count() }} produit(s)</span></div>
                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Unité</th>
                            <th>Quantité standard</th>
                            <th>Quantité à charger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryItems as $item)
                        <tr class="product-row" data-name="{{ Str::lower($item['name']) }}">
                            <td class="product"><img class="thumb" src="{{ $item['image'] }}" alt=""> {{ $item['name'] }}</td>
                            <td>{{ $item['unit'] }}</td>
                            <td>{{ $item['standard_quantity'] }}</td>
                            <td>
                                <input type="hidden" name="items[{{ $loop->parent->index }}{{ $loop->index }}][medicine_id]" value="{{ $item['id'] }}">
                                <input type="hidden" name="items[{{ $loop->parent->index }}{{ $loop->index }}][standard_quantity]" value="{{ $item['standard_quantity'] }}">
                                <input class="qty-input" name="items[{{ $loop->parent->index }}{{ $loop->index }}][quantity]" type="number" min="0" value="{{ $item['quantity'] }}" data-standard="{{ $item['standard_quantity'] }}" required>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </section>
        <aside class="card summary">
            <h2>Récapitulatif</h2>
            <div class="summary-row"><span>Total produits</span><strong>{{ $items->count() }}</strong></div>
            <div class="summary-row"><span>Produits affichés</span><strong id="visibleCount">{{ $items->count() }}</strong></div>
            <div class="summary-row"><span>Quantité totale</span><strong id="totalQuantity">0</strong></div>
            <div class="notice"><i class="fa-solid fa-circle-check"></i> Le stock standard sera utilisé comme référence pour les réapprovisionnements futurs.</div>
        </aside>
    </div>

    <div class="bottom-actions">
        <a class="btn" href="{{ route('admin.stock.index') }}">Annuler</a>
        <button class="btn primary" type="submit" @disabled(! $selectedAmbulance)>Valider le remplissage initial</button>
    </div>
</form>

<script>
    const quantityInputs = [...document.querySelectorAll('.qty-input')];
    const totalQuantity = document.getElementById('totalQuantity');
    const visibleCount = document.getElementById('visibleCount');
    const rows = [...document.querySelectorAll('.product-row')];

    function updateSummary() {
        totalQuantity.textContent = quantityInputs.reduce((sum, input) => sum + (Number(input.value) || 0), 0);
        visibleCount.textContent = rows.filter((row) => !row.hidden).length;
    }

    document.getElementById('loadStandard').addEventListener('click', () => {
        quantityInputs.forEach((input) => input.value = input.dataset.standard || 0);
        updateSummary();
    });

    document.getElementById('manualEntry').addEventListener('click', () => quantityInputs[0]?.focus());
    quantityInputs.forEach((input) => input.addEventListener('input', updateSummary));
    document.getElementById('searchProduct').addEventListener('input', (event) => {
        const search = event.target.value.trim().toLowerCase();
        rows.forEach((row) => row.hidden = !row.dataset.name.includes(search));
        updateSummary();
    });
    updateSummary();
</script>
@endsection