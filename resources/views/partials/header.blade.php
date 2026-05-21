<header class="yanis-header">
    @php
    $menuItems = $menuItems ?? [
    ['label' => __('menu.home'), 'url' => route('home')],
    ['label' => __('menu.about'), 'url' => route('about')],
    ['label' => __('menu.services'), 'url' => route('services')],
    ['label' => __('menu.fleet'), 'url' => route('fleet')],
    ['label' => __('menu.partners'), 'url' => route('partners')],
    ['label' => __('menu.news'), 'url' => route('news')],
    ['label' => __('menu.contact'), 'url' => route('contact')],
    ];
    @endphp
    <div class="yanis-navbar">

        <button id="mobileToggle" class="mobile-toggle" aria-label="Toggle menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <a href="#" class="yanis-logo">
            <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
        </a>

        <div class="mobile-spacer" aria-hidden="true"></div>

        <nav class="yanis-menu" id="mainMenu">
            @foreach ($menuItems as $item)
            <a href="{{ $item['url'] }}" class="{{ request()->url() === $item['url'] ? 'active' : '' }}">
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
                    <span>{{ __('assist_24_7') }}</span>
                    <strong>0522 123 456</strong>
                </div>
            </div>

            <a href="#" class="urgent-btn">
                <i class="fa-regular fa-bell"></i>
                {{ __('urgent_assistance') }}
            </a>

            <div class="lang-switch">
                <a href="{{ route('lang.switch', ['locale' => 'fr']) }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                <span>|</span>
                <a href="{{ route('lang.switch', ['locale' => 'ar']) }}" class="{{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR</a>
            </div>
        </div>

    </div>

    <div id="mobileMenu" class="mobile-menu">
        <div class="mobile-menu-card">
            <div class="mobile-topbar">
                <button class="mobile-close" id="mobileClose" aria-label="Close menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <a href="#" class="mobile-brand">
                    <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
                </a>
            </div>

            <nav class="mobile-links">
                @foreach ($menuItems as $item)
                <a href="{{ $item['url'] }}" class="{{ request()->url() === $item['url'] ? 'active' : '' }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>

            <a href="#" class="mobile-urgent-btn">
                <i class="fa-regular fa-bell"></i>
                {{ __('urgent_assistance') }}
            </a>

            <div class="mobile-lang-switch">
                <a href="{{ route('lang.switch', ['locale' => 'fr']) }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                <span>|</span>
                <a href="{{ route('lang.switch', ['locale' => 'ar']) }}" class="{{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR</a>
            </div>
        </div>
    </div>
</header>



<script>
    const mobileToggle = document.getElementById("mobileToggle");
    const mobileMenu = document.getElementById("mobileMenu");
    const mobileClose = document.getElementById("mobileClose");

    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener("click", () => mobileMenu.classList.add("show"));
    }

    if (mobileClose && mobileMenu) {
        mobileClose.addEventListener("click", () => mobileMenu.classList.remove("show"));
    }

    if (mobileMenu) {
        mobileMenu.addEventListener("click", (e) => {
            if (e.target === mobileMenu) {
                mobileMenu.classList.remove("show");
            }
        });
    }
</script>