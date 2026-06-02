<section class="expertise-section">

    <h2 class="section-title">
        {{ __('services_page.expertise.title') }}
    </h2>

    <div class="expertise-grid">

        @include('partials.services.card',[
        'icon'=>'medical-transport.png',
        'color'=>'blue',
        'title'=>__('fleet.services.transport.title'),
        'desc'=>__('fleet.services.transport.desc'),
        'items'=>[
        __('fleet.services.transport.item1'),
        __('fleet.services.transport.item2'),
        __('fleet.services.transport.item3'),
        __('fleet.services.transport.item4'),
        __('fleet.services.transport.item5'),
        ]
        ])

        @include('partials.services.card',[
        'icon'=>'visite-a-domicile.png',
        'color'=>'red',
        'title'=>__('fleet.services.home.title'),
        'desc'=>__('fleet.services.home.desc'),
        'items'=>[
        __('fleet.services.home.item1'),
        __('fleet.services.home.item2'),
        __('fleet.services.home.item3'),
        __('fleet.services.home.item4'),
        ]
        ])

        @include('partials.services.card',[
        'icon'=>'assistance-medicale-scolaire.png',
        'color'=>'blue',
        'title'=>__('fleet.services.school.title'),
        'desc'=>__('fleet.services.school.desc'),
        'items'=>[
        __('fleet.services.school.item1'),
        __('fleet.services.school.item2'),
        __('fleet.services.school.item3'),
        __('fleet.services.school.item4'),
        ]
        ])

        @include('partials.services.card',[
        'icon'=>'medecine-du-travail.png',
        'color'=>'purple',
        'title'=>__('fleet.services.work.title'),
        'desc'=>__('fleet.services.work.desc'),
        'items'=>[
        __('fleet.services.work.item1'),
        __('fleet.services.work.item2'),
        __('fleet.services.work.item3'),
        __('fleet.services.work.item4'),
        __('fleet.services.work.item5'),
        ]
        ])

        @include('partials.services.card',[
        'icon'=>'medicalisation-des-evenements.png',
        'color'=>'green',
        'title'=>__('fleet.services.events.title'),
        'desc'=>__('fleet.services.events.desc'),
        'items'=>[
        __('fleet.services.events.item1'),
        __('fleet.services.events.item2'),
        __('fleet.services.events.item3'),
        __('fleet.services.events.item4'),
        ]
        ])

    </div>

</section>