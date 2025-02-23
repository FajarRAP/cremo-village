<x-app-layout>
    <section class="bg-white min-h-screen">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">{{ __('Edit') . ' ' . __('Guest Book') }}</h2>
                <form action="{{ route('guest-book.destroy', ['guestbook' => $guestbook]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('guest-book.destroy', ['guestbook' => $guestbook]) }}">
                        <x-error-button onclick="event.preventDefault(); this.closest('form').submit();">
                            <x-svgs.trash type="submit" class="mr-2 fill-white" />
                            {{ __('Delete') . ' ' . __('Data') }}
                        </x-error-button>
                    </a>
                </form>
            </div>
            <form action="{{ route('guest-book.update', ['guestbook' => $guestbook]) }}" method="POST"
                class="flex flex-col gap-4 md:gap-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="name" class="mb-2" :value="__('Name')" />
                    <x-text-input id="name" name="name" class="w-full" :value="$guestbook->name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="origin" class="mb-2" :value="__('Origin')" />
                    <x-text-input id="origin" name="origin" class="w-full" :value="$guestbook->origin" />
                    <x-input-error :messages="$errors->get('origin')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="visit_date" class="mb-2" value="Tanggal Kunjungan (YYYY-MM-DD)" />
                    <x-text-input id="visit_date" name="visit_date" class="w-full" type="datetime-local"
                        :value="$guestbook->visit_date" />
                    <x-input-error :messages="$errors->get('visit_date')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="purpose" class="mb-2" :value="__('Purpose')" />
                    <x-text-input id="purpose" name="purpose" class="w-full" :value="$guestbook->purpose" />
                    <x-input-error :messages="$errors->get('purpose')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="description" class="mb-2" :value="__('Description')" />
                    <x-x-text-area-input id="description" name="description" class="w-full" rows="5"
                        :value="$guestbook->description" />
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
