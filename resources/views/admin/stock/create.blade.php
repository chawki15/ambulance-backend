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
        grid-template-columns: minmax(280px, 1.35fr) minmax(180px, 1fr) 62px;
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
    const medicines = @json($medicines);

    const rows = document.getElementById('rows');
    const addRowBtn = document.getElementById('addRow');
    const form = document.getElementById('stockInForm');
    const status = document.getElementById('status');
    const saveBtn = document.getElementById('saveBtn');

    function escapeHtml(value = '') {
        return String(value).replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;',
        } [char]));
    }

    function selectedMedicineIds(currentSelect = null) {
        return [...rows.querySelectorAll('select[name="medicine_id[]"]')]
            .filter((select) => select !== currentSelect)
            .map((select) => select.value)
            .filter(Boolean);
    }

    function refreshMedicineOptions() {
        rows.querySelectorAll('select[name="medicine_id[]"]').forEach((select) => {
            const selectedIds = selectedMedicineIds(select);
            [...select.options].forEach((option) => {
                option.hidden = selectedIds.includes(option.value);
            });
        });
    }

    function firstAvailableMedicineIndex() {
        const usedIds = selectedMedicineIds();
        return medicines.findIndex((medicine) => !usedIds.includes(String(medicine.id)));
    }

    function rowTemplate(index = 0, quantity = '') {
        const medicine = medicines[index];
        const options = medicines.map((medicineItem, medicineIndex) => (
            `<option value="${escapeHtml(medicineItem.id)}" data-index="${medicineIndex}" ${medicineIndex === index ? 'selected' : ''}>${escapeHtml(medicineItem.name)}</option>`
        )).join('');

        if (!medicine) {
            return `<div class="stock-row">
                <div class="medicine-select empty">
                    <div>Aucun médicament disponible</div>
                </div>
                <input name="quantity[]" type="number" min="1" placeholder="Quantité" value="${escapeHtml(quantity)}" disabled>
                <button type="button" class="remove-row" title="Supprimer cette ligne"><i class="fa-regular fa-trash-can"></i></button>
            </div>`;
        }

        return `<div class="stock-row">
            <div class="medicine-select">
             <img class="medicine-thumb" src="${escapeHtml(medicine.image)}" alt="">
                <div>
                <select name="medicine_id[]" required>${options}</select>
                    <small>${escapeHtml(medicine.generic)}<br>${escapeHtml(medicine.package)}</small>
                </div>
            </div>
            <input name="quantity[]" type="number" min="1" placeholder="Quantité" value="${escapeHtml(quantity)}" required>
            <button type="button" class="remove-row" title="Supprimer cette ligne"><i class="fa-regular fa-trash-can"></i></button>
        </div>`;
    }

    function addRow(index = null, quantity = '') {
        const medicineIndex = index ?? firstAvailableMedicineIndex();
        if (medicineIndex === -1 && medicines.length) {
            setStatus('Tous les médicaments disponibles sont déjà sélectionnés.', true);
            return;
        }

        rows.insertAdjacentHTML('beforeend', rowTemplate(medicineIndex, quantity));
        refreshRemoveButtons();
        refreshMedicineOptions();
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
        const selected = row.querySelector('select[name="medicine_id[]"]').selectedOptions[0];
        const medicine = medicines[Number(selected.dataset.index)] ?? medicines[0];
        row.querySelector('.medicine-thumb').src = medicine.image;
        row.querySelector('small').replaceChildren(
            document.createTextNode(medicine.generic),
            document.createElement('br'),
            document.createTextNode(medicine.package)
        );
    }

    function collectItems() {
        return [...rows.querySelectorAll('.stock-row')].map((row) => ({
            medicine_id: Number(row.querySelector('select[name="medicine_id[]"]')?.value) || 0,
            quantity: Number(row.querySelector('input[name="quantity[]"]').value) || 0,
        })).filter((item) => item.medicine_id && item.quantity > 0);
    }
    addRow(0, '');

    addRowBtn.addEventListener('click', () => addRow());
    rows.addEventListener('change', (event) => {
        if (event.target.matches('select[name="medicine_id[]"]')) {
            updateMedicineDetails(event.target.closest('.stock-row'));
            refreshMedicineOptions();
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
        refreshMedicineOptions();
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
        if (!collectItems().length) {
            setStatus('Veuillez sélectionner au moins un médicament disponible.', true);
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