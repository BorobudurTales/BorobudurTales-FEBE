<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class=" p-6 md:flex md:items-center gap-8 max-w-4xl">
            <div class="flex-shrink-0 mb-4 md:mb-0 md:w-1/2">
                <img src="{{ asset('images/Email campaign-cuate 1.svg') }}" alt="Email Verification Illustration" class="w-full h-auto">
            </div>

            <div class="md:w-1/2 bg-white shadow-lg rounded-xl p-6 text-center">
                <h2 class="text-xl md:text-2xl font-semibold text-yellow-600 mb-4">
                    Tautan verifikasi telah dikirim ke email Anda
                </h2>
                <p class="text-sm text-gray-700 mb-4">
                    Silakan periksa kotak masuk dan klik <strong>"Verifikasi Sekarang"</strong> untuk melanjutkan.
                    <br>
                    Belum menerima email? Klik tombol di bawah untuk mengirim ulang.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        Tautan verifikasi baru telah dikirim ke alamat email Anda.
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}" class="mb-2">
                    @csrf
                    <button type="submit"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded shadow transition">
                        Kirim Ulang
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-500 hover:text-gray-700 underline">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
