<div class="md:flex justify-around gap-7 mx-5">
    <div class="w-full">
        <!--CUSTOMER INFORMATION-->
        <div class="bg-white border border-border rounded px-5 pb-5 mb-7">
            <!--CONTACT INFORMATION-->
            <x-customer.checkout-section title="Información de contacto">
                <div class="flex justify-between p-3">
                    <h1 class="tracking-wider">Nombre:</h1>
                    <span style="font-family: 'Montserrat', sans-serif;">{{ Auth::user()->name }}</span>
                </div>
                <div class="flex justify-between bg-yellow-secondary p-3">
                    <h1 class="tracking-wider">Email:</h1>
                    <span style="font-family: 'Montserrat', sans-serif;">{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between p-3">
                    <h1 class="tracking-wider">Telefono:</h1>
                    <span style="font-family: 'Montserrat', sans-serif;">{{ Auth::user()->phone }}</span>
                </div>
            </x-customer.checkout-section>
            <!--DELIVERY INFORMATION-->
            <x-customer.checkout-section title="Información de envío">
                <!--PICKUP-->
                <div wire:click="$set('delivery', 'pickup')">
                    <x-customer.checkout-input label="Recoger en el local"
                        action="{{ $delivery === 'pickup' ? true : false }}" nameInput="pickup" idInput="delivery">
                        <p>Puede recoger su pedido en: Radial 26, 7mo anillo, B. 24 de septiembre, C. Principal
                            S/N</p>
                    </x-customer.checkout-input>
                </div>
                <!--DELIVERY-->
                <div wire:click="$set('delivery', 'delivery')">
                    <x-customer.checkout-input label="Envío a domicilio"
                        action="{{ $delivery === 'delivery' ? true : false }}" nameInput="delivery" idInput="delivery">
                        <!--HAS ADDRESS-->
                        @if ($address)
                            <div class="w-full flex flex-col gap-3">
                                <h1 class="text-md tracking-wider">Enviar a:</h1>
                                <span class="font-thin tracking-tight"
                                    style="font-family: 'Montserrat', sans-serif;">{{ $address->street }},
                                    Referencia de prueba, {{ $address->city }}</span>
                                <div>
                                    <a href="{{ route('addresses') }}">
                                        <x-secondary-button>Cambiar dirección</x-secondary-button>
                                    </a>
                                </div>
                            </div>
                        @else
                            <!--NOT HAS ADDRESS-->
                            <div class="mb-4">
                                <x-input.customer-text class="bg-yellow-primary w-full" placeholder="Dirección de calle"
                                    wire:model.blur="checkoutAddress.street"></x-input.customer-text>
                                <x-input-error for="checkoutAddress.street" />
                            </div>
                            <div class="mb-4">
                                <x-input.customer-text class="bg-yellow-primary w-full" placeholder="Referencia"
                                    wire:model.blur="checkoutAddress.reference"></x-input.customer-text>
                                <x-input-error for="checkoutAddress.reference" />
                            </div>
                            <div>
                                <x-input.customer-text class="bg-yellow-primary w-full" placeholder="Ciudad"
                                    wire:model.blur="checkoutAddress.city"></x-input.customer-text>
                                <x-input-error for="checkoutAddress.city" />
                            </div>
                        @endif
                    </x-customer.checkout-input>
                </div>
            </x-customer.checkout-section>
            <x-input-error for="delivery" class="p-2" />
            <x-customer.checkout-section title="Información adicional">
                <div class="bg-yellow-secondary p-3 flex flex-col gap-2">
                    <span>Notas del pedido (opcional)</span>
                    <x-input.costumer-textarea placeholder="por ejemplo, notas especiales para la entrega"
                        wire:model.blur="description"></x-input.costumer-textarea>
                </div>
            </x-customer.checkout-section>
        </div>
    </div>
    <div class="w-full">
        <!--ORDER INFORMATION-->
        <div class="bg-white border border-border rounded px-5 pb-5">
            <!--PRODUCTS IN CART-->
            <x-customer.checkout-section title="Su pedido">
                @foreach (Cart::getContent() as $item)
                    <div class="flex justify-between text-md py-1 px-5">
                        <h5 class="uppercase">{{ $item->name }} x {{ $item->quantity }}</h5>
                        <h6>Bs{{ \Cart::get($item->id)->getPriceSum() }}</h6>
                    </div>
                @endforeach
                <div class="bg-yellow-secondary flex justify-between text-lg py-1 px-5">
                    <h5>Total</h5>
                    <h6>Bs{{ Cart::getTotal() }}</h6>
                </div>
            </x-customer.checkout-section>
            <!--PAYMENT-->
            <x-customer.checkout-section title="Método de pago">
                <!--PAYMENT CASH-->
                <div wire:click="$set('payment', 'cash')">
                    <x-customer.checkout-input label="Efectivo" action="{{ $payment === 'cash' ? true : false }}"
                        nameInput="cash" idInput="payment">
                        <p>Realice el pago al momento de recibir sus productos.</p>
                    </x-customer.checkout-input>
                </div>
                <!--PAYMENT CARD-->
                <div wire:click="$set('payment', 'card')">
                    <x-customer.checkout-input label="Tarjeta de crédito/débito"
                        action="{{ $payment === 'card' ? true : false }}" nameInput="card" idInput="payment">
                        <p>Pague con su tarjeta de débito/crédito.</p>
                    </x-customer.checkout-input>
                </div>
            </x-customer.checkout-section>
            <x-input-error for="payment" class="p-2" />
            <!--ORDER INPUT-->
            <div>
                <x-button.dark wire:click="store" class="mt-5 w-full h-[72px]">REALIZAR PEDIDO</x-button.dark>
            </div>
        </div>
    </div>
</div>
