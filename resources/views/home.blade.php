@php
$menuItems = [
['label' => __('menu.home'), 'url' => '#'],
['label' => __('menu.about'), 'url' => '#'],
['label' => __('menu.services'), 'url' => '#'],
['label' => __('menu.fleet'), 'url' => '#'],
['label' => __('menu.partners'), 'url' => '#'],
['label' => __('menu.news'), 'url' => '#'],
['label' => __('menu.contact'), 'url' => '#'],
];
$heroSlides = [
['title'=>__('hero.slide1.title'),'lead'=>__('hero.slide1.lead'),'desc'=>__('hero.slide1.desc'),'image'=>'https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1900&q=80','position'=>'center center','align'=>'left'],
['title'=>__('hero.slide2.title'),'lead'=>__('hero.slide2.lead'),'desc'=>__('hero.slide2.desc'),'image'=>'https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?auto=format&fit=crop&w=1900&q=80','position'=>'center 32%','align'=>'right'],
['title'=>__('hero.slide3.title'),'lead'=>__('hero.slide3.lead'),'desc'=>__('hero.slide3.desc'),'image'=>'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1900&q=80','position'=>'center 40%','align'=>'left'],
];

$services = [
[
'icon' => 'fa-truck-medical',
'title' => __('services.transport.title'),
'desc' => __('services.transport.desc'),
'color' => '#edf3ff',
'iconColor' => '#0f4aa3',
],
[
'icon' => 'fa-house-medical',
'title' => __('services.home_visit.title'),
'desc' => __('services.home_visit.desc'),
'color' => '#fff1f3',
'iconColor' => '#eb2d4b',
],
[
'icon' => 'fa-graduation-cap',
'title' => __('services.school_medical.title'),
'desc' => __('services.school_medical.desc'),
'color' => '#edf4ff',
'iconColor' => '#0c53c7',
],
[
'icon' => 'fa-briefcase-medical',
'title' => __('services.work_medicine.title'),
'desc' => __('services.work_medicine.desc'),
'color' => '#f4efff',
'iconColor' => '#6942c8',
],
[
'icon' => 'fa-user-doctor',
'title' => __('services.events_medical.title'),
'desc' => __('services.events_medical.desc'),
'color' => '#eefbf7',
'iconColor' => '#17896d',
],
[
'icon' => 'fa-laptop-medical',
'title' => __('services.teleconsultation.title'),
'desc' => __('services.teleconsultation.desc'),
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
            {{ __('home.services_title') }}
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
            <h4>{{ __('home.zones.title') }}</h4>
            <p>{{ __('home.zones.desc') }}</p>
            <a class="assist-btn" href="#">{{ __('home.zones.cta') }}</a>
        </div>
        <div>
            <h4>{{ __('home.why_choose_us.title') }}</h4>
            <ul>
                <li>{{ __('home.why_choose_us.item1') }}</li>
                <li>{{ __('home.why_choose_us.item2') }}</li>
                <li>{{ __('home.why_choose_us.item3') }}</li>
                <li>{{ __('home.why_choose_us.item4') }}</li>
            </ul>
        </div>
        <div>
            <h4>{{ __('home.immediate_help.title') }}</h4>
            <p>{{ __('home.immediate_help.desc') }}</p>
            <div class="phone-big">06 60 23 10 10</div>
            <br><a class="assist-btn" href="#">{{ __('home.immediate_help.cta') }}</a>
        </div>
    </section>
</main>

</body>


@endsection