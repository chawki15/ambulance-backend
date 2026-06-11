@extends('layouts.app')

@section('title', 'Détail Galerie')

@section('content')

@php
$photos = [
'formation-secourisme' => [
'img'=>'images/gallery/photo1.jpeg',
'title'=>'Formation Secourisme en milieu professionnel',
'date'=>'Casablanca - 15 Juin 2025',
'count'=>'1 / 8'
],
'transport-sanitaire' => [
'img'=>'images/gallery/photo2.jpeg',
'title'=>'Transport sanitaire',
'date'=>'Casablanca - 10 Juin 2025',
'count'=>'2 / 8'
],
'intervention-medicale' => [
'img'=>'images/gallery/photo3.jpeg',
'title'=>'Intervention médicale',
'date'=>'Casablanca - 08 Juin 2025',
'count'=>'3 / 8'
],
];

$keys = array_keys($photos);
$currentIndex = array_search($slug, $keys);

if ($currentIndex === false) {
$currentIndex = 0;
$slug = $keys[0];
}

$photo = $photos[$slug];

$prevSlug = $keys[($currentIndex - 1 + count($keys)) % count($keys)];
$nextSlug = $keys[($currentIndex + 1) % count($keys)];
@endphp

<section class="gallery-detail">

    <a href="{{ route('galeries') }}" class="gallery-close">×</a>

    <div class="gallery-count">{{ $currentIndex + 1 }} / {{ count($photos) }}</div>

    <a href="{{ route('galeries.detail', $prevSlug) }}" class="gallery-arrow left">‹</a>

    <div class="gallery-detail-content">
        <img src="{{ asset($photo['img']) }}" alt="{{ $photo['title'] }}">

        <div class="gallery-caption">
            <h1>{{ $photo['title'] }}</h1>
            <p>{{ $photo['date'] }}</p>
        </div>
    </div>

    <a href="{{ route('galeries.detail', $nextSlug) }}" class="gallery-arrow right">›</a>

</section>

<style>
    .gallery-detail {
        min-height: calc(100vh - 100px);
        background: rgba(15, 23, 32, .96);
        padding: 55px 70px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-detail-content {
        width: 100%;
        max-width: 980px;
    }

    .gallery-detail-content img {
        width: 100%;
        max-height: 68vh;
        object-fit: contain;
        display: block;
        border-radius: 8px;
        background: #111;
    }

    .gallery-caption {
        color: #fff;
        margin-top: 18px;
    }

    .gallery-caption h1 {
        color: #fff;
        font-size: 22px;
        margin: 0 0 6px;
    }

    .gallery-caption p {
        color: #cbd5e1;
        margin: 0;
    }

    .gallery-close {
        position: absolute;
        top: 28px;
        left: 35px;
        color: #fff;
        font-size: 38px;
        text-decoration: none;
        z-index: 5;
    }

    .gallery-count {
        position: absolute;
        top: 38px;
        right: 40px;
        color: #fff;
        font-size: 16px;
        z-index: 5;
    }

    .gallery-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .14);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 42px;
    }

    .gallery-arrow.left {
        left: 55px;
    }

    .gallery-arrow.right {
        right: 55px;
    }

    .gallery-arrow:hover {
        background: rgba(255, 255, 255, .28);
    }

    @media(max-width:768px) {
        .gallery-detail {
            padding: 70px 18px 35px;
            align-items: flex-start;
        }

        .gallery-detail-content img {
            max-height: 52vh;
        }

        .gallery-close {
            top: 20px;
            left: 22px;
            font-size: 34px;
        }

        .gallery-count {
            top: 30px;
            right: 22px;
        }

        .gallery-arrow {
            width: 42px;
            height: 42px;
            font-size: 32px;
            top: 42%;
        }

        .gallery-arrow.left {
            left: 20px;
        }

        .gallery-arrow.right {
            right: 20px;
        }

        .gallery-caption h1 {
            font-size: 17px;
        }
    }
</style>

@endsection