@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8" role="navigation" aria-label="Pagination Navigation">
        <ul class="inline-flex items-center space-x-1 text-sm font-medium">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="inline-flex items-center justify-center text-gray-400 bg-gray-100 rounded-full cursor-not-allowed w-9 h-9">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="inline-flex items-center justify-center text-blue-600 transition bg-white border border-gray-300 rounded-full w-9 h-9 hover:bg-blue-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="inline-flex items-center justify-center text-gray-500 w-9 h-9">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="inline-flex items-center justify-center text-white bg-blue-600 rounded-full shadow w-9 h-9">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="inline-flex items-center justify-center text-blue-600 transition bg-white border border-gray-300 rounded-full w-9 h-9 hover:bg-blue-50">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="inline-flex items-center justify-center text-blue-600 transition bg-white border border-gray-300 rounded-full w-9 h-9 hover:bg-blue-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="inline-flex items-center justify-center text-gray-400 bg-gray-100 rounded-full cursor-not-allowed w-9 h-9">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
