<footer class="w-full bg-[#343434] text-[#D9D9D9] border-t-2" style="border-image: linear-gradient(45deg, #D6AD60, #949494) 1;">
  <div class="max-w-[1280px] mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row justify-between items-start gap-1">
      <!-- Logo + Info -->
      <div class="flex items-start gap-3 -ml-6">
        <img src="/img/logo.png" alt="Logo" class="w-[60px] h-[60px] object-contain" />
        <div>
          <div class="text-[26px] font-bold font-['Protest_Strike'] opacity-70 leading-tight mb-4">
            <div>Borobudur</div>
            <div>Tales</div>
          </div>
          <p class="text-[20px] font-['Inria_Serif'] opacity-70 leading-[1.6] max-w-[400px]">
            Menjelajahi kisah-kisah kuno yang terpahat di relief Candi Borobudur melalui teknologi modern.
          </p>
        </div>
      </div>

      <!-- Menu -->
      <div class="flex-1 flex flex-col justify-center items-center text-[16px] font-['Inter'] opacity-70 leading-[150%] space-y-5">
        <p><a href="{{ route('home') }}">Beranda</a></p>
        <p><a href="{{ route('explore') ?? '#' }}">Eksplor</a></p>
        <p><a href="{{ route('library') }}">Pustaka</a></p>
        <p><a href="{{ route('upload') ?? '#' }}">Unggah Gambar</a></p>
      </div>

      <!-- Kontak -->
      <div class="text-[16px] font-['Inter'] opacity-70 leading-[150%] space-y-3 mt-4">
        <p class="flex items-start gap-2"><span>📍</span>Jl. Badrawati, Borobudur, Magelang, Jawa Tengah</p>
        <p class="flex items-start gap-2"><span>✉️</span><a href="mailto:borobudurtales@gmail.com" class="underline text-[#D9D9D9] opacity-70">borobudurtales@gmail.com</a></p>
        <p class="flex items-start gap-2"><span>📞</span>0895354218514</p>
      </div>
    </div>

    <!-- Garis + Copyright -->
    <div class="border-t border-[#FFFDFD]/40 mt-10 pt-10 text-center text-xs text-[#D9D9D9] opacity-60 font-['Inter']">
      © 2025 All Rights Reserved
    </div>
  </div>
</footer>
