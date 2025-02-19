<x-app-layout>
    <section class="bg-white min-h-screen">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">{{ __('Edit') . ' ' . __('Guest Book') }}</h2>
                <form action="{{ route('guest-book.delete', ['guestbook' => $guestbook]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-error-button>
                        <x-svgs.trash type="submit" class="mr-2 fill-white" />
                        {{ __('Delete') . ' ' . __('Data') }}
                    </x-error-button>
                </form>
            </div>
            <form action="{{ route('guest-book.update', ['guestbook' => $guestbook]) }}" method="POST"
                class="flex flex-col gap-4 md:gap-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="name" class="mb-2" :value="__('Name')" />
                    <x-text-input id="name" name="name" class="w-full" :value="$guestbook->name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="origin" class="mb-2" :value="__('Origin')" />
                    <x-text-input id="origin" name="origin" class="w-full" :value="$guestbook->origin" />
                </div>
                <div>
                    <x-input-label for="visit_date" class="mb-2" value="Tanggal Kunjungan (YYYY-MM-DD)" />
                    <x-text-input id="visit_date" name="visit_date" class="w-full" :value="$guestbook->visit_date" />
                </div>
                <div>
                    <x-input-label for="purpose" class="mb-2" :value="__('Purpose')" />
                    <x-text-input id="purpose" name="purpose" class="w-full" :value="$guestbook->purpose" />
                </div>
                <div>
                    <x-input-label for="description" class="mb-2" :value="__('Description')" />
                    <x-x-text-area-input id="description" name="description" class="w-full" rows="5"
                        :value="$guestbook->description" />
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
