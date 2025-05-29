<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library 3a</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-800 font-sans">
  <!-- Header -->


  <!-- Hero Section -->
  <section class="relative">
    <img src="{{ asset('images/frame.svg') }}" alt="Relief Candi" class="w-full h-[22rem] object-cover brightness-75" />
    <h2 class="absolute bottom-6 left-6 text-3xl md:text-4xl font-bold text-white drop-shadow-lg">
      Kisah Jataka: Raja Monyet
    </h2>
  </section>

  <!-- Content Section -->
  <main class="bg-white px-6 py-12 md:px-20 lg:px-36">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Narasi Cerita -->
      <div class="md:col-span-2 space-y-6">
        <h3 class="text-lg font-bold text-amber-700">Narasi Cerita</h3>
        <p class="text-justify leading-relaxed text-gray-800">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius facilisis ex nec convallis.<br><br>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius facilisis ex nec convallis. Proin ut tincidunt sem. Etiam sit amet purus ut sapien blandit dictum. Sed nec nunc ac ligula efficitur venenatis non vitae enim. Integer imperdiet, sem et rutrum suscipit, orci eros facilisis lacus, ac ultricies lorem sapien ac turpis.
        </p>
        <div class="flex flex-wrap gap-4">
          <button class="border border-gray-600 text-sm px-6 py-2 rounded-full hover:bg-gray-100">
            Kembali ke Pustaka
          </button>
          <button class="bg-amber-600 text-white text-sm px-6 py-2 rounded-full hover:bg-amber-700">
            Telusuri Visualisasinya
          </button>
        </div>
      </div>

      <!-- Info Tambahan -->
      <aside class="space-y-8">
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <h4 class="text-sm font-bold text-amber-700 mb-2">Latar Budaya</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, risus sed fermentum...
          </p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <h4 class="text-sm font-bold text-amber-700 mb-2">Makna Simbolis</h4>
          <p class="text-sm text-gray-700 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec malesuada risus...
          </p>
        </div>
      </aside>
    </div>
  </main>

  <!-- Footer -->
</body>
</html>
