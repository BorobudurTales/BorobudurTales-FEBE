@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'text-sm underline text-gray-200' : 'text-sm text-white' }} hover:text-gray-200 hover:underline transition-all"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
