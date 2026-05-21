<header class="yanis-header">
    <div class="yanis-navbar">

        <button id="mobileToggle" class="mobile-toggle" aria-label="Toggle menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <a href="#" class="yanis-logo">
            <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
        </a>

        <div class="mobile-spacer" aria-hidden="true"></div>

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
            <button class="mobile-close" id="mobileClose" aria-label="Close menu">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <a href="#" class="mobile-brand">
                <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
            </a>

            <nav class="mobile-links">
                @foreach ($menuItems as $index => $item)
                <a href="{{ $item['url'] }}" class="{{ $index === 0 ? 'active' : '' }}">{{ $item['label'] }}</a>
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

<style>
    [dir="rtl"] .yanis-navbar {
        direction: rtl;
    }

    [dir="rtl"] .yanis-actions {
        direction: rtl;
    }

    [dir="rtl"] .yanis-phone {
        direction: rtl;
        text-align: right;
    }

    [dir="rtl"] .phone-circle i {
        transform: translate(-10px, 8px) rotate(-8deg);
    }

    [dir="rtl"] .urgent-btn {
        flex-direction: row-reverse;
    }

    [dir="rtl"] .lang-switch {
        direction: ltr;
    }

    .mobile-spacer,
    .mobile-toggle,
    .mobile-menu {
        display: none;
    }

    @media (max-width: 992px) {

        .yanis-menu,
        .yanis-phone,
        .yanis-actions .urgent-btn,
        .yanis-actions .lang-switch,
        .mobile-spacer {
            display: none !important;
        }

        .mobile-toggle {
            display: inline-flex;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid #dbe4f3;
            background: #fff;
            color: #153a75;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .yanis-navbar {
            display: grid;
            grid-template-columns: 42px 1fr 42px;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            direction: ltr;
        }

        [dir="rtl"] .yanis-navbar {
            direction: ltr;
        }

        .yanis-logo {
            justify-self: center;
        }

        .yanis-logo img {
            height: 50px;
            max-width: 170px;
        }

        .mobile-spacer {
            display: block !important;
            width: 42px;
            height: 42px;
        }

        .mobile-menu {
            position: fixed;
            inset: 0;
            background: rgba(9, 23, 52, .25);
            z-index: 200;
            padding: 14px;
        }

        .mobile-menu.show {
            display: block;
        }

        .mobile-menu-card {
            background: #fff;
            border-radius: 16px;
            max-width: 390px;
            width: 100%;
            min-height: calc(100vh - 28px);
            padding: 16px;
            box-shadow: 0 10px 24px rgba(10, 47, 103, .14);
        }

        .mobile-close {
            background: transparent;
            border: 0;
            font-size: 22px;
            color: #22355a;
        }

        .mobile-brand img {
            height: 52px;
            margin: 6px 0 12px;
        }

        .mobile-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 8px 0 20px;
        }

        .mobile-links a {
            text-decoration: none;
            color: #1d2f55;
            font-weight: 700;
            padding: 8px 6px;
            border-radius: 8px;
        }

        .mobile-links a.active {
            color: #e91f3f;
            background: #fff4f6;
        }

        .mobile-urgent-btn {
            display: flex;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            background: #e91f3f;
            color: #fff;
            font-weight: 700;
            padding: 12px;
            border-radius: 10px;
        }

        .mobile-lang-switch {
            margin-top: 16px;
            text-align: center;
            font-weight: 800;
        }

        .mobile-lang-switch a {
            text-decoration: none;
            color: #1d2f55;
        }

        .mobile-lang-switch a.active {
            color: #153a75;
        }

        [dir="rtl"] .mobile-menu-card {
            margin-left: auto;
            text-align: right;
        }

        [dir="rtl"] .mobile-close {
            display: block;
            margin-right: 0;
            margin-left: auto;
        }
    }
</style>


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