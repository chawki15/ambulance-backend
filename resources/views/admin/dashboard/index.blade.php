@extends('admin.layouts.app')

@section('title', 'Dashboard - Yanis Assistance')

@section('content')
  @include('admin.components.dashboard-header')
  @include('admin.components.stats')

  <section class="content-grid">
    @include('admin.components.activities')
    @include('admin.components.sales-pie')
    @include('admin.components.sales-chart')
    @include('admin.components.alerts')
  </section>
@endsection
