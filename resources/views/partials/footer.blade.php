<footer class="yanis-footer">
    <div class="footer-inner">

        <div class="footer-logo">
            <img src="{{ asset('images/logo-footer.png') }}" alt="Yanis Assistance">
        </div>

        <div class="footer-col">
            <h4>{{ __('footer.quick_links') }}</h4>
            <a href="#">{{ __('menu.home') }}</a>
            <a href="#">{{ __('menu.about') }}</a>
            <a href="#">{{ __('menu.services') }}</a>
        </div>

        <div class="footer-col">
            <h4>{{ __('menu.services') }}</h4>
            <a href="#">{{ __('services.transport.title') }}</a>
            <a href="#">{{ __('services.home_visit.title') }}</a>
            <a href="#">{{ __('services.work_medicine.title') }}</a>
        </div>

        <div class="footer-col">
            <h4>Informations</h4>
            <a href="#">{{ __('footer.partners') }}</a>
            <a href="#">{{ __('footer.news') }}</a>
            <a href="#">{{ __('footer.careers') }}</a>
        </div>

        <div class="footer-col contact">
            <h4>{{ __('footer.contact') }}</h4>
            <p>Lotissement Addoha 2 Imm B 5 N° 3<br>Sidi Moumen Aljadid / Casablanca</p>
            <p><i class="fa-solid fa-phone"></i> 0522 123 456</p>
            <p><i class="fa-regular fa-envelope"></i> contact@yanis-assistance.ma</p>
        </div>

        <div class="footer-social">
            <h4>{{ __('footer.follow_us') }}</h4>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2025 Yanis Assistance. Tous droits réservés.</p>
        <div>
            <a href="#">Mentions légales</a>
            <span>|</span>
            <a href="#">Politique de confidentialité</a>
        </div>
    </div>
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
        const slideEls = heroSection.querySelectorAll('.hero-slide');
        const heroTitle = document.getElementById('heroTitle');
        const heroLead = document.getElementById('heroLead');
        const heroDesc = document.getElementById('heroDesc');
        const heroContent = document.getElementById('heroContent');
        const heroDots = heroSection.querySelectorAll('.hero-dot');
        let currentSlide = 0;
        let slideTimer;

        function setSlide(index) {
            slideEls.forEach((slide, i) => slide.classList.toggle('active', i === index));
            heroTitle.textContent = heroSlides[index].title;
            heroLead.textContent = heroSlides[index].lead;
            heroDesc.textContent = heroSlides[index].desc;
            heroContent.className = `container hero-content align-${heroSlides[index].align || 'left'}`;
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