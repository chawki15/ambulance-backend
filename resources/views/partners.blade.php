@extends('layouts.app')

@section('title', 'Partenaires & Clients')

@section('content')

<section class="partners-hero {{ app()->getLocale() == 'ar' ? 'partners-ar' : 'partners-fr' }}">

    @if(app()->getLocale() == 'ar')

    <div class="partners-image">
        <img src="{{ asset('images/slidear-4.jpeg') }}" alt="">
    </div>

    <div class="partners-content">
        <span class="mini-title">شركاؤنا وعملاؤنا</span>

        <h1>شركاؤنا وعملاؤنا</h1>

        <p>
            ثقة شركائنا ورضا عملائنا هما أساس التزامنا اليومي.
        </p>

        <div class="partners-features">
            <div>
                <i class="fa-regular fa-handshake"></i>
                <small>شراكات قوية<br>ومستدامة</small>
            </div>

            <div>
                <i class="fa-solid fa-shield-halved"></i>
                <small>الجودة<br>والامتثال</small>
            </div>

            <div>
                <i class="fa-solid fa-users"></i>
                <small>تعاون<br>شفاف</small>
            </div>

            <div>
                <i class="fa-solid fa-bullseye"></i>
                <small>هدف مشترك<br>الصحة والرفاهية</small>
            </div>
        </div>
    </div>

    @else

    <div class="partners-content">
        <span class="mini-title">PARTENAIRES & CLIENTS</span>

        <h1>PARTENAIRES & CLIENTS</h1>

        <p>
            La confiance de nos partenaires et la satisfaction de nos clients
            sont au cœur de notre engagement quotidien.
        </p>

        <div class="partners-features">
            <div>
                <i class="fa-regular fa-handshake"></i>
                <small>Partenariats solides<br>et durables</small>
            </div>

            <div>
                <i class="fa-solid fa-shield-halved"></i>
                <small>Engagement qualité<br>et conformité</small>
            </div>

            <div>
                <i class="fa-solid fa-users"></i>
                <small>Collaboration<br>transparente</small>
            </div>

            <div>
                <i class="fa-solid fa-bullseye"></i>
                <small>Objectif commun<br>santé et bien-être</small>
            </div>
        </div>
    </div>

    <div class="partners-image">
        <img src="{{ asset('images/slide-4.jpeg') }}" alt="">
    </div>

    @endif

</section>

<section class="partners-page">

    <h2 class="section-title">NOS PARTENAIRES</h2>

    <div class="partners-grid">
        <div class="partner-card">
            <h3>ASSUREURS & COURTIERS</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/rma.png') }}">
                <img src="{{ asset('images/clients/sanlam.png') }}">
                <img src="{{ asset('images/clients/atlanta.png') }}">
                <img src="{{ asset('images/clients/axa.png') }}">
            </div>
        </div>

        <div class="partner-card">
            <h3>ORGANISMES D’ASSISTANCE</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/santeclair.png') }}">
                <img src="{{ asset('images/clients/inter-mutuelles.png') }}">
                <img src="{{ asset('images/clients/europ-assistance.png') }}">
            </div>
        </div>

        <div class="partner-card">
            <h3>ÉTABLISSEMENTS DE SANTÉ</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/akdital.png') }}">
                <img src="{{ asset('images/clients/hopitaux.png') }}">
                <img src="{{ asset('images/clients/clinique.png') }}">
            </div>
        </div>

        <div class="partner-card">
            <h3>ENTREPRISES & INDUSTRIES</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/ocp.png') }}">
                <img src="{{ asset('images/clients/maroc-telecom.png') }}">
                <img src="{{ asset('images/clients/cosumar.png') }}">
            </div>
        </div>
    </div>

    <div class="partners-bottom">

        <div class="clients-box">
            <h3>NOS CLIENTS</h3>
            <p>Nous accompagnons chaque jour une grande diversité de clients à travers tout le Maroc.</p>

            <div class="clients-types">
                <div><i class="fa-solid fa-user-group"></i><span>Particuliers &<br>Assurés</span></div>
                <div><i class="fa-regular fa-building"></i><span>Entreprises &<br>PME</span></div>
                <div><i class="fa-regular fa-hospital"></i><span>Hôpitaux &<br>Cliniques</span></div>
                <div><i class="fa-solid fa-building-columns"></i><span>Institutions<br>Publiques</span></div>
                <div><i class="fa-solid fa-graduation-cap"></i><span>Établissements<br>Scolaires</span></div>
            </div>
        </div>

        <div class="why-partner">
            <h3>POURQUOI PARTENARIER AVEC YANIS ASSISTANCE ?</h3>

            <div class="why-partner-grid">
                <div><i class="fa-solid fa-star-of-life"></i><span>Expertise médicale reconnue</span></div>
                <div><i class="fa-solid fa-location-dot"></i><span>Réseau étendu sur tout le Maroc</span></div>
                <div><i class="fa-regular fa-clock"></i><span>Disponibilité 24h/24 - 7j/7</span></div>
                <div><i class="fa-solid fa-shield-halved"></i><span>Qualité de service certifiée</span></div>
                <div><i class="fa-regular fa-lightbulb"></i><span>Solutions sur-mesure et innovantes</span></div>
            </div>
        </div>

    </div>

    <div class="partners-stats">
        <div><i class="fa-solid fa-truck-medical"></i><strong>4 584</strong><span>Consultations à domicile</span></div>
        <div><i class="fa-solid fa-house-medical"></i><strong>236</strong><span>Hospitalisations à domicile</span></div>
        <div><i class="fa-solid fa-ambulance"></i><strong>7 493</strong><span>Transports médicaux</span></div>
        <div><i class="fa-solid fa-users"></i><strong>24</strong><span>Salariés dont 08 médecins</span></div>
    </div>

</section>
<style>
    .partners-hero {
        width: 100%;
        min-height: 310px;
        display: grid;
        grid-template-columns: 48% 52%;
        background: #062f68;
        overflow: hidden;
    }

    .partners-content {
        padding: 13px 47px;
        color: #fff;
        z-index: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .partners-content .mini-title {
        color: #fff;
        font-size: 12px;
        font-weight: 900;
    }

    .partners-content .mini-title::after {
        content: "";
        width: 40px;
        height: 3px;
        background: #ef2345;
        display: block;
        margin-top: 7px;
    }

    .partners-content h1 {
        color: #fff !important;
        font-size: 34px;
        line-height: 1.15;
        font-weight: 900;
        margin: 14px 0 18px;
    }

    .partners-content p {
        max-width: 520px;
        color: #fff;
        font-size: 15px;
        line-height: 1.7;
        margin: 0;
    }

    .partners-features {
        display: flex;
        gap: 20px;
        margin-top: 35px;
    }

    .partners-features div {
        max-width: 120px;
        color: #fff;
    }

    .partners-features i {
        width: 48px;
        height: 48px;
        border: 1px solid rgba(255, 255, 255, .65);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        color: #fff;
    }

    .partners-features small {
        color: #fff;
        font-size: 12px;
        line-height: 1.45;
        font-weight: 700;
    }

    .partners-image {
        position: relative;
        height: 310px;
    }

    .partners-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* الفرنسية */
    .partners-fr .partners-image img {
        object-position: center right;
    }

    .partners-fr .partners-image::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(to right,
                #062f68 0%,
                rgba(6, 47, 104, .88) 42%,
                rgba(6, 47, 104, .35) 70%,
                rgba(6, 47, 104, 0) 100%);
        z-index: 2;
    }

    /* العربية */
    .partners-ar {
        grid-template-columns: 52% 48%;
        direction: ltr !important;
    }

    .partners-ar .partners-content {
        direction: rtl;
        text-align: right;
        padding: 2px 92px 8px 39px;
    }

    .partners-ar .mini-title::after {
        margin-right: 0;
        margin-left: auto;
    }

    .partners-ar .partners-features {
        direction: rtl;
    }

    .partners-ar .partners-image img {
        object-position: center left;
    }

    .partners-ar .partners-image::before {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        width: 280px;
        height: 100%;
        background: linear-gradient(to left,
                #062f68 0%,
                rgba(6, 47, 104, .88) 42%,
                rgba(6, 47, 104, .35) 70%,
                rgba(6, 47, 104, 0) 100%);
        z-index: 2;
    }

    /* portable */
    @media(max-width:768px) {

        .partners-hero,
        .partners-ar {
            grid-template-columns: 1fr;
        }

        .partners-content,
        .partners-ar .partners-content {
            padding: 35px 25px;
        }

        .partners-content h1 {
            font-size: 26px;
        }

        .partners-image {
            height: 220px;
        }

        .partners-features {
            flex-wrap: wrap;
            gap: 20px;
        }

        .partners-image::before,
        .partners-fr .partners-image::before,
        .partners-ar .partners-image::before {
            width: 100%;
            background: linear-gradient(to bottom,
                    #062f68 0%,
                    rgba(6, 47, 104, .65) 35%,
                    rgba(6, 47, 104, 0) 100%);
        }
    }

    /*  ppppp */


    .partners-page {
        padding: 28px 65px 35px;
        background: #fff;
    }

    .section-title {
        text-align: center;
        color: #003b84;
        font-size: 20px;
        font-weight: 900;
        margin: 0 0 28px;
        position: relative;
    }

    .section-title::after {
        content: "";
        width: 45px;
        height: 3px;
        background: #ef2146;
        position: absolute;
        left: 50%;
        bottom: -8px;
        transform: translateX(-50%);
    }

    /* Cards */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .partner-card {
        background: #fff;
        border: 1px solid #e5ebf4;
        border-radius: 8px;
        padding: 18px;
        min-height: 150px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, .05);
    }

    .partner-card h3 {
        color: #003b84;
        font-size: 12px;
        font-weight: 900;
        margin: 0 0 22px;
    }

    .logo-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        align-items: center;
        min-height: 45px;
    }

    .logo-row img {
        max-width: 75px;
        max-height: 38px;
        object-fit: contain;
    }

    .partner-card a {
        margin-top: 24px;
        display: inline-flex;
        height: 26px;
        padding: 0 14px;
        border: 1px solid #cfdbea;
        border-radius: 5px;
        align-items: center;
        color: #003b84;
        font-size: 10px;
        font-weight: 800;
        text-decoration: none;
    }

    /* Middle */
    .partners-bottom {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-top: 18px;
    }

    .clients-box,
    .why-partner {
        border-radius: 8px;
        padding: 22px;
    }

    .clients-box {
        background: #fff;
        border: 1px solid #e5ebf4;
        box-shadow: 0 4px 14px rgba(0, 0, 0, .04);
    }

    .clients-box h3,
    .why-partner h3 {
        font-size: 13px;
        font-weight: 900;
        margin: 0 0 14px;
    }

    .clients-box h3 {
        color: #003b84;
    }

    .clients-box p {
        font-size: 11px;
        color: #111;
        margin: 0 0 20px;
    }

    .clients-types {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
    }

    .clients-types div {
        text-align: center;
        border-right: 1px solid #e1e8f2;
    }

    .clients-types div:last-child {
        border-right: none;
    }

    .clients-types i {
        color: #003b84;
        font-size: 22px;
        margin-bottom: 8px;
    }

    .clients-types span {
        color: #003b84;
        font-size: 11px;
        font-weight: 800;
        line-height: 1.35;
    }

    /* Blue box */
    .why-partner {
        background: #062f68;
        color: #fff;
    }

    .why-partner h3 {
        color: #fff;
    }

    .why-partner-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }

    .why-partner-grid div {
        text-align: center;
    }

    .why-partner-grid i {
        font-size: 27px;
        margin-bottom: 12px;
    }

    .why-partner-grid span {
        display: block;
        font-size: 11px;
        line-height: 1.4;
    }

    /* Stats */
    .partners-stats {
        margin-top: 18px;
        background: #edf5ff;
        border-radius: 8px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .partners-stats div {
        padding: 18px 25px;
        display: grid;
        grid-template-columns: 45px auto;
        column-gap: 14px;
        align-items: center;
        border-right: 1px solid #d5e2f2;
    }

    .partners-stats div:last-child {
        border-right: none;
    }

    .partners-stats i {
        grid-row: span 2;
        font-size: 32px;
        color: #003b84;
    }

    .partners-stats strong {
        color: #003b84;
        font-size: 28px;
        font-weight: 900;
    }

    .partners-stats span {
        font-size: 11px;
        color: #263850;
    }

    /* Portable */
    @media(max-width:992px) {
        .partners-page {
            padding: 25px 18px;
        }

        .partners-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .partners-bottom {
            grid-template-columns: 1fr;
        }

        .clients-types,
        .why-partner-grid,
        .partners-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:576px) {

        .partners-grid,
        .clients-types,
        .why-partner-grid,
        .partners-stats {
            grid-template-columns: 1fr;
        }

        .partners-stats div,
        .clients-types div {
            border-right: none;
            border-bottom: 1px solid #d5e2f2;
        }
    }
</style>

@endsection