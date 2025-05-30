<x-app-layout>

    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('img/data/' . $ceritaId->images->filename) }}" alt="Relief Candi"
            class="w-full h-[22rem] object-cover brightness-75" />
        <h2 class="absolute text-3xl font-bold text-white bottom-6 left-20 md:text-4xl drop-shadow-lg">
            {{ $ceritaId->tema }}
        </h2>
    </section>

    <!-- Content Section -->
    <main class="px-6 py-12 bg-white md:px-20 lg:px-36">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <!-- Narasi Cerita -->
            <div class="space-y-6 md:col-span-2">
                <h3 class="text-xl font-bold text-amber-700">Narasi Cerita</h3>
                <p class="leading-relaxed text-justify text-gray-800">
                    {{ $ceritaId->cerita }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('library') }}" class="px-6 py-2 text-sm border border-gray-600 rounded-full hover:bg-gray-100">
                        Kembali ke Pustaka
                    </a>
                    <button class="px-6 py-2 text-sm text-white rounded-full bg-amber-600 hover:bg-amber-700">
                        Telusuri Visualisasinya
                    </button>
                </div>
            </div>

            <!-- Info Tambahan -->
            <aside class="">
                <div class="p-4 transition-all bg-gray-100 border shadow-lg rounded-xl hover:scale-105">
                    <h4 class="mb-2 text-lg font-bold text-amber-700">Makna Simbolis</h4>
                    <p class="text-sm leading-relaxed text-gray-700">
                        {{ $ceritaId->makna }}
                    </p>
                </div>
            </aside>
        </div>
    </main>
</x-app-layout>
