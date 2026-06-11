@php
$lang = app()->getLocale();

$heroSlides = [
[
'title' => __('hero.slide1.title'),
'lead' => __('hero.slide1.lead'),
'desc' => __('hero.slide1.desc'),
'image' => $lang === 'ar'
? 'images/slider1-ar.jpeg'
: 'images/slider1.jpeg',
'position' => 'center center',
'align' => $lang === 'ar' ? 'left' : 'left',
],
[
'title' => __('hero.slide2.title'),
'lead' => __('hero.slide2.lead'),
'desc' => __('hero.slide2.desc'),
'image' => $lang === 'ar'
? 'images/slider2-ar.jpeg'
: 'images/slider2.jpeg',
'position' => 'center 32%',
'align' => $lang === 'ar' ? 'left' : 'left',
],
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


<section class="hero-new" id="heroSlider">
    @foreach ($heroSlides as $index => $slide)
    <div class="hero-new-slide {{ $index === 0 ? 'active' : '' }}"
        style="background-image:url('{{ asset($slide['image']) }}'); background-position:{{ $slide['position'] }};">

        <div class="hero-new-image">
            <img src="{{ asset($slide['image']) }}" alt="">
        </div>

        <div class="hero-new-content">
            <h1>{{ $slide['title'] }}</h1>
            <p class="hero-new-lead">{{ $slide['lead'] }}</p>
            <p class="hero-new-desc">{{ $slide['desc'] }}</p>
        </div>
    </div>
    @endforeach

    <div class="hero-dots">
        @foreach ($heroSlides as $index => $slide)
        <button type="button" class="hero-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></button>
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
                <div>{!! __('home.stats.consultations') !!}</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon rauge">
                <img src="images/icons/home-hospitalization.png" alt="Home">
            </div>
            <div>
                <div class="n">236</div>
                <div>{!! __('home.stats.hospitalizations') !!}</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon blanc">
                <img src="images/icons/medical-transport.png" alt="Home">
            </div>
            <div>
                <div class="n">7493</div>
                <div>{!! __('home.stats.transports') !!}</div>
            </div>
        </article>
        <article class="card">
            <div class="service-icon voile">
                <img src="images/icons/medical-staff.png" alt="Home">
            </div>
            <div>
                <div class="n">24</div>
                <div>{!! __('home.stats.staff') !!}</div>
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

            </article>

            @endforeach

        </div>



    </section>




</main>

<section class="help-banner">

    <div class="help-zones">
        <img src="images/map.png" alt="Map">

        <div>
            <h3>{{ __('home.zones.title') }}</h3>
            <p>{{ __('home.zones.desc') }}</p>
            <a href="#" class="help-zone-btn">{{ __('home.zones.cta') }}</a>
        </div>
    </div>

    <div class="help-why">
        <div class="help-why-content">
            <h3>{{ __('home.why_choose_us.title') }}</h3>
            <ul>
                <li>{{ __('home.why_choose_us.item1') }}</li>
                <li>{{ __('home.why_choose_us.item2') }}</li>
                <li>{{ __('home.why_choose_us.item3') }}</li>
                <li>{{ __('home.why_choose_us.item4') }}</li>
            </ul>
        </div>
    </div>

    <div class="help-contact">
        <h3>{{ __('home.immediate_help.title') }}</h3>
        <p>{{ __('home.immediate_help.desc') }}</p>

        <a href="tel:+212522123456" class="help-phone">
            +212 522 123 456
        </a>
    </div>

    <div class="help-side">
        <div class="help-side-box">
            <div class="help-icon">🚨</div>
            <small>{{ __('home.assistance_label') }}</small>
            <strong>24/7</strong>
        </div>
    </div>

</section>
</body>


@endsection