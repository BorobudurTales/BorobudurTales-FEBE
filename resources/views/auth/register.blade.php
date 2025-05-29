<x-guest-layout>
    <div class="w-[500px] bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <h2 class="text-2xl font-bold text-yellow-600 text-center mb-6">Buat Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    autofocus />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Nama Depan -->
            <div class="mb-4">
                <x-input-label for="first_name" :value="__('Nama Depan')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Nama Belakang -->
            <div class="mb-4">
                <x-input-label for="last_name" :value="__('Nama Belakang')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" />
                    <button type="button" onclick="togglePassword('password', this)"
                        class="absolute right-3 top-3 text-gray-500 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                        name="password_confirmation" />
                    <button type="button" onclick="togglePassword('password_confirmation', this)"
                        class="absolute right-3 top-3 text-gray-500 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
            </div>



            <!-- Link ke Login -->
            <div class="text-sm text-center mb-4">
                <span class="text-gray-500">Punya akun? </span>
                <a href="{{ route('login') }}" class="text-yellow-600 hover:underline font-semibold">Masuk</a>
            </div>

            <!-- Tombol Daftar -->
            <x-primary-button
                class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 rounded-md flex justify-center items-center">
                {{ __('Daftar') }}
            </x-primary-button>

        </form>
    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const svg = btn.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                svg.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.92-4.419M6.395 6.433A9.98 9.98 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.156 5.317M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18"/>
            `;
            } else {
                input.type = 'password';
                svg.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
            `;
            }
        }
    </script>


</x-guest-layout>
