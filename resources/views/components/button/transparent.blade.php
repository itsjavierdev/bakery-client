<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 h-20 bg-transparent border-4 border-border text-border transition-all duration-200 hover:bg-white hover:text-black hover:border-0 active:bg-white focus:bg-white focus:text-black rounded font-semibold focus:ring-2 focus:ring-gray-500']) }}>
    {{ $slot }}
</button>
