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

<body class="bg-white font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-white">
            <img src="{{ asset('images/Forgot password-pana 1.svg') }}" 
                 alt="Forgot Password Illustration" 
                 class="w-full max-w-md h-auto">
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
                <h2 class="text-2xl lg:text-3xl font-bold text-yellow-700 mb-4 text-center">Lupa Kata Sandi</h2>
                <p class="text-center text-gray-600 mb-6 text-sm">
                    Masukkan alamat email yang Anda gunakan untuk mendaftar. Kami akan mengirimkan instruksi untuk mengatur ulang kata sandi Anda.
                </p>
                <x-auth-session-status class="mb-4" :status="session('status')"/>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" />
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-yellow-700 hover:bg-yellow-800 text-white font-semibold px-6 py-2 rounded-md shadow">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
