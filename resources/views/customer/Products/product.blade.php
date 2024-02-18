@extends('layouts.layout')

@section('title', $product->name)

@section('content')
    <!--PRODUCT DETAIL-->
    <section class=" max-w-4xl flex justify-center mx-auto py-14">
        <div class="md:grid grid-cols-2 w-full" style="
        grid-template-columns: 40% 60%;">
            <!--TITLE-->
            <div class="flex flex-col gap-5 items-center p-5">
                <x-customer.title txtsize="3xl" class="pt-0">{{ $product->name }}</x-customer.title>
                <span class="text-xl" style="font-family: 'Montserrat', sans-serif;">Bs{{ $product->price }}</span>
            </div>
            <!--IMAGE-->
            <div class="row-span-2 flex justify-center p-5">
                <img class="rounded-md w-full md:w-[400px]" src="{{ asset('storage/' . $product->featured) }}"
                    alt="">
            </div>
            <!--DESCRIPTION-->
            <div class="p-5 flex flex-col gap-5">
                <span class="text-center" style="font-family: 'Montserrat', sans-serif;">{{ $product->description }}</span>
                @livewire('cart.add-to-cart', ['productId' => $product->id])
            </div>
        </div>
    </section>
    <!--RELATED PRODUCTS-->
    @livewire('products.show-related-products', ['productId' => $product->id])
@endsection
