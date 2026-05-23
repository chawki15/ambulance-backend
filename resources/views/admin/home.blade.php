<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home | Assistance Médicale</title>
    <style>
        body {
            font-family: Segoe UI, Tahoma, Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
            padding: 40px;
            color: #1f2b3d
        }

        .card {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border: 1px solid #e3ebf8;
            border-radius: 14px;
            padding: 24px
        }

        h1 {
            margin: 0 0 12px;
            color: #0a2f67
        }

        .mini-menu {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 14px 0 20px
        }

        .mini-menu a {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700
        }

        .btn-primary {
            background: #e71f3c;
            color: #fff
        }

        .btn-outline {
            background: #fff;
            color: #0a2f67;
            border: 1px solid #cfdcf2
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Bienvenue dans l'espace Admin</h1>
        <p>Vous êtes connecté avec succès.</p>

        <div class="mini-menu">
            <a class="btn-primary" href="/admin/users/create">+ Créer un utilisateur</a>
            <a class="btn-outline" href="/admin/login">Page Login</a>
        </div>

        <p>Utilisez le menu rapide pour gérer vos actions principales.</p>
    </div>
</body>

</html>