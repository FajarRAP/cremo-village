<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-300 focus:bg-red-300 active:bg-red-900 focus:outline-hidden focus:ring-2 focus:ring-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
