<nav x-data="{ open: false }" class="w-full fixed top-0 z-50 bg-gradient-to-r from-[#D78C00] to-[#F1BB6A] px-4 py-4">
    <div class="max-w-[1280px] mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="/img/logo.png" alt="Logo" class="w-[60px] h-[60px] object-contain">
            <span class="text-white text-[26px] opacity-70 leading-[100%] font-['Protest_Strike']">Borobudur <br/> Tales</span>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-x-10 items-center text-white font-medium text-[16px] font-['Inter']">
            <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
            <li><a href="{{ route('explore') ?? '#' }}" class="hover:underline">Eksplor</a></li>
            <li><a href="{{ route('library') }}" class="hover:underline">Pustaka</a></li>
            <li><a href="{{ route('upload') ?? '#' }}" class="hover:underline">Unggah Gambar</a></li>
        </ul>

        <!-- Action buttons -->
        <div class="hidden md:flex gap-x-5 items-center">
            @auth
                <a href="{{ route('profile.edit') }}" class="text-white text-sm font-medium">
                    {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="border border-white text-white px-3 py-1 rounded text-sm">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="border border-white text-white px-3 py-1 rounded text-sm">Masuk</a>
                <a href="{{ route('register') }}" class="bg-white text-[#D78C00] px-3 py-1 rounded text-sm">Daftar</a>
            @endauth
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
        <a href="{{ route('home') }}" class="block">Beranda</a>
        <a href="{{ route('explore') ?? '#' }}" class="block">Eksplor</a>
        <a href="{{ route('library') }}" class="block">Pustaka</a>
        <a href="{{ route('upload') ?? '#' }}" class="block">Unggah Gambar</a>
        <div class="pt-2 border-t border-white mt-2">
            @auth
                <a href="{{ route('profile.edit') }}" class="block py-1">{{ Auth::user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block py-1">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-1">Masuk</a>
                <a href="{{ route('register') }}" class="block bg-white text-[#D78C00] rounded px-3 py-1 w-fit">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
