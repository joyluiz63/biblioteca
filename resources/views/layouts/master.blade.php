<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Centro Espírita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark">

    <div class="container">
        @include('layouts.navbar')


        <div class="py-1">
            {{-- EXIBIR MENSAGEM SE HOUVER --}}
            @if (session('success'))
                <div class="bg-warning-subtle mb-2 text-center">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/mask.js') }}"></script>
</body>

</html>
