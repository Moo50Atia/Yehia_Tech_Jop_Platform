@props(['active', 'icon' => null])

@php
$classes = ($active ?? false)
? 'flex items-center px-4 py-3 w-full text-sm font-medium text-white bg-indigo-600 rounded-lg focus:outline-none hover:bg-indigo-700 focus:bg-indigo-700 transition duration-150 ease-in-out shadow-sm'
: 'flex items-center px-4 py-3 w-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
        <span class="mr-3">
            {!! $icon !!}
        </span>
        @endif
        <span>{{ $slot }}</span>
    </a>
</li>