@extends('layouts.app')

@section('content')

<section class="contactt" dir="rtl">
    <h1>إتصل بنا</h1>
    <p>نحن هنا لمساعدتك. تواصل معنا بأي وقت</p>

    <div class="cards">
        <div class="card">📍<h3>العنوان</h3><span>Lotissement Addoha 2</span></div>
        <div class="card">🕒<h3>أوقات العمل</h3><span>9 صباحا - 6 مساء</span></div>
        <div class="card">📞<h3>الهاتف</h3><span>456 123 352</span></div>
        <div class="card">✉️<h3>البريد الإلكتروني</h3><span>contact@domain.ma</span></div>
    </div>

    <div class="content">
        <form>
            <h2>أرسل لنا رسالة</h2>
            <input type="text" placeholder="الإسم الكامل">
            <div class="row">
                <input type="text" placeholder="رقم الهاتف">
                <input type="email" placeholder="البريد الإلكتروني">
            </div>
            <input type="text" placeholder="الموضوع">
            <textarea placeholder="اكتب رسالتك هنا..."></textarea>
            <button>إرسال رسالة</button>
        </form>

        <div class="map">
            <h2>موقعنا على الخريطة</h2>
            <iframe
                src="https://www.google.com/maps?q=Casablanca%20Morocco&output=embed">
            </iframe>
        </div>
    </div>
</section>

<style>
    .contactt {
        max-width: 1200px;
        margin: auto;
        padding: 40px 24px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 22px;
    }

    .card {
        background: #fff;
        padding: 18px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
    }

    .card h3 {
        margin: 8px 0 5px;
        font-size: 15px;
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
        padding: 22px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
    }



    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    input,
    textarea {
        width: 100%;
        padding: 13px;
        margin-bottom: 12px;
        border: 1px solid #dde5ef;
        border-radius: 7px;
        outline: none;
    }

    textarea {
        height: 130px;
        resize: none;
    }

    button {
        width: 100%;
        padding: 13px;
        border: 0;
        border-radius: 7px;
        background: #073b7a;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }

    iframe {
        width: 100%;
        height: 310px;
        border: 0;
        border-radius: 10px;
    }

    @media (max-width: 800px) {

        .cards,
        .content,
        .row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection