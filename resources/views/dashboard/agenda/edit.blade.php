<x-app-layout>
    <section class="bg-white min-h-screen">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">{{ __('Edit') . ' ' . __('Agenda') }}</h2>
                <form action="{{ route('agenda.destroy', ['agenda' => $agenda]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('agenda.destroy', ['agenda' => $agenda]) }}">
                        <x-error-button onclick="event.preventDefault(); this.closest('form').submit();">
                            <x-svgs.trash type="submit" class="mr-2 fill-white" />
                            {{ __('Delete') . ' ' . __('Data') }}
                        </x-error-button>
                    </a>
                </form>
            </div>
            <form action="{{ route('agenda.update', ['agenda' => $agenda]) }}" method="POST"
                class="flex flex-col gap-4 md:gap-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="title" class="mb-2" :value="__('Name')" />
                    <x-text-input id="title" name="title" class="w-full" :value="$agenda->title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="date" class="mb-2" :value="__('Date')" />
                    <x-text-input id="date" name="date" class="w-full" type="datetime-local"
                        :value="$agenda->date" />
                    <x-input-error :messages="$errors->get('date')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="location" class="mb-2" :value="__('Location')" />
                    <x-text-input id="location" name="location" class="w-full" :value="$agenda->location" />
                    <x-input-error :messages="$errors->get('location')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="description" class="mb-2" :value="__('Description')" />
                    <x-x-text-area-input id="description" name="description" class="w-full" rows="5"
                        :value="$agenda->description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-1" />
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
