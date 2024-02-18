<main class="max-w-6xl mx-auto p-7">
    <div>
        <!--RECOMMENDED PRODUCTS-->
        <div class="w-full bg-yellow-secondary rounded-md p-8 mb-8">
            <x-customer.title txtsize="2xl">RECOMENDADOS</x-customer.title>
            <div class="flex justify-center flex-wrap">
                <!--PRODUCTS-->
                @foreach ($recommendedProducts as $recommendedProduct)
                    <a href="{{ route('show-product', $recommendedProduct->slug) }}">
                        <x-customer.card-product image="{{ $recommendedProduct->featured }}"
                            price="{{ $recommendedProduct->price }}" name="{{ $recommendedProduct->name }}">
                            <x-button.addcart
                                wire:click.prevent="$dispatch('add-cart', {id:{{ $recommendedProduct->id }}})">
                                agregar al carrito
                            </x-button.addcart>
                        </x-customer.card-product>
                    </a>
                @endforeach
            </div>
        </div>
        <!--BEST SELLERS PRODUCTS-->
        <div class="w-full bg-yellow-secondary rounded-md p-8 mb-8">
            <x-customer.title txtsize="2xl">MÁS VENDIDOS</x-customer.title>
            <div class="flex justify-center flex-wrap">
                <!--PRODUCTS-->
                @foreach ($bestsellerProducts as $bestsellerProduct)
                    <a href="{{ route('show-product', $bestsellerProduct->slug) }}">
                        <x-customer.card-product image="{{ $bestsellerProduct->featured }}"
                            price="{{ $bestsellerProduct->price }}" name="{{ $bestsellerProduct->name }}">
                            <x-button.addcart
                                wire:click.prevent="$dispatch('add-cart', {id:{{ $bestsellerProduct->id }}})">
                                agregar al carrito
                            </x-button.addcart>
                        </x-customer.card-product>
                    </a>
                @endforeach
            </div>
        </div>
        <!--RECENT PRODUCTS-->
        <div class="w-full bg-yellow-secondary rounded-md p-8">
            <x-customer.title txtsize="2xl">NUEVOS</x-customer.title>
            <div class="flex justify-center flex-wrap">
                <!--PRODUCTS-->
                @foreach ($recentProducts as $recentProduct)
                    <a href="{{ route('show-product', $recommendedProduct->slug) }}">
                        <x-customer.card-product image="{{ $recentProduct->featured }}"
                            price="{{ $recentProduct->price }}" name="{{ $recentProduct->name }}">
                            <x-button.addcart
                                wire:click.prevent="$dispatch('add-cart', {id:{{ $recentProduct->id }}})">
                                agregar al carrito
                            </x-button.addcart>
                        </x-customer.card-product>
                    </a>
                @endforeach
            </div>
        </div>
        <!--TOAST-->
        <x-action-message on="saved">
            @if (session('status'))
                <x-alert action="{{ session('accion') }}">
                    {{ session('status') }}
                </x-alert>
            @endif
        </x-action-message>
</main>
