@extends('layouts.app')

@section('title', __('videos.title'))

@section('content')

<section class="videos-hero">
    <div>
        <h1>Vidéos</h1>
        <p>Découvrez nos formations, interventions et moments forts en vidéo.</p>
    </div>
</section>

<section class="videos-page">

    <div class="videos-grid">

        <article class="video-card">
            <a href="{{ route('video.detail', 'formation-premiers-secours') }}" class="video-thumb">
                <img src="{{ asset('images/videos/video1.jpeg') }}" alt="">
                <span class="play-btn">
                    <i class="fa-solid fa-play"></i>
                </span>
            </a>
            <div class="video-info">
                <h3>Formation premiers secours</h3>
            </div>
        </article>

        <article class="video-card">
            <a href="{{ route('video.detail', 'transport-sanitaire') }}" class="video-thumb">
                <img src="{{ asset('images/videos/video2.jpeg') }}" alt="">
                <span class="play-btn">
                    <i class="fa-solid fa-play"></i>
                </span>
            </a>
            <div class="video-info">
                <h3>Assistance médicale urgente</h3>
            </div>
        </article>

        <article class="video-card">
            <a href="{{ route('video.detail', 'couverture-medicale') }}" class="video-thumb">
                <img src="{{ asset('images/videos/video3.jpeg') }}" alt="">
                <span class="play-btn">
                    <i class="fa-solid fa-play"></i>
                </span>
            </a>
            <div class="video-info">
                <h3>Couverture médicale</h3>
            </div>
        </article>

    </div>

    <div class="videos-pagination">
        <a class="active" href="#">1</a>
        <a href="#">→</a>
    </div>

</section>

<style>
    .videos-hero {
        background: linear-gradient(135deg, #f4f8ff, #ffffff);
        padding: 75px 20px;
        text-align: center;
    }

    .videos-hero span {
        color: #e71f3c;
        font-weight: 900;
        font-size: 13px;
        letter-spacing: 1px;
    }

    .videos-hero h1 {
        color: #0a2f67;
        font-size: 46px;
        font-weight: 900;
        margin: 10px 0;
    }

    .videos-hero p {
        color: #34445c;
        font-size: 17px;
    }

    .videos-page {
        padding: 45px 70px 70px;
        background: #fff;
    }

    .videos-filters {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 38px;
    }

    .videos-filters button {
        border: 1px solid #dce6f5;
        background: #fff;
        color: #0a2f67;
        padding: 11px 24px;
        border-radius: 9px;
        font-weight: 800;
        cursor: pointer;
    }

    .videos-filters button.active,
    .videos-filters button:hover {
        background: #0a2f67;
        color: #fff;
    }

    .videos-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 26px;
    }

    .video-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 28px rgba(10, 47, 103, .09);
    }

    .video-thumb {
        position: relative;
        display: block;
        overflow: hidden;
    }

    .video-thumb img {
        width: 100%;
        height: 235px;
        object-fit: cover;
        display: block;
        transition: .3s;
    }

    .video-thumb:hover .play-btn {
        transform: translate(-50%, -50%) scale(1.1);
        background: rgba(0, 0, 0, .35);
    }

    .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 70px;
        border: 2px solid rgba(255, 255, 255, .9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(3px);
        background: rgba(0, 0, 0, .20);
        transition: .3s;
    }

    .play-btn i {
        color: #fff;
        font-size: 28px;
        margin-left: 4px;
    }

    .video-info {
        padding: 22px;
    }

    .video-info small {
        color: #e71f3c;
        font-weight: 900;
        text-transform: uppercase;
    }

    .video-info h3 {
        color: #0a2f67;
        font-size: 17px;
        margin: 10px 0;
    }

    .video-info p {
        color: #34445c;
        font-size: 14px;
        line-height: 1.6;
    }

    .videos-pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 45px;
    }

    .videos-pagination a {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #f1f5fb;
        color: #0a2f67;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: 800;
    }

    .videos-pagination a.active,
    .videos-pagination a:hover {
        background: #0a2f67;
        color: #fff;
    }

    @media(max-width:992px) {
        .videos-page {
            padding: 40px 25px 60px;
        }

        .videos-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:576px) {
        .videos-hero h1 {
            font-size: 34px;
        }

        .videos-grid {
            grid-template-columns: 1fr;
        }

        .video-thumb img {
            height: 215px;
        }

        .videos-filters {
            justify-content: flex-start;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 8px;
        }

        .videos-filters button {
            white-space: nowrap;
        }
    }
</style>

@endsection