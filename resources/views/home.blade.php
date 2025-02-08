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

    {{-- About --}}
    <header class="px-8 md:px-16 py-16 space-y-16 bg-gray-50">
        <x-section-heading text="Tentang Dusun Cremo" />
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

    <section
        class="bg-gray-900 text-center text-xl md:text-2xl text-green-400 py-12 md:py-16 font-semibold md:grid md:grid-cols-2 flex flex-col gap-12">
        <x-text-statistic number="21:9" text="Perbandingan Laki-laki dan Perempuan" />
        <x-text-statistic number="500" text="Penduduk Laki-laki" />
        <x-text-statistic number="500" text="Penduduk Perempuan" />
        <x-text-statistic number="1000" text="Jumlah Penduduk" />
    </section>

    {{-- Stakeholders --}}
    <section class="px-8 md:px-32 py-16 space-y-16">
        <x-section-heading text="Pejabat Dusun Cremo" />
        <div class="md:grid md:grid-cols-4 md:gap-12 flex flex-col gap-6">
            <x-person-card name="Heru" position="Kepala Dusun" asset="stakeholder-1.jpg" />
            <x-person-card name="Heru" position="RW 04" asset="stakeholder-1.jpg" />
            <x-person-card name="Heru" position="RT 01" asset="stakeholder-1.jpg" />
            <x-person-card name="Heru" position="RT 02" asset="stakeholder-1.jpg" />
            <x-person-card name="Heru" position="RT 03" asset="stakeholder-1.jpg" />
            <x-person-card name="Heru" position="RT 04" asset="stakeholder-1.jpg" />
            <x-person-card name="Isanto" position="RT 05" asset="stakeholder-1.jpg" />
        </div>
    </section>

    <section class="bg-green-400 text-center text-xl md:text-3xl text-white py-8 md:py-12 font-semibold">
        <h4>Ditunggu kedatangannya di Dusun Cremo</h4>
    </section>

    {{-- Contact Us --}}
    <section class="px-8 md:px-32 py-16 space-y-16">
        <x-section-heading text="Kontak Kami" />
        <div class="md:grid md:grid-cols-2 md:gap-24 flex flex-col gap-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.6342485742325!2d110.63116121219508!3d-7.809175039340718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a48c3c1e9304f%3A0xcb3e5512b0f34a6a!2sCremo%2C%20Tegalrejo%2C%20Kec.%20Gedang%20Sari%2C%20Kabupaten%20Gunung%20Kidul%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1738861522086!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                class="md:w-full md:h-96 h-48"></iframe>
            <div class="md:grid md:grid-cols-2 md:h-fit flex flex-col gap-3 md:gap-6">
                <x-contact-us-item text="Nomor Telepon">
                    <x-svgs.phone />
                </x-contact-us-item>
                <x-contact-us-item text="Jam Operasional">
                    <x-svgs.clock />
                </x-contact-us-item>
                <x-contact-us-item text="Alamat Surel">
                    <x-svgs.envelope />
                </x-contact-us-item>
                <x-contact-us-item text="Alamat Situs">
                    <x-svgs.earth-americas />
                </x-contact-us-item>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="flex flex-col bg-gray-100 items-center py-4 text-center text-sm md:text-base">
        <p>&copy; <span class="font-semibold">Dusun Cremo</span>. Semua Hak Dilindungi Undang Undang</p>
        <p>Crafted by
            <a
                href="https://www.linkedin.com/in/fajar-riansyah-aryda-putra-297164207/"class="text-green-400 hover:underline">
                Fajar Riansyah
            </a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>

</html>
