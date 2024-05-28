@props(['active'])

@php
    $classes = $active
        ? 'flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-500 bg-blue-600 dark:hover:bg-blue-600 group'
        : 'flex items-center p-2 text-gray-900 group rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<li>
    <a href="{{ route('dashboard') }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $svg }}
        {{ $slot }}
    </a>
</li>
