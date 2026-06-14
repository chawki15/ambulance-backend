@extends('admin.layouts.app')

@section('title', 'Nouvelle entrée de stock')

@section('content')
<style>
    .stock-page {
        color: #07163d;
        display: grid;
        gap: 18px;
    }

    .stock-card {
        background: #fff;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        box-shadow: 0 18px 46px rgba(15, 23, 42, .06);
        padding: 26px 28px;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
        color: #53627f;
        font-size: 15px;
        font-weight: 600;
    }

    .breadcrumb a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 800;
    }

    h1,
    h2 {
        margin: 0;
        line-height: 1.05;
        color: #07163d;
        letter-spacing: -.035em;
    }

    h1 {
        font-size: clamp(32px, 3vw, 40px);
    }

    h2 {
        font-size: clamp(30px, 3vw, 36px);
    }

    .sub {
        margin: 8px 0 24px;
        color: #53627f;
        font-size: 16px;
    }

    label {
        display: block;
        margin-bottom: 9px;
        font-weight: 800;
    }

    .req::after {
        content: ' *';
        color: #e11d48;
    }

    input,
    select,
    textarea {
        width: 100%;
        border: 1px solid #cfdaef;
        border-radius: 9px;
        padding: 13px 14px;
        font: inherit;
        background: #fff;
        outline: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #5f54ff;
        box-shadow: 0 0 0 4px rgba(95, 84, 255, .11);
    }

    textarea {
        min-height: 58px;
        resize: vertical;
    }

    .date-field {
        max-width: 350px;
        margin-bottom: 12px;
    }

    .items-box {
        margin-top: 10px;
    }

    .items-head,
    .stock-row {
        display: grid;
        grid-template-columns: minmax(280px, 1.35fr) minmax(210px, .85fr) minmax(180px, 1fr) 62px;
        gap: 28px;
        align-items: center;
    }

    .items-head {
        padding: 14px 16px;
        margin-bottom: 10px;
        background: #fafbff;
        border: 1px solid #e3e9f5;
        border-radius: 10px;
        font-weight: 800;
    }

    .stock-row {
        padding: 0 2px 18px;
        margin-bottom: 14px;
        border-bottom: 1px solid #edf1f8;
    }

    .medicine-select {
        display: grid;
        grid-template-columns: 68px 1fr;
        gap: 12px;
        align-items: center;
        min-height: 58px;
        border: 1px solid #cfdaef;
        border-radius: 9px;
        padding: 8px 10px;
        background: #fff;
    }

    .medicine-thumb {
        width: 60px;
        height: 42px;
        border-radius: 6px;
        object-fit: cover;
        border: 1px solid #e5eaf4;
        background: #f8fafc;
    }

    .medicine-select select {
        border: 0;
        border-radius: 0;
        padding: 0;
        box-shadow: none;
        font-weight: 800;
    }

    .medicine-select small {
        display: block;
        margin-top: 3px;
        color: #53627f;
        font-size: 12px;
        line-height: 1.35;
    }

    .remove-row {
        width: 46px;
        height: 46px;
        justify-self: end;
        border: 1px solid #fca5a5;
        border-radius: 9px;
        background: #fffafa;
        color: #ef2424;
        cursor: pointer;
        font-size: 18px;
    }

    .remove-row.hidden {
        visibility: hidden;
        pointer-events: none;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 46px;
        padding: 0 18px;
        border-radius: 9px;
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
        box-shadow: 0 12px 24px rgba(79, 70, 229, .22);
    }

    .btn.add {
        color: #4f46e5;
        border-color: #c9d0ff;
        margin: 0 0 14px;
    }

    .form-actions,
    .section-head,
    .filters,
    .pagination {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-actions,
    .section-head {
        justify-content: space-between;
    }

    .form-actions {
        margin-top: 14px;
    }

    .status {
        margin-top: 12px;
        font-weight: 800;
    }

    .ok {
        color: #16a34a;
    }

    .err {
        color: #dc2626;
    }

    .filters {
        margin: 16px 0 12px;
        flex-wrap: wrap;
    }

    .search-field {
        position: relative;
        min-width: 300px;
        flex: 1 1 300px;
    }

    .search-field i {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #0f1a44;
    }

    .date-filter {
        display: grid;
        grid-template-columns: auto 220px;
        gap: 9px;
        align-items: center;
        font-weight: 800;
    }

    .table-wrap {
        border: 1px solid #e3e9f5;
        border-radius: 10px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    th,
    td {
        padding: 14px 16px;
        border-bottom: 1px solid #edf1f8;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background: #fafbff;
        font-weight: 800;
    }

    tbody tr:last-child td {
        border-bottom: 0;
    }

    .creator {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .table-actions {
        display: flex;
        gap: 10px;
    }

    .btn.small {
        min-height: 38px;
        padding: 0 14px;
    }

    .btn.pdf {
        color: #ef2424;
        border-color: #fca5a5;
    }

    .table-foot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 12px;
        color: #53627f;
    }

    .pagination {
        gap: 8px;
    }

    .page-btn {
        width: 36px;
        height: 36px;
        border: 1px solid #dbe3f1;
        border-radius: 8px;
        background: #fff;
        color: #53627f;
    }

    .page-btn.active {
        border: 0;
        background: linear-gradient(135deg, #665cff, #4f46e5);
        color: #fff;
        box-shadow: 0 10px 18px rgba(79, 70, 229, .2);
    }

    @media (max-width: 1100px) {
        .items-head {
            display: none;
        }

        .stock-row {
            grid-template-columns: 1fr;
            gap: 12px;
            padding-bottom: 18px;
        }

        .remove-row {
            width: 100%;
            justify-self: stretch;
        }
    }

    @media (max-width: 760px) {
        .stock-card {
            padding: 20px;
        }

        .section-head,
        .form-actions,
        .table-foot,
        .date-filter {
            align-items: stretch;
            flex-direction: column;
        }

        .date-filter {
            display: flex;
        }

        .btn,
        .search-field {
            width: 100%;
        }
    }
</style>

<div class="stock-page">
    <form id="stockInForm" class="stock-card">
        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="{{ route('admin.dashboard') }}">Accueil</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Mouvements de stock</span>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="{{ route('admin.stock.index') }}">Entrée de stock</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Nouvelle entrée</span>
        </nav>

        <h1>Ajouter au stock</h1>
        <p class="sub">Ajoutez un ou plusieurs médicaments au stock.</p>

        <div class="date-field">
            <label class="req" for="movement_date">Date du mouvement</label>
            <input id="movement_date" type="date" name="movement_date" value="2025-05-14" required>
        </div>

        <div class="items-box">
            <div class="items-head">
                <div>Nom médicament *</div>
                <div>Catégorie *</div>
                <div>Quantité *</div>
                <div></div>
            </div>
            <div id="rows"></div>
        </div>

        <button type="button" class="btn add" id="addRow">
            <i class="fa-solid fa-plus"></i> Ajouter un autre produit
        </button>

        <div>
            <label for="reason">Raison (Optionnel)</label>
            <textarea id="reason" name="reason" maxlength="255" placeholder="Ex: Achat, Retour fournisseur, Ajustement"></textarea>
        </div>

        <div class="form-actions">
            <button type="button" class="btn" onclick="window.location.href='{{ route('admin.stock.index') }}'">Annuler</button>
            <button type="submit" class="btn primary" id="saveBtn">Enregistrer entrée stock</button>
        </div>
        <div id="status" class="status" aria-live="polite"></div>
    </form>
</div>

<script>
    const medicines = [{
            name: 'Doliprane 1000 mg',
            generic: 'Paracétamol',
            package: 'Boîte de 8 comprimés',
            category: 'Antalgique',
            image: '/images/logo.png'
        },
        {
            name: 'Amoxicilline 1 g',
            generic: 'Amoxicilline',
            package: 'Boîte de 12 comprimés',
            category: 'Antibiotique',
            image: '/images/icons/medical-staff.png'
        },
        {
            name: 'Ibuprofène 400 mg',
            generic: 'Ibuprofène',
            package: 'Boîte de 20 comprimés',
            category: 'Anti-inflammatoire',
            image: '/images/icons/aujourdhui.png'
        },
    ];

    const rows = document.getElementById('rows');
    const addRowBtn = document.getElementById('addRow');
    const form = document.getElementById('stockInForm');
    const status = document.getElementById('status');
    const saveBtn = document.getElementById('saveBtn');

    function rowTemplate(index = 0, quantity = '') {
        const options = medicines.map((medicine, medicineIndex) => (
            `<option value="${medicine.name}" data-index="${medicineIndex}" ${medicineIndex === index ? 'selected' : ''}>${medicine.name}</option>`
        )).join('');
        const medicine = medicines[index];

        return `<div class="stock-row">
            <div class="medicine-select">
                <img class="medicine-thumb" src="${medicine.image}" alt="">
                <div>
                    <select name="medicine_name[]" required>${options}</select>
                    <small>${medicine.generic}<br>${medicine.package}</small>
                </div>
            </div>
            <input name="category[]" value="${medicine.category}" readonly required>
            <input name="quantity[]" type="number" min="1" placeholder="Quantité" value="${quantity}" required>
            <button type="button" class="remove-row" title="Supprimer cette ligne"><i class="fa-regular fa-trash-can"></i></button>
        </div>`;
    }

    function addRow(index = 0, quantity = '') {
        rows.insertAdjacentHTML('beforeend', rowTemplate(index, quantity));
        refreshRemoveButtons();
    }

    function refreshRemoveButtons() {
        const allRows = [...rows.querySelectorAll('.stock-row')];
        allRows.forEach((row, idx) => {
            const btn = row.querySelector('.remove-row');
            if (!btn) return;
            btn.classList.toggle('hidden', idx === 0);
        });
    }

    function updateMedicineDetails(row) {
        const selected = row.querySelector('select[name="medicine_name[]"]').selectedOptions[0];
        const medicine = medicines[Number(selected.dataset.index)] ?? medicines[0];
        row.querySelector('.medicine-thumb').src = medicine.image;
        row.querySelector('small').innerHTML = `${medicine.generic}<br>${medicine.package}`;
        row.querySelector('input[name="category[]"]').value = medicine.category;
    }

    function collectItems() {
        return [...rows.querySelectorAll('.stock-row')].map((row) => ({
            medicine_name: row.querySelector('select[name="medicine_name[]"]').value,
            category: row.querySelector('input[name="category[]"]').value,
            quantity: Number(row.querySelector('input[name="quantity[]"]').value) || 0,
        })).filter((item) => item.medicine_name && item.category && item.quantity > 0);
    }

    addRow(0, 10);
    addRow(1, 5);

    addRowBtn.addEventListener('click', () => addRow());
    rows.addEventListener('change', (event) => {
        if (event.target.matches('select[name="medicine_name[]"]')) {
            updateMedicineDetails(event.target.closest('.stock-row'));
        }
    });
    rows.addEventListener('click', (event) => {
        const button = event.target.closest('.remove-row');
        if (!button) return;
        const allRows = rows.querySelectorAll('.stock-row');
        if (allRows.length === 1) {
            setStatus('Au moins une ligne produit est obligatoire.', true);
            return;
        }
        button.closest('.stock-row').remove();
        refreshRemoveButtons();
    });

    function setStatus(message, isError = false) {
        status.textContent = message;
        status.className = 'status ' + (isError ? 'err' : 'ok');
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        setStatus('');
        if (!form.checkValidity()) {
            form.reportValidity();
            setStatus('Veuillez compléter correctement les champs obligatoires.', true);
            return;
        }
        saveBtn.disabled = true;
        setStatus('Enregistrement en cours...');
        const payload = {
            movement_date: form.movement_date.value,
            reason: form.reason.value.trim() || null,
            items: collectItems(),
        };
        try {
            const res = await fetch('/api/stock-movements/in', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                },
                credentials: 'same-origin',
                body: JSON.stringify(payload),
            });
            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Erreur lors de l\'enregistrement.');
            setStatus('Entrée de stock enregistrée avec succès.');
        } catch (err) {
            setStatus(err.message || 'Une erreur inattendue est survenue.', true);
        } finally {
            saveBtn.disabled = false;
        }
    });
</script>
@endsection