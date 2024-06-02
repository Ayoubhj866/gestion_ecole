<div class="flex items-center justify-between w-full px-2 py-4 mt-16 bg-white rounded-xl">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 grow dark:text-gray-200">
        {{ $slot }}
    </h2>

    {{ $button ?? null }}
</div>
