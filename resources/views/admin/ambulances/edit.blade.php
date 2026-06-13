@extends('admin.layouts.app')

@section('title', 'Modifier une ambulance')

@section('content')
@include('admin.ambulances.partials.form', [
'action' => route('ambulances.update', $ambulance),
'method' => 'PUT',
'submitLabel' => 'Modifier une ambulance',
'showStatus' => true,
'pageTitle' => 'Modifier une ambulance',
'breadcrumbLabel' => 'Modifier',
'pageDescription' => 'Mettez à jour les informations nécessaires pour cette ambulance.',
])
@endsection