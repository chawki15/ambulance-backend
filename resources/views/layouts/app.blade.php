<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v=10">
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
            font-family: 'Montserrat', sans-serif;
            color: var(--text);
            background-color: #f7f8fb;
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


        .nav-dropdown {
            position: relative;
            display: flex;
            align-items: center;
            min-height: 46px;
        }

        .nav-dropdown>a {
            min-height: 46px;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: #1d2430;
            font-size: 13px;
            font-weight: 700;
        }

        .nav-dropdown>a:hover {
            color: #153a75;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 175px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 14px 34px rgba(10, 47, 103, .16);
            padding: 10px 0;
            display: none;
            z-index: 9999;
        }

        .dropdown-menu a {
            display: block;
            padding: 11px 18px;
            color: #153a75;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .dropdown-menu a:hover {
            background: #f4f8ff;
            color: #e71f3c;
        }

        .nav-dropdown:hover .dropdown-menu {
            display: block;
        }

        html[dir="rtl"] .dropdown-menu {
            left: auto;
            right: 0;
        }

        .mobile-dropdown {
            margin: 7px 7px;
            padding: 0;
        }

        .mobile-dropdown summary {
            list-style: none;
            cursor: pointer;
            color: #1d2f55;
            font-size: 17px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .mobile-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .mobile-dropdown summary::after {
            content: "⌄";
            font-size: 26px;
            font-weight: 900;
            transition: .2s;
        }

        .mobile-dropdown[open] summary::after {
            transform: rotate(180deg);
        }

        .mobile-dropdown a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 22px 11px 35px;
            color: #1d2f55;
            text-decoration: none;
            font-size: 17px;
            font-weight: 700;
        }

        .mobile-dropdown a::before {
            content: "•";
            color: #e71f3c;
            font-size: 22px;
        }

        .mobile-dropdown a:last-child {
            padding-bottom: 18px;
        }

        html[dir="rtl"] .mobile-dropdown a {
            padding: 10px 18px 0 0;
        }

        @media (max-width: 1200px) {
            .yanis-menu {
                gap: 20px;
            }

            .yanis-phone {
                display: none;
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


        /* 55555555555 */

        /* HERO DESKTOP */
        .hero-new {
            position: relative;
            min-height: 420px;
            overflow: hidden;
            background: #f4f8ff;
        }

        .hero-new-slide {
            display: none;
            min-height: 420px;
            position: relative;
            padding: 55px 65px;
            background-size: cover;
            background-position: center;
        }

        .hero-new-slide.active {
            display: block;
        }

        .hero-new-image {
            display: none;
        }

        .hero-new-content {
            max-width: 620px;
            position: relative;
            z-index: 2;
        }

        .hero-new-content h1 {
            font-size: 42px;
            line-height: 1.05;
            color: #0a2f67;
            font-weight: 900;
            margin: 0 0 14px;
            text-transform: uppercase;
        }

        .hero-new-lead {
            font-size: 26px;
            color: #0a2f67;
            font-weight: 800;
            margin: 0 0 18px;
            text-transform: uppercase;
        }

        .hero-new-desc {
            font-size: 18px;
            line-height: 1.6;
            color: #26364d;
            background: rgba(255, 255, 255, .65);
            padding: 14px 18px;
            border-radius: 8px;
            max-width: 600px;
        }

        .hero-dots {
            position: absolute;
            left: 50%;
            bottom: 34px;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .hero-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid #0a2f67;
            background: #fff;
            cursor: pointer;
        }

        .hero-dot.active {
            background: #0a2f67;
        }

        /* HERO MOBILE */
        @media(max-width:768px) {
            .hero-new {
                background: #f4f8ff;
                min-height: auto;
            }

            .hero-new-slide {
                display: none;
                min-height: auto;
                padding: 16px 18px 70px;
                text-align: center;
                background-image: none !important;
            }

            .hero-new-slide.active {
                display: block;
            }

            .hero-new-image {
                display: block;
                margin-bottom: 10px;
            }

            .hero-new-image img {
                width: 100%;
                max-height: 145px;
                object-fit: contain;
                display: block;
                margin: auto;
            }

            .hero-new-content {
                max-width: 100%;
            }

            .hero-new-content h1 {
                font-size: 38px;
                line-height: 1.15;
                letter-spacing: 3px;
                margin-bottom: 14px;
            }

            .hero-new-lead {
                font-size: 22px;
                line-height: 1.3;
                letter-spacing: 1.5px;
                margin-bottom: 20px;
            }

            .hero-new-desc {
                font-size: 17px;
                line-height: 1.7;
                background: #fff;
                border-radius: 18px;
                padding: 20px 18px;
                margin: 0 auto;
                max-width: 92%;
                box-shadow: 0 10px 25px rgba(10, 47, 103, .08);
            }

            .hero-dots {
                bottom: 28px;
            }
        }



        /* 55555555555 */


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
            font-family: 'Montserrat', sans-serif;
        }

        .footer-inner {
            margin: auto;
            display: grid;
            grid-template-columns: 280px 160px 160px 260px 180px;
            gap: 35px;
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

        @media (max-width: 768px) {

            .yanis-footer {
                padding: 28px 18px 14px;
            }

            .footer-inner {
                max-width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 22px 18px;
                padding: 0;
            }

            .footer-logo {
                grid-column: 1 / -1;
            }

            .footer-logo img {
                width: 150px;
            }

            .footer-col,
            .footer-social {
                border-left: 0;
                padding-left: 0;
                min-height: auto;
            }

            .footer-col h4,
            .footer-social h4 {
                font-size: 13px;
                margin-bottom: 8px;
            }

            .footer-col a,
            .footer-col p {
                font-size: 11px;
                line-height: 1.45;
                word-break: break-word;
            }

            .contact {
                grid-column: 1 / -1;
            }

            .footer-social {
                grid-column: 1 / -1;
            }

            .social-icons {
                flex-wrap: wrap;
            }

            .footer-bottom {
                max-width: 100%;
                padding-top: 12px;
                margin-top: 18px;
                flex-direction: column;
                text-align: center;
                gap: 8px;
                font-size: 11px;
            }
        }

        @media (max-width: 420px) {

            .footer-inner {
                grid-template-columns: 1fr;
            }

            .footer-logo img {
                width: 135px;
            }
        }


        @media (max-width:576px) {

            .stats {
                grid-template-columns: 1fr !important;
                gap: 12px;
                margin-top: -20px;
                padding: 0 12px;
            }

            .card {
                padding: 14px;
                min-height: auto;
            }

            .n {
                font-size: 30px;
            }
        }

        @media (max-width:1100px) {
            .menu {
                display: none
            }

            .phone {
                display: none
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
            padding: 45px 16px 30px;
            background: #f7f8fb;
            overflow: hidden;
        }

        .services-title {
            text-align: center;
            font-size: 32px;
            font-weight: 900;
            color: #113d7a;
            margin: 0 0 45px;
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
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .service-card {
            background: #fff;
            border-radius: 18px;
            padding: 18px;
            border: 1px solid #edf0f6;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 150px;
            overflow: hidden;
        }

        .service-top {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .service-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-icon img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            display: block;
        }

        .service-content h3 {
            margin: 0 0 7px;
            font-size: 14px;
            line-height: 1.2;
            color: #153a75;
            font-weight: 900;
            text-transform: uppercase;
        }

        .service-content p {
            margin: 0;
            color: #5d6472;
            font-size: 12px;
            line-height: 1.45;
            font-weight: 500;
        }

        .service-arrow {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .service-arrow i {
            font-size: 13px;
            color: #153a75;
        }

        /* Tablet */
        @media(max-width:992px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Portable */
        @media(max-width:576px) {
            .services-section {
                padding: 35px 14px 25px;
            }

            .services-title {
                font-size: 24px;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .service-card {
                border-radius: 14px;
                padding: 16px;
                min-height: auto;
            }
        }

        .blanc {
            border: 2px solid #f1f3f0;
        }

        .rauge {
            background-color: #ffeff0;
        }

        .voile {
            background-color: #f4f3fb;
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
            direction: ltr;
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

        .footer-mobile {
            background: #062b5f;
            color: #fff;
            padding: 30px 20px;
            text-align: center;
        }

        .footer-section h4,
        .footer-contact h4,
        .footer-social h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #fff;
        }

        .footer-section a {
            display: block;
            color: #dbe8ff;
            text-decoration: none;
            margin: 10px 0;
            font-size: 16px;
        }

        .footer-section a:hover {
            color: #fff;
        }

        .footer-contact p {
            color: #dbe8ff;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .footer-phone {
            display: inline-block;
            background: #e91f3f;
            color: #fff;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .footer-copy {
            border-top: 1px solid rgba(255, 255, 255, .15);
            padding-top: 20px;
            color: #dbe8ff;
            font-size: 14px;
        }

        .footer-mobile {
            display: none;
        }

        @media(max-width:768px) {
            .yanis-footer {
                display: none !important;
            }

            .footer-mobile {
                display: block !important;
            }
        }

        @media(min-width:769px) {
            .footer-mobile {
                display: none !important;
            }

            .yanis-footer {
                display: block !important;
            }
        }

        html[dir="rtl"] .footer-mobile {
            direction: rtl;
        }

        html[dir="ltr"] .footer-mobile {
            direction: ltr;
        }
    </style>
</head>

<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</body>

</html>