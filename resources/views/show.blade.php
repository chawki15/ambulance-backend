@extends('layouts.app')

@section('title', 'Détail vidéo')

@section('content')

<section class="video-detail-page container">

    <div class="video-player">
        <iframe
            src="https://www.youtube.com/embed/K64ECGVXoxE"
            title="Yanis Assistance Video"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>

    <div class="video-detail-content">
        <h1>Formation premiers secours</h1>

        <p>
            Découvrez les gestes essentiels de premiers secours avec Yanis Assistance.
            Cette vidéo présente les bonnes pratiques à adopter en situation d’urgence.
        </p>
    </div>

</section>

<style>
    .video-detail-page {
        padding: 60px 18px;
    }

    .video-player {
        background: #000;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(10, 47, 103, .12);
    }

    .video-player iframe {
        width: 100%;
        height: 520px;
        display: block;
    }

    .video-detail-content {
        max-width: 850px;
        margin: 35px auto 0;
        text-align: center;
    }

    .video-detail-content span {
        color: #e71f3c;
        font-weight: 900;
        text-transform: uppercase;
    }

    .video-detail-content h1 {
        color: #0a2f67;
        font-size: 38px;
        font-weight: 900;
        margin: 12px 0;
    }

    .video-detail-content p {
        color: #26364d;
        font-size: 17px;
        line-height: 1.8;
    }

    .video-detail-btn {
        display: inline-block;
        margin-top: 20px;
        background: #e71f3c;
        color: #fff;
        padding: 14px 28px;
        border-radius: 9px;
        text-decoration: none;
        font-weight: 800;
    }

    @media(max-width:768px) {
        .video-player iframe {
            height: 240px;
        }

        .video-detail-content h1 {
            font-size: 28px;
        }
    }
</style>

@endsection