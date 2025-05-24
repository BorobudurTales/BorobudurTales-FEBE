@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-white text-base font-medium text-white bg-[#D78C00] focus:outline-none focus:text-white focus:bg-[#D78C00] focus:border-white transition'
    : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-black hover:text-white hover:bg-[#D78C00] hover:border-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
