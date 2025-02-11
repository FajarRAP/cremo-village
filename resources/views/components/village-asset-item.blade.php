@props(['title', 'description', 'asset'])

<figure class="bg-white p-6 rounded-lg shadow-md">
    <img src="{{ Vite::asset("resources/images/$asset") }}" alt="image" class="rounded-lg mb-4">
    <h3 class="text-lg font-semibold">{{ $title }}</h3>
    <figcaption class="text-gray-700 text-sm">{{ $description }}</figcaption>
</figure>
