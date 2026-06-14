<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Yanis Assistance - Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
</head>

<body>
    <div class="app">
        @include('admin.layouts.sidebar')

        <main class="main">
            @include('admin.layouts.topbar')

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/admin/script.js') }}"></script>
    @stack('scripts')
</body>

</html>