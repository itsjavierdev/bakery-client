@extends('layouts.layout')

@section('title', 'Inicia sesión')

@section('content')
    <div class="flex justify-center">
        <div>
            <!--TITLE-->
            <x-customer.title class="mb-10 pt-10">Iniciar sesión</x-customer.title>
            <!--FORM-->
            <div class="bg-white border border-border rounded p-5 my-10">
                <!--VALIDATIONS-->
                <x-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input.customer-text id="email" class="block mt-1 w-96" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input.customer-text id="password" class="block mt-1 w-96" type="password" name="password"
                            required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <!--ACTIONS-->
                    <div class="flex flex-col items-center pt-5 gap-5">

                        <x-button.dark class="w-full">
                            {{ __('Log in') }}
                        </x-button.dark>
                        @if (Route::has('password.request'))
                            <a class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <span>¿Aún no te has registrado? <a
                                class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('register') }}">Crear una cuenta
                            </a></span>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
