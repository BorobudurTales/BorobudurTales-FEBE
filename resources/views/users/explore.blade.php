<x-app-layout>
    <!-- Hero Image -->
    <div class="">
        <img src="{{ asset('images/hearder.svg') }}" alt="Borobudur" class="" />
    </div>

    <!-- Sejarah Singkat -->
    <section class="p-8 mt-10 space-y-8">
        <h2 class="text-4xl font-extrabold text-center text-yellow-600">Sejarah Singkat</h2>
        <div class="grid items-center gap-8 md:grid-cols-2">
            <!-- Gambar -->
            <div class="flex justify-center">
                <img src="{{ asset('images/borobudur.svg') }}" alt="Borobudur" class="rounded-md w-96" />
            </div>

            <!-- Teks -->
            <div class="self-center mt-6 space-y-6 leading-relaxed text-justify">
                <div>
                    <h3 class="text-xl font-semibold text-yellow-700">Dibangun Abad ke-9</h3>
                    <p>Candi Borobudur dibangun sekitar tahun 800 Masehi oleh Dinasti Syailendra, dengan motif keagamaan
                        dan juga Tantrik Buddhisme Mahayana, dan menjadi pusat ibadah hingga ditinggalkan pada abad
                        ke-14 karena masuknya Islam ke Nusantara.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-yellow-700">Terkubur dan Ditemukan Kembali</h3>
                    <p>Borobudur tertutup abu vulkanik dan tumbuh-tumbuhan selama ratusan tahun. Hingga ditemukan
                        kembali pada tahun 1814 oleh Sir Thomas Stamford Raffles saat Inggris menguasai Jawa.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-yellow-700">Warisan Dunia UNESCO</h3>
                    <p>Pada tahun 1991, Candi Borobudur resmi ditetapkan sebagai Situs Warisan Dunia UNESCO karena nilai
                        historis dan arsitekturalnya yang luar biasa.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Struktur & Filosofi -->
    <section class="p-6 mt-10 space-y-8">
        <h2 class="text-4xl font-extrabold text-center text-yellow-600">Struktur & Filosofi</h2>
        <div class="grid gap-6 text-center md:grid-cols-3">
            <div class="p-6 bg-gray-200 border shadow-md rounded-xl">
                <div class="mb-4 text-4xl">🔥</div>
                <h3 class="mb-2 text-lg font-semibold text-yellow-700">Kamadhatu</h3>
                <p class="text-sm text-gray-700">Lapisan dasar yang melambangkan dunia hasrat dan keinginan, penuh
                    dengan nafsu duniawi.</p>
            </div>
            <div class="p-6 bg-gray-200 border shadow-md rounded-xl">
                <div class="mb-4 text-4xl">🏯</div>
                <h3 class="mb-2 text-lg font-semibold text-yellow-700">Rupadhatu</h3>
                <p class="text-sm text-gray-700">Lapisan tengah yang mencerminkan bentuk fisik namun sudah mulai
                    meninggalkan keinginan duniawi.</p>
            </div>
            <div class="p-6 bg-gray-200 border shadow-md rounded-xl">
                <div class="mb-4 text-4xl">🧘</div>
                <h3 class="mb-2 text-lg font-semibold text-yellow-700">Arupadhatu</h3>
                <p class="text-sm text-gray-700">Lapisan atas yang menggambarkan kesucian tertinggi, tanpa bentuk dan
                    duniawi.</p>
            </div>
        </div>
    </section>

    <!-- Kutipan -->
    <section
        class="px-6 py-10 mt-10 text-center text-gray-600 shadow-lg bg-gradient-to-r from-yellow-300 to-orange-400">
        <p class="max-w-3xl mx-auto italic font-semibold">"Pikiran adalah pelopor dari segala sesuatu, pikiran adalah
            pemimpin, segalanya diciptakan oleh pikiran."<br>— Dhammapada, Kitab Buddha</p>
    </section>

    <!-- CTA -->
    <section class="my-10 space-y-4 text-center">
        <h2 class="text-4xl font-extrabold text-center text-yellow-600">Siap Menjelajahi Lebih Dalam?</h2>
        <p class="text-gray-700">Temukan ribuan kisah yang terpahat di panel relief Borobudur atau unggah foto reliefmu
            sendiri untuk mengungkap ceritanya.</p>
        <div class="flex justify-center gap-4 mt-4">
            <button class="px-5 py-2 text-black transition bg-yellow-400 rounded-lg hover:bg-yellow-500">Buka Pustaka
                Cerita</button>
            <button class="px-5 py-2 text-white transition bg-gray-800 rounded-lg hover:bg-gray-700">Temukan
                Cerita</button>
        </div>
    </section>

</x-app-layout>
