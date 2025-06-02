<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lupa Kata Sandi</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-white">

    <div class="flex flex-col min-h-screen lg:flex-row">
        <div class="flex items-center justify-center w-full p-6 bg-white lg:w-1/2">
            <img src="{{ asset('images/Forgot password-pana 1.svg') }}" 
                 alt="Forgot Password Illustration" 
                 class="w-full h-auto max-w-md">
        </div>

        <div class="flex items-center justify-center w-full p-6 lg:w-1/2">
            <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl">
                <h2 class="mb-4 text-2xl font-bold text-center text-yellow-700 lg:text-3xl">Lupa Kata Sandi</h2>
                <p class="mb-6 text-sm text-center text-gray-600">
                    Masukkan alamat email yang Anda gunakan untuk mendaftar. Kami akan mengirimkan instruksi untuk mengatur ulang kata sandi Anda.
                </p>
                <x-auth.auth-session-status class="mb-4" :status="session('status')"/>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" />
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-6 py-2 font-semibold text-white bg-yellow-700 rounded-md shadow hover:bg-yellow-800">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
