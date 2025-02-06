@props(['title', 'asset'])

<div class="hidden duration-700 ease-in-out" {{ $attributes }}>
    <img src="{{ Vite::asset("resources/images/sliders/$asset") }}"
        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 brightness-75 h-full object-cover">
    <h2
        class="text-white text-sm md:text-4xl absolute font-semibold start-1/2 -translate-x-1/2 bottom-1/2 translate-y-1/2 md:translate-y-0 md:bottom-72">
        Dusun Cremo
    </h2>
    <h3
        class="text-white text-lg md:text-6xl absolute font-bold start-1/2 -translate-x-1/2 bottom-1/2 translate-y-8 md:translate-y-0 md:bottom-48">
        {{ $title }}
    </h3>
    <div class="hidden absolute bottom-24 start-1/2 -translate-x-1/2 md:flex gap-6">
        <x-primary-button class="md:!text-base">Agenda Terdekat</x-primary-button>
        <x-outline-primary-button class="md:!text-base">Tentang Cremo</x-outline-primary-button>
    </div>
</div>
