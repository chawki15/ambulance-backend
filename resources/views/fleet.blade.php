@extends('layouts.app')

@section('title', 'Flotte & Moyens')

@section('content')

<section class="fleet-section {{ app()->getLocale() == 'ar' ? 'fleet-ar' : 'fleet-fr' }}">

    @if(app()->getLocale() == 'ar')

    <div class="fleet-image">
        <img src="{{ asset('images/slidear-2.jpeg') }}" alt="">
    </div>

    <div class="fleet-content">
        <h2>وسائلنا وأسطولنا</h2>
        <div class="fleet-line"></div>

        <p>
            تتوفر Yanis Assistance على وسائل بشرية ومادية وتقنية
            لضمان تدخل سريع وآمن وفعال داخل المغرب وخارجه.
        </p>

        <div class="fleet-features">
            <div class="feature">
                <span><i class="fa-solid fa-shield-halved"></i></span>
                <p>معدات طبية مجهزة</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-users"></i></span>
                <p>فرق طبية مجربة</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-location-dot"></i></span>
                <p>تغطية وطنية ودولية</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-clock"></i></span>
                <p>متوفرون 24/24 - 7/7</p>
            </div>
        </div>
    </div>

    @else

    <div class="fleet-content">
        <h2>NOS MOYENS & NOTRE FLOTTE</h2>
        <div class="fleet-line"></div>

        <p>
            Yanis Assistance dispose de moyens humains, matériels et techniques
            performants pour assurer une prise en charge rapide, sûre et efficace
            partout au Maroc et à l’international.
        </p>

        <div class="fleet-features">
            <div class="feature">
                <span><i class="fa-solid fa-shield-halved"></i></span>
                <p>Matériel hautement équipé</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-users"></i></span>
                <p>Équipes médicales expérimentées</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-location-dot"></i></span>
                <p>Couverture nationale et internationale</p>
            </div>

            <div class="feature">
                <span><i class="fa-solid fa-clock"></i></span>
                <p>Disponibilité 24h/24 - 7j/7</p>
            </div>
        </div>
    </div>

    <div class="fleet-image">
        <img src="{{ asset('images/slide-2.jpeg') }}" alt="">
    </div>

    @endif

</section>


<section class="fleet-layout">

    <div class="fleet-left">

        <h2>COMPOSITION DE NOTRE FLOTTE</h2>

        <div class="fleet-cards">
            <div class="fleet-card">
                <img src="images/ambulance-1.jpg" alt="">
                <strong>7</strong>
                <h4>AMBULANCES<br>MÉDICALISÉES</h4>
                <p>Équipées pour les soins intensifs et le transport médicalisé.</p>
            </div>

            <div class="fleet-card">
                <img src="images/ambulance-2.jpg" alt="">
                <strong>4</strong>
                <h4>AMBULANCES<br>SIMPLES</h4>
                <p>Pour le transport sanitaire non médicalisé.</p>
            </div>

            <div class="fleet-card">
                <img src="images/ambulance-3.jpg" alt="">
                <strong>1</strong>
                <h4>TAXI<br>AMBULANCE</h4>
                <p>Solution rapide et adaptée aux besoins urgents.</p>
            </div>

            <div class="fleet-card">
                <img src="images/ambulance-4.jpg" alt="">
                <h4>MATÉRIEL<br>MÉDICAL DE POINTE</h4>
                <p>Défibrillateurs, respirateurs, moniteurs, brancards électriques.</p>
            </div>
        </div>

        <div class="human-box">
            <h2>NOS RESSOURCES HUMAINES</h2>

            <div class="human-list">
                <div class="human-item">
                    <span><i class="fa-solid fa-users"></i></span>
                    <div>
                        <strong>24</strong>
                        <h4>SALARIÉS</h4>
                        <p>Une équipe engagée à votre service.</p>
                    </div>
                </div>

                <div class="human-item">
                    <span><i class="fa-solid fa-user-doctor"></i></span>
                    <div>
                        <strong>02</strong>
                        <h4>MÉDECINS URGENTISTES</h4>
                        <p>Expérience et expertise à chaque intervention.</p>
                    </div>
                </div>

                <div class="human-item">
                    <span class="red"><i class="fa-solid fa-user-nurse"></i></span>
                    <div>
                        <h4>ÉQUIPES PARAMÉDICALES</h4>
                        <p>Infirmiers, ambulanciers et assistants qualifiés.</p>
                    </div>
                </div>

                <div class="human-item">
                    <span class="green"><i class="fa-solid fa-headset"></i></span>
                    <div>
                        <h4>FORMATION CONTINUE</h4>
                        <p>Des équipes formées aux dernières pratiques.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="fleet-right">

        <h2>ZONES D’INTERVENTION & MOYENS DÉPLOYÉS</h2>

        <div class="zone-card">
            <div class="map-circle"></div>

            <div class="zone-title">
                <h4>GRAND CASABLANCA</h4>
                <p>Casablanca, Mohammedia, Dar Bouazza, Bouskoura, Aéroport...</p>
                <h4>BERRECHID, BOUZNIKA</h4>
            </div>

            <div class="zone-count">
                <p><i class="fa-solid fa-truck-medical"></i> <strong>7</strong> Ambulances médicalisées</p>
                <p><i class="fa-solid fa-truck-medical"></i> <strong>4</strong> Ambulances simples</p>
                <p><i class="fa-solid fa-car"></i> <strong>1</strong> Taxi ambulance</p>
            </div>
        </div>

        <div class="zone-card zone-red">
            <div class="map-circle"></div>

            <div class="zone-title">
                <h4>KHOURIBGA ET RÉGIONS</h4>
            </div>

            <div class="zone-count">
                <p><i class="fa-solid fa-truck-medical"></i> <strong>2</strong> Ambulances médicalisées</p>
            </div>
        </div>

        <div class="quality-card">
            <div>
                <h2>NOTRE ENGAGEMENT QUALITÉ</h2>
                <ul>
                    <li>Respect des normes sanitaires et réglementaires</li>
                    <li>Entretien rigoureux et contrôle régulier de nos véhicules</li>
                    <li>Traçabilité et suivi des interventions en temps réel</li>
                    <li>Amélioration continue de nos services</li>
                </ul>
            </div>

            <img src="images/interieur-ambulance.jpg" alt="">
        </div>

    </div>

</section>








<style>
    .fleet-section {
        width: 100%;
        min-height: 310px;
        display: grid;
        grid-template-columns: 52% 48%;
        background: #eef1f6;
        overflow: hidden;
    }

    .fleet-content {
        padding: 45px 30px;
        z-index: 2;
    }

    .fleet-content h2 {
        color: #0b3d7a;
        font-size: 24px;
        font-weight: 800;
        margin: 0;
        line-height: 1.2;
        text-transform: uppercase;
    }

    .fleet-line {
        width: 55px;
        height: 3px;
        background: #e31b3f;
        margin: 12px 0 16px;
    }

    .fleet-content>p {
        max-width: 440px;
        font-size: 13px;
        line-height: 1.7;
        color: #000;
        margin: 0;
    }

    .fleet-features {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 35px;
        flex-wrap: nowrap;
    }

    .feature {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 135px;
    }

    .feature span {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0b3d7a;
        font-size: 17px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
    }

    .feature p {
        margin: 0;
        font-size: 11px;
        font-weight: 600;
        line-height: 1.3;
        color: #000;
    }

    .fleet-image {
        position: relative;
        height: 310px;
    }

    .fleet-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* الفرنسية */
    .fleet-fr .fleet-image::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 260px;
        height: 100%;
        background: linear-gradient(to right,
                #eef1f6 0%,
                rgba(238, 241, 246, .85) 45%,
                rgba(238, 241, 246, 0) 100%);
        z-index: 2;
    }

    .fleet-fr .fleet-image img {
        object-position: center right;
    }

    /* العربية */
    .fleet-ar {
        grid-template-columns: 52% 48%;
    }

    .fleet-ar .fleet-content {
        text-align: right;
        direction: rtl;
    }

    .fleet-ar .fleet-line {
        margin-right: 0;
        margin-left: auto;
    }

    .fleet-ar .fleet-features {
        direction: rtl;
    }

    .fleet-ar .fleet-image::before {
        content: "";
        position: absolute;
        right: 0;
        top: 0;
        width: 260px;
        height: 100%;
        background: linear-gradient(to left,
                #eef1f6 0%,
                rgba(238, 241, 246, .85) 45%,
                rgba(238, 241, 246, 0) 100%);
        z-index: 2;
    }

    .fleet-ar .fleet-image img {
        object-position: center left;
    }

    @media(max-width:768px) {

        .fleet-section,
        .fleet-ar {
            grid-template-columns: 1fr;
        }

        .fleet-content {
            padding: 35px 25px;
        }

        .fleet-image {
            height: 230px;
        }

        .fleet-features {
            flex-wrap: wrap;
            gap: 20px;
        }

        .feature {
            width: 45%;
        }
    }

    .fleet-ar {
        direction: ltr !important;
    }

    .fleet-ar .fleet-image {
        grid-column: 1 !important;
        grid-row: 1 !important;
    }

    .fleet-ar .fleet-content {
        grid-column: 2 !important;
        grid-row: 1 !important;
        direction: rtl !important;
        text-align: right !important;
    }

    /* =========================
   MAIN
========================= */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    /* =========================
   MAIN LAYOUT
========================= */

    .fleet-layout {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        padding: 25px 20px;
        display: flex;
        gap: 14px;
        align-items: flex-start;
        background: #fff;
    }

    .fleet-left {
        width: 65%;
    }

    .fleet-right {
        width: 35%;
    }

    /* =========================
   TITLES
========================= */

    .fleet-layout h2 {
        color: #003b84;
        font-size: 14px;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 18px;
        position: relative;
    }

    .fleet-layout h2::after {
        content: "";
        position: absolute;
        bottom: -7px;
        width: 42px;
        height: 2px;
        background: #ef2146;
    }

    /* Français */
    html[dir="ltr"] .fleet-layout h2::after {
        left: 0;
    }

    /* العربية */
    html[dir="rtl"] .fleet-layout h2::after {
        right: 0;
    }

    /* =========================
   FLEET CARDS
========================= */

    .fleet-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    .fleet-card {
        background: #fff;
        border-radius: 12px;
        padding: 14px;
        text-align: center;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
    }

    .fleet-card img {
        width: 100%;
        height: 78px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .fleet-card strong {
        display: block;
        color: #003b84;
        font-size: 34px;
        line-height: 1;
        font-weight: 900;
        margin-bottom: 6px;
    }

    .fleet-card h4 {
        color: #003b84;
        font-size: 11px;
        line-height: 1.3;
        font-weight: 900;
        margin-bottom: 12px;
    }

    .fleet-card p {
        color: #111;
        font-size: 9px;
        line-height: 1.45;
    }

    /* =========================
   HUMAN BOX
========================= */

    .human-box {
        margin-top: 22px;
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
    }

    .human-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .human-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .human-item span {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #edf2ff;
        color: #003b84;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .human-item .red {
        background: #ffecef;
        color: #ef2146;
    }

    .human-item .green {
        background: #e8f7f2;
        color: #00a47a;
    }

    .human-item strong {
        display: block;
        color: #003b84;
        font-size: 34px;
        line-height: 1;
        font-weight: 900;
        margin-bottom: 4px;
    }

    .human-item h4 {
        color: #003b84;
        font-size: 10px;
        line-height: 1.25;
        font-weight: 900;
        margin-bottom: 8px;
    }

    .human-item p {
        color: #111;
        font-size: 9px;
        line-height: 1.45;
    }

    /* =========================
   ZONES
========================= */

    .zone-card {
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        display: grid;
        grid-template-columns: 58px 1fr 145px;
        gap: 14px;
        align-items: center;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
        margin-bottom: 14px;
    }

    .map-circle {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #edf2ff;
    }

    .zone-red .map-circle {
        background: #ffecef;
    }

    .zone-title h4 {
        color: #003b84;
        font-size: 11px;
        line-height: 1.25;
        font-weight: 900;
        margin-bottom: 6px;
    }

    .zone-title p {
        color: #111;
        font-size: 9px;
        line-height: 1.4;
        margin-bottom: 8px;
    }

    .zone-count {
        border-left: 1px solid #d9dfe8;
        padding-left: 12px;
    }

    .zone-count p {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #111;
        font-size: 9px;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .zone-count i {
        color: #003b84;
        font-size: 15px;
    }

    .zone-count strong {
        color: #003b84;
        font-size: 18px;
        font-weight: 900;
    }

    .zone-red .zone-count i,
    .zone-red .zone-count strong {
        color: #ef2146;
    }

    /* =========================
   QUALITY CARD
========================= */

    .quality-card {
        background: #fff;
        border-radius: 12px;
        padding: 14px;
        display: flex;
        gap: 14px;
        align-items: flex-start;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
    }

    .quality-card ul {
        list-style: none;
    }

    .quality-card li {
        position: relative;
        color: #111;
        font-size: 8px;
        line-height: 1.35;
        margin-bottom: 8px;
    }

    .quality-card li::before {
        content: "✓";
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #003b84;
        color: #fff;
        font-size: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quality-card img {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
    }

    /* Français */
    html[dir="ltr"] .quality-card li {
        padding-left: 18px;
        padding-right: 0;
        text-align: left;
    }

    html[dir="ltr"] .quality-card li::before {
        left: 0;
        right: auto;
    }

    /* العربية */
    html[dir="rtl"] .quality-card li {
        padding-right: 18px;
        padding-left: 0;
        text-align: right;
    }

    html[dir="rtl"] .quality-card li::before {
        right: 0;
        left: auto;
    }

    /* =========================
   RESPONSIVE
========================= */

    @media(max-width:992px) {

        .fleet-layout {
            flex-direction: column;
        }

        .fleet-left,
        .fleet-right {
            width: 100%;
        }

        .fleet-right {
            border-left: 0;
            padding-left: 0;
        }

        .fleet-cards,
        .human-list {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media(max-width:576px) {

        .fleet-cards,
        .human-list {
            grid-template-columns: 1fr;
        }

        .zone-card {
            grid-template-columns: 1fr;
        }

        .quality-card {
            flex-direction: column;
        }

        .quality-card img {
            width: 100%;
            height: auto;
        }

    }
</style>
@endsection