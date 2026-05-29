<section class="services-hero {{ app()->getLocale() == 'ar' ? 'services-ar' : 'services-fr' }}">

    @if(app()->getLocale() == 'ar')

    <div class="services-right">
        <img src="{{ asset('images/slidear-1.jpeg') }}" alt="خدمات">
    </div>

    <div class="services-left">
        <span class="mini-title">خدماتنا</span>

        <h1>
            حلول مساعدة طبية<br>
            مناسبة لكل مريض
        </h1>

        <p>
            تقدم Yanis Assistance مجموعة متكاملة من الخدمات الطبية وخدمات المساعدة
            لمرافقة المرضى والمؤمنين والشركات في مختلف الحالات.
        </p>
    </div>

    @else

    <div class="services-left">
        <span class="mini-title">NOS SERVICES</span>

        <h1>
            DES SOLUTIONS D’ASSISTANCE<br>
            ADAPTÉES À CHAQUE PATIENT
        </h1>

        <p>
            Yanis Assistance propose une gamme complète de prestations
            médicales et d’assistance pour accompagner vos assurés,
            collaborateurs et entreprises.
        </p>
    </div>

    <div class="services-right">
        <img src="{{ asset('images/slide-1.jpeg') }}" alt="Services">
    </div>

    @endif

</section>