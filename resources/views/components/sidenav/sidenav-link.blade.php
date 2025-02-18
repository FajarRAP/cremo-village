@props(['text', 'icon'])

<a
    {{ $attributes->merge(['class' => 'flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100']) }}>
    {{ $icon }}
    <span class="ml-3">{{ __($text) }}</span>
</a>
