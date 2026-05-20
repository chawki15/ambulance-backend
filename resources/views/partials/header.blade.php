<header class="yanis-header">
    <div class="yanis-navbar">

        <a href="#" class="yanis-logo">
            <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
        </a>

        <nav class="yanis-menu" id="mainMenu">
            @foreach ($menuItems as $index => $item)
            <a href="{{ $item['url'] }}" class="{{ $index === 0 ? 'active' : '' }}">
                {{ $item['label'] }}
            </a>
            @endforeach
        </nav>

        <div class="yanis-actions">
            <div class="yanis-phone">
                <span class="phone-circle">
                    <i class="fa-solid fa-phone"></i>
                </span>

                <div>
                    <span>Assistance 24/7</span>
                    <strong>0522 123 456</strong>
                </div>
            </div>

            <a href="#" class="urgent-btn">
                <i class="fa-regular fa-bell"></i>
                Assistance Urgente
            </a>

            <div class="lang-switch">
                <a href="{{ route('lang.switch', ['locale' => 'fr']) }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                <span>|</span>
                <a href="{{ route('lang.switch', ['locale' => 'ar']) }}" class="{{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR</a>
            </div>
        </div>

    </div>
</header>