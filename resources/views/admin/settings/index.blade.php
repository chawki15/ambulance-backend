@extends('admin.layouts.app')

@section('title', ucfirst(str_replace('-', ' ', 'settings')))

@section('content')
<section class="hero">
  <div>
    <h1>Settings</h1>
    <p>Page admin prête à personnaliser.</p>
  </div>
</section>

<div class="card panel">
  <h3>Contenu</h3>
  <p>Ajoute ici table, formulaire, filtres...</p>
</div>
@endsection
