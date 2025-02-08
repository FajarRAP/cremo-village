@props(['name', 'position', 'asset'])

<figure class="border border-gray-300 rounded-sm">
    <img src="{{ Vite::asset("resources/images/stakeholders/$asset") }}" alt="stakeholder" class="rounded-t-sm">
    <figcaption class="space-y-1 py-2 flex flex-col items-center">
        <h5 class="font-medium text-xl">{{ $position }}</h5>
        <p class="text-base">{{ $name }}</p>
    </figcaption>
</figure>
