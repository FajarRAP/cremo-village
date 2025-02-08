@props(['text'])

<div class="flex items-center gap-4">
    <div class="size-10 rounded-full border border-gray-400 flex items-center justify-center">{{ $slot }}</div>
    <p>{{ $text }}</p>
</div>
