<div class="pb-10">
    <div class="md:grid grid-cols-2 flex flex-col gap-4 md:gap-0" style="grid-template-columns: 23% 77%;">
        <!--SEARCH-->
        <div class="col-[1/2] row-[1/2] md:bg-yellow-secondary rounded-md p-3 mt-3 md:ml-3 ml-0">
            <x-input.customer-search wire:model.live="search"></x-input.customer-search>
        </div>
        <!--ORDER BY-->
        <div class="col-[2/3] row-[1/2] flex md:justify-end justify-center px-4">
            <div class="w-full flex justify-end items-center gap-3">
                <span class="whitespace-nowrap">Ordenar por:</span>
                <x-input.customer-select wire:model.live="orderBy">
                    <option value="orderAZ" class="bg-white">Alfabéticamente, A-Z</option>
                    <option value="orderZA" class="bg-white">Alfabéticamente, Z-A</option>
                    <option value="priceLowHigh" class="bg-white">Precio, menor a mayor</option>
                    <option value="priceHighLow" class="bg-white">Precio, mayor a menor</option>
                    <option value="dateOldNew" class="bg-white">Fecha: antiguo(a) a reciente</option>
                    <option value="dateNewOld" class="bg-white">Fecha: reciente a antiguo(a)</option>
                </x-input.customer-select>
            </div>
        </div>
        <!--PRODUCTS-->
        @if ($products->count())
            <div class="w-full flex justify-center flex-wrap col-[2/3] row-[2/3]">
                @foreach ($products as $product)
                    <a href="{{ route('show-product', $product->slug) }}">
                        <x-customer.card-product image="{{ $product->featured }}" price="{{ $product->price }}"
                            name="{{ $product->name }}">
                            <x-button.addcart wire:click.prevent="$dispatch('add-cart', {id:{{ $product->id }}})">
                                agregar al carrito
                            </x-button.addcart>
                        </x-customer.card-product>
                    </a>
                @endforeach
            </div>
        @else
            <!--NOT RELATED PRODUCTS-->
            <div class="w-full flex justify-center items-center flex-wrap col-[2/3] row-[2/3] items-center p-10">
                <h1>No se encontraron productos coincidentes</h1>
            </div>
        @endif
        <!--PAGINATION-->
        @if ($products->hasPages())
            <div class="col-[1/3] row-[3/4] px-6 py-3">
                {{ $products->links() }}
            </div>
        @endif
        <!--FILTER BY CATEGORY-->
        <div class="flex flex-col col-[1/2] row-[2/3] bg-yellow-secondary px-3 md:ml-3 md:m-0 m-4">
            <h1 class="border-b-2 border-black py-4 px-2">Filtrar por categoría:</h1>
            <div wire:click="$set('categoryOrder', 'todos')">
                <x-customer.category active="{{ $categoryOrder == 'todos' ? true : false }}">Todos</x-customer.category>
            </div>
            @foreach ($categories as $category)
                <div wire:click="$set('categoryOrder', {{ $category->id }})">
                    <x-customer.category
                        active="{{ $categoryOrder == $category->id ? true : false }}">{{ $category->name }}</x-customer.category>
                </div>
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
</div>
