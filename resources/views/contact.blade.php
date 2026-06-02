@extends('layouts.app')

@section('content')

<section class="contactt">
    <h1>{{ __('contact.title') }}</h1>
    <p>{{ __('contact.subtitle') }}</p>

    <div class="cards">
        <div class="card">📍<span>Lotissement Addoha 2 Imm B 5 N° 3 Sidi Moumen Aljadid / Casablanca</span></div>
        <div class="card">📞<span>0522 123 456</span></div>
        <div class="card">✉️<span> contact@yanis-assistance.ma</span></div>
    </div>

    <div class="content">
        <form>
            <h2>{{ __('contact.form_title') }}</h2>

            <input type="text" placeholder="{{ __('contact.name') }}">

            <div class="row">
                <input type="text" placeholder="{{ __('contact.phone') }}">
                <input type="email" placeholder="{{ __('contact.email') }}">
            </div>

            <input type="text" placeholder="{{ __('contact.subject') }}">
            <textarea placeholder="{{ __('contact.message') }}"></textarea>

            <button>{{ __('contact.send') }}</button>
        </form>

        <div class="map">
            <h2>{{ __('contact.map_title') }}</h2>
            <iframe src="https://www.google.com/maps?q=Casablanca%20Morocco&output=embed"></iframe>
        </div>
    </div>
</section>

<style>
    .contactt {
        max-width: 1200px;
        margin: auto;
        padding: 45px 24px;
        background: #f7f9fd;
    }

    .contactt h1 {
        color: #073b7a;
        font-size: 34px;
        font-weight: 900;
        margin: 0 0 10px;
        text-align: center;
    }

    .contactt>p {
        color: #4b5970;
        font-size: 15px;
        line-height: 1.7;
        margin: 0 0 28px;
        text-align: center;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 24px;
    }

    .card h3 {
        margin: 10px 0 6px;
        font-size: 15px;
        color: #073b7a;
        font-weight: 900;
    }

    .card span {
        font-size: 13px;
        color: #666;
    }

    .content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    form,
    .map {
        background: #fff;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
    }

    form h2,
    .map h2 {
        color: #073b7a;
        font-size: 22px;
        font-weight: 900;
        margin: 0 0 18px;
    }

    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    input,
    textarea {
        width: 100%;
        padding: 13px 14px;
        margin-bottom: 12px;
        border: 1px solid #dde5ef;
        border-radius: 9px;
        outline: none;
        font-size: 14px;
        color: #111;
        background: #fff;
    }

    textarea {
        height: 130px;
        resize: none;
    }

    button {
        width: 100%;
        padding: 14px;
        border: 0;
        border-radius: 9px;
        background: #073b7a;
        color: #fff;
        font-weight: 900;
        cursor: pointer;
        font-size: 15px;
    }

    iframe {
        width: 100%;
        height: 310px;
        border: 0;
        border-radius: 12px;
    }

    /* French */
    html[dir="ltr"] .contactt {
        direction: ltr;
        text-align: left;
    }

    /* Arabic */
    html[dir="rtl"] .contactt {
        direction: rtl;
        text-align: right;
    }

    html[dir="rtl"] input,
    html[dir="rtl"] textarea {
        text-align: right;
    }

    html[dir="ltr"] input,
    html[dir="ltr"] textarea {
        text-align: left;
    }

    @media(max-width:900px) {
        .cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .content {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:576px) {
        .contactt {
            padding: 35px 16px;
        }

        .contactt h1 {
            font-size: 26px;
        }

        .cards,
        .row {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection