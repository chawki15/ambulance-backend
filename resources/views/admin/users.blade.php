<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs | Admin</title>
    <style>
        :root {
            --bg: #f5f7fc;
            --surface: #fff;
            --border: #e4eaf5;
            --primary: #4f46e5;
            --text: #16223b;
            --muted: #617191
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
            padding: 22px 16px
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
            min-width: 320px;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 11px 14px
        }

        h1 {
            margin: 20px 0 14px;
            font-size: 40px
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 14px
        }

        .card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px
        }

        .card h3 {
            font-size: 36px;
            margin: 7px 0 4px
        }

        .card small {
            color: var(--muted)
        }

        .panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden
        }

        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 18px;
            border-bottom: 1px solid #edf1f9
        }

        .btn {
            border: 1px solid #d8e0f1;
            background: #fff;
            border-radius: 10px;
            padding: 10px 14px
        }

        .btn.primary {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
            color: #fff;
            border: 0
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #edf1f9;
            text-align: left
        }

        th {
            background: #fafbff
        }

        .badge {
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700
        }

        .ok {
            background: #e7f8ef;
            color: #0b9b55
        }

        .busy {
            background: #fff3e7;
            color: #e07b11
        }

        .off {
            background: #eef1f5;
            color: #5f6b7d
        }

        .role {
            background: #eef2ff;
            color: #4f46e5;
            border: 1px solid #cbcfff
        }

        .role.doc {
            background: #eaf7ff;
            color: #008bb6;
            border: 1px solid #9adff4
        }

        .actions button {
            border: 1px solid #d9e1f2;
            background: #fff;
            border-radius: 8px;
            padding: 6px 9px;
            margin-right: 4px
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            object-fit: cover;
            border: 1px solid #d8e0f1
        }

        .avatar-fallback {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            color: #4f46e5;
            font-weight: 700
        }

        .foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--muted);
            font-size: 14px;
            padding: 14px 18px
        }

        @media(max-width:1100px) {
            .layout {
                display: block
            }

            .sidebar {
                width: 100%
            }

            .stats {
                grid-template-columns: 1fr 1fr
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
            <a class="item active" href="/admin/users">Utilisateurs</a>
            <a class="item" href="/admin/medicines">Médicaments</a>
            <a class="item" href="#">Mouvements de stock</a>
            <a class="item" href="#">Rapports</a>
            <div class="ttl">Paramètres</div>
            <a class="item" href="#">Paramètres</a>
        </aside>
        <main class="main">
            <div class="topbar">
                <div>☰</div>
                <input class="search" placeholder="Rechercher utilisateurs...">
                <a class="btn primary" href="/admin/users/create">+ Ajouter utilisateur</a>
            </div>
            <h1>Utilisateurs</h1>

            <section class="stats">
                <div class="card"><small>Total utilisateurs</small>
                    <h3>25</h3><small>Tous les comptes</small>
                </div>
                <div class="card"><small>Actifs</small>
                    <h3>18</h3><small>En service</small>
                </div>
                <div class="card"><small>Occupés</small>
                    <h3>4</h3><small>En mission</small>
                </div>
                <div class="card"><small>Hors ligne</small>
                    <h3>3</h3><small>Indisponibles</small>
                </div>
            </section>

            <section class="panel">
                <div class="head">
                    <h2 style="margin:0">Liste des utilisateurs</h2><button class="btn">Filtrer</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Rôle</th>
                            <th>Actif</th>
                            <th>Créé le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($user->profile_photo)
                                <img class="avatar" src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}">
                                @else
                                <span class="avatar-fallback">{{ strtoupper(substr($user->name,0,1)) }}</span>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone ?? '—' }}</td>
                            <td><span class="badge role">{{ $user->role }}</span></td>
                            <td>{{ $user->is_active ? '✅' : '❌' }}</td>
                            <td>{{ optional($user->created_at)->format('Y-m-d H:i') }}</td>
                            <td class="actions"><button>👁</button><button>✏️</button><button>🗑</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="text-align:center;color:#617191">Aucun utilisateur pour le moment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="foot"><span>Affichage de {{ $users->count() > 0 ? 1 : 0 }} à {{ $users->count() }} sur {{ $users->count() }} utilisateurs</span><span>Page 1</span></div>
            </section>
        </main>
    </div>
</body>

</html>