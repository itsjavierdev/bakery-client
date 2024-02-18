<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <div>
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2 mx-5 ">
        <div class="px-4 py-5 sm:p-6 bg-white shadow rounded-lg border border-border">
            {{ $content }}
        </div>
    </div>
</div>
