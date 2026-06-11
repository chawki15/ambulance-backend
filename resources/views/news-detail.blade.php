@extends('layouts.app')

@section('title', 'Détail Actualité')

@section('content')

@php
$items = [
'journee-sensibilisation' => [
'img' => 'images/news/news1.jpeg',
'date' => '04 Juin 2026',
'title' => "Marrakech accueille la 17ème édition du Congrès du Forum National des Médecins",
'desc' => <<<'TEXT'
    Marrakech, le 24 février 2023 – La ville ocre s'est imposée une nouvelle fois comme le carrefour incontournable du débat médical au Maroc.

    Cet événement d'envergure rassemble chaque année des centaines de professionnels de la santé.

    Déclaration des organisateurs : "Ce 17ème congrès confirme l'engagement du Forum National des Médecins à accompagner les mutations du secteur de la santé au Maroc. L'engouement des participants montre l'importance de maintenir un haut niveau de formation pour répondre aux attentes des patients."

    Le congrès s'est clôturé sur une note positive, avec la formulation de plusieurs recommandations visant à améliorer l'exercice de la médecine et à consolider les partenariats entre les secteurs public et privé.
    TEXT
    ],
    ];
    $item=$items[$slug] ?? $items['journee-sensibilisation'];
    @endphp

    <section class="news-detail-page">

    <div class="news-detail-hero">
        <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}">
    </div>

    <article class="news-detail-content">
        <small>{{ $item['date'] }}</small>

        <h1>{{ $item['title'] }}</h1>

        <p>
            {!! nl2br(e($item['desc'])) !!}
        </p>

        <p>
            Cette actualité reflète l’engagement de Yanis Assistance à renforcer
            la qualité de ses services, à développer ses actions de proximité et
            à accompagner ses partenaires dans les meilleures conditions.
        </p>

        <p>
            Grâce à une équipe mobilisée et expérimentée, nous continuons à proposer
            des solutions adaptées aux besoins du secteur médical, de l’assistance
            et du transport sanitaire.
        </p>

        <a href="{{ route('news') }}" class="back-news">← Retour aux actualités</a>
    </article>

    </section>

    <style>
        .news-detail-page {
            background: #fff;
            padding-bottom: 70px;
        }

        .news-detail-hero {
            height: 420px;
            overflow: hidden;
        }

        .news-detail-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-detail-content {
            max-width: 900px;
            margin: -70px auto 0;
            background: #fff;
            position: relative;
            z-index: 2;
            padding: 45px;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(10, 47, 103, .12);
        }

        .news-detail-content span {
            background: #e71f3c;
            color: #fff;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 900;
        }

        .news-detail-content small {
            color: #71809a;
            margin-left: 12px;
        }

        .news-detail-content h1 {
            color: #0a2f67;
            font-size: 38px;
            line-height: 1.2;
            margin: 25px 0;
        }

        .news-detail-content p {
            color: #26364d;
            font-size: 16px;
            line-height: 1.9;
        }

        .back-news {
            display: inline-block;
            margin-top: 25px;
            background: #0a2f67;
            color: #fff;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 8px;
            font-weight: 800;
        }

        @media(max-width:768px) {
            .news-detail-hero {
                height: 260px;
            }

            .news-detail-content {
                margin: -40px 18px 0;
                padding: 28px 22px;
            }

            .news-detail-content h1 {
                font-size: 28px;
            }
        }
    </style>

    @endsection