<div class="mx-5">
    <!--CART-->
    @if (count(Cart::getContent()) == 0)
        <!--CART EMPTY-->
        <div class="md:flex justify-center gap-6 mt-32 pb-48 tracking-wide text-xl mb-20"
            style="font-family: 'Montserrat', sans-serif;">
            <p class="text-center">Tu carrito está vacio, hoy es un buen día para
                <a href="{{ route('shop') }}" class="underline hover:text-blue-700"> empezar a comprar.</a>
            </p>
        </div>
    @else
        <div class="md:flex justify-center gap-6 mt-9 pb-48 tracking-widest">
            <!--PRODUCTS-->
            <div class="border-t border-border basis-2/3">
                @foreach (Cart::getContent() as $item)
                    <div class="border-b border-border flex items-center py-5 h-32">
                        <div class="basis-1/6  mr-3">
                            <img width="90px" height="90px" class="rounded-md"
                                src="{{ asset('storage/' . $item->associatedModel->featured) }}" alt="">
                        </div>
                        <div class="basis-3/6">
                            <h1 class="text-lg tracking-[0.063rem] uppercase">{{ $item->name }}</h1>
                            <span class="font-thin tracking-tight"
                                style="font-family: 'Montserrat', sans-serif;">Bs{{ $item->price }}</span>
                        </div>
                        <div class="basis-2/6 flex justify-around items-center gap-2">
                            <x-input.customer-number
                                wire:model.blur="quantities.{{ $item->associatedModel->id }}"></x-input.customer-number>
                            <span class="text-lg">Bs{{ \Cart::get($item->id)->getPriceSum() }}</span>
                            <button class="border-2 rounded-full w-9 h-9 border-border text-border text-lg"
                                wire:click="delete({{ $item->id }})">x</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--CHECKOUT-->
            <div class="basis-1/3">
                <div class="md:border border-border rounded-md pt-6 px-4 pb-2 flex flex-col gap-4">
                    <div class="text-xl flex justify-between">
                        <h1>Subtotal</h1>
                        <h1>Bs{{ Cart::getTotal() }}</h1>
                    </div>
                    <a href="{{ route('checkout') }}" class="w-full">
                        <x-button.dark class="w-full">
                            <span class=" text-lg text-white">COMPRAR</span>
                        </x-button.dark>
                    </a>
                    <a href="{{ route('shop') }}"
                        class="text-center text-md sm:text-base md:text-xs lg:text-base hover:text-blue-800">CONTINUAR
                        COMPRANDO</a>
                </div>
            </div>
        </div>
    @endif
</div>
