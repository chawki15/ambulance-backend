<section class="expertise-section">

    <h2 class="section-title">
        NOS DOMAINES D’EXPERTISE
    </h2>

    <div class="expertise-grid">

        @include('partials.services.card',[
        'icon'=>'medical-transport.png',
        'color'=>'blue',
        'title'=>'TRANSPORT SANITAIRE'
        ])

        @include('partials.services.card',[
        'icon'=>'visite-a-domicile.png',
        'color'=>'red',
        'title'=>'ASSISTANCE MÉDICALE À DOMICILE'
        ])

        @include('partials.services.card',[
        'icon'=>'assistance-medicale-scolaire.png',
        'color'=>'blue',
        'title'=>'ASSISTANCE MÉDICALE SCOLAIRE'
        ])

        @include('partials.services.card',[
        'icon'=>'medecine-du-travail.png',
        'color'=>'purple',
        'title'=>'ASSISTANCE MÉDICALE SUR SITE'
        ])

        @include('partials.services.card',[
        'icon'=>'medicalisation-des-evenements.png',
        'color'=>'green',
        'title'=>'MÉDICALISATION DES ÉVÉNEMENTS'
        ])

        @include('partials.services.card',[
        'icon'=>'teleconsultation.png',
        'color'=>'orange',
        'title'=>'TÉLÉCONSULTATION'
        ])

    </div>

</section>