@props(['agenda'])

<div class="border border-gray-300 bg-white rounded-lg p-6 shadow-md">
    <h3 class="text-xl font-semibold text-green-600">{{ $agenda->title }}</h3>
    <p class="text-gray-500">{{ $agenda->date }}</p>
    <p class="text-gray-700"><strong>Lokasi:</strong> {{ $agenda->location }}</p>
    <p class="mt-2 text-gray-600">{{ $agenda->description }}</p>
</div>
