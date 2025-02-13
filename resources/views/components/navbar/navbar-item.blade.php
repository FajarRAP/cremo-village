@props(['text'])

<a
    {{ $attributes->merge(['class' => 'block py-2 px-3 rounded-sm md:hover:text-green-400 md:p-0 text-white transition duration-150']) }}>
    {{ $text }}
</a>
