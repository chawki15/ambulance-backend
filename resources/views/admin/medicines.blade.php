<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicaments | Admin</title>
    <style>
        :root {
            --bg: #f5f7fc;
            --surface: #ffffff;
            --border: #e4eaf5;
            --primary: #4f46e5;
            --text: #16223b;
            --muted: #617191;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            color: var(--text);
        }

        .layout {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #182a56, #0f1d3a);
            color: #eef2ff;
            padding: 22px 16px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 12px;
            opacity: .7;
            margin: 14px 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .item {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 12px 12px;
            border-radius: 10px;
            margin: 4px 0;
            font-weight: 600;
        }

        .item.active {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
        }

        .main {
            flex: 1;
            padding: 24px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 18px;
        }

        .search {
            min-width: 340px;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 11px 14px;
        }

        h1 {
            margin: 20px 0 6px;
            font-size: 40px;
        }

        .sub {
            margin: 0 0 18px;
            color: var(--muted);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 14px;
        }

        .card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
        }

        .card small {
            color: var(--muted);
        }

        .card h3 {
            margin: 8px 0 4px;
            font-size: 36px;
        }

        .toolbar {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px;
            display: grid;
            grid-template-columns: 2fr 1.2fr 1.2fr auto;
            gap: 12px;
            margin-bottom: 14px;
        }

        .toolbar input,
        .toolbar select,
        .toolbar button {
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 11px 12px;
            background: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #edf1f9;
            text-align: left;
        }

        th {
            background: #fafbff;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .ok {
            background: #e7f8ef;
            color: #0b9b55;
        }

        .low {
            background: #fff3e7;
            color: #e07b11;
        }

        .out {
            background: #ffeaea;
            color: #db1f1f;
        }

        .actions button {
            border: 1px solid #d9e1f2;
            background: #fff;
            border-radius: 8px;
            padding: 6px 9px;
            margin-right: 5px;
        }

        .foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--muted);
            font-size: 14px;
            padding: 14px;
            background: #fff;
            border: 1px solid var(--border);
            border-top: 0;
            border-radius: 0 0 12px 12px;
        }

        .add-btn {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
            color: #fff;
            border: 0;
            border-radius: 10px;
            padding: 11px 16px;
            font-weight: 700;
        }

        @media (max-width:1100px) {
            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .toolbar {
                grid-template-columns: 1fr;
            }

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .search {
                min-width: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">StockSystem</div>
            <div class="section-title">Principal</div>
            <a href="/admin/home" class="item">Tableau de bord</a>
            <a href="/admin/users" class="item">Utilisateurs</a>
            <a href="/admin/medicines" class="item active">Médicaments</a>
            <a href="#" class="item">Mouvements de stock</a>
            <a href="#" class="item">Rapports</a>
            <div class="section-title">Paramètres</div>
            <a href="#" class="item">Paramètres</a>
        </aside>
        <main class="main">
            <div class="topbar">
                <div>☰</div>
                <input class="search" placeholder="Rechercher un médicament..." />
                <button class="add-btn">+ Ajouter un médicament</button>
            </div>

            <h1>Médicaments</h1>
            <p class="sub">Gérez tous les médicaments, leur stock et leurs détails.</p>

            <section class="stats">
                <div class="card"><small>Total médicaments</small>
                    <h3>248</h3><small>Tous enregistrés</small>
                </div>
                <div class="card"><small>En stock</small>
                    <h3>186</h3><small>Disponibles</small>
                </div>
                <div class="card"><small>Stock faible</small>
                    <h3>32</h3><small>À surveiller</small>
                </div>
                <div class="card"><small>Rupture</small>
                    <h3>30</h3><small>Indisponibles</small>
                </div>
            </section>

            <section class="toolbar">
                <input placeholder="Rechercher par nom, générique...">
                <select>
                    <option>Toutes catégories</option>
                </select>
                <select>
                    <option>Tous statuts</option>
                </select>
                <button>Filtres</button>
            </section>

            <table>
                <thead>
                    <tr>
                        <th>Médicament</th>
                        <th>Nom générique</th>
                        <th>Catégorie</th>
                        <th>Stock</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paracétamol 500mg</td>
                        <td>Paracétamol</td>
                        <td>Antalgique</td>
                        <td>120</td>
                        <td><span class="badge ok">En stock</span></td>
                        <td class="actions"><button>👁</button><button>✏️</button><button>🗑</button></td>
                    </tr>
                    <tr>
                        <td>Ibuprofène 400mg</td>
                        <td>Ibuprofène</td>
                        <td>Anti-inflammatoire</td>
                        <td>8</td>
                        <td><span class="badge low">Stock faible</span></td>
                        <td class="actions"><button>👁</button><button>✏️</button><button>🗑</button></td>
                    </tr>
                    <tr>
                        <td>Metformine 850mg</td>
                        <td>Metformine</td>
                        <td>Diabète</td>
                        <td>0</td>
                        <td><span class="badge out">Rupture</span></td>
                        <td class="actions"><button>👁</button><button>✏️</button><button>🗑</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="foot"><span>Affichage de 1 à 3 sur 248 résultats</span><span>Page 1</span></div>
        </main>
    </div>
</body>

</html>