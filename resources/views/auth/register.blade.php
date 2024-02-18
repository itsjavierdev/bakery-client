@extends('layouts.layout')

@section('title', 'Registrate')

@section('content')
    <div class="flex justify-center">
        <div>
            <!--TITLE-->
            <x-customer.title class="mb-10">Crear una cuenta</x-customer.title>
            <!--FORM-->
            <div class="bg-white border border-border rounded p-5 my-10">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input.customer-text id="name" class="block mt-1 w-96" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input.customer-text id="email" class="block mt-1 w-96" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="phone" value="{{ __('Telefono') }}" />
                        <x-input.customer-text id="phone" class="block mt-1 w-96" type="text" name="phone"
                            :value="old('phone')" required autocomplete="phone" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input.customer-text id="password" class="block mt-1 w-96" type="password" name="password"
                            required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input.customer-text id="password_confirmation" class="block mt-1 w-96" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <!--TERMS AND CONDITIONS-->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif
                    <!--ACTIONS-->
                    <div class="flex flex-col items-center pt-5 gap-5">
                        <x-button.dark class="w-full">
                            {{ __('Register') }}
                        </x-button.dark>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            ¿Ya tiene cuenta?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
