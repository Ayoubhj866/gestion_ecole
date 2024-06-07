@props(['active'])

@php
    $classes = $active
        ? 'flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-black bg-black dark:hover:bg-black group'
        : 'flex items-center p-2 text-gray-900 group rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $svg }}
        {{ $slot }}
    </a>
</li>
