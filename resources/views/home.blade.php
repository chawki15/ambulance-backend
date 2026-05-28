@php
$heroSlides = [
['title'=>__('hero.slide1.title'),'lead'=>__('hero.slide1.lead'),'desc'=>__('hero.slide1.desc'),'image'=>'https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1900&q=80','position'=>'center center','align'=>'left'],
['title'=>__('hero.slide2.title'),'lead'=>__('hero.slide2.lead'),'desc'=>__('hero.slide2.desc'),'image'=>'https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?auto=format&fit=crop&w=1900&q=80','position'=>'center 32%','align'=>'right'],
['title'=>__('hero.slide3.title'),'lead'=>__('hero.slide3.lead'),'desc'=>__('hero.slide3.desc'),'image'=>'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1900&q=80','position'=>'center 40%','align'=>'left'],
];

$services = [
[
'icon' => 'medical-transport.png',
'title' => __('services.transport.title'),
'desc' => __('services.transport.desc'),
'color' => '#edf5f8',
],
[
'icon' => 'visite-a-domicile.png',
'title' => __('services.home_visit.title'),
'desc' => __('services.home_visit.desc'),
'color' => '#fff1f3',
],
[
'icon' => 'assistance-medicale-scolaire.png',
'title' => __('services.school_medical.title'),
'desc' => __('services.school_medical.desc'),
'color' => '#edf4ff',
],
[
'icon' => 'medecine-du-travail.png',
'title' => __('services.work_medicine.title'),
'desc' => __('services.work_medicine.desc'),
'color' => '#f4efff',
],
[
'icon' => 'medicalisation-des-evenements.png',
'title' => __('services.events_medical.title'),
'desc' => __('services.events_medical.desc'),
'color' => '#eefbf7',
],
[
'icon' => 'teleconsultation.png',
'title' => __('services.teleconsultation.title'),
'desc' => __('services.teleconsultation.desc'),
'color' => '#fff3eb',
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
            <div class="service-icon blanc">
                <img src="images/icons/home-care.png" alt="Home">
            </div>
            <div>
                <div class="n">4584</div>
                <div>Consultations à domicile<br>& contre-visites</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon rauge">
                <img src="images/icons/home-hospitalization.png" alt="Home">
            </div>
            <div>
                <div class="n">236</div>
                <div>Hospitalisations<br>à domicile</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon blanc">
                <img src="images/icons/medical-transport.png" alt="Home">
            </div>
            <div>
                <div class="n">7493</div>
                <div>Transports médicaux<br>urbains & interurbains</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon voile">
                <img src="images/icons/medical-staff.png" alt="Home">
            </div>
            <div>
                <div class="n">24</div>
                <div>Salariés dont<br>08 médecins urgentistes</div>
            </div>
        </article>
    </section>

    <section class="services-section">

        <h2 class="services-title">
            {{ __('home.services_title') }}
        </h2>

        <div class="services-grid">

            @foreach($services as $service)

            <article class="service-card">

                <div class="service-top">

                    <div class="service-icon" style="background: {{ $service['color'] }}; ">
                        <img src="images/icons/{{ $service['icon'] }}" alt="Home">
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




</main>

<section class="assist-banner">

    <div class="assist-zones">
        <img src="images/map.png" alt="Map">

        <div>
            <h3>OUR ASSISTANCE ZONES</h3>

            <p>
                Enjoy peace of mind with our extensive assistance network
                available across multiple regions.
            </p>

            <a href="#" class="assist-zone-btn">
                CHECK ASSISTANCE ZONES
            </a>
        </div>
    </div>

    <div class="assist-why">
        <div class="why-content">
            <h3>WHY CHOOSE US?</h3>

            <ul>
                <li>24/7 emergency support</li>
                <li>Professional medical assistance</li>
                <li>Wide regional coverage</li>
                <li>Fast intervention services</li>
            </ul>
        </div>
    </div>

    <div class="assist-help">
        <h3>NEED HELP?</h3>

        <p>
            Contact our assistance center any time.
        </p>

        <a href="tel:+212522000000" class="assist-phone">
            +212 522 000 000
        </a>

        <a href="#" class="assist-online">
            ONLINE ASSISTANCE
        </a>
    </div>

    <div class="assist-side">
        <div class="assist-side-box">
            <div class="assist-icon">🚨</div>

            <small>ASSISTANCE</small>

            <strong>24/7</strong>
        </div>
    </div>

</section>
</body>


@endsection