<div>
    <x-action-section submit="updateAddressInformation">
        <x-slot name="title">
            Mis direcciones
        </x-slot>
        <x-slot name="description">
            Mantenga actualizada sus direcciones de envio
        </x-slot>
        <x-slot name="content">

            @if ($address)
                <div class="flex flex-col gap-2">
                    <span class="font-bold tracking-tight">{{ $address->alias }}</span>
                    <span class="font-thin tracking-tight">{{ $address->street }},
                        <span>{{ $address->reference }}</span></span>
                    <span class="font-thin tracking-tight">{{ $address->city }}</span>
                </div>
                <a href="{{ route('addresses') }}">
                    <x-button.dark class="h-8 mt-4">Cambiar</x-button.dark>
                </a>
            @else
                <h1>Todavía no tienes direcciones</h1>
                <a href="{{ route('addresses') }}">
                    <x-button.dark class="h-8 mt-4">Agregar direcciones</x-button.dark>
                </a>
            @endif
        </x-slot>
    </x-action-section>

</div>
