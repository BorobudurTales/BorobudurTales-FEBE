@extends('layouts.app')

@section('content')
@include('components.navbar')

<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 text-center font-['Inter']">Pustaka Relief</h1>

    {{-- Search and Filter --}}
    <div class="flex flex-col gap-4 md:flex-col md:items-start mb-6 font-['Inter']">
        <form method="GET" action="{{ route('library') }}" class="w-full md:w-[400px]">
            <input type="text" name="search" value="{{ request('search') }}"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-400 focus:ring-orange-200 focus:ring focus:ring-opacity-50 text-sm"
                placeholder="Temukan kisah...">
        </form>

        <div class="flex flex-wrap gap-6 mt-2 text-sm font-medium">
            @foreach (['recent' => 'Recent', 'popular' => 'Popular', 'viewed' => 'Most Viewed'] as $key => $label)
                <a href="{{ route('library', ['filter' => $key]) }}"
                    class="{{ request('filter', 'recent') === $key 
                        ? 'text-orange-600 border-b-2 border-orange-500 font-semibold pb-1' 
                        : 'text-gray-500 hover:text-orange-500' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Story Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($stories as $story)
        <div class="bg-white rounded-lg shadow-md overflow-hidden" style="height: 450px; display: flex; flex-direction: column;">
            {{-- Image Container --}}
            <div style="width: 100%; height: 200px; flex-shrink: 0; overflow: hidden; background-color: #f3f4f6;">
                <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}"
                     style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
            </div>
            
            {{-- Content Container --}}
            <div style="padding: 16px; display: flex; flex-direction: column; flex: 1;">
                {{-- Title --}}
                <h2 class="font-['Inter']" style="font-size: 22px; font-weight: 600; color: #1f2937; line-height: 1.2; margin-bottom: 12px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; word-wrap: break-word;">
                    {{ $story->title }}
                </h2>
                
                {{-- Description --}}
                <p class="font-['Inria_Serif']" style="font-size: 18px; color: #6b7280; line-height: 1.4; margin-bottom: 16px; flex: 1; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden; word-wrap: break-word;">
                    {{ $story->description }}
                </p>
                
                {{-- Link area --}}
                <div style="border-top: 1px solid #e5e7eb; padding-top: 12px;">
                    <a href="#" style="color: #D78C00; text-decoration: none; font-size: 14px; font-weight: 500;">
                        Lihat selengkapnya »
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center col-span-full text-gray-600">Belum ada data.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $stories->links() }}
    </div>
</div>

@include('components.footer')
@endsection
