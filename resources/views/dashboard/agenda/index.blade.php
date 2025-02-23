<x-dashboard-layout>
    <section class="h-full md:ml-64 pt-20 pb-6 bg-gray-100" x-data="{ agenda: null }">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('dashboard.agendas') }}" method="GET" class="flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-svgs.magnifying-glass class="fill-gray-500" />
                                </div>
                                <x-text-input id="simple-search" class="pl-10 p-2 w-full"
                                    placeholder="{{ __('Search') }}" name="keyword" />
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2"
                            x-data="" x-on:click="$dispatch('open-modal', 'add-agenda')">
                            <x-svgs.plus class="w-3.5 mr-2 fill-white" />
                            {{ __('Add') . ' ' . __('Agenda') }}
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-4">#</th>
                                <th scope="col" class="px-4 py-4">{{ __('Title') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Date') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Location') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Description') }}</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendas as $agenda)
                                <tr class="border-b ">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-4 py-3">{{ $agenda->title }}</td>
                                    <td class="px-4 py-3">{{ date_format($agenda->date, 'd/m/o') }}</td>
                                    <td class="px-4 py-3">{{ $agenda->location }}</td>
                                    <td class="px-4 py-3">{{ $agenda->description }}</td>
                                    <td class="px-4 py-3">
                                        <x-dropdown>
                                            <x-slot:trigger>
                                                <button
                                                    class="inline-flex items-center text-sm font-medium px-1 rounded transition duration-200 hover:bg-gray-100"
                                                    type="button" x-on:click="dropdown = true">
                                                    <x-svgs.ellipsis />
                                                </button>
                                            </x-slot:trigger>

                                            <x-slot:content>
                                                <ul class="py-1 text-sm">
                                                    <li>
                                                        <a href="{{ route('agenda.edit', ['agenda' => $agenda]) }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100">
                                                            <x-svgs.pen-to-square class="mr-2 fill-gray-500" />
                                                            {{ __('Edit') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button type="button"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100"
                                                            x-on:click="agenda = {{ json_encode($agenda) }}; $dispatch('open-modal', 'preview-agenda')">
                                                            <x-svgs.eye class="mr-2 fill-gray-500" />
                                                            {{ __('Preview') }}
                                                        </button>
                                                    </li>
                                                </ul>
                                            </x-slot:content>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $agendas->links('components.pagination.pagination') }}
            </div>
        </div>

        <x-modal name="add-agenda" :show="$errors->storeAgenda->isNotEmpty()" focusable>
            <form action="{{ route('agenda.store') }}" method="POST" class="text-left">
                @csrf
                @method('POST')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 space-y-4">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 Product">
                            {{ __('Add') . ' ' . __('Guest Book') }}</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            x-on:click="show = false">
                            <x-svgs.xmark />
                        </button>
                    </div>
                    <div>
                        <x-input-label for="title" class="mb-2" :value="__('Title')" />
                        <x-text-input id="title" name="title" class="w-full" />
                        <x-input-error :messages="$errors->storeAgenda->get('title')" class="mt-1" />
                    </div>
                    <div>
                        <x-input-label for="date" class="mb-2" :value="__('Date')" />
                        <x-text-input id="date" name="date" class="w-full" type="datetime-local" />
                        <x-input-error :messages="$errors->storeAgenda->get('date')" class="mt-1" />
                    </div>
                    <div>
                        <x-input-label for="location" class="mb-2" :value="__('Location')" />
                        <x-text-input id="location" name="location" class="w-full" />
                        <x-input-error :messages="$errors->storeAgenda->get('location')" class="mt-1" />
                    </div>
                    <div>
                        <x-input-label for="description" class="mb-2" :value="__('Description')" />
                        <x-x-text-area-input id="description" name="description" class="w-full" rows="5" />
                        <x-input-error :messages="$errors->storeAgenda->get('description')" class="mt-1" />
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:px-6">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <x-svgs.plus class="mr-2 fill-white" />
                        {{ __('Add') }}
                    </button>
                </div>
            </form>
        </x-modal>

        <x-modal name="preview-agenda" focusable>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 space-y-4 text-left">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ __('Preview') . ' ' . __('Agenda') }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        x-on:click="$dispatch('close-modal', 'preview-agenda')">
                        <x-svgs.xmark />
                    </button>
                </div>
                <p class="text-gray-700">
                    <strong>{{ __('Title') }}:</strong>
                    <span x-text="agenda.title"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('Date') }}:</strong>
                    <span x-text="agenda.date"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('Location') }}:</strong>
                    <span x-text="agenda.location"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('Description') }}:</strong>
                    <span x-text="agenda.description"></span>
                </p>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:px-6">
                <button type="button"
                    class="text-gray-700 inline-flex items-center bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition"
                    x-on:click="$dispatch('close-modal', 'preview-agenda')">
                    {{ __('Close') }}
                </button>
            </div>
        </x-modal>
    </section>
</x-dashboard-layout>
