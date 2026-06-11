@extends('layouts.app')

@section('title', 'Galerie Photo')

@section('content')

<section class="gallery-page">

    <div class="gallery-header">
        <h1>GALERIE PHOTO</h1>
        <p>Découvrez nos moments forts en images.</p>
    </div>

    <div class="gallery-filters">
        <button class="active">Toutes</button>
        <button>Formations</button>
        <button>Interventions</button>
        <button>Événements</button>
        <button>Équipements</button>
    </div>

    <div class="gallery-grid">

        @php
        $photos = [
        ['img'=>'images/gallery/photo1.jpeg','title'=>'Formation Secourisme en milieu professionnel','date'=>'Casablanca - 15 Juin 2025','slug'=>'formation-secourisme'],
        ['img'=>'images/gallery/photo2.jpeg','title'=>'Transport sanitaire','date'=>'Casablanca - 10 Juin 2025','slug'=>'transport-sanitaire'],
        ['img'=>'images/gallery/photo3.jpeg','title'=>'Intervention médicale','date'=>'Casablanca - 08 Juin 2025','slug'=>'intervention-medicale'],
        ['img'=>'images/gallery/photo4.jpeg','title'=>'Équipe Yanis Assistance','date'=>'Casablanca - 01 Juin 2025','slug'=>'equipe-yanis'],
        ];
        @endphp

        @foreach($photos as $photo)
        <a href="{{ route('galeries.detail', $photo['slug']) }}" class="gallery-item">
            <img src="{{ asset($photo['img']) }}" alt="{{ $photo['title'] }}">
            <div class="gallery-overlay">
                <h3>{{ $photo['title'] }}</h3>
                <p>{{ $photo['date'] }}</p>
            </div>
        </a>
        @endforeach

    </div>

</section>

<style>
    .gallery-page {
        padding: 50px 70px;
        background: #fff;
    }

    .gallery-header h1 {
        color: #0a2f67;
        font-size: 34px;
        font-weight: 900;
        margin: 0;
    }

    .gallery-header h1::after {
        content: "";
        width: 45px;
        height: 3px;
        background: #e71f3c;
        display: block;
        margin-top: 10px;
    }

    .gallery-header p {
        color: #26364d;
        margin-top: 14px;
    }

    .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin: 35px 0;
        flex-wrap: wrap;
    }

    .gallery-filters button {
        border: 1px solid #dbe4f3;
        background: #fff;
        color: #0a2f67;
        padding: 12px 30px;
        border-radius: 7px;
        font-weight: 800;
        cursor: pointer;
    }

    .gallery-filters button.active,
    .gallery-filters button:hover {
        background: #0a2f67;
        color: #fff;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        display: block;
        height: 210px;
        text-decoration: none;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: .3s;
    }

    .gallery-item:hover img {
        transform: scale(1.06);
    }

    .gallery-overlay {
        position: absolute;
        inset: auto 0 0;
        padding: 18px;
        background: linear-gradient(transparent, rgba(0, 0, 0, .75));
        color: #fff;
        opacity: 0;
        transition: .3s;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-overlay h3 {
        font-size: 15px;
        margin: 0 0 5px;
    }

    .gallery-overlay p {
        font-size: 12px;
        margin: 0;
    }

    @media(max-width:992px) {
        .gallery-page {
            padding: 40px 25px;
        }

        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media(max-width:576px) {
        .gallery-page {
            padding: 35px 18px;
        }

        .gallery-header h1 {
            font-size: 26px;
        }

        .gallery-filters {
            justify-content: flex-start;
            overflow-x: auto;
            flex-wrap: nowrap;
            gap: 10px;
        }

        .gallery-filters button {
            white-space: nowrap;
            padding: 10px 18px;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .gallery-item {
            height: 135px;
        }

        .gallery-overlay {
            display: none;
        }
    }
</style>

@endsection