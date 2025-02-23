<x-app-layout>
    <nav class="bg-white border-b border-gray-200 px-4 py-2.5 fixed left-0 right-0 top-0 z-50">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
                <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                    <x-svgs.bars class="!text-gray-900" />
                </button>
                <span class="self-center text-2xl font-semibold whitespace-nowrap">
                    Dusun Cremo</span>
            </div>
            <x-dropdown>
                <x-slot name="trigger">
                    <button type="button"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                            alt="user photo" />
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</span>
                        <span class="block text-sm text-gray-900 truncate">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        <li>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Account settings') }}
                            </x-dropdown-link>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>
    </nav>

    <x-sidenav>
        <li>
            <x-sidenav.sidenav-link href="{{ route('dashboard') }}" text="Dashboard">
                <x-slot:icon>
                    <x-svgs.chart-pie class="fill-gray-400 size-6" />
                </x-slot:icon>
            </x-sidenav.sidenav-link>
        </li>
        <li>
            <x-sidenav.sidenav-link href="{{ route('dashboard.resident-records') }}" text="Resident Records">
                <x-slot:icon>
                    <x-svgs.people-group class="fill-gray-400 size-6" />
                </x-slot:icon>
            </x-sidenav.sidenav-link>
        </li>
        <li>
            <x-sidenav.sidenav-link href="{{ route('dashboard.news') }}" text="News">
                <x-slot:icon>
                    <x-svgs.newspaper class="fill-gray-400 size-6" />
                </x-slot:icon>
            </x-sidenav.sidenav-link>
        </li>
        <li>
            <x-sidenav.sidenav-link href="{{ route('dashboard.agendas') }}" text="Agenda">
                <x-slot:icon>
                    <x-svgs.calendar-days class="fill-gray-400 size-6" />
                </x-slot:icon>
            </x-sidenav.sidenav-link>
        </li>
        <li>
            <x-sidenav.sidenav-link href="{{ route('dashboard.guest-book') }}" text="Guest Book">
                <x-slot:icon>
                    <x-svgs.book class="fill-gray-400 size-6" />
                </x-slot:icon>
            </x-sidenav.sidenav-link>
        </li>
    </x-sidenav>

    {{ $slot }}

</x-app-layout>
