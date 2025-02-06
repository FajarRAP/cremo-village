<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-transparent border border-green-400 rounded-md font-semibold text-xs text-green-400 uppercase tracking-widest focus:outline-hidden focus:ring-2 focus:ring-green-400 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
