@extends('layouts.layout')

@section('title', 'Checkout')

@section('content')
    <section class="p-5">
        <!--HEADER-->
        <x-customer.title class="mb-7">CHECKOUT</x-customer.title>
        @livewire('checkout')
    </section>
@endsection
