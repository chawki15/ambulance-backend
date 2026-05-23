<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin | Assistance Médicale</title>
    <style>
        :root {
            --blue: #0a2f67;
            --red: #e71f3c;
            --light: #f3f6fc;
            --text: #1f2b3d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background: linear-gradient(160deg, #f7fafe 0%, #e9f0fb 100%);
            color: var(--text);
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .card {
            width: min(440px, 100%);
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 16px 35px rgba(10, 47, 103, .12);
            border: 1px solid #e3ebf8;
        }

        h1 {
            margin: 0 0 8px;
            color: var(--blue);
            font-size: 28px;
        }

        p {
            margin: 0 0 20px;
            color: #5e6f89;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 7px;
            font-weight: 600;
        }

        input {
            width: 100%;
            border: 1px solid #cfdcf2;
            border-radius: 10px;
            padding: 12px;
            font-size: 15px;
            margin-bottom: 14px;
        }

        input:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(10, 47, 103, .12);
        }

        button {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 15px;
            font-weight: 700;
            background: var(--red);
            color: #fff;
            cursor: pointer;
        }

        .status {
            margin-top: 14px;
            font-size: 14px;
            min-height: 20px;
        }

        .status.ok {
            color: #0e8a37;
        }

        .status.error {
            color: #bb1630;
        }

        .token-box {
            margin-top: 12px;
            background: #f6f8fd;
            border: 1px dashed #c3d3ef;
            border-radius: 10px;
            padding: 10px;
            word-break: break-all;
            font-size: 13px;
            display: none;
        }
    </style>
</head>

<body>
    <main class="card">
        <h1>Connexion Admin</h1>
        <p>Accès indépendant pour l'administration Assistance Médicale.</p>

        <form id="standalone-login-form">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>

            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Se connecter</button>
        </form>

        <div id="status" class="status"></div>
        <div id="token-box" class="token-box"></div>
    </main>

    <script>
        const form = document.getElementById('standalone-login-form');
        const statusBox = document.getElementById('status');
        const tokenBox = document.getElementById('token-box');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            statusBox.className = 'status';
            statusBox.textContent = 'Connexion en cours...';
            tokenBox.style.display = 'none';

            const payload = {
                email: form.email.value,
                password: form.password.value,
            };

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Email ou mot de passe invalide.');
                }

                statusBox.className = 'status ok';
                statusBox.textContent = 'Connexion réussie ✅';

                if (data.token) {
                    tokenBox.style.display = 'block';
                    tokenBox.textContent = `Token: ${data.token}`;
                    window.location.href = '/admin/home';
                }
            } catch (error) {
                statusBox.className = 'status error';
                statusBox.textContent = error.message;
            }
        });
    </script>
</body>

</html>