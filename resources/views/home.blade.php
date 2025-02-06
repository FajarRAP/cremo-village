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

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>

</html>
