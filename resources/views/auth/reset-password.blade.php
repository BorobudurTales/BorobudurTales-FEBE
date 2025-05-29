<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ubah Kata Sandi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md">
        <h2 class="text-center text-2xl font-semibold text-yellow-600 mb-6">Ubah Kata Sandi</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 pr-10 focus:border-yellow-500 focus:ring-yellow-500 text-sm">
                    <span onclick="toggleVisibility('password')" class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500">
                        <svg id="eye-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-off-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.132-3.362M6.354 6.354A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.132 5.132M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m6 0a3 3 0 01-3 3m0 0a3 3 0 01-3-3m0 0L3 3" />
                        </svg>
                    </span>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 pr-10 focus:border-yellow-500 focus:ring-yellow-500 text-sm">
                    <span onclick="toggleVisibility('password_confirmation')" class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500">
                        <svg id="eye-password_confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-off-password_confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.132-3.362M6.354 6.354A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.132 5.132M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m6 0a3 3 0 01-3 3m0 0a3 3 0 01-3-3m0 0L3 3" />
                        </svg>
                    </span>
                </div>
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 rounded-full transition duration-200">
                Kirim
            </button>
        </form>
    </div>

    <script>
        function toggleVisibility(id) {
            const input = document.getElementById(id);
            const eye = document.getElementById('eye-' + id);
            const eyeOff = document.getElementById('eye-off-' + id);

            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.add('hidden');
                eyeOff.classList.remove('hidden');
            } else {
                input.type = 'password';
                eye.classList.remove('hidden');
                eyeOff.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
