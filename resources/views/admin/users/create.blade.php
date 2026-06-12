@extends('admin.layouts.app')

@section('title', isset($user) ? 'Update User' : 'Add User')

@section('content')

@include('admin.components.users.users-create')

@endsection