@extends('layouts.layout')

@section('title', 'Thank You')

@section('content')
    <section class="flex justify-center items-center py-10 ">
        <div class="py-52 max-w-xs flex flex-col items-center justify-center text-center gap-5">
            <span class="text-4xl">¡Muchas gracias por su compra!</span>
            <p>Se le envío un email de confirmación</p>
            <a href="/" class="w-full">
                <x-button.transparent class="w-full">VOLVER
                    AL
                    INICIO</x-button.transparent>
            </a>
        </div>
    </section>
@endsection
