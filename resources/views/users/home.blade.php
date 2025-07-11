<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Hero Section --}}
    <div data-aos="zoom-down" data-aos-duration="1000" class="flex justify-center w-full px-6 mb-[60px] mt-[110px] ">
        <div class="w-full max-w-[1203px] h-[588px] rounded-[13px] overflow-hidden relative bg-cover bg-center"
            style="background-image: url('/img/hero-image.png');">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(210,105,30,0.3)] to-[rgba(139,69,19,0.4)] z-10">
            </div>
            <div data-aos="fade-up" class="absolute z-20 text-white bottom-10 left-10">
                <h1 class="text-[50px] font-bold leading-none font-['Inter']">Borobudur Tales</h1>
                <p class="text-[30px] font-normal opacity-90 leading-snug font-['Inria_Serif'] mt-2">
                    Jelajahi kisah-kisah kuno yang terpahat di relief Candi Borobudur<br />
                    melalui teknologi modern
                </p>
            </div>
        </div>
    </div>

    @php
        $features = [
            [
                'icon' => 'arsitektur-icon.png',
                'title' => 'Sejarah',
                'desc' => 'Pelajari perjalanan candi Buddha terbesar dunia yang menjadi warisan UNESCO',
            ],
            [
                'icon' => 'papyrus-icon.png',
                'title' => 'Kisah Relief',
                'desc' =>
                    'Pelajari 2.672 panel relief yang menceritakan kisah-kisah Buddha dan kehidupan masyarakat kuno',
            ],
            [
                'icon' => 'search-icon.png',
                'title' => 'Unggah & Temukan',
                'desc' => 'Ambil foto relief dan temukan kisah dibaliknya',
            ],
        ];
    @endphp

    {{-- jelajahi --}}
    <section class="w-full bg-gradient-to-r from-[#D78C00] to-[#F1BB6A] py-16 px-6">
        <div class="max-w-[1280px] mx-auto">
            <h2 class="text-[36px] font-bold text-black font-['Inter'] text-center mb-10">Jelajahi Kekayaan Sejarah
                Borobudur</h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 place-items-center">
                @foreach ($features as $feature)
                    <div data-aos="fade-down" data-aos-duration="1000"
                        class="w-[350px] hover:scale-105 transition-all h-[318px] bg-[#DBD4D4] rounded-[20px] p-6 flex flex-col items-center text-center shadow-sm">
                        <div
                            class="w-[100px] h-[100px] rounded-full bg-[#866B52] mb-4 flex items-center justify-center">
                            <img src="/img/{{ $feature['icon'] }}" class="w-[60px] h-[60px] object-contain"
                                alt="{{ $feature['title'] }}">
                        </div>
                        <h3 class="text-[25px] font-semibold text-[#333] font-['Inter'] mb-2">{{ $feature['title'] }}
                        </h3>
                        <p class="text-[20px] text-[#444] leading-relaxed font-['Inria_Serif']">{{ $feature['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 text-center bg-gray-100">
        <h2 class="text-[28px] font-bold font-['Inter'] mb-10">Team</h2>

        <div class="grid max-w-6xl grid-cols-2 px-6 mx-auto md:grid-cols-3 gap-y-12 gap-x-4">
            @foreach ([['nama' => 'Reza Nagita Nurazizah', 'img' => '3.svg', 'role' => 'Machine Learning'], ['nama' => 'Muhammad Solihin', 'img' => '2.svg', 'role' => 'Machine Learning'], ['nama' => 'Andreas Adi Prasetyo', 'img' => '1.svg', 'role' => 'Machine Learning'], ['nama' => 'Siti Fatimah Nur Cahya', 'img' => '4.svg', 'role' => 'FEBE'], ['nama' => 'Maya Putri Nur Fajri', 'img' => '5.svg', 'role' => 'FEBE'], ['nama' => 'Firdy Dwi Aryani', 'img' => '6.svg', 'role' => 'FEBE']] as $member)
                <div class="flex flex-col items-center w-full">
                    <img src="/img/{{ $member['img'] }}" loading="lazy" alt="{{ $member['nama'] }}"
                        class="object-cover mb-3 transition-all border-2 border-white rounded-full shadow-md hover:rotate-3 hover:scale-110 w-44 h-44">
                    <p
                        class="text-sm font-semibold text-[#333] text-center leading-tight max-w-[160px] min-h-[24px]">
                        <span class="typing-wrapper">
                            <span class="typing" data-name="{{ $member['nama'] }}"></span><span class="cursor">|</span>
                        </span>
                    </p>
                    <span
                        class=" inline-block text-xs font-semibold px-3 py-1 rounded-full
                        {{ $member['role'] === 'Machine Learning' ? 'bg-[#F1BB6A] text-[#5A3E00]' : 'bg-sky-500 text-white' }}">
                        {{ $member['role'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Tentang kami section --}}
    <section class="w-full bg-[#E8E8E8] py-16 px-6">
        <h2 class="text-[30px] font-bold text-center mb-6 font-['Inter']">Tentang Kami</h2>
        <div data-aos="zoom-in" data-aos-duration="1000" class="bg-white border border-[#F1BB6A] max-w-[1280px] mx-auto p-8">
            <p class="text-[25px] text-[#444] text-justify leading-[1.6] font-['Inria_Serif']">
                Borobudur Tales memberikan layanan informasi seputar Relief Candi Borobudur secara mudah, cepat, dan
                menarik.
                Website ini bertujuan untuk memperkenalkan kisah-kisah di balik relief kepada wisatawan agar pengalaman
                berkunjung menjadi lebih bermakna. Melalui Borobudur Tales, wisatawan dapat memahami sejarah dan makna
                relief
                tanpa harus bergantung pada pemandu wisata.
            </p>
        </div>
    </section>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const typingElements = document.querySelectorAll('.typing');

        typingElements.forEach(el => {
            const name = el.dataset.name;
            let i = 0;
            let isDeleting = false;

            function loopTyping() {
                if (!isDeleting) {
                    el.textContent += name.charAt(i);
                    i++;
                    if (i === name.length) {
                        isDeleting = true;
                        setTimeout(loopTyping, 1000); // jeda sebelum hapus
                        return;
                    }
                } else {
                    el.textContent = el.textContent.slice(0, -1);
                    i--;
                    if (i === 0) {
                        isDeleting = false;
                    }
                }
                setTimeout(loopTyping, isDeleting ? 50 : 100); // ketik/hapus
            }
            loopTyping(); // mulai animasi langsung
        });
    });
</script>
