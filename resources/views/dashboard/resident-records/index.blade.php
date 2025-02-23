<x-dashboard-layout>
    <section class="h-full md:ml-64 pt-20 pb-6 bg-gray-100" x-data="{ resident: null }">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('dashboard.resident-records') }}" method="GET" class="flex items-center">
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
                            x-data="" x-on:click="$dispatch('open-modal', 'add-resident-record')">
                            <x-svgs.plus class="w-3.5 mr-2 fill-white" />
                            {{ __('Add') . ' ' . __('Resident Records') }}
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-4">#</th>
                                <th scope="col" class="px-4 py-4">{{ __('Name') }}</th>
                                <th scope="col" class="px-4 py-4">{{ __('Gender') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Birth Date') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('RT') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('RW') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Marriage') }}</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $resident)
                                <tr class="border-b">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-4 py-3">{{ $resident->name }}</td>
                                    <td class="px-4 py-3">{{ $resident->gender }}</td>
                                    <td class="px-4 py-3">{{ date_format($resident->birth_date, 'd/m/o') }}</td>
                                    <td class="px-4 py-3">{{ $resident->rt }}</td>
                                    <td class="px-4 py-3">{{ $resident->rw }}</td>
                                    <td class="px-4 py-3">{{ $resident->marriage }}</td>
                                    <td class="px-4 py-3">
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button
                                                    class="inline-flex items-center text-sm font-medium px-1 rounded transition duration-200 hover:bg-gray-100"
                                                    type="button">
                                                    <x-svgs.ellipsis />
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <ul class="py-1 text-sm">
                                                    <li>
                                                        <x-dropdown-link class="!flex items-center !text-gray-500"
                                                            :href="route('resident.edit', [
                                                                'resident' => $resident,
                                                            ])">
                                                            <x-svgs.pen-to-square class="mr-2 fill-gray-500" />
                                                            {{ __('Edit') }}
                                                        </x-dropdown-link>
                                                    </li>
                                                    <li class="hover:cursor-pointer">
                                                        <x-dropdown-link class="!flex items-center !text-gray-500"
                                                            x-on:click="resident = {{ json_encode($resident) }}; $dispatch('open-modal', 'preview-resident-record')">
                                                            <x-svgs.eye class="mr-2 fill-gray-500" />
                                                            {{ __('Preview') }}
                                                        </x-dropdown-link>
                                                    </li>
                                                </ul>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $residents->links('components.pagination.pagination') }}
            </div>
        </div>

        <x-modal name="add-resident-record" :show="$errors->storeResident->isNotEmpty()" focusable>
            <form action="{{ route('resident.store') }}" method="POST" class="text-left">
                @csrf
                @method('POST')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 space-y-4">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 Product">
                            {{ __('Add') . ' ' . __('Resident Records') }}</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <x-svgs.xmark x-on:click="$dispatch('close-modal', 'add-resident-record')" />
                        </button>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <x-input-label for="name" class="mb-2" :value="__('Name')" />
                            <x-text-input id="name" name="name" class="w-full" />
                            <x-input-error :messages="$errors->storeResident->get('name')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="birth_date" class="mb-2" :value="__('Birth Date')" />
                            <x-text-input id="birth_date" name="birth_date" class="w-full" type="date" />
                            <x-input-error :messages="$errors->storeResident->get('birth_date')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="rt" class="mb-2" :value="__('RT')" />
                            <x-text-input id="rt" name="rt" class="w-full" />
                            <x-input-error :messages="$errors->storeResident->get('rt')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="rw" class="mb-2" :value="__('RW')" />
                            <x-text-input id="rw" name="rw" class="w-full" />
                            <x-input-error :messages="$errors->storeResident->get('rw')" class="mt-1" />
                        </div>
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

        <x-modal name="preview-resident-record" focusable>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 space-y-4 text-left">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ __('Preview') . ' ' . __('Resident Records') }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        x-on:click="$dispatch('close-modal', 'preview-resident-record')">
                        <x-svgs.xmark />
                    </button>
                </div>
                <p class="text-gray-700">
                    <strong>{{ __('Name') }}:</strong>
                    <span x-text="resident.name"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('Birth Date') }}:</strong>
                    <span x-text="resident.birth_date"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('RT') }}:</strong>
                    <span x-text="resident.rt"></span>
                </p>
                <p class="text-gray-700">
                    <strong>{{ __('RW') }}:</strong>
                    <span x-text="resident.rw"></span>
                </p>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:px-6">
                <button type="button"
                    class="text-gray-700 inline-flex items-center bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition"
                    x-on:click="$dispatch('close-modal', 'preview-resident-record')">
                    {{ __('Close') }}
                </button>
            </div>
        </x-modal>
    </section>
</x-dashboard-layout>
