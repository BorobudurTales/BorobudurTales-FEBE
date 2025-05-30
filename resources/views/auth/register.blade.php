<x-guest-layout>
    <div class="w-[500px] bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <h2 class="mb-6 text-2xl font-bold text-center text-yellow-600">Buat Akun Baru</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <x-auth.input-label for="username" :value="__('Username')" />
                <x-auth.text-input id="username" placeholder="Masukan Username" class="block w-full mt-1 text-sm {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }}" type="text" name="username" :value="old('username')"
                    autofocus />
                <x-auth.input-error :messages="$errors->get('username')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Nama Depan -->
            <div class="mb-4">
                <x-auth.input-label for="first_name" :value="__('Nama Depan')" />
                <x-auth.text-input id="first_name" placeholder="Masukan Nama Depan" class="block w-full mt-1 text-sm {{ $errors->has('first_name') ? 'border-red-500' : 'border-gray-300' }}" type="text" name="first_name"
                    :value="old('first_name')" autofocus />
                <x-auth.input-error :messages="$errors->get('first_name')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Nama Belakang -->
            <div class="mb-4">
                <x-auth.input-label for="last_name" :value="__('Nama Belakang')" />
                <x-auth.text-input id="last_name" placeholder="Masukan Nama Belakang" class="block w-full mt-1 text-sm {{ $errors->has('last_name') ? 'border-red-500' : 'border-gray-300' }}" type="text" name="last_name"
                    :value="old('last_name')" />
                <x-auth.input-error :messages="$errors->get('last_name')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-auth.input-label for="email" :value="__('Email')" />
                <x-auth.text-input id="email" placeholder="Masukan Email" class="block w-full mt-1 text-sm {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" type="email" name="email"
                    :value="old('email')" />
                <x-auth.input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <x-auth.input-label for="password" :value="__('Kata Sandi')" />
                <div class="relative">
                    <x-auth.text-input id="password"  placeholder="Masukan Kata Sandi"  class="block text-sm w-full pr-10 mt-1 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}" type="password" name="password" />
                    <button type="button" onclick="togglePassword('password', this)"
                        class="absolute text-gray-500 right-3 top-3 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-auth.input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="mb-4">
                <x-auth.input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                <div class="relative">
                    <x-auth.text-input id="password_confirmation"  placeholder="Masukan Konfirmasi Kata Sandi"  class="block text-sm w-full pr-10 mt-1 {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}" type="password"
                        name="password_confirmation" />
                    <button type="button" onclick="togglePassword('password_confirmation', this)"
                        class="absolute text-gray-500 right-3 top-3 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-auth.input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>



            <!-- Link ke Login -->
            <div class="mb-4 text-sm text-center">
                <span class="text-gray-500">Punya akun? </span>
                <a href="{{ route('login') }}" class="font-semibold text-yellow-600 hover:underline">Masuk</a>
            </div>

            <!-- Tombol Daftar -->
            <x-auth.primary-button
                class="flex items-center justify-center w-full px-4 py-3 font-bold text-white bg-yellow-600 rounded-md hover:bg-yellow-700">
                {{ __('Daftar') }}
            </x-auth.primary-button>

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
