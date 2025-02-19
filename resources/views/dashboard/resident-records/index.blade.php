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
                        <button type="button" id="createProductModalButton" data-modal-target="createProductModal"
                            data-modal-toggle="createProductModal"
                            class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
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
                                <th scope="col" class="px-4 py-4">Nama</th>
                                <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                                <th scope="col" class="px-4 py-3">RT</th>
                                <th scope="col" class="px-4 py-3">RW</th>
                                <th scope="col" class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $resident)
                                <tr class="border-b ">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-4 py-3">{{ $resident->name }}</td>
                                    <td class="px-4 py-3">{{ date_format($resident->birth_date, 'd/m/o') }}</td>
                                    <td class="px-4 py-3">{{ $resident->rt }}</td>
                                    <td class="px-4 py-3">{{ $resident->rw }}</td>
                                    <td class="px-4 py-3 md:flex items-center justify-end">
                                        <button data-dropdown-toggle="{{ $loop->index }}"
                                            class="inline-flex items-center text-sm font-medium px-1 rounded transition duration-200 hover:bg-gray-100"
                                            type="button">
                                            <x-svgs.ellipsis />
                                        </button>
                                        <div id="{{ $loop->index }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                            <ul class="py-1 text-sm">
                                                <li>
                                                    <a href="{{ route('resident.edit', ['resident' => $resident->id]) }}"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100">
                                                        <x-svgs.pen-to-square class="mr-2 fill-gray-500" />
                                                        {{ __('Edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" data-modal-target="readProductModal"
                                                        data-modal-toggle="readProductModal"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100"
                                                        x-on:click="resident = {{ json_encode($resident) }}">
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

                {{ $residents->links('components.pagination.pagination') }}
            </div>
        </div>

        <div id="createProductModal"
            class="hidden overflow-y-auto bg-gray-900/40 overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 Product">
                            {{ __('Add') . ' ' . __('Resident Records') }}</h3>
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
                                <x-input-label for="name" class="mb-2" value="Name" />
                                <x-text-input id="name" name="name" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="birth_date" class="mb-2" value="Tanggal Lahir (YYYY-MM-DD)" />
                                <x-text-input id="birth_date" name="birth_date" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="rt" class="mb-2" value="RT" />
                                <x-text-input id="rt" name="rt" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="rw" class="mb-2" value="RW" />
                                <x-text-input id="rw" name="rw" class="w-full" />
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
                        <div class="text-lg text-gray-900 md:text-xl ">
                            <h3 class="font-semibold ">Apple iMac 27”</h3>
                            <p class="font-bold">$2999</p>
                        </div>
                        <div>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex "
                                data-modal-toggle="readProductModal">
                                <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 ">Details</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5">3.8GHz
                            8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4
                            memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet,
                            Magic Mouse 2, Magic Keyboard - US.</dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900">Category</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 ">Electronics/PC</dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
</x-dashboard-layout>
