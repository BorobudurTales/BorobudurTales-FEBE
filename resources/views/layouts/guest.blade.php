<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="flex min-h-screen lg:flex-row">

        <div class="flex items-center justify-center w-full px-2 py-5">
            {{ $slot }}
        </div>

        @if (Route::is('login') || Route::is('register'))
            <div class="flex-col items-center justify-center hidden w-full bg-white lg:flex">
                <img src="{{ asset('images/logo-3.svg') }}" alt="Logo"
                    class="w-48 h-auto max-w-full mb-1 lg:w-80" />
                <h2 class="text-4xl font-bold text-yellow-600 lg:text-5xl">BOROBUDUR</h2>
                <p class="mt-1 text-2xl tracking-widest text-gray-400 lg:text-3xl">TALES</p>
            </div>
        @endif

    </div>
</body>

</html>
