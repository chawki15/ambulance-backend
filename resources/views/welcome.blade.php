@php
$menuItems = [
['label' => 'Accueil', 'url' => '#'],
['label' => 'À propos', 'url' => '#'],
['label' => 'Nos Services', 'url' => '#'],
['label' => 'Flotte & Moyens', 'url' => '#'],
['label' => 'Partenaires', 'url' => '#'],
['label' => 'Actualités', 'url' => '#'],
['label' => 'Contact', 'url' => '#'],
];
@endphp
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Yanis Assistance</title>
    <style>
        :root {
            --blue: #0a2f67;
            --red: #e71f3c;
            --light: #f3f6fc;
            --text: #1f2b3d
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background: var(--light);
            color: var(--text)
        }

        .container {
            max-width: 1240px;
            margin: auto;
            padding: 0 18px
        }

        .yanis-header {
            width: 100%;
            background: #fff;
            border-bottom: 1px solid #dce6f5;
            box-shadow: 0 3px 12px rgba(10, 47, 103, .06);
        }

        .yanis-navbar {
            min-height: 94px;
            max-width: 1720px;
            margin: 0 auto;
            padding: 10px 55px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .yanis-logo {
            flex-shrink: 0;
        }

        .yanis-logo img {
            height: 62px;
            width: auto;
            max-width: 220px;
            object-fit: contain;
            display: block;
        }

        .yanis-menu {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(18px, 2vw, 8px);
            flex: 1;
            min-height: 74px;
        }

        .yanis-menu a {
            min-height: 46px;
            display: flex;
            align-items: center;
            position: relative;
            text-decoration: none;
            color: #1d2430;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .1px;
            transition: color .2s ease;
        }

        .yanis-menu a:hover {
            color: #153a75;
        }

        .yanis-menu a.active {
            color: #153a75;
        }

        .yanis-menu a.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #153a75;
            border-radius: 4px 4px 0 0;
        }

        .yanis-actions {
            display: flex;
            align-items: center;
            gap: clamp(10px, 1.7vw, 24px);
            flex-shrink: 0;
        }

        .yanis-phone {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #153a75;
        }

        .phone-circle {
            width: 52px;
            height: 52px;
            border: 2px solid #d5deee;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .phone-circle i {
            font-size: 22px;
            color: #7d8ea8;
            transform: translate(15px, 14px) rotate(8deg);
        }

        .yanis-phone span {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #50617c;
        }

        .yanis-phone strong {
            display: block;
            font-size: 19px;
            line-height: 1;
            color: #153a75;
            font-weight: 900;
        }

        .urgent-btn {
            min-height: 44px;
            padding: 0 15px;
            border-radius: 9px;
            background: #e91f3f;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 8px 16px rgba(233, 31, 63, .24);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .urgent-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 11px 22px rgba(233, 31, 63, .3);
        }

        .urgent-btn i {
            font-size: 16px;
        }

        .lang-switch {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 15px;
            font-weight: 800;
        }

        .lang-switch a {
            text-decoration: none;
            color: #1e2b3c;
        }

        .lang-switch a.active {
            color: #153a75;
        }

        @media (max-width: 1200px) {
            .yanis-menu {
                gap: 20px;
            }

            .yanis-phone {
                display: none;
            }
        }

        @media (max-width: 992px) {
            .yanis-navbar {
                padding: 0 20px;
            }

            .yanis-menu {
                display: none;
            }

            .urgent-btn {
                padding: 0 18px;
            }
        }

        .top {
            background: #fff;
            border-bottom: 2px solid #dbe4f3;
            box-shadow: 0 1px 0 rgba(10, 47, 103, .05)
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 10px 0
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--blue);
            font-weight: 800;
            font-size: 34px;
            line-height: 1
        }

        .brand small {
            display: block;
            font-size: 14px;
            letter-spacing: 3px;
            margin-top: 4px
        }

        .menu {
            display: flex;
            gap: 20px;
            font-size: 15px;
            font-weight: 600
        }

        .menu a {
            text-decoration: none;
            color: #111111;
            transition: .2s ease
        }

        .menu a.active {
            color: var(--blue);
            border-bottom: 3px solid var(--blue);
            padding-bottom: 10px
        }

        .hotline {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .phone {
            font-weight: 700;
            color: var(--blue);
            font-size: 12px;
            line-height: 1.1;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .phone b {
            display: block;
            font-size: 20px;
            line-height: 1;
            letter-spacing: .5px
        }

        .urgent {
            background: var(--red);
            color: #fff;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 6px 14px rgba(231, 31, 60, .25)
        }

        .lang {
            font-weight: 700;
            color: #111;
            font-size: 13px
        }

        .mobile-toggle {
            display: none;
            background: #fff;
            border: 2px solid #d5dfef;
            color: var(--blue);
            font-weight: 800;
            border-radius: 10px;
            padding: 8px 10px;
            cursor: pointer
        }

        .mobile-menu {
            display: none
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1900&q=80') center/cover no-repeat;
            min-height: 520px;
            position: relative
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(244, 248, 255, .93) 0%, rgba(244, 248, 255, .80) 44%, rgba(244, 248, 255, .18) 100%)
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 66px 0;
            max-width: 660px
        }

        h1 {
            font-size: 62px;
            line-height: 1.04;
            margin: 0;
            color: var(--blue);
            font-weight: 900;
            text-transform: uppercase
        }

        .lead {
            font-size: 34px;
            color: #223a62;
            font-weight: 700;
            margin: 8px 0 14px
        }

        .desc {
            font-size: 30px;
            line-height: 1.35;
            max-width: 640px
        }

        .cta-row {
            display: flex;
            gap: 12px;
            margin-top: 22px
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 11px;
            text-decoration: none;
            font-weight: 700
        }

        .btn-red {
            background: var(--red);
            color: #fff
        }

        .btn-white {
            background: #fff;
            border: 2px solid #b6c4d7;
            color: #0f2f5e
        }

        .stats {
            margin-top: -38px;
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px
        }

        .card {
            background: #fff;
            padding: 18px;
            border-radius: 14px;
            box-shadow: 0 8px 22px rgba(28, 54, 95, .12);
            display: flex;
            gap: 14px;
            align-items: center
        }

        .icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #eef3fb;
            display: grid;
            place-items: center;
            color: var(--blue);
            font-size: 26px
        }

        .n {
            font-size: 38px;
            font-weight: 900;
            color: var(--blue)
        }

        .services-section {
            padding: 34px 0 20px
        }

        .section-title {
            text-align: center;
            color: var(--blue);
            font-size: 44px;
            font-weight: 900;
            text-transform: uppercase;
            margin: 0 0 14px
        }

        .services {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px
        }

        .service {
            background: #fff;
            border-radius: 12px;
            padding: 14px;
            box-shadow: 0 4px 14px rgba(17, 34, 62, .08);
            min-height: 170px
        }

        .service h3 {
            margin: 10px 0 8px;
            font-size: 22px;
            color: #102f5f;
            text-transform: uppercase;
            line-height: 1.1
        }

        .service p {
            margin: 0;
            color: #415676;
            font-size: 18px
        }

        .band {
            margin: 18px 0;
            background: var(--blue);
            border-radius: 10px;
            color: #fff;
            display: grid;
            grid-template-columns: 1.2fr 1.5fr 1fr;
            overflow: hidden
        }

        .band>div {
            padding: 22px
        }

        .band h4 {
            margin: 0 0 10px;
            font-size: 30px;
            text-transform: uppercase
        }

        .band p,
        .band li {
            font-size: 21px;
            line-height: 1.35
        }

        .band ul {
            margin: 0;
            padding-left: 20px
        }

        .assist-btn {
            display: inline-block;
            margin-top: 12px;
            border: 2px solid #9eb0d4;
            color: #fff;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 700
        }

        .phone-big {
            display: inline-block;
            background: var(--red);
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 44px;
            font-weight: 900;
            color: #fff
        }

        footer {
            background: #081f46;
            color: #dce6fb;
            padding: 30px 0 16px
        }

        .fgrid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 16px;
            align-items: start
        }

        .fbrand {
            font-size: 48px;
            font-weight: 900;
            color: #fff
        }

        .fcol h5 {
            margin: 0 0 10px;
            font-size: 22px;
            color: #fff
        }

        .fcol a,
        .fcol p {
            display: block;
            margin: 6px 0;
            color: #dce6fb;
            text-decoration: none;
            font-size: 17px
        }

        .copyright {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(220, 230, 251, .2);
            display: flex;
            justify-content: space-between;
            font-size: 14px
        }

        @media (max-width:1100px) {
            .menu {
                display: none
            }

            .phone {
                display: none
            }

            .mobile-toggle {
                display: inline-block
            }

            .mobile-menu {
                display: none;
                flex-direction: column;
                gap: 10px;
                background: #fff;
                padding: 14px 0 16px;
                border-top: 1px solid #e9eef6
            }

            .mobile-menu a {
                text-decoration: none;
                color: #111;
                font-size: 17px;
                font-weight: 600;
                padding: 0 18px;
                font-family: 'Segoe UI', Tahoma, Arial, sans-serif
            }

            .mobile-menu.show {
                display: flex
            }

            .services {
                grid-template-columns: repeat(3, 1fr)
            }

            .stats {
                grid-template-columns: repeat(2, 1fr)
            }

            .band {
                grid-template-columns: 1fr
            }

            .fgrid {
                grid-template-columns: 1fr 1fr
            }

            h1 {
                font-size: 38px
            }

            .lead {
                font-size: 24px
            }

            .desc {
                font-size: 20px
            }
        }
    </style>
</head>

<body>
    <header class="yanis-header">
        <div class="yanis-navbar">

            <a href="#" class="yanis-logo">
                <img src="{{ asset('images/logo-yanis.png') }}" alt="Yanis Assistance">
            </a>

            <nav class="yanis-menu">
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
                    <a href="#" class="active">FR</a>
                    <span>|</span>
                    <a href="#">AR</a>
                </div>
            </div>

        </div>
    </header>

    <section class="hero">
        <div class="container hero-content">
            <h1>L’ASSISTANCE MÉDICALE</h1>
            <p class="lead">HUMAINE, RAPIDE ET FIABLE</p>
            <p class="desc">Yanis Assistance accompagne vos assurés et vos collaborateurs à chaque moment délicat grâce à une expertise médicale complète et une intervention immédiate.</p>
            <div class="cta-row">
                <a class="btn btn-red" href="#">DEMANDER UNE ASSISTANCE</a>
                <a class="btn btn-white" href="#">NOUS CONTACTER</a>
            </div>
        </div>
    </section>

    <main class="container">
        <section class="stats">
            <article class="card">
                <div class="icon">🏠</div>
                <div>
                    <div class="n">4584</div>
                    <div>Consultations à domicile<br>& contre-visites</div>
                </div>
            </article>
            <article class="card">
                <div class="icon">🚑</div>
                <div>
                    <div class="n">236</div>
                    <div>Hospitalisations<br>à domicile</div>
                </div>
            </article>
            <article class="card">
                <div class="icon">🚐</div>
                <div>
                    <div class="n">7493</div>
                    <div>Transports médicaux<br>urbains & interurbains</div>
                </div>
            </article>
            <article class="card">
                <div class="icon">👥</div>
                <div>
                    <div class="n">24</div>
                    <div>Salariés dont<br>08 médecins urgentistes</div>
                </div>
            </article>
        </section>

        <section class="services-section">
            <h2 class="section-title">NOS SERVICES</h2>
            <div class="services">
                <article class="service">
                    <div class="icon">🚐</div>
                    <h3>Transport Sanitaire</h3>
                    <p>Au Maroc et à l’international</p>
                </article>
                <article class="service">
                    <div class="icon">🏠</div>
                    <h3>Visite à Domicile</h3>
                    <p>Maintien à domicile et aide à la personne</p>
                </article>
                <article class="service">
                    <div class="icon">🎓</div>
                    <h3>Assistance Médicale Scolaire</h3>
                    <p>Intervention rapide pour élèves et étudiants</p>
                </article>
                <article class="service">
                    <div class="icon">💼</div>
                    <h3>Médecine du Travail</h3>
                    <p>Santé au travail & gestion des accidents</p>
                </article>
                <article class="service">
                    <div class="icon">👨‍⚕️</div>
                    <h3>Médicalisation des Événements</h3>
                    <p>Équipes médicales pour vos événements</p>
                </article>
                <article class="service">
                    <div class="icon">💻</div>
                    <h3>Téléconsultation</h3>
                    <p>Consultation en ligne avec ou sans RDV</p>
                </article>
            </div>
        </section>
        <section class="band">
            <div>
                <h4>Zones d’intervention</h4>
                <p>Grand Casablanca, Mohammedia, Bouskoura, Berrechid, Benslimane, Khouribga et régions.</p>
                <a class="assist-btn" href="#">VOIR TOUTES LES ZONES</a>
            </div>
            <div>
                <h4>Pourquoi nous choisir ?</h4>
                <ul>
                    <li>Intervention rapide 24/7</li>
                    <li>Équipes médicales qualifiées</li>
                    <li>Matériel médical de pointe</li>
                    <li>Service humain et personnalisé</li>
                </ul>
            </div>
            <div>
                <h4>Besoin d’aide immédiate ?</h4>
                <p>Notre équipe est disponible 24h/24 et 7j/7</p>
                <div class="phone-big">06 60 23 10 10</div>
                <br><a class="assist-btn" href="#">DEMANDER UNE ASSISTANCE EN LIGNE</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="fgrid">
                <div class="fbrand">YANIS ASSISTANCE</div>
                <div class="fcol">
                    <h5>Liens rapides</h5><a href="#">Accueil</a><a href="#">À propos</a><a href="#">Nos Services</a>
                </div>
                <div class="fcol">
                    <h5>Nos Services</h5><a href="#">Transport Sanitaire</a><a href="#">Assistance Domicile</a><a href="#">Médecine du Travail</a>
                </div>
                <div class="fcol">
                    <h5>Informations</h5><a href="#">Partenaires</a><a href="#">Actualités</a><a href="#">Recrutement</a>
                </div>
                <div class="fcol">
                    <h5>Contact</h5>
                    <p>0522 123 456</p>
                    <p>contact@yanis-assistance.ma</p>
                </div>
            </div>
            <div class="copyright"><span>© 2026 Yanis Assistance. Tous droits réservés.</span><span>Mentions légales | Politique de confidentialité</span></div>
        </div>
    </footer>
    <script>
        const mobileToggle = document.getElementById("mobileToggle");
        const mobileMenu = document.getElementById("mobileMenu");
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener("click", () => mobileMenu.classList.toggle("show"));
        }
    </script>
</body>

</html>