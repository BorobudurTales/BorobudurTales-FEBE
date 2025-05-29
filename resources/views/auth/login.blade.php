<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-white">
        <div class="w-[480px] bg-white rounded-xl p-8 border border-gray-200 shadow-md">
            <h1 class="text-2xl font-bold text-[#C98300] mb-6 text-center">Masuk ke Akun Anda</h1>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input id="email" name="email" type="email" :value="old('email')" required autofocus autocomplete="username"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-4">
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700" />
                    <div class="relative">
                        <x-text-input id="password" name="password" type="password" required
                            class="mt-1 block w-full pr-10 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute right-3 top-3 text-gray-500 hover:text-[#C98300]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex justify-end mb-4 text-sm">
                    <a class="text-[#C98300] hover:underline" href="{{ route('password.request') }}">
                        Lupa Kata Sandi?
                    </a>
                </div>

                <div class="mt-6">
                    <button
                        class="w-full py-2 px-4 bg-[#C98300] text-white rounded-md font-semibold hover:bg-[#b77500] transition duration-200">
                        MASUK
                    </button>
                </div>
                
                <div class="mt-4 text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-[#C98300] font-semibold hover:underline">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const svg = btn.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                svg.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.92-4.419M6.395 6.433A9.98 9.98 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.156 5.317M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18"/>`;
            } else {
                input.type = 'password';
                svg.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>`;
            }
        }
    </script>
</x-guest-layout>
