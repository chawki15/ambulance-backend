@extends('layouts.app')

@section('title', __('recrutement.title'))

@section('content')
<section class="recruit-hero">



    <div class="recruit-hero-text">
        <span>{{ __('recrutement.join_us') }}</span>

        <h1>{{ __('recrutement.title') }}</h1>

        <p>{{ __('recrutement.description') }}</p>

        <a href="mailto:recrutement@yanis-assistance.ma" class="recruit-main-btn">
            {{ __('recrutement.send_cv') }}
        </a>
    </div>

    <div class="recruit-hero-image">
        <img src="{{ asset('images/recrutement.png') }}" alt="Recrutement">
    </div>

</section>

<section class="recruit-section">
    <h2>{{ __('recrutement.why_title') }}</h2>

    <div class="recruit-cards">
        <div class="recruit-card">
            <i class="fa-solid fa-briefcase-medical"></i>
            <h3>{{ __('recrutement.card1.title') }}</h3>
            <p>{{ __('recrutement.card1.desc') }}</p>
        </div>

        <div class="recruit-card">
            <i class="fa-solid fa-users"></i>
            <h3>{{ __('recrutement.card2.title') }}</h3>
            <p>{{ __('recrutement.card2.desc') }}</p>
        </div>

        <div class="recruit-card">
            <i class="fa-solid fa-chart-line"></i>
            <h3>{{ __('recrutement.card3.title') }}</h3>
            <p>{{ __('recrutement.card3.desc') }}</p>
        </div>

        <div class="recruit-card">
            <i class="fa-solid fa-heart-pulse"></i>
            <h3>{{ __('recrutement.card4.title') }}</h3>
            <p>{{ __('recrutement.card4.desc') }}</p>
        </div>
    </div>
</section>

<section class="jobs-section">
    <h2>{{ __('recrutement.jobs_title') }}</h2>

    <div class="jobs-list">
        <div class="job-item">
            <div>
                <h3>{{ __('recrutement.job1') }}</h3>
                <p>{{ __('recrutement.job1.desc') }}</p>
            </div>
            <span>Casablanca</span>
            <span>Temps plein</span>
            <a href="mailto:recrutement@yanis-assistance.ma?subject=Candidature Ambulancier">Postuler</a>
        </div>

        <div class="job-item">
            <div>
                <h3>{{ __('recrutement.job2') }}</h3>
                <p>{{ __('recrutement.job2.desc') }}</p>
            </div>
            <span>Casablanca</span>
            <span>Temps plein</span>
            <a href="mailto:recrutement@yanis-assistance.ma?subject=Candidature Infirmier">Postuler</a>
        </div>

        <div class="job-item">
            <div>
                <h3>{{ __('recrutement.job3') }}</h3>
                <p>{{ __('recrutement.job3.desc') }}</p>
            </div>
            <span>Casablanca</span>
            <span>CDI</span>
            <a href="mailto:recrutement@yanis-assistance.ma?subject=Candidature Téléconseiller">Postuler</a>
        </div>

        <div class="job-item">
            <div>
                <h3>{{ __('recrutement.job4') }}</h3>
                <p>{{ __('recrutement.job4.desc') }}</p>
            </div>
            <span>Casablanca</span>
            <span>CDI</span>
            <a href="mailto:recrutement@yanis-assistance.ma?subject=Candidature Coordinateur médical">Postuler</a>
        </div>
    </div>
</section>

<section class="recruit-cta">
    <div>
        <h2>{{ __('recrutement.spontaneous_title') }}</h2>
        <p>
            {{ __('recrutement.spontaneous_desc') }}
        </p>
    </div>

    <a href="mailto:recrutement@yanis-assistance.ma">
        {{ __('recrutement.send_cv') }}
    </a>
</section>

<style>
    .recruit-hero {
        display: grid;
        grid-template-columns: 52% 48%;
        min-height: 520px;
        background: #f4f7fc;
        overflow: hidden;
    }

    .recruit-hero-image {
        position: relative;
        height: 520px;
        overflow: hidden;
    }

    .recruit-hero-image img {
        width: 100%;
        height: 100%;
        object-position: center;
        display: block;
        object-fit: contain;
        background: #eef2f8;
    }

    .recruit-hero-image::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right,
                rgba(244, 247, 252, .95) 0%,
                rgba(244, 247, 252, .45) 35%,
                rgba(244, 247, 252, 0) 70%);
        z-index: 1;
    }

    .recruit-hero-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 50px 70px;
        text-align: center;
    }

    .recruit-hero-text span {
        color: #e71f3c;
        font-size: 15px;
        font-weight: 900;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .recruit-hero-text h1 {
        color: #0a2f67;
        font-size: 48px;
        line-height: 1.1;
        font-weight: 900;
        margin: 0 0 22px;
        text-transform: uppercase;
        max-width: 680px;
    }

    .recruit-hero-text p {
        max-width: 700px;
        color: #1f2b3d;
        font-size: 20px;
        line-height: 1.8;
        margin: 0 0 34px;
    }

    .recruit-main-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 270px;
        min-height: 62px;
        background: #e71f3c;
        color: #fff;
        padding: 14px 30px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 22px;
        font-weight: 900;
    }

    /* ARABIC */
    html[dir="rtl"] .recruit-hero {
        grid-template-columns: 48% 52%;
        direction: rtl;
    }

    html[dir="rtl"] .recruit-hero-text {
        order: 1;
        text-align: center;
    }

    html[dir="rtl"] .recruit-hero-image {
        order: 2;
    }

    html[dir="rtl"] .recruit-hero-image::before {
        background: linear-gradient(to left,
                rgba(244, 247, 252, .95) 0%,
                rgba(244, 247, 252, .45) 35%,
                rgba(244, 247, 252, 0) 70%);
    }

    html[dir="rtl"] .recruit-hero-text h1 {
        font-size: 52px;
        line-height: 1.3;
        max-width: 520px;
    }

    html[dir="rtl"] .recruit-hero-text p {
        font-size: 22px;
        line-height: 2;
        max-width: 560px;
    }

    /* MOBILE */
    @media(max-width:768px) {

        .recruit-hero,
        html[dir="rtl"] .recruit-hero {
            display: flex;
            flex-direction: column;
            min-height: auto;
        }

        .recruit-hero-image,
        html[dir="rtl"] .recruit-hero-image {
            order: 1;
            width: 100%;
            height: 260px;
        }

        .recruit-hero-text,
        html[dir="rtl"] .recruit-hero-text {
            order: 2;
            padding: 38px 24px 50px;
            text-align: center;
        }

        .recruit-hero-text h1,
        html[dir="rtl"] .recruit-hero-text h1 {
            font-size: 34px;
            line-height: 1.25;
        }

        .recruit-hero-text p,
        html[dir="rtl"] .recruit-hero-text p {
            font-size: 17px;
            line-height: 1.8;
        }

        .recruit-main-btn {
            min-width: 230px;
            min-height: 56px;
            font-size: 19px;
        }
    }

    /* =========================
   RTL ARABIC
========================= */
    .recruit-main-btn {
        display: inline-block;
        margin-top: 22px;
        background: #e71f3c;
        color: #fff;
        padding: 14px 26px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 800;
    }

    .recruit-hero-image {
        position: relative;
    }

    .recruit-hero-image::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, #f4f8ff 0%, rgba(244, 248, 255, .7) 25%, rgba(244, 248, 255, 0) 60%);
        z-index: 1;
    }

    .recruit-hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .recruit-section,
    .jobs-section {
        padding: 55px 70px;
        background: #fff;
    }

    .recruit-section h2,
    .jobs-section h2 {
        text-align: center;
        color: #0a2f67;
        font-size: 30px;
        font-weight: 900;
        margin: 0 0 38px;
        position: relative;
    }

    .recruit-section h2::after,
    .jobs-section h2::after {
        content: "";
        width: 50px;
        height: 3px;
        background: #e71f3c;
        display: block;
        margin: 12px auto 0;
    }

    .recruit-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }

    .recruit-card {
        background: #fff;
        border: 1px solid #e5ebf5;
        border-radius: 14px;
        padding: 28px 20px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(10, 47, 103, .06);
    }

    .recruit-card i {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0a2f67;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin: 0 auto 18px;
    }

    .recruit-card h3 {
        color: #0a2f67;
        font-size: 17px;
        margin: 0 0 10px;
    }

    .recruit-card p {
        color: #34445c;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }

    .jobs-list {
        max-width: 1120px;
        margin: auto;
        border: 1px solid #e3eaf4;
        border-radius: 14px;
        overflow: hidden;
        background: #fff;
    }

    .job-item {
        display: grid;
        grid-template-columns: 1.8fr 130px 120px 130px;
        gap: 20px;
        align-items: center;
        padding: 22px 24px;
        border-bottom: 1px solid #e9eef6;
    }

    .job-item:last-child {
        border-bottom: 0;
    }

    .job-item h3 {
        color: #0a2f67;
        margin: 0 0 6px;
        font-size: 17px;
    }

    .job-item p {
        margin: 0;
        color: #34445c;
        font-size: 14px;
        line-height: 1.5;
    }

    .job-item span {
        color: #1f2b3d;
        font-size: 14px;
        font-weight: 600;
    }

    .job-item a {
        background: #0a2f67;
        color: #fff;
        padding: 11px 18px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 800;
        text-align: center;
    }

    .recruit-cta {
        margin: 30px 70px 60px;
        background: #0a2f67;
        color: #fff;
        border-radius: 16px;
        padding: 34px 42px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
    }

    .recruit-cta h2 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .recruit-cta p {
        margin: 0;
        color: #dbe8ff;
        line-height: 1.6;
    }

    .recruit-cta a {
        background: #fff;
        color: #0a2f67;
        padding: 14px 28px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 900;
        white-space: nowrap;
    }

    @media(max-width:992px) {
        .recruit-hero {
            grid-template-columns: 1fr;
        }

        .recruit-hero-text {
            padding: 45px 25px;
            text-align: center;
        }

        .recruit-hero-text p {
            margin: auto;
        }

        .recruit-hero-image {
            height: 260px;
        }

        .recruit-cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .job-item {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .recruit-cta {
            margin: 25px 20px 45px;
            flex-direction: column;
            text-align: center;
        }
    }

    @media(max-width:576px) {
        .recruit-hero-text h1 {
            font-size: 34px;
        }

        .recruit-section,
        .jobs-section {
            padding: 40px 20px;
        }

        .recruit-cards {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection