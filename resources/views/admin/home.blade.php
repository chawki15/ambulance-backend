@extends('admin.layouts.app')

@section('content')

<style>
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

<div class="layout">

    @include('admin.layouts.sidebar')
    <main class="main">

        @include('admin.layouts.header')
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
