@props(['text'])

<div {{ $attributes->merge(['class' => 'bg-white p-6 rounded-lg shadow-md transition-all duration-500 ease-out transform']) }}
    x-bind:class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
    <h3 class="text-xl font-semibold mb-4">{{ $text }}</h3>
    {{ $slot }}
</div>
