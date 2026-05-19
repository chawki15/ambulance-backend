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

$services = [
[
'icon' => 'fa-truck-medical',
'title' => 'TRANSPORT SANITAIRE',
'desc' => 'Au Maroc et à l’international',
'color' => '#edf3ff',
'iconColor' => '#0f4aa3',
],
[
'icon' => 'fa-house-medical',
'title' => 'VISITE À DOMICILE',
'desc' => 'Maintien à domicile et aide à la personne',
'color' => '#fff1f3',
'iconColor' => '#eb2d4b',
],
[
'icon' => 'fa-graduation-cap',
'title' => 'ASSISTANCE MÉDICALE SCOLAIRE',
'desc' => 'Intervention rapide pour élèves et étudiants',
'color' => '#edf4ff',
'iconColor' => '#0c53c7',
],
[
'icon' => 'fa-briefcase-medical',
'title' => 'MÉDECINE DU TRAVAIL',
'desc' => 'Santé au travail et gestion des accidents',
'color' => '#f4efff',
'iconColor' => '#6942c8',
],
[
'icon' => 'fa-user-doctor',
'title' => 'MÉDICALISATION DES ÉVÉNEMENTS',
'desc' => 'Équipes médicales pour vos événements',
'color' => '#eefbf7',
'iconColor' => '#17896d',
],
[
'icon' => 'fa-laptop-medical',
'title' => 'TÉLÉCONSULTATION',
'desc' => 'Consultation en ligne avec ou sans RDV',
'color' => '#fff3eb',
'iconColor' => '#ff7300',
],
];

$heroSlides = [
[
'title' => 'L’ASSISTANCE MÉDICALE',
'lead' => 'HUMAINE, RAPIDE ET FIABLE',
'desc' => 'Yanis Assistance accompagne vos assurés et vos collaborateurs à chaque moment délicat grâce à une expertise médicale complète et une intervention immédiate.',
'image' => 'https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1900&q=80',
'position' => 'center center',
'align' => 'left',
],
[
'title' => 'TRANSPORT SANITAIRE',
'lead' => 'PARTOUT AU MAROC',
'desc' => 'Une flotte médicale opérationnelle 24/7 pour assurer des transferts rapides, sûrs et encadrés par des professionnels.',
'image' => 'https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?auto=format&fit=crop&w=1900&q=80',
'position' => 'center 32%',
'align' => 'left',
],
[
'title' => 'SOINS À DOMICILE',
'lead' => 'PROXIMITÉ ET SÉRÉNITÉ',
'desc' => 'Nos équipes interviennent à domicile pour vos patients avec un suivi médical de qualité et une prise en charge personnalisée.',
'image' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1900&q=80',
'position' => 'center 40%',
'align' => 'left',
],
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
            padding: 10px 30px;
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
            width: 40px;
            height: 40px;
            border: 2px solid #d5deee;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .phone-circle i {
            font-size: 18px;
            color: #7d8ea8;
            transform: translate(10px, 8px) rotate(8deg);
        }

        .yanis-phone span {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #50617c;
        }

        .yanis-phone strong {
            display: block;
            font-size: 18px;
            line-height: 1;
            color: #153a75;
            font-weight: 800;
        }

        .urgent-btn {
            min-height: 41px;
            padding: 0 9px;
            border-radius: 7px;
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
            min-height: 420px;
            position: relative;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity .7s ease;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(244, 248, 255, .95) 0%, rgba(244, 248, 255, .86) 42%, rgba(244, 248, 255, .50) 68%, rgba(244, 248, 255, .30) 100%)
        }

        .hero-content {
            position: relative;
            z-index: 1;
            min-height: 420px;
            padding: 32px 55px;
            width: 100%;
            max-width: 1720px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-content.align-left {
            text-align: left;
            align-items: flex-start;
        }

        .hero-content.align-right {
            text-align: right;
            align-items: flex-end;
        }

        .hero-dots {
            position: absolute;
            left: 50%;
            bottom: 50px;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            gap: 10px;
        }

        .hero-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            border: 0;
            padding: 0;
            cursor: pointer;
            background: rgba(255, 255, 255, .55);
            box-shadow: 0 0 0 2px rgba(10, 47, 103, .18);
            transition: transform .2s ease, background-color .2s ease;
        }

        .hero-dot:hover {
            transform: scale(1.08);
        }

        .hero-dot.active {
            background: #fff;
            box-shadow: 0 0 0 2px #153a75;
        }

        h1 {
            font-size: 40px;
            line-height: 1.02;
            margin: 0;
            color: var(--blue);
            font-weight: 900;
            text-transform: uppercase
        }

        .lead {
            font-size: 30px;
            color: #223a62;
            font-weight: 700;
            margin: 6px 0 12px
        }

        .desc {
            font-size: 18px;
            line-height: 1.35;
            max-width: 640px;
            min-height: 96px;
        }

        .hero-content h1,
        .hero-content .lead,
        .hero-content .desc {
            text-shadow: 0 2px 10px rgba(255, 255, 255, .45), 0 1px 2px rgba(10, 47, 103, .18);
        }

        .hero-content .desc {
            background: rgba(255, 255, 255, .28);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            padding: 6px 10px;
            border-radius: 8px;
        }

        .hero-content.align-right .desc {
            text-align: right;
        }

        .hero-copy {
            max-width: 560px;
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

        .yanis-footer {
            background: #062b5f;
            color: #fff;
            padding: 22px 0 14px;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .footer-inner {
            max-width: 1320px;
            margin: auto;
            display: grid;
            grid-template-columns: 260px 140px 170px 150px 240px 150px;
            gap: 28px;
            align-items: flex-start;
        }

        .footer-logo img {
            width: 220px;
            height: auto;
        }

        .footer-col,
        .footer-social {
            border-left: 1px solid rgba(255, 255, 255, .18);
            padding-left: 24px;
            min-height: 78px;
        }

        .footer-col h4,
        .footer-social h4 {
            margin: 0 0 8px;
            font-size: 15px;
            font-weight: 800;
            color: #fff;
        }

        .footer-col a,
        .footer-col p {
            display: block;
            margin: 4px 0;
            color: #dbe8ff;
            font-size: 13px;
            line-height: 1.25;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-col a:hover {
            color: #fff;
        }

        .contact p {
            font-size: 12.5px;
        }

        .contact i {
            width: 16px;
            margin-right: 6px;
        }

        .social-icons {
            display: flex;
            gap: 6px;
            margin-top: 14px;
        }

        .social-icons a {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
        }

        .social-icons a:nth-child(1) {
            background: #2d6cdf;
        }

        .social-icons a:nth-child(2) {
            background: #1e9bd7;
        }

        .social-icons a:nth-child(3) {
            background: #e8407a;
        }

        .social-icons a:nth-child(4) {
            background: #ff0000;
        }

        .footer-bottom {
            max-width: 1320px;
            margin: 16px auto 0;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, .18);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #dbe8ff;
            font-size: 12.5px;
        }

        .footer-bottom p {
            margin: 0;
        }

        .footer-bottom a {
            color: #dbe8ff;
            text-decoration: none;
            margin: 0 8px;
        }

        @media (max-width: 1100px) {
            .footer-inner {
                grid-template-columns: repeat(2, 1fr);
                padding: 0 20px;
            }

            .footer-bottom {
                padding: 12px 20px 0;
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
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

        .services-section {
            padding: 45px 0 30px;
            background: #f7f8fb;
        }

        .services-title {
            text-align: center;
            font-size: 40px;
            font-weight: 900;
            color: #113d7a;
            margin-bottom: 45px;
            position: relative;
        }

        .services-title::after {
            content: "";
            width: 55px;
            height: 4px;
            background: #ea2c48;
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 20px;
        }

        .services-grid {
            max-width: 1400px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 18px;
        }

        .service-card {
            background: #fff;
            border-radius: 18px;
            padding: 22px 20px 18px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .05);
            transition: .25s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 185px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .service-top {
            display: flex;
            gap: 16px;
        }

        .service-icon {
            width: 68px;
            min-width: 68px;
            height: 68px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-icon i {
            font-size: 31px;
        }

        .service-content h3 {
            margin: 0 0 10px;
            font-size: 15px;
            line-height: 1.2;
            color: #153a75;
            font-weight: 900;
            text-transform: uppercase;
        }

        .service-content p {
            margin: 0;
            color: #5d6472;
            font-size: 14px;
            line-height: 1.45;
            font-weight: 500;
        }

        .service-arrow {
            display: flex;
            justify-content: flex-end;
            margin-top: 18px;
        }

        .service-arrow i {
            font-size: 18px;
            color: #153a75;
        }

        @media (max-width: 1400px) {
            .services-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: repeat(1, 1fr);
                padding: 0 20px;
            }

            .services-title {
                font-size: 28px;
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

    <section class="hero" id="heroSlider">
        @foreach ($heroSlides as $index => $slide)
        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $slide['image'] }}'); --hero-pos: {{ $slide['position'] }};"></div>
        @endforeach

        <div class="container hero-content align-{{ $heroSlides[0]['align'] }}" id="heroContent">
            <div class="hero-copy">
                <h1 id="heroTitle">{{ $heroSlides[0]['title'] }}</h1>
                <p class="lead" id="heroLead">{{ $heroSlides[0]['lead'] }}</p>
                <p class="desc" id="heroDesc">{{ $heroSlides[0]['desc'] }}</p>
            </div>
            <div class="cta-row">
                <a class="btn btn-red" href="#">DEMANDER UNE ASSISTANCE</a>
                <a class="btn btn-white" href="#">NOUS CONTACTER</a>
            </div>
        </div>
        <div class="hero-dots" aria-label="Navigation du slider hero">
            @foreach ($heroSlides as $index => $slide)
            <button type="button" class="hero-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}" aria-label="Aller au slide {{ $index + 1 }}"></button>
            @endforeach
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

            <h2 class="services-title">
                NOS SERVICES
            </h2>

            <div class="services-grid">

                @foreach($services as $service)

                <article class="service-card">

                    <div class="service-top">

                        <div class="service-icon"
                            style="background: {{ $service['color'] }}; color: {{ $service['iconColor'] }}">
                            <i class="fa-solid {{ $service['icon'] }}"></i>
                        </div>

                        <div class="service-content">
                            <h3>{{ $service['title'] }}</h3>
                            <p>{{ $service['desc'] }}</p>
                        </div>

                    </div>

                    <div class="service-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>

                </article>

                @endforeach

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
</body>

</html>