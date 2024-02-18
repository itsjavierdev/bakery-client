<div>
    <!--TITLE-->
    <div class="md:flex justify-between items-center {{ $previousCheckout ? 'md:flex-row-reverse' : '' }}">
        <!--REDIRECT BACK TO CHEKOUT-->
        @if ($previousCheckout)
            <a href="{{ route('checkout') }}" class="underline p-5">Volver a Checkout
            </a>
        @endif
        <div class="flex gap-4 px-5 py-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ __('Direcciones') }}
            </h2>
            @livewire('addresses.form-addresses')
        </div>
    </div>
    <div class="py-10 px-5">
        @if ($addresses->count())
            <div class="md:flex justify-start flex-wrap gap-4">
                <!--ADDRESSES-->
                @foreach ($addresses as $address)
                    <div class="bg-white rounded border border-border p-3 md:w-[360px] mb-4">
                        <div class="mb-3 flex gap-1 flex-wrap sm:flex-nowrap">
                            <x-secondary-button class="text-[9px]"
                                wire:click="$dispatch('edit-mode', {id:{{ $address->id }}})">Modificar</x-secondary-button>
                            <!--IF IS SELECTED-->
                            @if ($address->is_active)
                                <x-button.dark wire:click="$dispatch('select-address', {id:{{ $address->id }}})"
                                    class="text-[9px] h-[34px]">Direccion seleccionada</x-button.dark>
                            @else
                                <x-secondary-button wire:click="$dispatch('select-address', {id:{{ $address->id }}})"
                                    class="text-[9px] h-[34px]">Dirección de envío</x-secondary-button>
                            @endif
                            <x-secondary-button class="text-[9px]"
                                wire:click="$dispatch('delete-address', {{ $address->id }})">eliminar</x-secondary-button>
                        </div>
                        <!--INFORMATION-->
                        <div style="font-family: 'Montserrat', sans-serif;"
                            class="flex flex-col gap-3 bg-yellow-secondary p-3">
                            <span class="font-bold tracking-tight">{{ $address->alias }}</span>
                            <span class="font-thin tracking-tight">{{ $address->street }},
                                <span>{{ $address->reference }}</span></span>
                            <span class="font-thin tracking-tight">{{ $address->city }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center items-center m-40">
                <h4>No se encontraron direcciones</h4>
            </div>
        @endif
    </div>
    <!--CONFIRMATION DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-address', addressId => {
                console.log('hola')
                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.dispatch('delete', {
                            addressId: addressId
                        })
                    }
                });
            })
        </script>
    @endpush
</div>
