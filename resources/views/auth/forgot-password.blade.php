@extends('layouts.layout')

@section('title', 'Inicia sesión')

@section('content')
    <div class="flex justify-center">
        <div>
            <!--TITLE-->
            <x-customer.title class="mb-10 pt-10">Recuperar contraseña</x-customer.title>
            <!--FORM-->
            <div class="bg-white border border-border rounded p-5 my-40">
                <div>
                    <div class="mb-4 text-sm text-gray-600 max-w-md">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input.customer-text id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-button.dark class="h-9 text-xs w-full">
                            {{ __('Email Password Reset Link') }}
                        </x-button.dark>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
