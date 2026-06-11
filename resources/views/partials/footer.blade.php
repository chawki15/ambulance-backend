<footer class="yanis-footer">
    <div class="footer-inner">

        <div class="footer-logo">
            <img src="{{ asset('images/logo-footer.png') }}" alt="Yanis Assistance">
        </div>

        <div class="footer-col">
            <h4>{{ __('footer.quick_links') }}</h4>
            <a href="{{ route('home') }}">{{ __('menu.home') }}</a>
            <a href="{{ route('about') }}">{{ __('menu.about') }}</a>
            <a href="{{ route('services') }}">{{ __('menu.services') }}</a>
        </div>

        <div class="footer-col">
            <h4>{{ __('footer.information') }}</h4>
            <a href="{{ route('partners') }}">{{ __('footer.partners') }}</a>
            <a href="#">{{ __('footer.news') }}</a>
            <a href="{{ route('recrutement') }}">{{ __('footer.careers') }}</a>
        </div>

        <div class="footer-col contact">
            <h4>{{ __('footer.contact') }}</h4>
            <p>Lotissement Addoha 2 Imm B 5 N° 3<br>Sidi Moumen Aljadid / Casablanca</p>
            <p>
                <i class="fa-solid fa-phone"></i>
                @if(app()->getLocale() == 'ar')
                <span dir="ltr" style="unicode-bidi:isolate;">0522 123 456</span>
                @else
                <span dir="ltr">0522 123 456</span>
                @endif
            </p>
            <p><i class="fa-regular fa-envelope"></i> contact@yanis-assistance.ma</p>
        </div>

        <div class="footer-social">
            <h4>{{ __('footer.follow_us') }}</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com/share/1BREA9wkB9/"><img src="{{ asset('images/icons/facebook-icon.png') }}" alt="Facebook"></a>
                <a href="https://www.instagram.com/yanis_assistance?igsh=bTRtdGlpd2Yzenpz"><img src="{{ asset('images/icons/instagram-icon.png') }}" alt="Instagram"></a>
                <a href="https://www.linkedin.com/in/yanis-assistance-784978225?utm_source=share_via&utm_content=profile&utm_medium=member_android"><img src="{{ asset('images/icons/linkedin-icon.png') }}" alt="LinkedIn"></a>
                <a href="https://www.youtube.com/@YanisAssistance"><img src="{{ asset('images/icons/youtube-icon.png') }}" alt="YouTube"></a>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <p>{{ __('footer.rights') }}</p>
        <div>
            <a href="#">{{ __('footer.legal_notice') }}</a>
            <span>|</span>
            <a href="#">{{ __('footer.privacy_policy') }}</a>
        </div>
        <p class="developer-credit">
            @if(app()->getLocale() == 'ar')
            تم إنجاز الموقع من طرف
            @else
            Site créé par
            @endif

            <a href="#" target="_blank">
                complus media
            </a>
        </p>
    </div>
</footer>

<footer class="footer-mobile">

    <div class="footer-logo">
        <img src="{{ asset('images/logo-footer.png') }}" alt="Yanis Assistance">

        <h3>
            @if(app()->getLocale() == 'ar')
            يانيس للمساعدة الطبية
            @else
            Yanis Assistance
            @endif
        </h3>
    </div>

    <div class="footer-section">
        <h4>
            @if(app()->getLocale() == 'ar')
            روابط سريعة
            @else
            Liens rapides
            @endif
        </h4>

        <a href="{{ route('home') }}">{{ __('menu.home') }}</a>
        <a href="{{ route('about') }}">{{ __('menu.about') }}</a>
        <a href="{{ route('services') }}">{{ __('menu.services') }}</a>
        <a href="{{ route('recrutement') }}">{{ __('footer.careers') }}</a>
        <a href="{{ route('contact') }}">{{ __('footer.contact') }}</a>
    </div>

    <div class="footer-contact">
        <h4>
            @if(app()->getLocale() == 'ar')
            تواصل معنا
            @else
            Contactez-nous
            @endif
        </h4>

        <p>
            📍 Lotissement Addoha 2 Imm B 5 N° 3<br>
            Sidi Moumen Aljadid - Casablanca
        </p>

        <a href="tel:0522123456" class="footer-phone" dir="ltr">
            📞 0522 123 456
        </a>

        <p dir="ltr">
            ✉️ contact@yanis-assistance.ma
        </p>
    </div>

    <div class="footer-social">
        <h4>
            @if(app()->getLocale() == 'ar')
            تابعنا
            @else
            Suivez-nous
            @endif
        </h4>

        <div class="social-icons">
            <a href="https://www.facebook.com/share/1BREA9wkB9/">
                <img src="{{ asset('images/icons/facebook-icon.png') }}">
            </a>

            <a href="https://www.instagram.com/yanis_assistance?igsh=bTRtdGlpd2Yzenpz">
                <img src="{{ asset('images/icons/instagram-icon.png') }}">
            </a>

            <a href="https://www.linkedin.com/in/yanis-assistance-784978225?utm_source=share_via&utm_content=profile&utm_medium=member_android">
                <img src="{{ asset('images/icons/linkedin-icon.png') }}">
            </a>

            <a href="https://www.youtube.com/@YanisAssistance">
                <img src="{{ asset('images/icons/youtube-icon.png') }}">
            </a>
        </div>
    </div>

    <div class="footer-copy">
        <p>© 2026 Yanis Assistance</p>

        <p class="developer-credit">
            @if(app()->getLocale() == 'ar')
            تم إنجاز الموقع من طرف
            @else
            Site créé par
            @endif

            <a href="#" target="_blank">
                complus media
            </a>
        </p>
    </div>
    <style>
        .developer-credit {
            font-size: 13px;
            color: #cdd8ee;
        }

        .developer-credit a {
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .developer-credit a:hover {
            color: #e71f3c;
        }
    </style>
</footer>
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
@if (isset($heroSlides))
<script>
    const heroSlides = @json($heroSlides);
    const heroSection = document.getElementById('heroSlider');

    if (heroSection && Array.isArray(heroSlides) && heroSlides.length) {
        const slideEls = heroSection.querySelectorAll('.hero-new-slide');
        const heroDots = heroSection.querySelectorAll('.hero-dot');
        let currentSlide = 0;
        let slideTimer;

        function setSlide(index) {
            slideEls.forEach((slide, i) => slide.classList.toggle('active', i === index));
            heroDots.forEach((dot, i) => dot.classList.toggle('active', i === index));
        }

        function startSlider() {
            clearInterval(slideTimer);
            slideTimer = setInterval(() => {
                currentSlide = (currentSlide + 1) % heroSlides.length;
                setSlide(currentSlide);
            }, 5000);
        }

        heroDots.forEach((dot) => {
            dot.addEventListener('click', () => {
                currentSlide = Number(dot.dataset.slide);
                setSlide(currentSlide);
                startSlider();
            });
        });

        startSlider();
    }
</script>
@endif