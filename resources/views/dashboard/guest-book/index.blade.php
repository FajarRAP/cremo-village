<x-dashboard-layout>
    <section class="h-full md:ml-64 pt-20 pb-6 bg-gray-100" x-data="{ guestbook: null }">
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
                        <button type="button" id="createProductModalButton" data-modal-target="createProductModal"
                            data-modal-toggle="createProductModal"
                            class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                            <x-svgs.plus class="w-3.5 mr-2 fill-white" />
                            {{ __('Add') . ' ' . __('Guest Book') }}
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-4">#</th>
                                <th scope="col" class="px-4 py-4">{{ __('Name') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Origin') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Date') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Purpose') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('Description') }}</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guestbooks as $guestbook)
                                <tr class="border-b ">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-4 py-3">{{ $guestbook->name }}</td>
                                    <td class="px-4 py-3">{{ $guestbook->origin }}</td>
                                    <td class="px-4 py-3">{{ date_format($guestbook->visit_date, 'd/m/o') }}</td>
                                    <td class="px-4 py-3">{{ $guestbook->purpose }}</td>
                                    <td class="px-4 py-3">{{ $guestbook->description }}</td>
                                    <td class="px-4 py-3">
                                        <button data-dropdown-toggle="{{ $loop->index }}"
                                            class="inline-flex items-center text-sm font-medium px-1 rounded transition duration-200 hover:bg-gray-100"
                                            type="button">
                                            <x-svgs.ellipsis />
                                        </button>
                                        <div id="{{ $loop->index }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                            <ul class="py-1 text-sm">
                                                <li>
                                                    <a href="{{ route('guest-book.edit', ['guestbook' => $guestbook]) }}"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100">
                                                        <x-svgs.pen-to-square class="mr-2 fill-gray-500" />
                                                        {{ __('Edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" data-modal-target="readProductModal"
                                                        data-modal-toggle="readProductModal"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100"
                                                        x-on:click="guestbook = {{ json_encode($guestbook) }}">
                                                        <x-svgs.eye class="mr-2 fill-gray-500" />
                                                        {{ __('Preview') }}
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $guestbooks->links('components.pagination.pagination') }}
            </div>
        </div>

        <div id="createProductModal"
            class="hidden overflow-y-auto bg-gray-900/40 overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 Product">
                            {{ __('Add') . ' ' . __('Guest Book') }}</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-target="createProductModal" data-modal-toggle="createProductModal">
                            <x-svgs.xmark />
                        </button>
                    </div>
                    <form action="{{ route('resident.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <x-input-label for="name" class="mb-2" :value="__('Name')" />
                                <x-text-input id="name" name="name" class="w-full" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="origin" class="mb-2" :value="__('Origin')" />
                                <x-text-input id="origin" name="origin" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="visit_date" class="mb-2" value="Tanggal Kunjungan (YYYY-MM-DD)" />
                                <x-text-input id="visit_date" name="visit_date" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="purpose" class="mb-2" :value="__('Purpose')" />
                                <x-text-input id="purpose" name="purpose" class="w-full" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="description" class="mb-2" :value="__('Description')" />
                                <x-x-text-area-input id="description" name="description" class="w-full"
                                    rows="5" />
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            <x-svgs.plus class="mr-2 fill-white" />
                            {{ __('Add') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div id="readProductModal"
            class="hidden overflow-y-auto bg-gray-900/40 overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                    <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                        <div class="text-lg text-gray-900 md:text-xl">
                            <h3 class="font-semibold">Nomor NIK</h3>
                            <p class="text-base md:text-lg font-bold">Nomor KK</p>
                        </div>
                        <div>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex"
                                data-modal-toggle="readProductModal">
                                <x-svgs.xmark class="fill-gray-400" />
                            </button>
                        </div>
                    </div>
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">{{ __('Name') }}</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5" x-text="guestbook.name"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">{{ __('Origin') }}</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5" x-text="guestbook.origin"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">{{ __('Date') }}</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5"
                            x-text="new Intl.DateTimeFormat('id-ID', {day: '2-digit', month: '2-digit', year: 'numeric'}).format(new Date(guestbook.visit_date))">
                        </dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">{{ __('Purpose') }}</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5" x-text="guestbook.purpose"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">{{ __('Description') }}</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5" x-text="guestbook.description"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
</x-dashboard-layout>
