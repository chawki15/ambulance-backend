<section class="services-hero {{ app()->getLocale() == 'ar' ? 'services-ar' : 'services-fr' }}">

    @if(app()->getLocale() == 'ar')

    <div class="services-right">
        <img src="{{ asset('images/slidear-1.jpeg') }}" alt="خدمات">
    </div>

    <div class="services-left">
        <span class="mini-title">{{ __('services_page.hero.mini') }}</span>

        <h1>{!! __('services_page.hero.title') !!}</h1>

        <p>{{ __('services_page.hero.desc') }}</p>
    </div>

    @else

    <div class="services-left">
        <span class="mini-title">{{ __('services_page.hero.mini') }}</span>

        <h1>{!! __('services_page.hero.title') !!}</h1>

        <p>{{ __('services_page.hero.desc') }}</p>
    </div>

    <div class="services-right">
        <img src="{{ asset('images/slide-1.jpeg') }}" alt="Services">
    </div>

    @endif

</section>