<div>
    @if ($relatedProducts->count())
        <section class="">
            <x-customer.title txtsize="xl">PRODUCTOS RELACIONADOS</x-customer.title>
            <div class="flex justify-center bg-yellow-secondary pt-7 mx-5">
                @foreach ($relatedProducts as $relatedProduct)
                    <a href="{{ route('show-product', $relatedProduct->slug) }}">
                        <x-customer.card-product image="{{ $relatedProduct->featured }}"
                            price="{{ $relatedProduct->price }}" name="{{ $relatedProduct->name }}">
                            <x-button.addcart class="tracking-widest"
                                wire:click.prevent="$dispatch('add-cart-single', {id:{{ $relatedProduct->id }}})">
                                agregar al carrito
                            </x-button.addcart>
                        </x-customer.card-product>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
    <!--TOAST-->
    <x-action-message on="saved">
        @if (session('status'))
            <x-alert action="{{ session('accion') }}">
                {{ session('status') }}
            </x-alert>
        @endif
    </x-action-message>
</div>
