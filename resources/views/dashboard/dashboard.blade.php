<x-dashboard-layout>
    <section class="p-4 md:ml-64 h-auto pt-20 space-y-4">
        {{-- Dashboard Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-dashboard-card :title="$residentCount" description="Penduduk" class="h-44" />
            <x-dashboard-card :title="$guestbookCount" description="Tamu" class="h-44" />
            <x-dashboard-card title="-" description="Berita" class="h-44" />
        </div>

        {{-- Agenda --}}
        <div class="shadow-md rounded-lg bg-white p-6 flex flex-col gap-6 border border-gray-200">
            <h5 class="font-bold text-2xl flex items-center gap-2">
                {{ __('Agenda') }}
            </h5>

            <form action="{{ route('dashboard') }}" method="GET" class="max-w-sm flex gap-4">
                @csrf
                @method('GET')
                <input type="month"
                    class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full p-2 text-lg"
                    name="date" />
                <x-primary-button type="submit">Ok</x-primary-button>
            </form>

            <div class="flex flex-col gap-4">
                @foreach ($agendas as $agenda)
                    <div class="p-4 rounded-lg bg-gray-50 border border-gray-200 hover:shadow-lg transition">
                        <h6 class="font-semibold text-lg text-gray-800">{{ $agenda->title }}</h6>
                        <div class="flex md:flex-row gap-2 flex-col md:items-center text-gray-600 mt-2">
                            <div class="flex items-center gap-2 md:basis-3xs">
                                <x-svgs.calendar-days class="size-5 text-green-600" />
                                <span>{{ $agenda->date }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <x-svgs.location-dot class="size-5 text-green-600" />
                                <span>{{ $agenda->location }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('dashboard.agendas') }}"
                    class="font-medium text-green-600 hover:underline self-end">{{ __('Read more') }}</a>
            </div>
        </div>

        {{-- Resident Records --}}
        <div class="shadow-md rounded bg-white p-4 flex flex-col gap-4">
            <h5 class="font-semibold text-2xl">{{ __('Resident Records') }}</h5>
            <div class="overflow-x-auto shadow-sm rounded">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-4">#</th>
                            <th scope="col" class="px-4 py-4">{{ __('Name') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Birth Date') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('RT') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('RW') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
                            <tr class="border-b">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-4 py-3">{{ $resident->name }}</td>
                                <td class="px-4 py-3">{{ date_format($resident->birth_date, 'd/m/o') }}</td>
                                <td class="px-4 py-3">{{ $resident->rt }}</td>
                                <td class="px-4 py-3">{{ $resident->rw }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('dashboard.resident-records') }}"
                class="font-medium text-green-600 hover:underline self-end">{{ __('Read more') }}</a>
        </div>

        {{-- Guest Book --}}
        <div class="shadow-md rounded bg-white p-4 flex flex-col gap-4">
            <h5 class="font-semibold text-2xl">{{ __('Guest Book') }}</h5>
            <div class="overflow-x-auto shadow-sm rounded">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-4">#</th>
                            <th scope="col" class="px-4 py-4">{{ __('Name') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Origin') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Date') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Purpose') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guestbooks as $guestbook)
                            <tr class="border-b">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-4 py-3">{{ $guestbook->name }}</td>
                                <td class="px-4 py-3">{{ $guestbook->origin }}</td>
                                <td class="px-4 py-3">{{ date_format($guestbook->visit_date, 'd/m/o') }}</td>
                                <td class="px-4 py-3">{{ $guestbook->purpose }}</td>
                                <td class="px-4 py-3">{{ $guestbook->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('dashboard.guest-book') }}"
                class="font-medium text-green-600 hover:underline self-end">{{ __('Read more') }}</a>
        </div>

    </section>
</x-dashboard-layout>
