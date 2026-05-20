<footer class="yanis-footer">
    <div class="footer-inner">

        <div class="footer-logo">
            <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
        </div>

        <div class="footer-col">
            <h4>Liens rapides</h4>
            <a href="#">Accueil</a>
            <a href="#">À propos</a>
            <a href="#">Nos Services</a>
        </div>

        <div class="footer-col">
            <h4>Nos Services</h4>
            <a href="#">Transport Sanitaire</a>
            <a href="#">Assistance Domicile</a>
            <a href="#">Médecine du Travail</a>
        </div>

        <div class="footer-col">
            <h4>Informations</h4>
            <a href="#">Partenaires</a>
            <a href="#">Actualités</a>
            <a href="#">Recrutement</a>
        </div>

        <div class="footer-col contact">
            <h4>Contact</h4>
            <p>Lotissement Addoha 2 Imm B 5 N° 3<br>Sidi Moumen Aljadid / Casablanca</p>
            <p><i class="fa-solid fa-phone"></i> 0522 123 456</p>
            <p><i class="fa-regular fa-envelope"></i> contact@yanis-assistance.ma</p>
        </div>

        <div class="footer-social">
            <h4>Suivez-nous</h4>
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
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener("click", () => mobileMenu.classList.toggle("show"));
    }
</script>
<script>
    const heroSlides = @json($heroSlides);
    const heroSection = document.getElementById('heroSlider');
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
</script>
<script>
    const i18n = {
        fr: @json(\Lang::get('home')),
        ar: @json(\Lang::get('home', [], 'ar'))
    };

    const langFr = document.getElementById('langFr');
    const langAr = document.getElementById('langAr');
    const mainMenu = document.getElementById('mainMenu');
    const heroCtaPrimary = document.getElementById('heroCtaPrimary');
    const heroCtaSecondary = document.getElementById('heroCtaSecondary');
    const servicesTitle = document.getElementById('servicesTitle');

    function applyLanguage(lang) {
        currentLang = lang;
        document.documentElement.lang = lang;
        document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';

        langFr.classList.toggle('active', lang === 'fr');
        langAr.classList.toggle('active', lang === 'ar');

        mainMenu.querySelectorAll('a').forEach((a, i) => {
            if (i18n[lang].menu[i]) a.textContent = i18n[lang].menu[i];
        });

        heroCtaPrimary.textContent = i18n[lang].cta_primary;
        heroCtaSecondary.textContent = i18n[lang].cta_secondary;
        servicesTitle.textContent = i18n[lang].servicesTitle;
        setSlide(currentSlide);
    }

    langFr.addEventListener('click', (e) => {
        e.preventDefault();
        applyLanguage('fr');
    });
    langAr.addEventListener('click', (e) => {
        e.preventDefault();
        applyLanguage('ar');
    });
</script>