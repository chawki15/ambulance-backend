@extends('layouts.app')

@section('title', 'À propos')

@section('content')

<section class="about-hero">
    <div class="about-left">
        <h1>À PROPOS DE<br><span>YANIS ASSISTANCE</span></h1>
        <p>
            Yanis Assistance est une société marocaine spécialisée dans l’assistance médicale,
            le transport sanitaire et les services d’aide à la personne.
        </p>

        <div class="about-features">
            <div><i class="fa-solid fa-users"></i><strong>Relation humaine</strong><span>Au cœur de notre métier</span></div>
            <div><i class="fa-solid fa-stopwatch"></i><strong>Réactivité</strong><span>Intervention rapide 24/7</span></div>
            <div><i class="fa-solid fa-shield-halved"></i><strong>Fiabilité</strong><span>Prestations de qualité</span></div>
        </div>
    </div>

    <div class="about-right">
        <img src="{{ asset('images/about-medical-team.png') }}" alt="Yanis Assistance">
        <div class="mission-card">
            <i class="fa-solid fa-quote-left"></i>
            <h3>Notre Mission</h3>
            <p>Accompagner, agir rapidement et soulager le quotidien après un aléa est notre cœur de métier.</p>
        </div>
    </div>
</section>

<section class="about-content">

    <div class="presentation">
        <h2>PRÉSENTATION GÉNÉRALE</h2>
        <p>
            Créée pour répondre aux besoins croissants du secteur de la santé et de l’assistance,
            Yanis Assistance propose des solutions d’assistance sur-mesure.
        </p>
    </div>

    <div class="stats-boxes">
        <div><i class="fa-solid fa-building"></i><span>Capital</span><strong>100.000 MAD</strong></div>
        <div><i class="fa-solid fa-users"></i><span>Effectif</span><strong>24 salariés</strong></div>
        <div><i class="fa-solid fa-people-group"></i><span>Type de clientèle</span><strong>Tout Public</strong></div>
        <div><i class="fa-solid fa-calendar-days"></i><span>Expérience</span><strong>Expertise & savoir-faire</strong></div>
    </div>

    
</section>

    <section class="about-bottom">

        <div class="values-history">

            <div class="values-box">
                <h2>NOS VALEURS</h2>

                <div class="values-list">
                    <div class="value-item">
                        <div class="value-icon red"><i class="fa-regular fa-heart"></i></div>
                        <h4>Humanité</h4>
                        <p>Placer l’humain au centre de chaque intervention.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon blue"><i class="fa-solid fa-stopwatch"></i></div>
                        <h4>Réactivité</h4>
                        <p>Intervenir rapidement pour chaque situation d’urgence.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon blue"><i class="fa-solid fa-shield-halved"></i></div>
                        <h4>Intégrité</h4>
                        <p>Agir avec éthique, transparence et professionnalisme.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon red"><i class="fa-solid fa-bullseye"></i></div>
                        <h4>Engagement</h4>
                        <p>S’engager à fournir des prestations de haute qualité.</p>
                    </div>
                </div>
            </div>

            <div class="history-box">
                <h2>NOTRE HISTOIRE</h2>

                <div class="history-line">
                    <div class="history-item active">
                        <div class="history-icon"><i class="fa-solid fa-rocket"></i></div>
                        <span>2022</span>
                        <h4>Création</h4>
                        <p>De Yanis Assistance</p>
                    </div>

                    <div class="history-item">
                        <div class="history-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <span>2021</span>
                        <h4>Croissance</h4>
                        <p>Extension des zones d’intervention</p>
                    </div>

                    <div class="history-item">
                        <div class="history-icon"><i class="fa-regular fa-star"></i></div>
                        <span>2025</span>
                        <h4>Aujourd’hui</h4>
                        <p>Toujours plus proches de nos assurés</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="clients-row">
            <div class="clients-text">
                <h2>NOS CLIENTS</h2>
                <p>Nous collaborons avec un large réseau de partenaires et clients qui nous font confiance.</p>
            </div>

            <div class="clients-logos">
                <img src="{{ asset('images/clients/axa.png') }}" alt="AXA">
                <img src="{{ asset('images/clients/sanlam.png') }}" alt="Sanlam">
                <img src="{{ asset('images/clients/rma.png') }}" alt="RMA">
                <img src="{{ asset('images/clients/saham.png') }}" alt="Saham">
                <img src="{{ asset('images/clients/atlanta.png') }}" alt="AtlantaSanad">
                <img src="{{ asset('images/clients/cnss.png') }}" alt="CNSS">
                <img src="{{ asset('images/clients/akwa.png') }}" alt="AKWA">
            </div>
        </div>

    </section>

<style>
    .about-right {
        position: relative;
    }

    .about-right::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg,
                rgba(245, 248, 255, .95) 0%,
                rgba(245, 248, 255, .55) 22%,
                rgba(245, 248, 255, 0) 45%);
        z-index: 1;
    }

    .about-right img {
        position: relative;
        z-index: 0;
    }


    .about-hero {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 520px;
        overflow: hidden;
    }

    .about-left {
        padding: 55px 0 40px 110px;
    }

    .about-left h1 {
        font-size: 42px;
        line-height: 1.05;
        color: #0b3168;
        font-weight: 900;
        margin: 0 0 22px;
    }

    .about-left h1::after,
    .about-content h2::after {
        content: "";
        width: 45px;
        height: 3px;
        background: #ee1f3f;
        display: block;
        margin-top: 10px;
    }

    .about-left p {
        max-width: 560px;
        font-size: 15px;
        line-height: 1.7;
        color: #1b2c46;
    }

    .about-features {
        display: flex;
        gap: 45px;
        margin-top: 35px;
    }

    .about-features div {
        display: flex;
        flex-direction: column;
        gap: 6px;
        max-width: 150px;
    }

    .about-features i {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #eaf1fb;
        color: #0b3168;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-features strong {
        color: #0b3168;
        font-size: 14px;
    }

    .about-features span {
        font-size: 12px;
        color: #44546c;
    }

    .about-right {
        position: relative;
    }

    .about-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center right;
        display: block;
    }

    .mission-card {
        position: absolute;
        right: 90px;
        bottom: -45px;
        width: 310px;
        background: #fff;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 12px 35px rgba(20, 60, 110, .15);
    }

    .mission-card i {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #0b3168;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: -58px;
    }

    .mission-card h3 {
        color: #0b3168;
        margin-bottom: 10px;
    }

    .about-content {
        padding: 70px 110px 40px;
        background: #fff;
    }

    .presentation {
        max-width: 620px;
    }

    .about-content h2 {
        color: #0b3168;
        font-size: 17px;
        font-weight: 900;
        margin-bottom: 18px;
    }

    .presentation p {
        font-size: 14px;
        color: #23344f;
        line-height: 1.7;
    }

    .stats-boxes {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin: -95px 0 55px auto;
        max-width: 720px;
    }

    .stats-boxes div {
        background: #fff;
        border-radius: 14px;
        padding: 24px 18px;
        box-shadow: 0 8px 28px rgba(11, 49, 104, .1);
    }

    .stats-boxes i {
        width: 50px;
        height: 50px;
        background: #0b3168;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stats-boxes span {
        display: block;
        margin-top: 14px;
        font-size: 12px;
        color: #4a5870;
    }

    .stats-boxes strong {
        color: #0b3168;
        font-size: 16px;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 65px;
        border-top: 1px solid #e4eaf4;
        padding-top: 35px;
    }

    .values {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .values div {
        text-align: left;
    }

    .values i {
        width: 58px;
        height: 58px;
        background: #eef4ff;
        border-radius: 50%;
        color: #0b3168;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 12px;
    }

    .values strong {
        color: #0b3168;
        font-size: 14px;
    }

    .values p {
        font-size: 12px;
        color: #4a5870;
    }

    .timeline {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        padding-top: 30px;
    }

    .timeline div {
        position: relative;
        text-align: center;
    }

    .timeline span {
        color: #0b3168;
        font-size: 22px;
        font-weight: 900;
    }

    .timeline strong {
        display: block;
        margin-top: 8px;
        color: #0b3168;
    }

    .timeline p {
        font-size: 12px;
        color: #4a5870;
    }

    @media (max-width: 992px) {

        .about-hero,
        .about-grid {
            grid-template-columns: 1fr;
        }

        .about-left,
        .about-content {
            padding: 35px 20px;
        }

        .about-features,
        .timeline {
            flex-direction: column;
        }

        .stats-boxes {
            margin: 30px 0;
            grid-template-columns: repeat(2, 1fr);
        }

        .values {
            grid-template-columns: repeat(2, 1fr);
        }

        .mission-card {
            position: relative;
            right: auto;
            bottom: auto;
            width: auto;
            margin: -40px 20px 20px;
        }
    }









    .about-bottom {
        padding: 35px 90px 45px;
        background: #fff;
    }

    .values-history {
        display: grid;
        grid-template-columns: 1.05fr 1fr;
        background: #f7faff;
        border-radius: 8px;
        padding: 25px 35px;
        gap: 35px;
    }

    .values-box {
        border-right: 1px solid #dfe7f2;
        padding-right: 35px;
    }

    .about-bottom h2 {
        color: #0b3168;
        font-size: 16px;
        font-weight: 900;
        margin: 0 0 25px;
    }

    .about-bottom h2::after {
        content: "";
        width: 38px;
        height: 3px;
        background: #ef1f3f;
        display: block;
        margin-top: 8px;
    }

    .values-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 26px;
    }

    .value-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .value-icon.blue {
        background: #eef4ff;
        color: #0b3168;
    }

    .value-icon.red {
        background: #fff0f3;
        color: #ef1f3f;
    }

    .value-icon i {
        font-size: 24px;
    }

    .value-item h4 {
        color: #0b3168;
        font-size: 13px;
        margin: 12px 0 6px;
        font-weight: 900;
    }

    .value-item p {
        font-size: 11.5px;
        color: #25354d;
        line-height: 1.45;
        margin: 0;
    }

    .history-line {
        display: flex;
        justify-content: space-between;
        position: relative;
        padding-top: 10px;
    }

    .history-line::before {
        content: "";
        position: absolute;
        top: 42px;
        left: 80px;
        right: 80px;
        height: 1px;
        background: #d7e1ef;
    }

    .history-item {
        position: relative;
        z-index: 2;
        width: 33.33%;
    }

    .history-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #0b3168;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .history-item span {
        display: block;
        margin-top: 18px;
        color: #0b3168;
        font-size: 22px;
        font-weight: 900;
    }

    .history-item h4 {
        font-size: 12px;
        color: #0b3168;
        margin: 5px 0 3px;
        font-weight: 900;
    }

    .history-item p {
        font-size: 11px;
        color: #25354d;
        margin: 0;
    }

    .clients-row {
        margin-top: 18px;
        display: grid;
        grid-template-columns: 260px 1fr;
        align-items: center;
        gap: 25px;
    }

    .clients-text p {
        font-size: 12px;
        color: #25354d;
        line-height: 1.5;
        margin: 0;
    }

    .clients-logos {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 6px 22px rgba(11, 49, 104, .08);
        padding: 18px 28px;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        align-items: center;
        gap: 25px;
    }

    .clients-logos img {
        max-width: 105px;
        max-height: 45px;
        object-fit: contain;
        margin: auto;
    }

    @media (max-width: 992px) {
        .about-bottom {
            padding: 25px 20px;
        }

        .values-history,
        .clients-row {
            grid-template-columns: 1fr;
        }

        .values-box {
            border-right: none;
            border-bottom: 1px solid #dfe7f2;
            padding-right: 0;
            padding-bottom: 25px;
        }

        .values-list {
            grid-template-columns: repeat(2, 1fr);
        }

        .clients-logos {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection