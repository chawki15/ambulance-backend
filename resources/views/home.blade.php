@php
$menuItems = [
['label' => 'Accueil', 'url' => '#'],
['label' => 'À propos', 'url' => '#'],
['label' => 'Nos Services', 'url' => '#'],
['label' => 'Flotte & Moyens', 'url' => '#'],
['label' => 'Partenaires', 'url' => '#'],
['label' => 'Actualités', 'url' => '#'],
['label' => 'Contact', 'url' => '#'],
];
$heroSlides = [
['title'=>'L’ASSISTANCE MÉDICALE','lead'=>'HUMAINE, RAPIDE ET FIABLE','desc'=>'Yanis Assistance accompagne vos assurés et vos collaborateurs à chaque moment délicat grâce à une expertise médicale complète et une intervention immédiate.','image'=>'https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1900&q=80','position'=>'center center','align'=>'left'],
['title'=>'TRANSPORT SANITAIRE','lead'=>'PARTOUT AU MAROC','desc'=>'Une flotte médicale opérationnelle 24/7 pour assurer des transferts rapides, sûrs et encadrés par des professionnels.','image'=>'https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?auto=format&fit=crop&w=1900&q=80','position'=>'center 32%','align'=>'right'],
['title'=>'SOINS À DOMICILE','lead'=>'PROXIMITÉ ET SÉRÉNITÉ','desc'=>'Nos équipes interviennent à domicile pour vos patients avec un suivi médical de qualité et une prise en charge personnalisée.','image'=>'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1900&q=80','position'=>'center 40%','align'=>'left'],
];

$services = [
[
'icon' => 'fa-truck-medical',
'title' => 'TRANSPORT SANITAIRE',
'desc' => 'Au Maroc et à l’international',
'color' => '#edf3ff',
'iconColor' => '#0f4aa3',
],
[
'icon' => 'fa-house-medical',
'title' => 'VISITE À DOMICILE',
'desc' => 'Maintien à domicile et aide à la personne',
'color' => '#fff1f3',
'iconColor' => '#eb2d4b',
],
[
'icon' => 'fa-graduation-cap',
'title' => 'ASSISTANCE MÉDICALE SCOLAIRE',
'desc' => 'Intervention rapide pour élèves et étudiants',
'color' => '#edf4ff',
'iconColor' => '#0c53c7',
],
[
'icon' => 'fa-briefcase-medical',
'title' => 'MÉDECINE DU TRAVAIL',
'desc' => 'Santé au travail et gestion des accidents',
'color' => '#f4efff',
'iconColor' => '#6942c8',
],
[
'icon' => 'fa-user-doctor',
'title' => 'MÉDICALISATION DES ÉVÉNEMENTS',
'desc' => 'Équipes médicales pour vos événements',
'color' => '#eefbf7',
'iconColor' => '#17896d',
],
[
'icon' => 'fa-laptop-medical',
'title' => 'TÉLÉCONSULTATION',
'desc' => 'Consultation en ligne avec ou sans RDV',
'color' => '#fff3eb',
'iconColor' => '#ff7300',
],
];
@endphp
@extends('layouts.app')

@section('content')


<section class="hero" id="heroSlider">
    @foreach ($heroSlides as $index => $slide)
    <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $slide['image'] }}'); --hero-pos: {{ $slide['position'] }};"></div>
    @endforeach

    <div class="container hero-content align-{{ $heroSlides[0]['align'] }}" id="heroContent">
        <div class="hero-copy">
            <h1 id="heroTitle">{{ $heroSlides[0]['title'] }}</h1>
            <p class="lead" id="heroLead">{{ $heroSlides[0]['lead'] }}</p>
            <p class="desc" id="heroDesc">{{ $heroSlides[0]['desc'] }}</p>
        </div>
        <div class="cta-row">
            <a class="btn btn-red" href="#" id="heroCtaPrimary">DEMANDER UNE ASSISTANCE</a>
            <a class="btn btn-white" href="#" id="heroCtaSecondary">NOUS CONTACTER</a>
        </div>
    </div>

    <div class="hero-dots" aria-label="Navigation du slider hero">
        @foreach ($heroSlides as $index => $slide)
        <button type="button" class="hero-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}" aria-label="Aller au slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</section>

<main class="container">
    <section class="stats">
        <article class="card">
            <div class="icon">🏠</div>
            <div>
                <div class="n">4584</div>
                <div>Consultations à domicile<br>& contre-visites</div>
            </div>
        </article>
        <article class="card">
            <div class="icon">🚑</div>
            <div>
                <div class="n">236</div>
                <div>Hospitalisations<br>à domicile</div>
            </div>
        </article>
        <article class="card">
            <div class="icon">🚐</div>
            <div>
                <div class="n">7493</div>
                <div>Transports médicaux<br>urbains & interurbains</div>
            </div>
        </article>
        <article class="card">
            <div class="icon">👥</div>
            <div>
                <div class="n">24</div>
                <div>Salariés dont<br>08 médecins urgentistes</div>
            </div>
        </article>
    </section>

    <section class="services-section">

        <h2 class="services-title">
            NOS SERVICES
        </h2>

        <div class="services-grid">

            @foreach($services as $service)

            <article class="service-card">

                <div class="service-top">

                    <div class="service-icon"
                        style="background: {{ $service['color'] }}; color: {{ $service['iconColor'] }}">
                        <i class="fa-solid {{ $service['icon'] }}"></i>
                    </div>

                    <div class="service-content">
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['desc'] }}</p>
                    </div>

                </div>

                <div class="service-arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>

            </article>

            @endforeach

        </div>

    </section>
    <section class="band">
        <div>
            <h4>Zones d’intervention</h4>
            <p>Grand Casablanca, Mohammedia, Bouskoura, Berrechid, Benslimane, Khouribga et régions.</p>
            <a class="assist-btn" href="#">VOIR TOUTES LES ZONES</a>
        </div>
        <div>
            <h4>Pourquoi nous choisir ?</h4>
            <ul>
                <li>Intervention rapide 24/7</li>
                <li>Équipes médicales qualifiées</li>
                <li>Matériel médical de pointe</li>
                <li>Service humain et personnalisé</li>
            </ul>
        </div>
        <div>
            <h4>Besoin d’aide immédiate ?</h4>
            <p>Notre équipe est disponible 24h/24 et 7j/7</p>
            <div class="phone-big">06 60 23 10 10</div>
            <br><a class="assist-btn" href="#">DEMANDER UNE ASSISTANCE EN LIGNE</a>
        </div>
    </section>
</main>

</body>


@endsection