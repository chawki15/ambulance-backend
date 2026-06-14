@extends('admin.layouts.app')

@section('title', 'Entrée de stock')

@section('content')
<style>
    .stock-page {
        color: #07163d;
    }

    .stock-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 430px;
        gap: 28px;
        align-items: start;
        margin-top: 18px;
    }

    .panel,
    .pdf-card,
    .info-card {
        background: #fff;
        border: 1px solid #dbe3f1;
        border-radius: 14px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, .06);
    }

    .panel {
        padding: 28px;
    }

    .panel h1 {
        margin: 0 0 10px;
        font-size: clamp(34px, 4vw, 48px);
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.04em;
    }

    .sub {
        margin: 0 0 24px;
        color: #53627f;
        font-size: 16px;
    }

    label {
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
        border-radius: 10px;
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
        min-height: 72px;
        resize: vertical;
    }

    .date-field {
        max-width: 410px;
        margin-bottom: 22px;
    }

    .items-box {
        border: 1px solid #e4e9f4;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 18px;
    }

    .items-head,
    .stock-row {
        display: grid;
        grid-template-columns: minmax(240px, 1.4fr) minmax(170px, 1fr) minmax(130px, .7fr) 54px;
        gap: 14px;
        align-items: center;
    }

    .items-head {
        padding: 16px 18px;
        background: #fafbff;
        border-bottom: 1px solid #e8edf7;
        font-weight: 800;
    }

    .stock-row {
        padding: 18px;
        border-bottom: 1px solid #eef2f8;
    }

    .stock-row:last-child {
        border-bottom: 0;
    }

    .medicine-select {
        display: grid;
        grid-template-columns: 58px 1fr;
        gap: 12px;
        align-items: center;
        min-height: 64px;
        border: 1px solid #cfdaef;
        border-radius: 10px;
        padding: 8px 10px;
        background: #fff;
    }

    .medicine-thumb {
        width: 52px;
        height: 42px;
        border-radius: 7px;
        object-fit: cover;
        background: linear-gradient(135deg, #eef2ff, #fff7ed);
        border: 1px solid #e5eaf4;
    }

    .medicine-select select {
        border: 0;
        box-shadow: none;
        padding: 0;
        font-weight: 800;
    }

    .medicine-select small {
        display: block;
        margin-top: 4px;
        color: #596780;
        font-size: 12px;
    }

    .remove-row {
        width: 54px;
        height: 54px;
        border: 1px solid #fecaca;
        border-radius: 10px;
        background: #fff8f8;
        color: #dc2626;
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
        min-height: 52px;
        padding: 0 18px;
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
        box-shadow: 0 14px 26px rgba(79, 70, 229, .22);
    }

    .btn.add {
        color: #4f46e5;
        border-color: #c9d0ff;
        margin-bottom: 22px;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 18px;
    }

    .status {
        margin-top: 14px;
        font-weight: 800;
    }

    .ok {
        color: #16a34a;
    }

    .err {
        color: #dc2626;
    }

    .info-card {
        display: grid;
        grid-template-columns: 32px 1fr;
        gap: 14px;
        padding: 18px;
        margin-top: 22px;
        background: linear-gradient(135deg, #f7f8ff, #fff);
        color: #35415e;
    }

    .info-card i,
    .pdf-icon {
        color: #4f46e5;
    }

    .info-card strong {
        display: block;
        color: #3730a3;
        margin-bottom: 6px;
    }

    .pdf-side {
        position: sticky;
        top: 20px;
    }

    .pdf-title {
        display: grid;
        grid-template-columns: 72px 1fr;
        gap: 18px;
        align-items: center;
        margin: 10px 0 26px;
    }

    .pdf-icon {
        position: relative;
        width: 58px;
        height: 72px;
        border: 2px solid #d5dbe8;
        border-radius: 8px;
        display: grid;
        place-items: end center;
        padding-bottom: 12px;
        font-weight: 900;
    }

    .pdf-icon span {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 6px;
        background: #ef3b2d;
        color: #fff;
    }

    .pdf-title h2 {
        margin: 0 0 8px;
        font-size: 24px;
    }

    .pdf-title p {
        margin: 0;
        color: #53627f;
        line-height: 1.45;
    }

    .pdf-card {
        padding: 22px;
    }

    .pdf-paper {
        min-height: 560px;
        border: 1px solid #111827;
        border-radius: 10px;
        padding: 28px 18px;
        background: #fff;
    }

    .pharmacy-head {
        display: flex;
        justify-content: center;
        gap: 14px;
        border-bottom: 1px solid #111827;
        padding-bottom: 22px;
        margin-bottom: 22px;
    }

    .plus {
        width: 48px;
        height: 48px;
        border: 4px solid #4f46e5;
        color: #4f46e5;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 32px;
        font-weight: 900;
    }

    .pdf-paper h3 {
        text-align: center;
        margin: 0 0 12px;
        font-size: 22px;
    }

    .pdf-meta {
        margin: 22px 0;
        display: grid;
        gap: 10px;
        font-size: 14px;
    }

    .pdf-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .pdf-table th {
        background: linear-gradient(90deg, #5f54ff, #4f46e5);
        color: #fff;
        padding: 9px;
    }

    .pdf-table td {
        border: 1px solid #d7deeb;
        padding: 10px 8px;
        text-align: center;
    }

    .pdf-medicine {
        text-align: left !important;
    }

    .totals {
        margin-top: 18px;
        text-align: right;
        font-weight: 800;
        display: grid;
        gap: 8px;
    }

    .download-btn {
        width: max-content;
        margin: 18px auto 0;
        color: #4f46e5;
    }

    @media (max-width: 1200px) {
        .stock-layout {
            grid-template-columns: 1fr;
        }

        .pdf-side {
            position: static;
        }
    }

    @media (max-width: 820px) {
        .panel {
            padding: 20px;
        }

        .items-head {
            display: none;
        }

        .stock-row {
            grid-template-columns: 1fr;
        }

        .remove-row {
            width: 100%;
        }

        .actions {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

<div class="stock-page">
    <div class="stock-layout">
        <div>
            <form id="stockInForm" class="panel">
                <h1>Ajouter au stock</h1>
                <p class="sub">Ajoutez un ou plusieurs médicaments au stock.</p>

                <div class="date-field">
                    <label class="req" for="movement_date">Date du mouvement</label>
                    <input id="movement_date" type="date" name="movement_date" required>
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

                <div class="row">
                    <label for="reason">Raison (Optionnel)</label>
                    <textarea id="reason" name="reason" maxlength="255" placeholder="Ex: Achat, Retour fournisseur, Ajustement"></textarea>
                </div>

                <div class="actions">
                    <button type="button" class="btn" onclick="window.location.href='/admin/medicines'">Annuler</button>
                    <button type="submit" class="btn primary" id="saveBtn">Enregistrer entrée stock</button>
                </div>
                <div id="status" class="status" aria-live="polite"></div>
            </form>

            <div class="info-card">
                <i class="fa-solid fa-circle-info"></i>
                <div>
                    <strong>Numéro de stock automatique</strong>
                    Le numéro de stock est généré automatiquement selon un format séquentiel et unique.<br>
                    Exemple : EN-00025 (préfixe EN + numéro AUTO_INCREMENT)
                </div>
            </div>

        </div>

        <aside class="pdf-side">
            <div class="pdf-title">
                <div class="pdf-icon"><span>PDF</span></div>
                <div>
                    <h2>Bon d'entrée de stock</h2>
                    <p>Généré automatiquement en PDF</p>
                </div>
            </div>

            <div class="pdf-card">
                <div class="pdf-paper">
                    <div class="pharmacy-head">
                        <div class="plus">+</div>
                        <div>
                            <strong>VOTRE PHARMACIE</strong><br>
                            <small>123, Rue de la Santé<br>10000 Alger<br>Tél : 0550 12 34 56</small>
                        </div>
                    </div>

                    <h3>BON D'ENTRÉE DE STOCK</h3>
                    <p style="text-align:center;margin:0;">N° Stock : <strong style="color:#4f46e5;">EN-00025</strong></p>

                    <div class="pdf-meta">
                        <div><strong>Date du mouvement :</strong> <span id="previewDate">—</span></div>
                        <div><strong>Raison :</strong> <span id="previewReason">—</span></div>
                    </div>

                    <table class="pdf-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Médicament</th>
                                <th>Catégorie</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>
                        <tbody id="previewRows"></tbody>
                    </table>

                    <div class="totals">
                        <div>Total des articles : <span id="previewCount">0</span></div>
                        <div>Total quantité : <span id="previewTotal">0</span></div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn download-btn">
                <i class="fa-solid fa-download"></i> Télécharger PDF
            </button>
        </aside>
    </div>
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
    const previewRows = document.getElementById('previewRows');
    const previewDate = document.getElementById('previewDate');
    const previewReason = document.getElementById('previewReason');
    const previewCount = document.getElementById('previewCount');
    const previewTotal = document.getElementById('previewTotal');

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
            <select name="category[]" required>
                <option value="">Choisir catégorie</option>
                <option ${medicine.category === 'Antalgique' ? 'selected' : ''}>Antalgique</option>
                <option ${medicine.category === 'Antibiotique' ? 'selected' : ''}>Antibiotique</option>
                <option ${medicine.category === 'Anti-inflammatoire' ? 'selected' : ''}>Anti-inflammatoire</option>
                <option>Respiratoire</option>
            </select>
            <input name="quantity[]" type="number" min="1" placeholder="Quantité" value="${quantity}" required>
            <button type="button" class="remove-row" title="Supprimer cette ligne"><i class="fa-regular fa-trash-can"></i></button>
        </div>`;
    }

    function addRow(index = 0, quantity = '') {
        rows.insertAdjacentHTML('beforeend', rowTemplate(index, quantity));
        refreshRemoveButtons();
        updatePreview();
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
        row.querySelector('select[name="category[]"]').value = medicine.category;
    }

    function collectItems() {
        return [...rows.querySelectorAll('.stock-row')].map((row) => ({
            name: row.querySelector('select[name="medicine_name[]"]').value,
            category: row.querySelector('select[name="category[]"]').value,
            quantity: Number(row.querySelector('input[name="quantity[]"]').value) || 0,
        })).filter((item) => item.name && item.category && item.quantity > 0);
    }

    function updatePreview() {
        previewDate.textContent = form.movement_date.value || '—';
        previewReason.textContent = form.reason.value.trim() || '—';

        const items = collectItems();
        previewRows.innerHTML = items.length ? items.map((item, index) => `
            <tr>
                <td>${index + 1}</td>
                <td class="pdf-medicine"><strong>${item.name}</strong></td>
                <td>${item.category}</td>
                <td>${item.quantity}</td>
            </tr>
        `).join('') : '<tr><td colspan="4">Aucun produit sélectionné</td></tr>';
        previewCount.textContent = items.length;
        previewTotal.textContent = items.reduce((total, item) => total + item.quantity, 0);
    }

    addRow(0, 10);
    addRow(1, 5);

    addRowBtn.addEventListener('click', () => addRow());
    form.addEventListener('input', updatePreview);
    rows.addEventListener('change', (event) => {
        if (event.target.matches('select[name="medicine_name[]"]')) {
            updateMedicineDetails(event.target.closest('.stock-row'));
        }
        updatePreview();
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
        updatePreview();
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
            items: collectItems().map((item) => ({
                medicine_name: item.name,
                category: item.category,
                quantity: item.quantity,
            })),
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

    updatePreview();
</script>
@endsection