<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 text-center font-['Inter']">Pustaka Relief</h1>

        {{-- Search and Filter --}}
        <div class="flex justify-center mb-6 font-['Inter']">
            <form method="GET" action="{{ route('library') }}" class="flex w-full max-w-md gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="flex-1 px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:border-orange-400 focus:ring-orange-200 focus:ring focus:ring-opacity-50"
                    placeholder="Temukan kisah...">
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white transition-all rounded-lg bg-amber-500 hover:bg-amber-600">
                    Cari
                </button>
            </form>

            {{-- <div class="flex flex-wrap gap-6 mt-2 text-sm font-medium"> --}}
                {{-- @foreach (['recent' => 'Recent', 'popular' => 'Popular', 'viewed' => 'Most Viewed'] as $key => $label)
                    <a href="{{ route('library', ['filter' => $key]) }}"
                        class="{{ request('filter', 'recent') === $key
                            ? 'text-orange-600 border-b-2 border-orange-500 font-semibold pb-1'
                            : 'text-gray-500 hover:text-orange-500' }}">
                        {{ $label }}
                    </a>
                @endforeach --}}
            {{-- </div> --}}
        </div>

        {{-- Story Grid --}}
        <div data-aos="fade-up" data-aos-duration="1000" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($ceritas as $index)
                <div
                    class="flex flex-col overflow-hidden transition-shadow duration-300 bg-white border border-gray-200 shadow-md rounded-2xl hover:shadow-xl">
                    <div class="w-full overflow-hidden h-52">
                        <img src="{{ asset('img/data/' . $index->images->filename) }}" alt="{{ $index->tema }}"
                            class="object-cover w-full h-full transition-transform duration-300 transform hover:scale-105">
                    </div>
                    <div class="flex flex-col flex-1 p-6">
                        <h2 class="mb-2 text-xl font-bold text-gray-800">
                            {{ $index->tema }}
                        </h2>
                        <p class="mb-4 text-sm text-justify text-gray-600">
                            {{ Str::limit($index->cerita, 200) }}
                        </p>
                        <a href="{{ route('library.detail', $index->id) }}"
                            class="border-t pt-3 inline-block mt-auto text-sm font-medium text-[#D78C00] transition-colors duration-200 hover:text-[#f0bf62]">
                            Lihat selengkapnya →
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 col-span-full">Belum ada data.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center my-10">
            {{ $ceritas->onEachSide(1)->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-app-layout>
