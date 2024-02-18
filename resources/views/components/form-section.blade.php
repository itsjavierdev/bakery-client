@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <div>
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2 mx-5">
        <form wire:submit="{{ $submit }}">
            <div
                class="px-4 py-5 bg-white sm:p-6 shadow border-x border-t border-border {{ isset($actions) ? 'rounded-tl-md rounded-tr-md' : 'rounded-md' }}">
                <div class="grid grid-cols-6 gap-6 ">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md border-x border-b border-border">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
