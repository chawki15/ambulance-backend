<aside class="sidebar">
    <div class="brand">StockSystem</div>


    <a class="item item {{ request()->is('admin/home') ? 'active' : '' }}" href="/admin/home">
        <span>🏠</span>
        <span>Tableau de board</span>
    </a>

    <a class="item item {{ request()->is('admin/users*') ? 'active' : '' }}" href="/admin/users">
        <span>👥</span>
        <span>Utilisateurs</span>
    </a>

    <a class="item item {{ request()->is('admin/medicines*') ? 'active' : '' }}" href="/admin/medicines">
        <span>💊</span>
        <span>Médicaments</span>
    </a>

    <a class="item item {{ request()->is('admin/movements') ? 'active' : '' }}" href="/admin/movements">
        <span>📦</span>
        <span> Mouvements de stock </span>
    </a>

    <a class="item item {{ request()->is('admin/reports') ? 'active' : '' }}" href="/admin/reports">
        <span>📊</span>
        <span>Rapports</span>
    </a>

    <div class="ttl">Paramètres</div>

    <a class="item item {{ request()->is('admin/settings') ? 'active' : '' }}" href="/admin/settings">
        <span>⚙️</span>
        <span>Paramètres</span>
    </a>
</aside>