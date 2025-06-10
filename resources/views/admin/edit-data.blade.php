<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Detail Cerita Relief</p>
    </div>
    @if (session('success'))
        <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 rounded">
            {{ session('red') }}
        </div>
    @endif
    <div class="max-w-4xl mx-auto mt-10">
        <div class="overflow-hidden bg-white shadow-lg rounded-3xl">
            @if ($data->images->filename)
                <img src="{{ asset('storage/data/' . $data->images->filename) }}" alt="Gambar data"
                    class="object-cover w-full h-64">
            @else
                <div class="flex items-center justify-center w-full h-64 text-gray-500 bg-gray-200">
                    <span>Tidak ada gambar</span>
                </div>
            @endif

            <div class="p-8">
                <h1 class="mb-3 text-3xl font-bold text-gray-600">{{ $data->tema }}</h1>
                <p class="mb-6 text-justify text-gray-500 text-md">{{ $data->cerita }}</p>

                <div class="p-4 bg-gray-100">
                    <p class="mb-2 text-lg italic font-semibold text-gray-600">~ Makna Cerita ~</p>
                    <div class="prose-sm prose text-gray-700 sm:prose lg:prose-lg max-w-none">
                        {{ $data->makna }}
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('data.admin') }}"
                        class="inline-block px-4 py-2 text-sm text-white bg-gray-500 rounded hover:bg-gray-600">
                        ← Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
