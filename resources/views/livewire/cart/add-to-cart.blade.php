<div class="flex gap-2 w-full">
    <x-input.customer-number class="h-[58px]" wire:model.blur="quantityInput"></x-input.customer-number>
    <x-button.dark class="text-xs w-full h-[58px]" wire:click="$dispatch('add-cart', {id:{{ $productId }}})">
        Agregar al carrito
    </x-button.dark>
    <!--TOAST-->
    <x-action-message on="saved">
        @if (session('status'))
            <x-alert action="{{ session('accion') }}">
                {{ session('status') }}
            </x-alert>
        @endif
    </x-action-message>
</div>
