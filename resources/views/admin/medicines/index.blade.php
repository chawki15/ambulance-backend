@extends('admin.layouts.app')

@section('title', 'Médicaments')

@section('content')

<style>
    .medicines-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        margin: 20px 0 18px;
    }

    h1 {
        margin: 0px 0 6px;
        font-size: 40px;
    }

    .sub {
        margin: 0;
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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        background: linear-gradient(90deg, #5f54ff, #4f46e5);
        color: #fff;
        border: 0;
        border-radius: 10px;
        padding: 13px 8px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 12px 24px rgba(79, 70, 229, .22);
        white-space: nowrap;
    }

    .add-btn:hover {
        transform: translateY(-1px);
    }

    @media (max-width:1100px) {
        .stats {
            grid-template-columns: 1fr 1fr;
        }

        .toolbar {
            grid-template-columns: 1fr;
        }

        .medicines-header {
            flex-direction: column;
        }

        .add-btn {
            width: 100%;
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


<div class="medicines-header">
    <div>
        <h1>Médicaments</h1>
        <p class="sub">Gérez tous les médicaments, leur stock et leurs détails.</p>
    </div>
    <a class="add-btn" href="{{ route('medicines.create') }}">
        <i class="fa-solid fa-plus"></i>
        Ajouter un médicament
    </a>
</div>
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
@endsection