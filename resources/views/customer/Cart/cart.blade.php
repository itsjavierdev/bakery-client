@extends('layouts.layout')

@section('title', 'Carrito')

@section('content')
    <div>
        <x-customer.title class="pt-28">CARRITO</x-customer.title>
        @livewire('cart.show-cart')
    </div>
@endsection
