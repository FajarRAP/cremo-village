<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />

    @vite('resources/js/app.js')
</head>

<body>
    {{-- Carousel --}}
    <x-carousel>
        <x-slot:carouselItems>
            <x-carousel.item title="Masjid Al Hidayah" asset="slider-1.jpeg" id="cremo-carousel-item-1" />
            <x-carousel.item title="Curug Tegalrejo" asset="slider-2.jpeg" id="cremo-carousel-item-2" />
            <x-carousel.item title="SDN Prengguk II" asset="slider-3.jpeg" id="cremo-carousel-item-3" />
        </x-slot:carouselItems>
        <x-slot:carouselIndicators>
            <x-carousel.indicator id="cremo-carousel-indicator-1" />
            <x-carousel.indicator id="cremo-carousel-indicator-2" />
            <x-carousel.indicator id="cremo-carousel-indicator-3" />
        </x-slot:carouselIndicators>
    </x-carousel>

    <header class="px-8 md:px-16 py-16 mx-auto space-y-16 bg-gray-50">
        <h4
            class="text-3xl text-center font-semibold after:ml-0.5 relative after:text-red-500 after:content-[''] after:absolute after:start-1/2 after:-translate-x-1/2 after:border after:border-black after:w-32 after:-bottom-5">
            Tentang Dusun Cremo
        </h4>
        <figure class="md:grid md:grid-cols-2 md:gap-12 flex-col flex gap-6">
            <img src="{{ Vite::asset('resources/images/sliders/slider-1.jpeg') }}" alt="cremo village image">
            <figcaption class="space-y-3">
                <h5 class="font-semibold text-lg">Dusun dengan Dataran Tertinggi di Gunungkidul</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis omnis error nihil asperiores quaerat
                    rerum porro consequuntur quasi odio necessitatibus, cumque impedit a sit id autem accusamus saepe
                    minima beatae!</p>
            </figcaption>
        </figure>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>

</html>
