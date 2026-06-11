@extends('layouts.app')

@section('title', 'Actualités')

@section('content')

<section class="news-page">
    <div class="news-header">
        <h1>Actualités</h1>
        <p>Restez informé de toutes nos actualités, événements et initiatives.</p>
    </div>

    @php
    $news = [
    ['slug'=>'journee-sensibilisation', 'img'=>'images/news/news1.jpeg', 'date'=>'04 Juin 2026', 'title'=>'Marrakech accueille la 17ème édition du Congrès du Forum National des Médecins'],
    ];
    @endphp

    <div class="news-grid">
        @foreach($news as $item)
        <article class="news-card">
            <a href="{{ route('news.detail', $item['slug']) }}" class="news-img">
                <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}">
            </a>

            <div class="news-content">
                <small>{{ $item['date'] }}</small>
                <h3>{{ $item['title'] }}</h3>

                <a href="{{ route('news.detail', $item['slug']) }}" class="read-more">
                    Lire la suite →
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <div class="news-pagination">
        <a href="#">‹</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <span>...</span>
        <a href="#">6</a>
        <a href="#">›</a>
    </div>
</section>

<style>
    .news-page {
        padding: 50px 70px 70px;
        background: #fff;
    }

    .news-header h1 {
        color: #0a2f67;
        font-size: 38px;
        font-weight: 900;
        margin: 0;
    }

    .news-header h1::after {
        content: "";
        width: 45px;
        height: 3px;
        background: #e71f3c;
        display: block;
        margin-top: 10px;
    }

    .news-header p {
        color: #34445c;
        margin-top: 14px;
    }

    .news-grid {
        margin-top: 40px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 28px;
    }

    .news-card {
        background: #fff;
        border: 1px solid #e6edf6;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(10, 47, 103, .07);
    }

    .news-img {
        position: relative;
        display: block;
        height: 210px;
        overflow: hidden;
    }

    .news-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .3s;
    }

    .news-card:hover .news-img img {
        transform: scale(1.05);
    }

    .news-img span {
        position: absolute;
        top: 14px;
        left: 14px;
        background: #e71f3c;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 800;
    }

    .news-content {
        padding: 20px;
    }

    .news-content small {
        color: #71809a;
        font-size: 12px;
    }

    .news-content h3 {
        color: #0a2f67;
        font-size: 18px;
        line-height: 1.35;
        margin: 10px 0;
    }

    .news-content p {
        color: #34445c;
        font-size: 14px;
        line-height: 1.65;
    }

    .read-more {
        display: inline-block;
        margin-top: 10px;
        color: #0a2f67;
        font-weight: 800;
        font-size: 14px;
        text-decoration: none;
    }

    .news-pagination {
        margin-top: 45px;
        display: flex;
        justify-content: center;
        gap: 9px;
        align-items: center;
    }

    .news-pagination a,
    .news-pagination span {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #f2f5fa;
        color: #0a2f67;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: 800;
    }

    .news-pagination a.active,
    .news-pagination a:hover {
        background: #e71f3c;
        color: #fff;
    }

    @media(max-width:992px) {
        .news-page {
            padding: 40px 25px 60px;
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:576px) {
        .news-page {
            padding: 35px 18px 55px;
        }

        .news-header h1 {
            font-size: 30px;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .news-img {
            height: 200px;
        }
    }
</style>

@endsection