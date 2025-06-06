<nav x-data="{ open: false }" class="w-full fixed top-0 z-50 bg-gradient-to-r from-[#D78C00] to-[#F1BB6A] px-4 py-2">
    <div class="flex items-center justify-between mx-auto ">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="/img/logo.png" alt="Logo" class="w-[50px] h-[50px] object-contain">
            <span class="text-white text-xl opacity-70 leading-[100%] font-['Protest_Strike']">Borobudur <br />
                Tales</span>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-x-10 items-center text-white font-medium font-['Inter']">
            <li><x-users.nav-link href="{{ route('home') }}" :active="request()->is('/')">Beranda</x-users.nav-link></li>
            <li><x-users.nav-link href="{{ route('explore') ?? '#' }}" :active="request()->is('explore')">Eksplor</x-users.nav-link></li>
            <li><x-users.nav-link href="{{ route('library') }}" :active="request()->is('library')">Pustaka</x-users.nav-link></li>
            <li><x-users.nav-link href="{{ route('upload') ?? '#' }}" :active="request()->is('upload')">Unggah Gambar</x-users.nav-link>
            </li>
        </ul>

        <!-- Action buttons -->
        <div class="items-center hidden md:flex gap-x-3">
            @auth
                <div class="relative ml-3" x-data="{ open: false }">
                    <div>
                        <button type="button" @click="open = !open"
                            class="relative flex text-sm bg-gray-800 border-2 border-white rounded-full focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="rounded-full size-8"
                                src="{{ asset('img/17.svg') }}"
                                alt="">
                        </button>
                    </div>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Profil</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                            tabindex="-1"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="px-3 py-1 text-sm text-white border border-white rounded hover:bg-white hover:text-[#D78C00] transition-all">Masuk</a>
                <a href="{{ route('register') }}"
                    class="bg-white text-[#D78C00] px-3 py-1 border border-white rounded text-sm hover:bg-transparent hover:text-white transition-all">Daftar</a>
            @endauth
        </div>

        <!-- Hamburger -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path x-show="!open" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" style="display: none;" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition
        class="md:hidden mt-4 bg-[#D78C00] text-white px-4 py-4 rounded-lg space-y-2 font-['Inter'] text-sm">
        <a href="{{ route('home') }}" class="block">Beranda</a>
        <a href="{{ route('explore') ?? '#' }}" class="block">Eksplor</a>
        <a href="{{ route('library') }}" class="block">Pustaka</a>
        <a href="{{ route('upload') ?? '#' }}" class="block">Unggah Gambar</a>
        <div class="pt-2 mt-2 border-t border-white">
            @auth
                <a href="{{ route('profile.edit') }}" class="block py-1">Profile</a>
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
