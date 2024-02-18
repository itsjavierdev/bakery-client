@props(['title'])

<div class="pt-5">
    <h1 class="text-center text-[22px] tracking-wider">{{ $title }}</h1>
    <div class="bg-yellow-primary mt-4">
        {{ $slot }}
    </div>

</div>
