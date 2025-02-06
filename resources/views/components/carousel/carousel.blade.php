@props(['carouselItems', 'carouselIndicators'])

<div id="cremo-carousel" class="relative w-full">
    {{-- Carousel wrapper  --}}
    <div class="relative h-56 overflow-hidden md:h-screen">
        {{ $carouselItems }}
    </div>

    {{-- Slider indicators  --}}
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
        {{ $carouselIndicators }}
    </div>

    {{-- Slider controls  --}}
    <x-carousel.control id="cremo-carousel-prev" class="start-0">
        <x-svgs.arrow-left />
    </x-carousel.control>
    <x-carousel.control id="cremo-carousel-next" class="end-0">
        <x-svgs.arrow-right />
    </x-carousel.control>
</div>
