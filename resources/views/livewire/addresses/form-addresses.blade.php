<div>
    <!--ADD BUTTON-->
    <x-button.dark class="h-9" wire:click="$set('open', true)">Nueva dirección</x-button.dark>
    <!--MODAL-->
    <x-dialog-modal wire:model="open">
        <!--TITLE-->
        <x-slot name="title">
            {{ $formtitle }}
        </x-slot>
        <x-slot name="content">
            <!--STREET ADDRESS-->
            <div class="mb-4">
                <x-label value="Dirección de calle" />
                <x-input type="text" class="w-full"
                    wire:model.blur="{{ $editform ? 'addressEdit.street' : 'addressCreate.street' }}" />
                <x-input-error for="{{ $editform ? 'addressEdit.street' : 'addressCreate.street' }}" />
            </div>
            <!--REFERENCE-->
            <div class="mb-4">
                <x-label value="Referencia" />
                <x-input type="text" class="w-full"
                    wire:model.blur="{{ $editform ? 'addressEdit.reference' : 'addressCreate.reference' }}" />
                <x-input-error for="{{ $editform ? 'addressEdit.reference' : 'addressCreate.reference' }}" />
            </div>
            <!--CITY-->
            <div class="mb-4">
                <x-label value="Ciudad" />
                <x-input type="text" class="w-full"
                    wire:model.blur="{{ $editform ? 'addressEdit.city' : 'addressCreate.city' }}" />
                <x-input-error for="{{ $editform ? 'addressEdit.city' : 'addressCreate.city' }}" />
            </div>
            <!--ALIAS-->
            <div class="mb-4">
                <x-label value="Alias" />
                <x-input type="text" class="w-full"
                    wire:model.blur="{{ $editform ? 'addressEdit.alias' : 'addressCreate.alias' }}" />
                <x-input-error for="{{ $editform ? 'addressEdit.alias' : 'addressCreate.alias' }}" />
            </div>
        </x-slot>
        <!--ACTION BUTTONS-->
        <x-slot name="footer">
            <div class="flex flex-row-reverse justify-between w-full">
                @if ($editform)
                    <!--UPDATE-->
                    <x-danger-button wire:click="update" type="button">
                        Actualizar
                    </x-danger-button>
                @else
                    <!--CREATE-->
                    <x-danger-button wire:click="save">
                        Crear
                    </x-danger-button>
                @endif
                <!--CLOSE-->
                <x-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
    <!--TOAST-->
    <x-action-message on="saved">
        @if (session('status'))
            <x-alert action="{{ session('accion') }}">
                {{ session('status') }}
            </x-alert>
        @endif
    </x-action-message>

</div>
