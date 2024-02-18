<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center tracking-widest px-4 py-2 h-11 bg-yellow-btn rounded font-semibold text-font-btn text-xs uppercase tracking-widest hover:bg-[#d6bd1a] focus:bg-[#d6bd1a] active:bg-[#d6bd1a] focus:outline-none focus:ring-1 focus:ring-yellow-400 ']) }}>
    {{ $slot }}
</button>
