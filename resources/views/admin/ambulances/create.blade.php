@extends('admin.layouts.app')

@section('title', 'Ajouter une ambulance')

@section('content')

@include('admin.ambulances.partials.form', [
'action' => route('ambulances.store'),
'method' => 'POST',
'submitLabel' => 'Ajouter une ambulance',
'showStatus' => false,
'pageTitle' => 'Ajouter une ambulance',
'breadcrumbLabel' => 'Ajouter',
'pageDescription' => 'Remplissez les informations nécessaires pour créer une nouvelle ambulance.',
])
@endsection