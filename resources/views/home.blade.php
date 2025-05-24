@extends('layouts.app')

@section('content')
<nav x-data="{ open: false }" class="w-full fixed top-0 z-50 bg-gradient-to-r from-[#D78C00] to-[#F1BB6A] px-4 py-4">
    <div class="max-w-[1280px] mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="/img/logo.png" alt="Logo" class="w-[60px] h-[60px] object-contain">
            <span class="text-white text-[26px] opacity-70 leading-[100%] font-['Protest_Strike']">Borobudur <br/> Tales</span>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-x-10 items-center text-white font-medium text-[16px] font-['Inter']">
            <li><a href="#" class="hover:underline">Beranda</a></li>
            <li><a href="#" class="hover:underline">Eksplor</a></li>
            <li><a href="#" class="hover:underline">Pustaka</a></li>
            <li><a href="#" class="hover:underline">Unggah Gambar</a></li>
        </ul>

        <!-- Action buttons -->
        <div class="hidden md:flex gap-x-5">
            <a href="#" class="border border-white text-white px-3 py-1 rounded text-sm">Masuk</a>
            <a href="#" class="bg-white text-[#D78C00] px-3 py-1 rounded text-sm">Daftar</a>
        </div>

        <!-- Hamburger -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path x-show="!open" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" style="display: none;" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden mt-4 bg-[#D78C00] text-white px-4 py-4 rounded-lg space-y-2 font-['Inter'] text-sm">
        <a href="#" class="block">Beranda</a>
        <a href="#" class="block">Eksplor</a>
        <a href="#" class="block">Pustaka</a>
        <a href="#" class="block">Unggah Gambar</a>
        <div class="pt-2 border-t border-white mt-2">
            <a href="#" class="block py-1">Masuk</a>
            <a href="#" class="block bg-white text-[#D78C00] rounded px-3 py-1 w-fit">Daftar</a>
        </div>
    </div>
</nav>


{{-- Hero Section --}}
<div class="w-full flex justify-center mt-[120px] mb-[60px] px-6">
  <div class="w-full max-w-[1203px] h-[588px] rounded-[13px] overflow-hidden relative bg-cover bg-center"
       style="background-image: url('/img/hero-image.png');">
    <div class="absolute inset-0 bg-gradient-to-br from-[rgba(210,105,30,0.3)] to-[rgba(139,69,19,0.4)] z-10"></div>
    <div class="absolute bottom-10 left-10 text-white z-20">
      <h1 class="text-[50px] font-bold leading-none font-['Inter']">Borobudur Tales</h1>
      <p class="text-[30px] font-normal opacity-90 leading-snug font-['Inria_Serif'] mt-2">
        Jelajahi kisah-kisah kuno yang terpahat di relief Candi Borobudur<br/>
        melalui teknologi modern
      </p>
    </div>
  </div>
</div>

@php
  $features = [
    ['icon' => 'arsitektur-icon.png', 'title' => 'Sejarah', 'desc' => 'Pelajari perjalanan candi Buddha terbesar dunia yang menjadi warisan UNESCO'],
    ['icon' => 'papyrus-icon.png', 'title' => 'Kisah Relief', 'desc' => 'Pelajari 2.672 panel relief yang menceritakan kisah-kisah Buddha dan kehidupan masyarakat kuno'],
    ['icon' => 'search-icon.png', 'title' => 'Unggah & Temukan', 'desc' => 'Ambil foto relief dan temukan kisah dibaliknya']
  ];
@endphp

{{-- jelajahi --}}
<section class="w-full bg-gradient-to-r from-[#D78C00] to-[#F1BB6A] py-16 px-6">
  <div class="max-w-[1280px] mx-auto">
    <h2 class="text-[36px] font-bold text-black font-['Inter'] text-center mb-10">Jelajahi Kekayaan Sejarah Borobudur</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 place-items-center">
      @foreach($features as $feature)
      <div class="w-[350px] h-[318px] bg-[#DBD4D4] rounded-[20px] p-6 flex flex-col items-center text-center shadow-sm">
        <div class="w-[100px] h-[100px] rounded-full bg-[#866B52] mb-4 flex items-center justify-center">
          <img src="/img/{{ $feature['icon'] }}" class="w-[60px] h-[60px] object-contain" alt="{{ $feature['title'] }}">
        </div>
        <h3 class="text-[25px] font-semibold text-[#333] font-['Inter'] mb-2">{{ $feature['title'] }}</h3>
        <p class="text-[20px] text-[#444] leading-relaxed font-['Inria_Serif']">{{ $feature['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="bg-gray-100 py-16 text-center">
  <h2 class="text-[28px] font-bold font-['Inter'] mb-10">Team</h2>

  <div class="grid grid-cols-2 md:grid-cols-3 gap-y-12 gap-x-4 px-6 max-w-6xl mx-auto">
    @foreach ([
      ['nama' => 'Reza Nagita Nurazizah', 'img' => 'sasa.png', 'role' => 'Machine Learning'],
      ['nama' => 'Muhammad Solihin', 'img' => 'solihin.png', 'role' => 'Machine Learning'],
      ['nama' => 'Andreas Adi Prasetyo', 'img' => 'andreas.png', 'role' => 'Machine Learning'],
      ['nama' => 'Siti Fatimah Nur Cahya', 'img' => 'fatimah.png', 'role' => 'FEBE'],
      ['nama' => 'Maya Putri Nur Fajri', 'img' => 'maya.png', 'role' => 'FEBE'],
      ['nama' => 'Firdy Dwi Aryani', 'img' => 'firdy.png', 'role' => 'FEBE'],
    ] as $member)
      <div class="w-full flex flex-col items-center">
        <img src="/img/{{ $member['img'] }}" alt="{{ $member['nama'] }}"
             class="w-44 h-44 rounded-full object-cover border-2 border-white shadow-md mb-3">
        <p class="text-sm font-semibold font-['Inter'] text-[#333] text-center leading-tight max-w-[160px]">
          {{ $member['nama'] }}
        </p>
        <span class="mt-1 inline-block bg-[#F1BB6A] text-[#5A3E00] text-xs font-semibold px-3 py-1 rounded-full">
          {{ $member['role'] }}
        </span>
      </div>
    @endforeach
  </div>
</section>




{{-- Tentang kami section --}}
<section class="w-full bg-[#E8E8E8] py-16 px-6">
  <h2 class="text-[30px] font-bold text-center mb-6 font-['Inter']">Tentang Kami</h2>
  <div class="bg-white border border-[#F1BB6A] max-w-[1280px] mx-auto p-8">
    <p class="text-[25px] text-[#444] text-justify leading-[1.6] font-['Inria_Serif']">
      Borobudur Tales memberikan layanan informasi seputar Relief Candi Borobudur secara mudah, cepat, dan menarik.
      Website ini bertujuan untuk memperkenalkan kisah-kisah di balik relief kepada wisatawan agar pengalaman
      berkunjung menjadi lebih bermakna. Melalui Borobudur Tales, wisatawan dapat memahami sejarah dan makna relief
      tanpa harus bergantung pada pemandu wisata.
    </p>
  </div>
</section>

{{-- Footer - Improved alignment to match header --}}
<footer class="w-full bg-[#343434] text-[#D9D9D9] border-t-2" style="border-image: linear-gradient(45deg, #D6AD60, #949494) 1;">
  <div class="max-w-[1280px] mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row justify-between items-start gap-1">
      
      <!-- Logo + Info - Logo digeser ke kiri -->
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
      <p>Beranda</p>
      <p>Eksplor</p>
      <p>Pustaka</p>
      <p>Unggah Gambar</p>
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
</footer>