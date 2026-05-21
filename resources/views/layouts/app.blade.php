<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">

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

            .yanis-phone,
            .yanis-actions .urgent-btn,
            .yanis-actions .lang-switch {
                display: none;
            }

            .mobile-toggle {
                display: inline-flex;
            }

            .yanis-navbar {
                display: grid;
                grid-template-columns: 42px 1fr 42px;
                align-items: center;
                padding: 10px 14px;
                direction: ltr;
                gap: 8px;
            }

            [dir="rtl"] .yanis-navbar {
                direction: ltr;
            }

            .yanis-logo {
                justify-self: center;
            }

            .yanis-logo img {
                height: 50px;
                max-width: 170px;
            }

            .mobile-spacer {
                display: block;
                width: 42px;
                height: 42px;
            }

            .yanis-actions {
                display: none;
            }

            .mobile-menu-card {
                min-height: auto;
                max-width: 390px;
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

        .mobile-spacer {
            display: none;
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

        [dir="rtl"] .yanis-navbar {
            direction: rtl;
        }

        [dir="rtl"] .yanis-menu {
            justify-content: center;
        }

        [dir="rtl"] .yanis-actions {
            direction: rtl;
        }

        [dir="rtl"] .yanis-phone {
            direction: rtl;
            text-align: right;
        }

        [dir="rtl"] .phone-circle i {
            transform: translate(-10px, 8px) rotate(-8deg);
        }

        [dir="rtl"] .urgent-btn {
            flex-direction: row-reverse;
        }

        [dir="rtl"] .lang-switch {
            direction: ltr;
        }



        .mobile-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid #dbe4f3;
            background: #fff;
            color: #153a75;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .mobile-menu {
            position: fixed;
            inset: 0;
            background: rgba(9, 23, 52, .25);
            z-index: 200;
            display: none;
            padding: 14px;
        }

        .mobile-menu.show {
            display: block;
        }

        .mobile-menu-card {
            background: #fff;
            border-radius: 16px;
            max-width: 360px;
            width: 100%;
            min-height: calc(100vh - 28px);
            padding: 16px;
            box-shadow: 0 10px 24px rgba(10, 47, 103, .14);
        }

        .mobile-close {
            background: transparent;
            border: 0;
            font-size: 22px;
            color: #22355a;
        }

        .mobile-brand img {
            height: 52px;
            margin: 6px 0 12px;
        }

        .mobile-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 8px 0 20px;
        }

        .mobile-links a {
            text-decoration: none;
            color: #1d2f55;
            font-weight: 700;
            padding: 8px 6px;
            border-radius: 8px;
        }

        .mobile-links a.active {
            color: #e91f3f;
            background: #fff4f6;
        }

        .mobile-urgent-btn {
            display: flex;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            background: #e91f3f;
            color: #fff;
            font-weight: 700;
            padding: 12px;
            border-radius: 10px;
        }

        .mobile-lang-switch {
            margin-top: 16px;
            text-align: center;
            font-weight: 800;
        }

        .mobile-lang-switch a {
            text-decoration: none;
            color: #1d2f55;
        }

        .mobile-lang-switch a.active {
            color: #153a75;
        }

        [dir="rtl"] .mobile-menu-card {
            margin-left: auto;
            text-align: right;
        }

        [dir="rtl"] .mobile-close {
            display: block;
            margin-right: 0;
            margin-left: auto;
        }
    </style>
</head>

<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</body>

</html>