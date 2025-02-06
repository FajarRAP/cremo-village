<button type="button"
    {{ $attributes->merge(['class' => 'hidden absolute top-0 z-30 md:flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-hidden']) }}>
    <span
        class="inline-flex items-center justify-center size-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-green-400 group-focus:outline-hidden">
        {{ $slot }}
    </span>
</button>
