@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-white text-gray-900' : 'text-white' }} flex items-center w-full p-3 leading-tight rounded-lg outline-none text-start hover:bg-white hover:text-gray-900 transition-all"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>