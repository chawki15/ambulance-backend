<section class="expertise-section">

    <h2 class="section-title">
        NOS DOMAINES D’EXPERTISE
    </h2>

    <div class="expertise-grid">

        @include('partials.services.card',[
        'icon'=>'fa-truck-medical',
        'color'=>'blue',
        'title'=>'TRANSPORT SANITAIRE'
        ])

        @include('partials.services.card',[
        'icon'=>'fa-house-medical',
        'color'=>'red',
        'title'=>'ASSISTANCE MÉDICALE À DOMICILE'
        ])

        @include('partials.services.card',[
        'icon'=>'fa-graduation-cap',
        'color'=>'blue',
        'title'=>'ASSISTANCE MÉDICALE SCOLAIRE'
        ])

        @include('partials.services.card',[
        'icon'=>'fa-briefcase-medical',
        'color'=>'purple',
        'title'=>'ASSISTANCE MÉDICALE SUR SITE'
        ])

        @include('partials.services.card',[
        'icon'=>'fa-people-group',
        'color'=>'green',
        'title'=>'MÉDICALISATION DES ÉVÉNEMENTS'
        ])

        @include('partials.services.card',[
        'icon'=>'fa-laptop-medical',
        'color'=>'orange',
        'title'=>'TÉLÉCONSULTATION'
        ])

    </div>

</section>