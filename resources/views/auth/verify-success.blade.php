<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="max-w-4xl gap-8 p-6 md:flex md:items-center">
            <div class="flex-shrink-0 mb-4 md:mb-0 md:w-1/2">
                <img src="{{ asset('images/Email campaign-cuate 1.svg') }}" alt="Email Verification Illustration"
                    class="w-full h-auto">
            </div>

            <div class="p-6 text-center bg-white border shadow-lg md:w-1/2 rounded-xl">
                <h2 class="mb-4 text-xl font-semibold text-yellow-600 md:text-2xl">
                    Pendaftaran Berhasil
                </h2>
                <p class="text-sm text-gray-700">
                    Verifikasi Email Anda Berhasil
                    <span></span>
                </p>
                <p class="mb-4 text-sm text-gray-700">
                    Selamat Datang 
                    <span class="font-semibold">
                        {{ Auth::user()->username }}
                    </span> 
                </p>

                <a href="{{ route('home') }}"
                    class="w-full px-4 py-2 font-semibold text-white transition bg-yellow-600 rounded shadow hover:bg-yellow-700">
                    Halaman Beranda
                </a>


            </div>
        </div>
    </div>
</x-guest-layout>
