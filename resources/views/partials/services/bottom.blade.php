<section class="assist-banner">

    <div class="assist-call">
        <img src="images/assistance-agent.png" alt="Assistance">

        <div>
            <h3>{!! __('services_page.assist.title') !!}</h3>
            <p>{!! __('services_page.assist.desc') !!}</p>

            <a href="tel:0522123456">
                <i class="fa-solid fa-phone"></i>
                0522 123 456
            </a>
        </div>
    </div>

    <div class="asssist-why">
        <h3>{{ __('services_page.why.title') }}</h3>

        <div class="why-list">
            <div>
                <span><i class="fa-solid fa-stopwatch"></i></span>
                <p>{!! __('services_page.why.fast') !!}</p>
            </div>

            <div>
                <span><i class="fa-solid fa-user-doctor"></i></span>
                <p>{!! __('services_page.why.teams') !!}</p>
            </div>

            <div>
                <span><i class="fa-solid fa-shield-heart"></i></span>
                <p>{!! __('services_page.why.equipment') !!}</p>
            </div>

            <div>
                <span><i class="fa-regular fa-heart"></i></span>
                <p>{!! __('services_page.why.human') !!}</p>
            </div>

            <div>
                <span><i class="fa-regular fa-handshake"></i></span>
                <p>{!! __('services_page.why.partner') !!}</p>
            </div>
        </div>
    </div>

    <div class="assist-zone">
        <h3>{{ __('services_page.zone.title') }}</h3>

        <div class="zone-content">
            <img src="images/map.png" alt="Zone d’intervention">

            <div>
                <strong>{{ __('services_page.zone.casablanca') }}</strong>
                <p>{!! __('services_page.zone.casablanca_desc') !!}</p>

                <strong>{{ __('services_page.zone.regions') }}</strong>
                <p>{{ __('services_page.zone.regions_desc') }}</p>

                <a href="#">{{ __('services_page.zone.cta') }}</a>
            </div>
        </div>
    </div>

</section>