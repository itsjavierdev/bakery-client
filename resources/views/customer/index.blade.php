<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panadería San Xavier - Inicio</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Montserrat&family=Varela+Round&display=swap"
        rel="stylesheet">

    <!--ICONS-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- STYLES -->
    @livewireStyles
</head>

<body style="font-family: 'Varela Round', sans-serif;" class="bg-yellow-primary text-font-primary">
    <!--NAVBAR-->
    <header class="header-inner absolute w-full z-10 text-white">
        <nav class="md:flex md:items-center md:justify-between w-[92%] mx-auto">
            <div class="flex justify-between items-center ">
                <a href="/" class="flex items-center text-xl">
                    <img class="w-16 cursor-pointer p-3" src="{{ asset('images/logo.PNG') }}" alt="...">
                    <span class="cursor-pointer hover:text-yellow-primary">San Xavier</span>
                </a>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
                </span>
            </div>
            <ul
                class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-transparent max-md:bg-brown-primary w-full left-0 md:w-auto py-4 pl-4 top-[-400px] transition-all ease-in duration-300 md:duration-0">
                <li class="mx-4 my-6 md:my-0">
                    <a href="/" class="text-medium hover:text-yellow-primary">Inicio</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="{{ route('shop') }}" class="text-medium hover:text-yellow-primary">Tienda</a>
                </li>
                <li class="mx-4">
                    @livewire('cart.cart-button')
                </li>
                <li>

                    @if (Route::has('login'))
                        @auth
                            <!-- SETTINGS DROPDOWN -->
                            <div class="sm:flex sm:items-center sm:ms-6">
                                <div class="ms-3 relative">
                                    <x-dropdown align="left" width="48">
                                        <x-slot name="trigger">
                                            <span class="inline-flex rounded-md">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>

                                            <x-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <div class="border-t border-gray-200"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                    @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-medium hover:text-yellow-primary md:ml-5 ml-4">Iniciar
                                Sesión</a>
                        @endauth
                        </div>
                    @endif

                </li>
                <h2 class=""></h2>
            </ul>
        </nav>
    </header>
    <!--IMAGE HEADER-->
    <section class="h-500 relative bg-center bg-cover content-banner flex justify-center"
        style="background-image: url({{ asset('images/bannerhome.png') }});">
        <p class="text-6xl text-center text-white pt-60" style="font-family: 'Caveat', cursive;">Para Cada
            Momento, Para Todos Los Gustos</p>
    </section>

    <!--CONTENT-->
    @livewire('products.show-recommended-products')

    <!--FOOTER-->
    @include('layouts.footer')

    <!--NAVBAR FUNCTIONS-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        function Menu(e) {
            let list = document.querySelector('ul');
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[0px]'), list.classList.add('opacity-100'), list
                .classList.add('pt-12')) : (e
                .name = "menu", list.classList.remove('top-[0px]'), list.classList.remove('opacity-100'), list.classList
                .remove('pt-12'))
        }
        $(function() {
            var navbar = $('.header-inner');
            $(window).scroll(function() {
                if ($(window).scrollTop() <= 40) {
                    navbar.removeClass(
                        'bg-brown-primary sticky top-0 shadow-md transition-all duration-200');
                } else {
                    navbar.addClass('bg-brown-primary sticky top-0 shadow-md transition-all duration-200');
                }
            });
        });
    </script>
</body>

</html>
