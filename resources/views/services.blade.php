@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')

@include('partials.services.hero')

@include('partials.services.cards')

@include('partials.services.bottom')
<style>
    .section-title{
    text-align:center;
    color:#0b3168;
    font-size:34px;
    font-weight:900;
    margin-bottom:40px;
    position:relative;
    }

    .section-title::after{
    content:"";
    width:55px;
    height:4px;
    background:#ef2345;
    position:absolute;
    left:50%;
    bottom:-12px;
    transform:translateX(-50%);
    border-radius:20px;
    }

    /* =========================================================
    HERO SERVICES
    ========================================================= */

    .services-hero{
    display:grid;
    grid-template-columns:1fr 1fr;
    min-height:430px;
    overflow:hidden;
    background:#f7f9fd;
    }

    .services-left{
    padding:70px 90px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    }

    .mini-title{
    color:#0b3168;
    font-size:13px;
    font-weight:900;
    margin-bottom:16px;
    position:relative;
    }

    .mini-title::after{
    content:"";
    width:40px;
    height:3px;
    background:#ef2345;
    display:block;
    margin-top:6px;
    }

    .services-left h1{
    font-size:48px;
    line-height:1.1;
    color:#0b3168;
    margin:0 0 24px;
    font-weight:900;
    }

    .services-left p{
    font-size:16px;
    line-height:1.8;
    color:#44546c;
    max-width:620px;
    }

    .services-right{
    position:relative;
    }

    .services-right img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center right;
    }

    /* =========================================================
    EXPERTISE SECTION
    ========================================================= */

    .expertise-section{
    padding:60px 0;
    background:#fff;
    }

    .expertise-grid{
    max-width:1450px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(6,1fr);
    gap:10px;
    }

    .expertise-card{
    background:#fff;
    border:1px solid #edf1f7;
    border-radius:18px;
    padding:15px 10px;
    transition:.25s;
    box-shadow:0 2px 10px rgba(0,0,0,.03);
    }

    .expertise-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 25px rgba(0,0,0,.08);
    }

    .expertise-icon{
    width:74px;
    height:74px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:22px;
    }

    .expertise-icon i{
    font-size:32px;
    }

    .blue{
    background:#eef4ff;
    color:#0b3d91;
    }

    .red{
    background:#fff1f4;
    color:#ef2345;
    }

    .purple{
    background:#f4efff;
    color:#6942c8;
    }

    .green{
    background:#edf9f6;
    color:#17896d;
    }

    .orange{
    background:#fff4eb;
    color:#ff7a00;
    }

    .expertise-card h3{
    color:#0b3168;
    font-size:13px;
    line-height:1.3;
    font-weight:800;
    text-transform:uppercase;
    }

    .expertise-card p{
    color:#4b5970;
    font-size:12px;
    line-height:1.7;
    margin-bottom:18px;
    }

    .expertise-card ul{
    padding-left:18px;
    margin:0 0 24px;
    }

    .expertise-card ul li{
    font-size:13px;
    color:#24344d;
    margin-bottom:8px;
    }

    .expertise-card a{
    height:40px;
    border-radius:10px;
    border:1px solid #d9e2ef;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:0 18px;
    color:#0b3168;
    font-size:13px;
    font-weight:800;
    transition:.2s;
    }

    .expertise-card a:hover{
    background:#0b3168;
    color:#fff;
    }

    /* =========================================================
    SERVICES BOTTOM
    ========================================================= */

    .services-bottom{
    background:#f7faff;
    padding:35px;
    border-radius:18px;
    margin:40px auto 70px;
    max-width:1450px;
    display:grid;
    grid-template-columns:320px 1fr;
    gap:40px;
    }

    .assistance-box{
    display:flex;
    gap:20px;
    align-items:center;
    }

    .assistance-box img{
    width:95px;
    height:95px;
    border-radius:50%;
    object-fit:cover;
    }

    .assistance-box h3{
    color:#0b3168;
    font-size:22px;
    line-height:1.3;
    margin-bottom:10px;
    }

    .assistance-box p{
    color:#50617a;
    font-size:14px;
    margin-bottom:14px;
    }

    .assistance-box a{
    height:46px;
    padding:0 22px;
    border-radius:12px;
    background:#ef2345;
    color:#fff;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-weight:800;
    font-size:16px;
    }

    .why-us h3{
    color:#0b3168;
    font-size:24px;
    margin-bottom:30px;
    }

    .why-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:22px;
    }

    .why-grid div{
    text-align:center;
    }

    .why-grid i{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#eef4ff;
    color:#0b3168;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto auto 16px;
    font-size:28px;
    }

    .why-grid span{
    color:#24344d;
    font-size:14px;
    font-weight:700;
    }

    /* =========================================================
    RESPONSIVE
    ========================================================= */

    @media(max-width:1400px){

    .expertise-grid{
    grid-template-columns:repeat(6,1fr);
    }

    }

    @media(max-width:992px){

    .services-hero{
    grid-template-columns:1fr;
    }

    .services-left{
    padding:40px 20px;
    }

    .services-left h1{
    font-size:34px;
    }

    .services-bottom{
    grid-template-columns:1fr;
    margin:40px 20px;
    }

    .why-grid{
    grid-template-columns:repeat(2,1fr);
    }

    }

    @media(max-width:768px){

    .expertise-grid{
    grid-template-columns:1fr;
    padding:0 20px;
    }

    .section-title{
    font-size:28px;
    }

    .why-grid{
    grid-template-columns:1fr;
    }

    }
</style>

@endsection