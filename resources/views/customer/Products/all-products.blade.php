@extends('layouts.layout')

@section('title', 'Productos')

@section('content')
    <section>
        <!--HEADER-->
        <x-customer.title class="pt-10">TIENDA</x-customer.title>
        @livewire('products.show-all-products')
    </section>
@endsection
