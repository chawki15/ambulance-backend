@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')

@include('partials.services.hero')

@include('partials.services.cards')

@include('partials.services.bottom')
<style>
    .section-title {
        text-align: center;
        color: #0b3168;
        font-size: 34px;
        font-weight: 900;
        margin-bottom: 40px;
        position: relative;
    }

    .section-title::after {
        content: "";
        width: 55px;
        height: 4px;
        background: #ef2345;
        position: absolute;
        left: 50%;
        bottom: -12px;
        transform: translateX(-50%);
        border-radius: 20px;
    }

    /* =========================================================
    HERO SERVICES
    ========================================================= */
    .services-hero {
        width: 100%;
        min-height: 310px;
        display: grid;
        grid-template-columns: 52% 48%;
        background: #eef1f6;
        overflow: hidden;
    }

    .services-left {
        padding: 45px 0 35px 90px;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .mini-title {
        color: #0b3168;
        font-size: 11px;
        font-weight: 900;
        margin-bottom: 12px;
        position: relative;
    }

    .mini-title::after {
        content: "";
        width: 40px;
        height: 3px;
        background: #ef2345;
        display: block;
        margin-top: 6px;
    }

    .services-left h1 {
        font-size: 32px;
        line-height: 1.15;
        color: #0b3168;
        margin: 0 0 18px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .services-left p {
        font-size: 13px;
        line-height: 1.7;
        color: #111;
        max-width: 620px;
        margin: 0;
    }

    .services-right {
        position: relative;
        height: 310px;
    }

    .services-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center right;
        display: block;
    }

    .services-fr .services-right::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 260px;
        height: 100%;
        background: linear-gradient(to right,
                #eef1f6 0%,
                rgba(238, 241, 246, .85) 45%,
                rgba(238, 241, 246, 0) 100%);
        z-index: 2;
    }

    /* العربية */
    .services-ar {
        grid-template-columns: 52% 48%;
    }

    .services-ar .services-left {
        direction: rtl;
        text-align: right;
        padding: 45px 90px 35px 30px;
    }

    .services-ar .mini-title::after {
        margin-right: 0;
        margin-left: auto;
    }

    .services-ar .services-right img {
        object-position: center left;
    }

    .services-ar .services-right::before {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        width: 260px;
        height: 100%;
        background: linear-gradient(to left,
                #eef1f6 0%,
                rgba(238, 241, 246, .85) 45%,
                rgba(238, 241, 246, 0) 100%);
        z-index: 2;
    }

    .services-ar {
        direction: ltr !important;
    }

    /* Portable */
    @media(max-width:768px) {

        .services-hero,
        .services-ar {
            grid-template-columns: 1fr;
        }

        .services-left,
        .services-ar .services-left {
            padding: 35px 25px;
        }

        .services-left h1 {
            font-size: 26px;
        }

        .services-right {
            height: 230px;
        }
    }

    /* =========================================================
    EXPERTISE SECTION
    ========================================================= */

    .expertise-section {
        padding: 60px 0;
        background: #fff;
    }

    .expertise-grid {
        max-width: 1450px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
    }

    .expertise-card {
        background: #fff;
        border: 1px solid #edf1f7;
        border-radius: 18px;
        padding: 15px 10px;
        transition: .25s;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .03);
    }

    .expertise-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, .08);
    }

    .expertise-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
    }



    .expertise-icon img {
        width: 36px;
        height: 36px;
        object-fit: contain;
        display: block;
    }

    .blue {
        background: #eef4ff;
        color: #0b3d91;
    }

    .red {
        background: #fff1f4;
        color: #ef2345;
    }

    .purple {
        background: #f4efff;
        color: #6942c8;
    }

    .green {
        background: #edf9f6;
        color: #17896d;
    }

    .orange {
        background: #fff4eb;
        color: #ff7a00;
    }

    .expertise-card h3 {
        color: #0b3168;
        font-size: 13px;
        line-height: 1.3;
        font-weight: 800;
        text-transform: uppercase;
    }

    .expertise-card p {
        color: #4b5970;
        font-size: 12px;
        line-height: 1.7;
        margin-bottom: 18px;
    }

    .expertise-card ul {
        padding-left: 18px;
        margin: 0 0 24px;
    }

    .expertise-card ul li {
        font-size: 13px;
        color: #24344d;
        margin-bottom: 8px;
    }

    .expertise-card a {
        height: 40px;
        border-radius: 10px;
        border: 1px solid #d9e2ef;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 18px;
        color: #0b3168;
        font-size: 13px;
        font-weight: 800;
        transition: .2s;
    }

    .expertise-card a:hover {
        background: #0b3168;
        color: #fff;
    }

    /* =========================================================
    SERVICES BOTTOM
    ========================================================= */

    .assist-wrapper {
        width: 100%;
        background: #fff;
        padding: 18px 0;
    }

    .assist-banner {
        width: calc(100% - 160px);
        max-width: 1120px;
        margin: 0 auto;
        background: #e5eaf7;
        border-radius: 8px;
        display: grid;
        grid-template-columns: 330px 420px 320px;
        align-items: center;
        padding: 16px 22px;
        gap: 22px;
        box-sizing: border-box;

        margin-bottom: 5px;
    }

    .assist-call,
    .asssist-why {
        border-right: 1px solid #d5ddea;
    }

    .assist-call {
        display: flex;
        align-items: center;
        gap: 18px;
        padding-right: 20px;
    }

    .assist-call img {
        width: 105px;
        height: 105px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        display: block;
    }

    .assist-banner h3 {
        margin: 0 0 12px;
        color: #003b84;
        font-size: 13px;
        line-height: 1.25;
        font-weight: 900;
    }

    .assist-call p {
        margin: 0 0 10px;
        color: #111;
        font-size: 11px;
        line-height: 1.45;
    }

    .assist-call a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #ef2146;
        color: #fff;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 900;
    }

    .asssist-why {
        padding: 0 20px;
    }

    .why-list {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
        text-align: center;
    }

    .why-list span {
        width: 44px;
        height: 44px;
        margin: 0 auto 9px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .why-list i {
        color: #003b84;
        font-size: 21px;
    }

    .why-list p {
        margin: 0;
        color: #111;
        font-size: 9px;
        line-height: 1.25;
        font-weight: 700;
    }

    .assist-zone {
        width: 320px;
    }

    .zone-content {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .zone-content img {
        width: 105px;
        height: auto;
        flex-shrink: 0;
        display: block;
    }

    .zone-content strong {
        display: block;
        color: #003b84;
        font-size: 10px;
        font-weight: 900;
        margin-bottom: 3px;
    }

    .zone-content p {
        margin: 0 0 5px;
        color: #111;
        font-size: 9px;
        line-height: 1.25;
    }

    .zone-content a {
        display: inline-block;
        margin-top: 3px;
        padding: 5px 16px;
        border: 1px solid #9eb0c7;
        border-radius: 5px;
        color: #003b84;
        text-decoration: none;
        font-size: 9px;
        font-weight: 800;
    }

    html[dir="rtl"] .assist-banner {
        direction: rtl;
        grid-template-columns: 330px 420px 330px;
    }

    html[dir="rtl"] .assist-call,
    html[dir="rtl"] .assist-why {
        border: 0 !important;
    }

    html[dir="rtl"] .assist-call::before,
    html[dir="rtl"] .assist-why::before {
        display: none !important;
    }

    html[dir="rtl"] .assist-why {
        position: relative;
    }

    html[dir="rtl"] .assist-why::after {
        content: "";
        position: absolute;
        right: -11px;
        top: 10px;
        bottom: 10px;
        width: 1px;
        background: #d5ddea;
    }

    html[dir="rtl"] .assist-zone {
        position: relative;
    }

    html[dir="rtl"] .assist-zone::after {
        content: "";
        position: absolute;
        right: -11px;
        top: 10px;
        bottom: 10px;
        width: 1px;
        background: #d5ddea;
    }


    @media (max-width: 768px) {

        .assist-banner {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 12px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
            border-radius: 0;
        }

        .assist-call,
        .asssist-why,
        .assist-zone {
            width: 100%;
            border-right: 0;
            padding: 16px;
            background: #e5eaf7;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .assist-call {
            flex-direction: row;
            gap: 14px;
        }

        .assist-call img {
            width: 90px;
            height: 90px;
        }

        .why-list {
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .zone-content {
            flex-direction: row;
        }

        .zone-content img {
            width: 95px;
        }

        html[dir="rtl"] .assist-banner {
            grid-template-columns: 1fr;
        }

        html[dir="rtl"] .assist-zone::after,
        html[dir="rtl"] .assist-why::after {
            display: none;
        }
    }

    /* =========================================================
    RESPONSIVE
    ========================================================= */

    @media(max-width:1400px) {

        .expertise-grid {
            grid-template-columns: repeat(6, 1fr);
        }

    }

    @media(max-width:992px) {

        .services-hero {
            grid-template-columns: 1fr;
        }

        .services-left {
            padding: 40px 20px;
        }

        .services-left h1 {
            font-size: 34px;
        }

        .services-bottom {
            grid-template-columns: 1fr;
            margin: 40px 20px;
        }

        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .expertise-grid {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    @media(max-width:768px) {

        .expertise-grid {
            grid-template-columns: 1fr;
            padding: 0 20px;
        }

        .section-title {
            font-size: 28px;
        }

        .why-grid {
            grid-template-columns: 1fr;
        }

    }
</style>

@endsection