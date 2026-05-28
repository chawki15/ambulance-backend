<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajouter un médicament | Admin</title>
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
            padding: 20px;
            margin-bottom: 16px
        }

        .panel-title {
            font-size: 30px;
            font-weight: 700;
            margin: 0 0 16px
        }

        .num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 999px;
            background: #4338ca;
            color: #fff;
            font-size: 14px;
            margin-right: 10px
        }

        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px
        }

        .grid3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px
        }

        label {
            display: block;
            font-weight: 700;
            font-size: 14px;
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
            padding: 12px 13px;
            font-size: 15px
        }

        textarea {
            min-height: 110px;
            resize: vertical
        }

        small {
            color: var(--muted)
        }

        .upload {
            border: 2px dashed #cfd8ed;
            border-radius: 12px;
            padding: 26px;
            text-align: center;
            color: #425680
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px
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

        .status {
            margin-top: 12px;
            font-size: 14px
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

            .grid2,
            .grid3 {
                grid-template-columns: 1fr
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
            <div class="ttl">Principal</div>
            <a class="item" href="/admin/home">Tableau de bord</a>
            <a class="item" href="/admin/users">Utilisateurs</a>
            <a class="item active" href="/admin/medicines">Médicaments</a>
            <a class="item" href="#">Mouvements de stock</a>
            <a class="item" href="#">Rapports</a>
            <div class="ttl">Paramètres</div>
            <a class="item" href="#">Paramètres</a>
        </aside>
        <main class="main">
            <div class="topbar">
                <div>☰</div>
                <input class="search" placeholder="Rechercher..." disabled>
                <div>Admin</div>
            </div>

            <h1>Ajouter un médicament</h1>
            <div class="crumb">Accueil &nbsp;›&nbsp; Médicaments &nbsp;›&nbsp; Ajouter un médicament</div>

            <form id="medicineForm">
                <section class="panel">
                    <h2 class="panel-title"><span class="num">1</span>Informations du médicament</h2>
                    <div class="grid2">
                        <div><label class="req">Nom</label><input name="name" required maxlength="120"></div>
                        <div><label class="req">Catégorie</label><select name="category" required>
                                <option value="">Choisir catégorie</option>
                                <option>Antalgique</option>
                                <option>Antibiotique</option>
                                <option>Diabète</option>
                            </select></div>
                        <div><label>Description</label><textarea name="description" maxlength="500" placeholder="Description optionnelle"></textarea><small id="count">0/500</small></div>
                        <div><label class="req">Unité</label><input name="unit" required placeholder="mg, ml, comprimé, capsule"></div>
                    </div>
                </section>

                <section class="panel">
                    <h2 class="panel-title"><span class="num">2</span>Informations du stock</h2>
                    <div class="grid3">
                        <div><label class="req">Quantité</label><input name="quantity" type="number" min="0" required><small>Quantité disponible</small></div>
                        <div><label class="req">Quantité minimale</label><input name="min_quantity" type="number" min="0" required><small>Seuil d'alerte stock</small></div>
                        <div><label>Date d'expiration</label><input name="expiry_date" type="date"><small>Date d'expiration</small></div>
                    </div>
                </section>

                <section class="panel">
                    <h2 class="panel-title"><span class="num">3</span>Image du médicament</h2>
                    <div class="upload">
                        <strong>Téléverser l'image du médicament</strong><br>
                        <small>PNG, JPG, JPEG (max 2Mo)</small><br><br>
                        <input type="file" id="image" accept="image/png,image/jpeg,image/jpg">
                    </div>
                    <div class="actions">
                        <button type="button" class="btn" onclick="window.location.href='/admin/medicines'">Annuler</button>
                        <button type="submit" class="btn primary" id="saveBtn">Enregistrer médicament</button>
                    </div>
                    <div class="status" id="status" aria-live="polite"></div>
                </section>
            </form>
        </main>
    </div>
    <script>
        const form = document.getElementById('medicineForm');
        const desc = form.description;
        const count = document.getElementById('count');
        const status = document.getElementById('status');
        const saveBtn = document.getElementById('saveBtn');
        const image = document.getElementById('image');
        desc.addEventListener('input', () => count.textContent = `${desc.value.length}/500`);
        image.addEventListener('change', () => {
            const f = image.files?.[0];
            if (!f) return;
            if (!['image/png', 'image/jpeg'].includes(f.type) || f.size > 2 * 1024 * 1024) {
                image.value = '';
                setStatus('Image invalide: PNG/JPG jusqu\'à 2Mo.', true);
            }
        });

        function setStatus(m, e = false) {
            status.textContent = m;
            status.className = 'status ' + (e ? 'err' : 'ok');
        }
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            setStatus('');
            if (!form.checkValidity()) {
                form.reportValidity();
                setStatus('Veuillez corriger les champs obligatoires.', true);
                return;
            }
            saveBtn.disabled = true;
            setStatus('Enregistrement en cours...');
            const payload = {
                name: form.name.value.trim(),
                category: form.category.value,
                description: form.description.value.trim() || null,
                unit: form.unit.value.trim(),
                quantity: Number(form.quantity.value),
                min_quantity: Number(form.min_quantity.value),
                expiry_date: form.expiry_date.value || null
            };
            try {
                const res = await fetch('/api/medicines', {
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
                setStatus('Médicament enregistré avec succès.');
                form.reset();
                count.textContent = '0/500';
            } catch (err) {
                setStatus(err.message || 'Une erreur inattendue est survenue.', true);
            } finally {
                saveBtn.disabled = false;
            }
        });
    </script>
</body>

</html>