@props(['txtsize' => '3xl'])

<div {{ $attributes->merge(['class' => 'mb-5']) }}>
    <h1 class="uppercase text-center tracking-widest text-{{ $txtsize }} mb-2">{{ $slot }}</h1>
    <hr class="bg-font-primary w-8 border-0 h-0.5 mx-auto rounded">
</div>
