<x-guest-layout>
    <div class="min-h-screen  flex items-center justify-center bg-white px-4 py-12">
        <div class="flex flex-col lg:flex-row items-center gap-10">

            <div class="w-full max-w-lg">
                <img src="{{ asset('images/Confirmed-cuate 1.svg') }}" alt="Password Updated Illustration" class="w-full h-auto max-h-[80vh]">
            </div>

            <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-xl">
                <h2 class="text-4xl font-semibold text-yellow-700 mb-6 text-center">
                    Kata Sandi Berhasil Diperbarui
                </h2>
                <a href="{{ route('login') }}">
                    <button class="w-full bg-yellow-700 hover:bg-yellow-800 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Login
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
