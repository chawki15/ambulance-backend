@extends('layouts.app')

@section('title', __('about.title'))

@section('content')

<section class="about-hero {{ app()->getLocale() == 'ar' ? 'about-ar' : 'about-fr' }}">

    <div class="about-left">
        <h1>{!! __('about.hero.title') !!}</h1>
        <p>{{ __('about.hero.desc') }}</p>

        <div class="about-features">
            <div><i class="fa-solid fa-users"></i><strong>{{ __('about.feature.human.title') }}</strong><span>{{ __('about.feature.human.desc') }}</span></div>
            <div><i class="fa-solid fa-stopwatch"></i><strong>{{ __('about.feature.reactive.title') }}</strong><span>{{ __('about.feature.reactive.desc') }}</span></div>
            <div><i class="fa-solid fa-shield-halved"></i><strong>{{ __('about.feature.reliable.title') }}</strong><span>{{ __('about.feature.reliable.desc') }}</span></div>
        </div>
    </div>

    <div class="about-right">
        @if(app()->getLocale() == 'ar')
        <img src="{{ asset('images/slidear-1.jpeg') }}" alt="">
        @else
        <img src="{{ asset('images/slide-1.jpeg') }}" alt="">
        @endif

        <div class="mission-card">
            <i class="fa-solid fa-quote-left"></i>
            <h3>{{ __('about.mission.title') }}</h3>
            <p>{{ __('about.mission.desc') }}</p>
        </div>
    </div>

</section>

<section class="presentation-section">
    <div class="presentation-text">
        <h2>{{ __('about.presentation.title') }}</h2>
        <p>{{ __('about.presentation.desc') }}</p>
    </div>

    <div class="stats-boxes">
        <div class="stat-card">
            <div class="stat-icon blue">
                <img src="images/icons/capital.png" alt="Capital">
            </div>
            <span>{{ __('about.stats.capital') }}</span>
            <strong>100.000 MAD</strong>
        </div>

        <div class="stat-card">
            <div class="stat-icon red">
                <img src="images/icons/effectif.png" alt="Effectif">
            </div>
            <span>{{ __('about.stats.staff') }}</span>
            <strong>{{ __('about.stats.staff_value') }}</strong>
            <p>{{ __('about.stats.staff_desc') }}</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue">
                <img src="images/icons/type-de-clientele.png" alt="Type de clientèle">
            </div>
            <span>{{ __('about.stats.client_type') }}</span>
            <strong>{{ __('about.stats.client_value') }}</strong>
            <p>{{ __('about.stats.client_desc') }}</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue">
                <img src="images/icons/experience.png" alt="Expérience">
            </div>
            <span>{{ __('about.stats.experience') }}</span>
            <strong>{{ __('about.stats.experience_value_line1') }}<br>{{ __('about.stats.experience_value_line2') }}</strong>
            <p>{{ __('about.stats.experience_desc') }}</p>
        </div>
    </div>
</section>

<section class="about-bottom">

    <div class="values-history">

        <div class="values-box">
            <h2>{{ __('about.values.title') }}</h2>

            <div class="values-list">
                <div class="value-item">
                    <div class="value-icon red">
                        <img src="images/icons/humanite.png" alt="Humanité">
                    </div>
                    <h4>{{ __('about.value.human.title') }}</h4>
                    <p>{{ __('about.value.human.desc') }}</p>
                </div>

                <div class="value-item">
                    <div class="value-icon blue">
                        <img src="images/icons/reactivite.png" alt="Réactivité">
                    </div>
                    <h4>{{ __('about.value.reactive.title') }}</h4>
                    <p>{{ __('about.value.reactive.desc') }}</p>
                </div>

                <div class="value-item">
                    <div class="value-icon blue">
                        <img src="images/icons/integrite.png" alt="Intégrité">
                    </div>
                    <h4>{{ __('about.value.integrity.title') }}</h4>
                    <p>{{ __('about.value.integrity.desc') }}</p>
                </div>

                <div class="value-item">
                    <div class="value-icon red">
                        <img src="images/icons/engagement.png" alt="Engagement">
                    </div>
                    <h4>{{ __('about.value.commitment.title') }}</h4>
                    <p>{{ __('about.value.commitment.desc') }}</p>
                </div>
            </div>
        </div>

        <div class="history-section">

            <h2>{{ __('about.history.title') }}</h2>

            <div class="history-timeline">

                <div class="history-item">
                    <div class="history-icon">
                        <img src="images/icons/creation.png" alt="Création">
                    </div>

                    <div class="history-content">
                        <h4>{{ __('about.history.creation.title') }}</h4>
                        <p>{{ __('about.history.creation.desc') }}</p>
                    </div>

                    <span>2022</span>
                </div>

                <div class="history-item">
                    <div class="history-icon">
                        <img src="images/icons/croissance.png" alt="Croissance">
                    </div>

                    <div class="history-content">
                        <h4>{{ __('about.history.growth.title') }}</h4>
                        <p>{{ __('about.history.growth.desc') }}</p>
                    </div>

                    <span>2021</span>
                </div>

                <div class="history-item">
                    <div class="history-icon">
                        <img src="images/icons/aujourdhui.png" alt="Aujourd’hui">
                    </div>

                    <div class="history-content">
                        <h4>{{ __('about.history.today.title') }}</h4>
                        <p>{{ __('about.history.today.desc') }}</p>
                    </div>

                    <span>2025</span>
                </div>

            </div>

        </div>
    </div>

    <div class="clients-row">
        <div class="clients-text">
            <h2>{{ __('about.clients.title') }}</h2>
            <p>{{ __('about.clients.desc') }}</p>
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
    .about-hero {
        display: grid;
        grid-template-columns: 48% 52%;
        min-height: 380px;
        background: #eef1f6;
        overflow: hidden;
    }

    .about-left {
        padding: 55px 0 40px 110px;
        z-index: 2;
    }

    .about-left h1 {
        font-size: 42px;
        line-height: 1.05;
        color: #0b3168;
        font-weight: 900;
        margin: 0 0 22px;
    }

    .about-left h1::after {
        content: "";
        width: 45px;
        height: 3px;
        background: #ee1f3f;
        display: block;
        margin-top: 10px;
    }

    .about-left p {
        max-width: 430px;
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

    .about-right::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right,
                #eef1f6 0%,
                rgba(238, 241, 246, .80) 20%,
                rgba(238, 241, 246, .15) 45%,
                rgba(238, 241, 246, 0) 100%);
        z-index: 1;
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
        z-index: 3;
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


    html[dir="rtl"] .about-hero {
        display: grid;
        grid-template-columns: 52% 48%;
        direction: ltr;
    }

    html[dir="rtl"] .about-right {
        grid-column: 1;
        grid-row: 1;
        height: 380px;
    }

    html[dir="rtl"] .about-left {
        grid-column: 2;
        grid-row: 1;
        direction: rtl;
        text-align: right;
        padding: 55px 60px 0px 20px;
    }

    html[dir="rtl"] .about-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center left;
    }

    html[dir="rtl"] .mission-card {
        right: auto;
        left: 90px;
        bottom: -45px;
    }

    html[dir="rtl"] .about-right::before {
        background: linear-gradient(to left,
                #eef1f6 0%,
                rgba(238, 241, 246, .80) 18%,
                rgba(238, 241, 246, .25) 35%,
                rgba(238, 241, 246, 0) 55%) !important;
    }

    /* ddddddddddd **/
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
        padding: 70px 110px 10px;
        background: #fff;
    }



    .about-content h2 {
        color: #0b3168;
        font-size: 17px;
        font-weight: 900;
        margin-bottom: 18px;
    }

    .presentation-section {
        display: grid;
        grid-template-columns: 1fr 1.25fr;
        gap: 45px;
        align-items: center;
        padding: 55px 70px;
        background: #fff;
    }

    .presentation-text h2 {
        color: #003b84;
        font-size: 20px;
        font-weight: 900;
        margin: 0 0 20px;
        text-transform: uppercase;
        position: relative;
    }

    .presentation-text h2::after {
        content: "";
        width: 70px;
        height: 3px;
        background: #ef2146;
        position: absolute;
        bottom: -8px;
    }

    /* Français */
    html[dir="ltr"] .presentation-text h2::after,
    html[dir="ltr"] .clients-text h2::after,
    html[dir="ltr"] .history-section h2::after {
        left: 0;
    }

    /* العربية */
    html[dir="rtl"] .presentation-text h2::after,
    html[dir="rtl"] .clients-text h2::after,
    html[dir="rtl"] .history-section h2::after {
        right: 0;
    }

    .presentation-text p {
        color: #111;
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
        max-width: 620px;
    }

    .stats-boxes {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .stat-card {
        background: #fff;
        border-radius: 8px;
        padding: 24px 15px 20px;
        min-height: 170px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10);
    }

    .stat-icon {
        width: 54px;
        height: 54px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
    }

    .stat-icon.blue {
        background: #003b84;
    }

    .stat-icon.red {
        background: #ef2146;
    }

    .stat-icon i {
        color: #fff;
        font-size: 24px;
    }

    .stat-icon img {
        width: 26px;
        height: 26px;
        object-fit: contain;
        display: block;
    }

    .stat-card span {
        display: block;
        color: #111;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .stat-card strong {
        display: block;
        color: #003b84;
        font-size: 16px;
        line-height: 1.1;
        font-weight: 900;
    }

    .stat-card p {
        color: #111;
        font-size: 11px;
        line-height: 1.35;
        margin: 6px 0 0;
    }

    /* Responsive */
    @media(max-width:992px) {
        .presentation-section {
            grid-template-columns: 1fr;
            padding: 40px 25px;
        }

        .stats-boxes {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:576px) {
        .stats-boxes {
            grid-template-columns: 1fr;
        }
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

    .value-icon img {
        width: 24px;
        height: 24px;
        object-fit: contain;
        display: block;
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

    .clients-row {
        margin-top: 18px;
        display: grid;
        grid-template-columns: 260px 1fr;
        align-items: center;
        gap: 25px;
    }

    .clients-text h2 {
        color: #003b84;
        font-size: 15px;
        font-weight: 900;
        margin: 0 0 14px;
        position: relative;
    }

    .clients-text h2::after {
        content: "";
        width: 38px;
        height: 2px;
        background: #ef2146;
        position: absolute;
        bottom: -7px;
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
        gap: 22px 35px;
    }

    .clients-logos img {
        max-width: 90px;
        max-height: 38px;
        width: auto;
        height: auto;
        object-fit: contain;
        margin: auto;
        display: block;
    }

    @media(max-width:992px) {
        .clients-row {
            grid-template-columns: 1fr;
        }

        .clients-logos {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media(max-width:576px) {
        .clients-logos {
            grid-template-columns: repeat(2, 1fr);
            padding: 18px;
            gap: 22px;
        }

        .clients-logos img {
            max-width: 80px;
            max-height: 35px;
        }
    }


    .history-section {
        width: 100%;
        max-width: 1050px;
        overflow: hidden;
        box-sizing: border-box;
    }

    .history-section h2 {
        color: #003b84;
        font-size: 16px;
        font-weight: 900;
        margin: 0 0 45px;
        text-transform: uppercase;
        position: relative;
    }

    .history-section h2::after {
        content: "";
        position: absolute;
        bottom: -10px;
        width: 55px;
        height: 3px;
        background: #ef2146;
    }

    .history-timeline {
        position: relative;
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr;
        column-gap: 35px;
        align-items: flex-start;
    }

    .history-timeline::before {
        content: "";
        position: absolute;
        top: 27px;
        left: 55%;
        right: 14%;
        height: 1px;
        background: #d8dee8;
    }

    .history-item {
        position: relative;
        width: 100%;
        min-width: 0;
        z-index: 2;
    }

    .history-icon {
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: #003b84;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .history-icon img {
        width: 24px;
        height: 24px;
        object-fit: contain;
        display: block;
    }

    .history-icon::after {
        content: "";
        position: absolute;
        top: 54px;
        left: 50%;
        transform: translateX(-50%);
        width: 1px;
        height: 18px;
        background: #003b84;
    }

    .history-icon::before {
        content: "";
        position: absolute;
        top: 72px;
        left: 50%;
        transform: translateX(-50%);
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #003b84;
    }

    .history-content {
        position: absolute;
        top: 22px;
        left: 68px;
        width: 130px;
    }

    .history-content h4 {
        margin: 0 0 4px;
        font-size: 12px;
        font-weight: 900;
        color: #000;
    }

    .history-content p {
        margin: 0;
        font-size: 10px;
        line-height: 1.35;
        color: #000;
    }

    html[dir="rtl"] .history-timeline {
        direction: rtl;
    }

    html[dir="rtl"] .history-timeline::before {
        left: 12%;
        right: 58%;
    }

    html[dir="rtl"] .history-content {
        left: auto;
        right: 72px;
        text-align: right;
    }

    html[dir="rtl"] .history-item span {
        text-align: right;
    }

    html[dir="rtl"] .history-icon::after,
    html[dir="rtl"] .history-icon::before {
        left: auto;
        right: 50%;
        transform: translateX(50%);
    }

    .history-item span {
        display: block;
        margin-top: 45px;
        color: #003b84;
        font-size: 21px;
        font-weight: 900;
        line-height: 1;
    }

    @media(max-width:768px) {
        .history-timeline {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .history-timeline::before {
            display: none;
        }

        .history-content {
            position: absolute;
            left: 70px;
        }
    }


    @media (max-width: 992px) {
        .about-bottom {
            padding: 25px 20px;
        }

        .values-history {
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
    }
</style>
@endsection