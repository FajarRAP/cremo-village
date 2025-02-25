<nav class="border-gray-200 bg-gray-900" id="navbar" x-data="{ expanded: false }">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ config('APP_URL') }}" class="self-center text-2xl font-semibold whitespace-nowrap text-white">
            Dusun Cremo
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('login') }}" class="self-center">
                <x-primary-button class="hover:cursor-pointer">LOGIN</x-primary-button>
            </a>
            <button type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                x-on:click="expanded = !expanded">
                <x-svgs.bars />
            </button>
        </div>
        {{-- Desktop --}}
        <div class="items-center justify-between w-full hidden md:flex md:w-auto md:order-1">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                <li><x-navbar.navbar-item href="#cremo-carousel" text="Home" /></li>
                <li><x-navbar.navbar-item href="#agenda" text="Agenda" /></li>
                <li><x-navbar.navbar-item href="#about" text="Tentang" /></li>
                <li><x-navbar.navbar-item href="#information" text="Informasi Administrasi" /></li>
                <li><x-navbar.navbar-item href="#vision" text="Visi dan Misi" /></li>
                <li><x-navbar.navbar-item href="#stakeholders" text="Pejabat" /></li>
                <li><x-navbar.navbar-item href="#assets" text="Aset Dusun" /></li>
                <li><x-navbar.navbar-item href="#contact" text="Kontak" /></li>
            </ul>
        </div>
        {{-- Mobile --}}
        <div class="items-center justify-between w-full" x-show="expanded" x-collapse>
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                <li><x-navbar.navbar-item href="#cremo-carousel" text="Home" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#agenda" text="Agenda" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#about" text="Tentang" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#information" text="Informasi Administrasi"
                        x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#vision" text="Visi dan Misi" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#stakeholders" text="Pejabat" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#assets" text="Aset Dusun" x-on:click="expanded = false" /></li>
                <li><x-navbar.navbar-item href="#contact" text="Kontak" x-on:click="expanded = false" /></li>
            </ul>
        </div>
    </div>
</nav>
