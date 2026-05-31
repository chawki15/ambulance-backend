@extends('admin.layouts.app')

@section('content')
<div class="layout">
    @include('admin.layouts.sidebar')
    <main class="main">
        @include('admin.layouts.header')

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
</div>