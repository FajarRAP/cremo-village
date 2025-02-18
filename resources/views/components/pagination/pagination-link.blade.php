@props(['isActive' => false])

<a
    {{ $attributes->class([
            'text-gray-500 border-gray-300 hover:bg-gray-100 hover:text-gray-700' => !$isActive,
            'text-green-500 border-green-300 hover:bg-green-100 hover:text-green-700 z-10' => $isActive,
        ])->merge([
            'class' => 'flex items-center justify-center text-sm py-2 px-3 leading-tight bg-white border',
        ]) }}>
    {{ $slot }}
</a>
