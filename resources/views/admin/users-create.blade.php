<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Utilisateur | Admin</title>
    <style>
        body {
            font-family: Segoe UI, Tahoma, Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
            padding: 30px;
            color: #1f2b3d
        }

        .card {
            max-width: 760px;
            margin: auto;
            background: #fff;
            border: 1px solid #e3ebf8;
            border-radius: 14px;
            padding: 24px
        }

        h1 {
            margin: 0 0 14px;
            color: #0a2f67
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        label {
            font-weight: 600;
            font-size: 14px
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cfdcf2;
            border-radius: 8px
        }

        .full {
            grid-column: 1 / -1
        }

        button {
            margin-top: 14px;
            background: #e71f3c;
            color: #fff;
            border: 0;
            padding: 12px 16px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer
        }

        #status {
            margin-top: 12px;
            font-size: 14px
        }
    </style>
</head>

<body>
    <main class="card">
        <h1>Créer un utilisateur</h1>
        <p><a href="/admin/home">← Retour accueil admin</a></p>
        <form id="create-user-form" class="grid">
            <div><label>Nom</label><input name="name" required></div>
            <div><label>E-mail</label><input name="email" type="email" required></div>
            <div><label>Téléphone</label><input name="phone"></div>
            <div><label>Mot de passe</label><input name="password" type="password" required></div>
            <div><label>Rôle</label>
                <select name="role" required>
                    <option value="driver">driver</option>
                    <option value="nurse">nurse</option>
                    <option value="general_doctor">general_doctor</option>
                    <option value="emergency_doctor">emergency_doctor</option>
                </select>
            </div>
            <div><label>Spécialité</label><input name="specialty" placeholder="optionnel"></div>
            <div><label>Actif</label>
                <select name="is_active">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <div class="full"><button type="submit">Créer utilisateur</button></div>
        </form>
        <div id="status"></div>
    </main>
    <script>
        const form = document.getElementById('create-user-form');
        const status = document.getElementById('status');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            status.textContent = 'Création en cours...';
            const payload = {
                name: form.name.value,
                email: form.email.value,
                phone: form.phone.value || null,
                password: form.password.value,
                role: form.role.value,
                specialty: form.specialty.value || null,
                is_active: form.is_active.value === '1'
            };
            try {
                const r = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                const d = await r.json();
                if (!r.ok) throw new Error(d.message || 'Erreur de création');
                status.textContent = 'Utilisateur créé avec succès ✅';
            } catch (err) {
                status.textContent = err.message;
            }
        });
    </script>
</body>

</html>