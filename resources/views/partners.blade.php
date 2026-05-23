@extends('layouts.app')

@section('title', 'Partenaires & Clients')

@section('content')

<section class="partners-hero">
    <div class="partners-hero-content">
        <span>PARTENAIRES & CLIENTS</span>
        <h1>PARTENAIRES & CLIENTS</h1>
        <p>La confiance de nos partenaires et la satisfaction de nos clients sont au cœur de notre engagement quotidien.</p>

        <div class="partners-features">
            <div><i class="fa-regular fa-handshake"></i><small>Partenariats solides<br>et durables</small></div>
            <div><i class="fa-solid fa-shield-halved"></i><small>Engagement qualité<br>et conformité</small></div>
            <div><i class="fa-solid fa-users"></i><small>Collaboration<br>transparente</small></div>
            <div><i class="fa-solid fa-bullseye"></i><small>Objectif commun :<br>la santé et le bien-être</small></div>
        </div>
    </div>
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
            <a href="#">Voir tous nos partenaires</a>
        </div>

        <div class="partner-card">
            <h3>ORGANISMES D’ASSISTANCE</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/santeclair.png') }}">
                <img src="{{ asset('images/clients/inter-mutuelles.png') }}">
                <img src="{{ asset('images/clients/europ-assistance.png') }}">
            </div>
            <a href="#">Voir tous nos partenaires</a>
        </div>

        <div class="partner-card">
            <h3>ÉTABLISSEMENTS DE SANTÉ</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/akdital.png') }}">
                <img src="{{ asset('images/clients/hopitaux.png') }}">
                <img src="{{ asset('images/clients/clinique.png') }}">
            </div>
            <a href="#">Voir tous nos partenaires</a>
        </div>

        <div class="partner-card">
            <h3>ENTREPRISES & INDUSTRIES</h3>
            <div class="logo-row">
                <img src="{{ asset('images/clients/ocp.png') }}">
                <img src="{{ asset('images/clients/maroc-telecom.png') }}">
                <img src="{{ asset('images/clients/cosumar.png') }}">
            </div>
            <a href="#">Voir tous nos partenaires</a>
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
        min-height: 310px;
        background:
            linear-gradient(90deg, rgba(5, 43, 95, .96) 0%, rgba(5, 43, 95, .86) 42%, rgba(5, 43, 95, .15) 100%),
            url('/images/partners/hero-partners.jpg') center/cover no-repeat;
        color: #fff;
        display: flex;
        align-items: center;
    }

    .partners-hero-content {
        width: 100%;
        max-width: 1300px;
        margin: auto;
        padding: 45px 35px;
    }

    .partners-hero h1 {
        font-size: 38px;
        margin: 0 0 15px;
        font-weight: 900;
    }

    .partners-hero p {
        max-width: 520px;
        line-height: 1.7;
        font-size: 15px;
    }

    .partners-features {
        display: flex;
        gap: 45px;
        margin-top: 35px;
    }

    .partners-features div {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 120px;
    }

    .partners-features i {
        width: 48px;
        height: 48px;
        border: 1px solid rgba(255, 255, 255, .7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .partners-page {
        padding: 35px 70px 45px;
        background: #fff;
    }

    .partners-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .partner-card {
        border: 1px solid #e5ebf4;
        border-radius: 10px;
        padding: 22px;
        background: #fff;
        min-height: 180px;
    }

    .partner-card h3,
    .clients-box h3,
    .why-partner h3 {
        color: #0b3168;
        font-size: 14px;
        font-weight: 900;
        margin: 0 0 22px;
    }

    .logo-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        align-items: center;
        min-height: 58px;
    }

    .logo-row img {
        max-width: 92px;
        max-height: 45px;
        object-fit: contain;
    }

    .partner-card a {
        margin-top: 22px;
        display: inline-flex;
        height: 28px;
        padding: 0 14px;
        border: 1px solid #cfdbea;
        border-radius: 5px;
        align-items: center;
        color: #0b3168;
        font-size: 11px;
        font-weight: 800;
    }

    .partners-bottom {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-top: 22px;
    }

    .clients-box,
    .why-partner {
        border-radius: 10px;
        padding: 25px;
    }

    .clients-box {
        background: #fff;
        border: 1px solid #e5ebf4;
    }

    .clients-box p {
        font-size: 13px;
        color: #33445f;
        margin-bottom: 25px;
    }

    .clients-types {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
    }

    .clients-types div {
        text-align: center;
        border-right: 1px solid #e1e8f2;
    }

    .clients-types div:last-child {
        border-right: none;
    }

    .clients-types i {
        color: #0b3168;
        font-size: 25px;
        margin-bottom: 10px;
    }

    .clients-types span {
        color: #0b3168;
        font-size: 12px;
        font-weight: 800;
    }

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
        gap: 18px;
    }

    .why-partner-grid div {
        text-align: center;
    }

    .why-partner-grid i {
        font-size: 28px;
        margin-bottom: 12px;
    }

    .why-partner-grid span {
        display: block;
        font-size: 12px;
        line-height: 1.4;
    }

    .partners-stats {
        margin-top: 20px;
        background: #edf5ff;
        border-radius: 10px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .partners-stats div {
        padding: 20px;
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
        font-size: 34px;
        color: #0b3168;
    }

    .partners-stats strong {
        color: #0b3168;
        font-size: 28px;
        font-weight: 900;
    }

    .partners-stats span {
        font-size: 12px;
        color: #263850;
    }

    @media(max-width: 1100px) {

        .partners-grid,
        .partners-bottom {
            grid-template-columns: 1fr;
        }

        .clients-types,
        .why-partner-grid,
        .partners-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .partners-features {
            flex-wrap: wrap;
        }
    }
</style>

@endsection