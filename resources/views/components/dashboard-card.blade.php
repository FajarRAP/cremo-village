@props(['title', 'description'])

<div
    {{ $attributes->merge(['class' => 'max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:-translate-1 transition']) }}>
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $title }}</h5>
    <p class="font-normal text-gray-700">{{ $description }}</p>
</div>
