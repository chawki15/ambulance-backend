<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Assistance Médicale</title>
    <style>
        :root {
            --bg: #f4f6fb;
            --text: #16233b;
            --muted: #617191;
            --primary: #4f46e5;
            --border: #e5ebf7;
            --panel: #ffffff;
            --ok: #03b66c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        .layout {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 320px;
            background: radial-gradient(80% 120% at 0% 0%, #223d7d 0%, #152855 40%, #0f1d3a 100%);
            color: #ecf1ff;
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 32px;
        }

        .group-title {
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: .75;
            font-size: 15px;
            margin: 18px 8px 10px;
        }

        .item {
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 14px;
            border-radius: 12px;
            margin-bottom: 8px;
            font-size: 34px;
            font-weight: 600;
        }

        .item.active {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
        }

        .profile {
            margin-top: auto;
            padding: 14px;
            background: rgba(255, 255, 255, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-left {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .avatar {
            width: 54px;
            height: 54px;
            border-radius: 999px;
            background: linear-gradient(135deg, #d6d9ff, #aab2ff);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #25314a;
            font-weight: 800;
            font-size: 18px;
        }

        .main {
            flex: 1;
            padding: 24px;
        }

        .topbar {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            margin-bottom: 24px;
        }

        .search {
            border: 1px solid #d9e3f5;
            border-radius: 12px;
            padding: 14px 16px;
            min-width: 420px;
            color: var(--muted);
            background: #fbfcff;
        }

        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 56px;
        }

        .subtitle {
            margin: 0;
            font-size: 36px;
            font-weight: 700;
        }

        .muted {
            color: var(--muted);
            margin-top: 8px;
            font-size: 30px;
        }

        .breadcrumb {
            color: #6479a6;
            font-size: 28px;
            margin-top: 18px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            min-height: 130px;
        }

        .card small {
            color: var(--muted);
            font-size: 20px;
        }

        .card h3 {
            margin: 10px 0 6px;
            font-size: 34px;
        }

        .actions {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
        }

        .actions h2 {
            margin: 0 0 10px;
            font-size: 36px;
        }

        .btns {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            border: 1px solid transparent;
        }

        .btn.primary {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
            color: #fff;
        }

        .btn.outline {
            border-color: #cad7f1;
            color: #2d3f62;
            background: #fff;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--ok);
            display: inline-block;
            margin-right: 7px;
        }

        @media (max-width: 1200px) {
            .sidebar {
                width: 260px;
            }

            .item,
            .subtitle,
            .muted,
            .breadcrumb {
                font-size: 18px;
            }

            .brand {
                font-size: 30px;
            }

            h1 {
                font-size: 40px;
            }
        }

        @media (max-width: 900px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .main {
                padding: 16px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .search {
                min-width: 0;
                width: 100%;
            }

            .topbar {
                display: grid;
                gap: 12px;
            }

            .title-row {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">StockSystem</div>

            <div class="group-title">Main</div>
            <a href="/admin/home" class="item active">🏠 Dashboard</a>
            <a href="/admin/users/create" class="item">👥 Users</a>
            <a href="#" class="item">💊 Medicines</a>
            <a href="#" class="item">🔁 Stock Movements</a>
            <a href="#" class="item">📊 Reports</a>

            <div class="group-title">Settings</div>
            <a href="#" class="item">⚙️ Settings</a>

            <div class="profile">
                <div class="profile-left">
                    <span class="avatar">A</span>
                    <div>
                        <div style="font-size:22px;font-weight:700">Admin</div>
                        <small style="opacity:.85;font-size:18px"><span class="status-dot"></span>Super Admin</small>
                    </div>
                </div>
                <span>⌄</span>
            </div>
        </aside>

        <main class="main">
            <div class="topbar">
                <div style="font-size:26px">☰</div>
                <input class="search" placeholder="Search..." disabled>
                <div style="font-size:22px">🔔 <strong style="margin-left:10px">Admin</strong></div>
            </div>

            <div class="title-row">
                <div>
                    <h1>Dashboard</h1>
                    <p class="subtitle">Welcome back, Admin! 👋</p>
                    <p class="muted">Here's what's happening with your stock system today.</p>
                </div>
                <div class="breadcrumb">🏠 / Dashboard</div>
            </div>
            <section class="cards">
                <article class="card">
                    <small>Total Users</small>
                    <h3>128</h3>
                    <small>+12 this week</small>
                </article>
                <article class="card">
                    <small>Active Medicines</small>
                    <h3>594</h3>
                    <small>98% in stock</small>
                </article>
                <article class="card">
                    <small>Today Movements</small>
                    <h3>42</h3>
                    <small>Stable activity</small>
                </article>
            </section>
            <section class="actions">
                <h2>Quick Actions</h2>
                <p class="muted" style="font-size:20px;margin:0">Use shortcuts to manage the most important operations from this dashboard.</p>
                <div class="btns">
                    <a class="btn primary" href="/admin/users/create">+ Add New User</a>
                    <a class="btn outline" href="/admin/login">Open Login Page</a>
                </div>
            </section>
        </main>
    </div>
</body>

</html>