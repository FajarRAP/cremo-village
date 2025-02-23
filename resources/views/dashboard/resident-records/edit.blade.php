<x-app-layout>
    <section class="bg-white min-h-screen">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">{{ __('Edit') . ' ' . __('Resident Records') }}</h2>
                <form action="{{ route('resident.destroy', ['resident' => $resident]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('resident.destroy', ['resident' => $resident]) }}">
                        <x-error-button onclick="event.preventDefault(); this.closest('form').submit();">
                            <x-svgs.trash type="submit" class="mr-2 fill-white" />
                            {{ __('Delete') . ' ' . __('Data') }}
                        </x-error-button>
                    </a>
                </form>
            </div>
            <form action="{{ route('resident.update', ['resident' => $resident]) }}" method="POST"
                class="flex flex-col gap-4 md:gap-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="name" class="mb-2" value="Name" />
                    <x-text-input id="name" name="name" class="w-full" :value="$resident->name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="birth_date" class="mb-2" value="Tanggal Lahir (YYYY-MM-DD)" />
                    <x-text-input id="birth_date" name="birth_date" class="w-full" type="datetime-local"
                        :value="$resident->birth_date" />
                    <x-input-error :messages="$errors->get('birth_date')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="rt" class="mb-2" value="RT" />
                    <x-text-input id="rt" name="rt" class="w-full" :value="$resident->rt" />
                    <x-input-error :messages="$errors->get('rt')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="rw" class="mb-2" value="RW" />
                    <x-text-input id="rw" name="rw" class="w-full" :value="$resident->rw" />
                    <x-input-error :messages="$errors->get('rw')" class="mt-1" />
                </div>
                <div class="flex items-center space-x-4">
                    <x-primary-button type="submit">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
