<div {{ $attributes->merge(['class' => 'flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker']) }}>
    <div>
        <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
            {{ $title }}
        </h6>
        <span class="text-xl font-semibold">{{ $count }}</span>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
