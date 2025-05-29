<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Eksplor Borobudur</title>

  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

  <!-- Hero Image -->
  <div class="relative">
    <img src="{{ asset('images/hearder.svg') }}" alt="Borobudur" class="w-full h-[300px] object-cover"/>
  </div>

  <!-- Main Content -->
  <main class="px-6 md:px-20 py-16 space-y-16">

  <!-- Sejarah Singkat -->
  <section class="space-y-8">
    <h2 class="text-4xl font-extrabold text-center text-yellow-600">Sejarah Singkat</h2>
    <div class="grid md:grid-cols-2 gap-8 items-center">
      <!-- Gambar -->
      <div class="bg-white rounded-xl shadow-md border p-4">
        <img src="{{ asset('images/borobudur.svg') }}" alt="Borobudur" class="w-full rounded-md"/>
      </div>

      <!-- Teks -->
      <div class="space-y-6 text-justify leading-relaxed self-center mt-6">
        <div>
          <h3 class="font-semibold text-xl text-yellow-700">Dibangun Abad ke-9</h3>
          <p>Candi Borobudur dibangun sekitar tahun 800 Masehi oleh Dinasti Syailendra, dengan motif keagamaan dan juga Tantrik Buddhisme Mahayana, dan menjadi pusat ibadah hingga ditinggalkan pada abad ke-14 karena masuknya Islam ke Nusantara.</p>
        </div>
        <div>
          <h3 class="font-semibold text-xl text-yellow-700">Terkubur dan Ditemukan Kembali</h3>
          <p>Borobudur tertutup abu vulkanik dan tumbuh-tumbuhan selama ratusan tahun. Hingga ditemukan kembali pada tahun 1814 oleh Sir Thomas Stamford Raffles saat Inggris menguasai Jawa.</p>
        </div>
        <div>
          <h3 class="font-semibold text-xl text-yellow-700">Warisan Dunia UNESCO</h3>
          <p>Pada tahun 1991, Candi Borobudur resmi ditetapkan sebagai Situs Warisan Dunia UNESCO karena nilai historis dan arsitekturalnya yang luar biasa.</p>
        </div>
      </div>
    </div>
  </section>


    <!-- Struktur & Filosofi -->
    <section class="space-y-8">
    <h2 class="text-4xl font-extrabold text-center text-yellow-600">Struktur & Filosofi</h2>
      <div class="grid md:grid-cols-3 gap-6 text-center">
        <div class="bg-white rounded-xl p-6 shadow-md border">
          <div class="text-4xl mb-4">🔥</div>
          <h3 class="font-semibold mb-2 text-lg text-yellow-700">Kamadhatu</h3>
          <p class="text-sm text-gray-700">Lapisan dasar yang melambangkan dunia hasrat dan keinginan, penuh dengan nafsu duniawi.</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md border">
          <div class="text-4xl mb-4">🏯</div>
          <h3 class="font-semibold mb-2 text-lg text-yellow-700">Rupadhatu</h3>
          <p class="text-sm text-gray-700">Lapisan tengah yang mencerminkan bentuk fisik namun sudah mulai meninggalkan keinginan duniawi.</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md border">
          <div class="text-4xl mb-4">🧘</div>
          <h3 class="font-semibold mb-2 text-lg text-yellow-700">Arupadhatu</h3>
          <p class="text-sm text-gray-700">Lapisan atas yang menggambarkan kesucian tertinggi, tanpa bentuk dan duniawi.</p>
        </div>
      </div>
    </section>

    <!-- Kutipan -->
    <section class="bg-gradient-to-r from-yellow-300 to-orange-400 text-center text-black py-10 px-6 rounded-xl shadow-lg">
      <p class="italic font-semibold max-w-3xl mx-auto">"Pikiran adalah pelopor dari segala sesuatu, pikiran adalah pemimpin, segalanya diciptakan oleh pikiran."<br>— Dhammapada, Kitab Buddha</p>
    </section>

    <!-- CTA -->
    <section class="text-center space-y-4">
      <h2 class="text-4xl font-extrabold text-center text-yellow-600">Siap Menjelajahi Lebih Dalam?</h2>
      <p class="text-gray-700">Temukan ribuan kisah yang terpahat di panel relief Borobudur atau unggah foto reliefmu sendiri untuk mengungkap ceritanya.</p>
      <div class="flex justify-center gap-4 mt-4">
        <button class="bg-yellow-400 text-black px-5 py-2 rounded-lg hover:bg-yellow-500 transition">Buka Pustaka Cerita</button>
        <button class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition">Temukan Cerita</button>
      </div>
    </section>

  </main>






</body>
</html>
