<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Golden Dragon</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    @vite('resources/js/app.js')
</head>

<body class="h-full">
    <nav class="bg-gray-800">
        <div class="min-h-full">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0 items-center">
                            <a href="/">
                                <img class="h-8 w-auto" src="{{ asset('img/dragon-small.png') }}" alt="The Golden Dragon">
                            </a>
                        </div>
                        <div class="sm:ml-6 sm:block">
                            <div class="flex ml-10 space-x-4">
                                <x-nav-link href="/orders" :active="request()->is('orders')">Bestellen</x-nav-link>
                                <x-nav-link href="/dishes" :active="request()->is('dishes')">Menu</x-nav-link>
                                <x-nav-link href="/categories" :active="request()->is('categories')">Categoriën</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-nav-link href="/menu/pdf">Download menu</x-nav-link>
                    </div>
                    <div>
                        <a href="/order">
                            <img class="h-8 w-auto cart ml-3" src="{{ asset('img/cart.png') }}" alt="The Golden Dragon">
                        </a>
                    </div>
                </div>
            </div>
    </nav>
    </div>
    <div class="container mx-auto">
        @yield('content')
        <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>
