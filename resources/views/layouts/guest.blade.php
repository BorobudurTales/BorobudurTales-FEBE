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

<body class="bg-white font-sans text-gray-900 antialiased">
    <!-- Fullscreen without margin -->
    <div class="min-h-screen py-8 flex flex-col lg:flex-row">

        <!-- Form Section - Left -->
        <div class="w-full flex items-center justify-center">
            {{ $slot }}
        </div>

        <!-- Branding Section - Right -->
        @if (Route::is('login') || Route::is('register'))
            <div class="hidden lg:flex w-full bg-white items-center justify-center flex-col">
                <img src="{{ asset('images/logo-3.svg') }}" alt="Logo"
                    class="max-w-full w-48 lg:w-80 h-auto mb-1" />
                <h2 class="text-4xl lg:text-5xl font-bold text-yellow-600">BOROBUDUR</h2>
                <p class="text-2xl lg:text-3xl text-gray-400 tracking-widest mt-1">TALES</p>
            </div>
        @endif

    </div>
</body>

</html>
