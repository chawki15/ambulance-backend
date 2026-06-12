@extends('admin.layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f4f7fb;
        font-family: 'Montserrat', sans-serif;
        color: #0f172a;
    }

    .main {
        padding: 24px;
    }

    .page-title {
        font-size: 42px;
        font-weight: 900;
        color: #071436;
        margin-bottom: 8px;
    }

    .breadcrumb {
        font-size: 15px;
        color: #475569;
        margin-bottom: 24px;
    }

    .card {
        background: #fff;
        border-radius: 14px;
        padding: 24px;
        border: 1px solid #e2e8f0;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 16px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4f46e5;
        font-size: 24px;
    }

    .card-header h2 {
        color: #4f46e5;
        font-size: 28px;
        margin-bottom: 4px;
    }

    .card-header p {
        color: #64748b;
        font-size: 14px;
    }

    .form {
        margin-top: 24px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }

    .form-group label span {
        color: #ef4444;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap input,
    .input-wrap select {
        width: 100%;
        height: 48px;
        border: 1px solid #dbe3ef;
        border-radius: 10px;
        padding: 0 42px 0 14px;
        font-size: 14px;
        outline: none;
    }

    .input-wrap input:focus,
    .input-wrap select:focus {
        border-color: #4f46e5;
    }

    .input-wrap i {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #4f46e5;
    }

    .actions {
        margin-top: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #e2e8f0;
        padding-top: 20px;
    }

    .btn {
        height: 46px;
        border: none;
        border-radius: 10px;
        padding: 0 22px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-cancel {
        background: #fff;
        border: 1px solid #dbe3ef;
        color: #334155;
    }

    .btn-save {
        background: #4f46e5;
        color: #fff;
    }

    .btn-save:hover {
        background: #4338ca;
    }
</style>


<h1 class="page-title">Ajouter une ambulance</h1>

<div class="breadcrumb">
    Home › Ambulances › Ajouter une ambulance
</div>

<div class="card">

    <div class="card-header">
        <div class="icon-box">
            <i class="fa-solid fa-truck-medical"></i>
        </div>

        <div>
            <h2>Informations de l'ambulance</h2>
            <p>Remplissez les détails de l'ambulance ci-dessous.</p>
        </div>
    </div>

    <form class="form">

        <div class="form-group">
            <label>
                Type d'ambulance <span>*</span>
            </label>

            <div class="input-wrap">
                <select>
                    <option>Sélectionnez le type d'ambulance</option>
                    <option>Ambulance médicalisée</option>
                    <option>Ambulance de transport</option>
                    <option>Ambulance d'urgence</option>
                </select>

                <i class="fa-solid fa-truck-medical"></i>
            </div>
        </div>

        <div class="form-group">
            <label>
                Numéro d'immatriculation <span>*</span>
            </label>

            <div class="input-wrap">
                <input
                    type="text"
                    placeholder="12345-A-1">

                <i class="fa-solid fa-car"></i>
            </div>
        </div>

        <div class="form-group">
            <label>
                Date d'expiration de la licence <span>*</span>
            </label>

            <div class="input-wrap">
                <input type="date">

                <i class="fa-regular fa-calendar"></i>
            </div>
        </div>

        <div class="actions">

            <button
                type="button"
                class="btn btn-cancel">
                <i class="fa-solid fa-arrow-left"></i>
                Annuler
            </button>

            <button
                type="submit"
                class="btn btn-save">
                <i class="fa-solid fa-floppy-disk"></i>
                Ajouter une ambulance
            </button>

        </div>

    </form>

</div>
@endsection