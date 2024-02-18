@extends('layouts.layout')

@section('title', 'Mis direcciones')

@section('content')
    <section class="mb-16">
        <!--HEADER-->
        <x-customer.title class="mb-11 pt-10 pb-10">MIS DIRECCIONES</x-customer.title>
        @livewire('addresses.show-addresses')
    </section>
@endsection
