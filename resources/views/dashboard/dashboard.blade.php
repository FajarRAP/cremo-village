<x-dashboard-layout>
    <section class="p-4 md:ml-64 h-auto pt-20 space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-dashboard-card :title="$residentCount" description="Penduduk" class="h-44" />
            <x-dashboard-card :title="$guestbookCount" description="Tamu" class="h-44" />
            <x-dashboard-card title="191102" description="Berita" class="h-44" />
        </div>

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
