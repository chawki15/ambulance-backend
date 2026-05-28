<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Entrée de stock | Admin</title>
    <style>
        :root {
            --bg: #f5f7fc;
            --surface: #fff;
            --border: #e4eaf5;
            --primary: #4f46e5;
            --text: #16223b;
            --muted: #617191;
            --danger: #dc2626;
            --success: #16a34a
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            color: var(--text)
        }

        .layout {
            display: flex;
            min-height: 100vh
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #182a56, #0f1d3a);
            color: #eef2ff;
            padding: 22px 16px;
            display: flex;
            flex-direction: column
        }

        .brand {
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 24px
        }

        .ttl {
            font-size: 12px;
            opacity: .7;
            margin: 14px 8px;
            text-transform: uppercase;
            letter-spacing: 1px
        }

        .item {
            display: block;
            color: inherit;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            margin: 4px 0;
            font-weight: 600
        }

        .item.active {
            background: linear-gradient(90deg, #5f54ff, #4f46e5)
        }

        .main {
            flex: 1;
            padding: 24px
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 18px
        }

        .search {
            min-width: 340px;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 11px 14px
        }

        h1 {
            margin: 20px 0 8px;
            font-size: 46px
        }

        .crumb {
            color: var(--muted);
            margin-bottom: 18px
        }

        .panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px
        }

        .panel h2 {
            margin: 0 0 10px;
            font-size: 38px
        }

        .sub {
            color: var(--muted);
            margin: 0 0 16px
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 6px
        }

        .req::after {
            content: ' *';
            color: var(--danger)
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 12px
        }

        .grid3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 12px
        }

        .row {
            margin-bottom: 12px
        }

        .remove-row {
            border: 1px solid #f5c2c7;
            background: #fff5f5;
            color: #b42318;
            border-radius: 10px;
            padding: 10px 12px;
            cursor: pointer;
            font-weight: 700
        }

        .remove-row.hidden {
            visibility: hidden;
            pointer-events: none
        }

        .table-head {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            background: #fafbff;
            border: 1px solid #edf1f9;
            border-radius: 10px;
            padding: 12px;
            font-weight: 700;
            margin: 12px 0
        }

        .btn {
            padding: 11px 16px;
            border-radius: 10px;
            border: 1px solid #d1dbef;
            background: #fff;
            font-weight: 700
        }

        .btn.primary {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
            color: #fff;
            border: 0
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px
        }

        .status {
            margin-top: 10px
        }

        .ok {
            color: var(--success)
        }

        .err {
            color: var(--danger)
        }

        @media(max-width:1100px) {
            .layout {
                display: block
            }

            .sidebar {
                width: 100%
            }

            .grid3 {
                grid-template-columns: 1fr
            }

            .table-head {
                grid-template-columns: 1fr 1fr 1fr
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
    </style>
</head>

<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">StockSystem</div>
            <div class="ttl">Principal</div><a class="item" href="/admin/home">Tableau de bord</a><a class="item" href="/admin/users">Utilisateurs</a><a class="item" href="/admin/medicines">Médicaments</a><a class="item active" href="/admin/stock-movements/in">Mouvements de stock</a><a class="item" href="#">Rapports</a>
            <div class="ttl">Paramètres</div><a class="item" href="#">Paramètres</a>
        </aside>
        <main class="main">
            <div class="topbar">
                <div>☰</div><input class="search" placeholder="Rechercher médicaments..." disabled>
                <div>Admin</div>
            </div>
            <h1>Entrée de stock</h1>
            <div class="crumb">Accueil › Mouvements de stock › Entrée de stock</div>
            <form id="stockInForm" class="panel">
                <h2>Ajouter au stock</h2>
                <p class="sub">Ajoutez un ou plusieurs médicaments au stock.</p>
                <div class="row" style="max-width:420px"><label class="req">Date du mouvement</label><input type="date" name="movement_date" required></div>
                <div class="table-head">
                    <div>Nom médicament *</div>
                    <div>Catégorie *</div>
                    <div>Quantité *</div>
                </div>
                <div id="rows"></div>
                <button type="button" class="btn" id="addRow">+ Ajouter un autre produit</button>
                <div class="row" style="margin-top:16px"><label>Raison (Optionnel)</label><textarea name="reason" maxlength="255" placeholder="Ex: Achat, Retour fournisseur, Ajustement"></textarea></div>
                <div class="actions"><button type="button" class="btn" onclick="window.location.href='/admin/medicines'">Annuler</button><button type="submit" class="btn primary" id="saveBtn">Enregistrer entrée stock</button></div>
                <div id="status" class="status" aria-live="polite"></div>
            </form>
        </main>
    </div>
    <script>
        const rows = document.getElementById('rows');
        const addRowBtn = document.getElementById('addRow');
        const form = document.getElementById('stockInForm');
        const status = document.getElementById('status');
        const saveBtn = document.getElementById('saveBtn');

        function rowTemplate() {
            return `<div class="grid3 row"><input name="medicine_name[]" placeholder="Nom du médicament" required><select name="category[]" required><option value="">Choisir catégorie</option><option>Antalgique</option><option>Antibiotique</option><option>Diabète</option><option>Respiratoire</option></select><input name="quantity[]" type="number" min="1" placeholder="Quantité" required><button type="button" class="remove-row" title="Supprimer cette ligne">Supprimer</button></div>`
        }

        function addRow() {
            rows.insertAdjacentHTML('beforeend', rowTemplate());
            refreshRemoveButtons()
        }

        function refreshRemoveButtons() {
            const allRows = [...rows.querySelectorAll('.grid3')];
            allRows.forEach((row, idx) => {
                const btn = row.querySelector('.remove-row');
                if (!btn) return;
                btn.classList.toggle('hidden', idx === 0);
            });
        }
        addRow();
        addRowBtn.addEventListener('click', addRow);
        rows.addEventListener('click', (e) => {
            if (!e.target.classList.contains('remove-row')) return;
            const allRows = rows.querySelectorAll('.grid3');
            if (allRows.length === 1) {
                setStatus('Au moins une ligne produit est obligatoire.', true);
                return;
            }
            e.target.closest('.grid3').remove();
            refreshRemoveButtons();
        });

        function setStatus(m, e = false) {
            status.textContent = m;
            status.className = 'status ' + (e ? 'err' : 'ok')
        }
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
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
                items: [...rows.querySelectorAll('.grid3')].map(r => ({
                    medicine_name: r.querySelector('input[name="medicine_name[]"]').value.trim(),
                    category: r.querySelector('select[name="category[]"]').value,
                    quantity: Number(r.querySelector('input[name="quantity[]"]').value)
                })).filter(i => i.medicine_name && i.category && i.quantity > 0)
            };
            try {
                const res = await fetch('/api/stock-movements/in', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data.message || 'Erreur lors de l\'enregistrement.');
                setStatus('Entrée de stock enregistrée avec succès.');
            } catch (err) {
                setStatus(err.message || 'Une erreur inattendue est survenue.', true)
            } finally {
                saveBtn.disabled = false;
            }
        });
    </script>
</body>

</html>