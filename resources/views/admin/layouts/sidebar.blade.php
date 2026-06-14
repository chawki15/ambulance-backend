<aside class="sidebar" id="sidebar">
    <div class="brand">
        <img src="{{ asset('assets/admin/images/logo.png') }}" alt="Yanis Assistance">
    </div>

    <nav class="nav">
        <a class="nav-item active" href="/admin/"><span>🏠</span> Tableau de bord</a>
        <a class="nav-item" href="/admin/users"><span>👥</span> Utilisateurs</a>
        <a class="nav-item" href="/admin/ambulances"><span>🚑</span> Ambulance</a>
        <a class="nav-item" href="{{ route('admin.ambulance-stock.create') }}"><span>🚑</span> Stocks ambulance</a>
        <a class="nav-item" href="/admin/medicines"><span>💊</span> Médicaments</a>
        <a class="nav-item" href="/admin/stock"><span>📦</span> Mouvements de stock</a>
        <a class="nav-item" href="/admin/reports"><span>📊</span> Rapports</a>

        <p class="nav-title">Paramètres</p>
        <a class="nav-item" href="#"><span>⚙️</span> Paramètres</a>
    </nav>

    <div class="side-user">
        <div class="avatar">A</div>
        <div>
            <strong>Administrateur</strong>
            <small>Responsable système</small>
        </div>
        <span>⌄</span>
    </div>
</aside>