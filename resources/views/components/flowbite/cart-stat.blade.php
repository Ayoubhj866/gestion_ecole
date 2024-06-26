<a
    {{ $attributes->merge(['class' => 'flex items-center justify-between dark:bg-gray-800 p-4 bg-white rounded-md dark:bg-darker']) }}>
    <div>
        <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
            {{ $title }}
        </h6>
        <span class="text-xl font-semibold text-gray-500">{{ $count }}</span>
    </div>
    <div>
        {{ $slot }}
    </div>
</a>
