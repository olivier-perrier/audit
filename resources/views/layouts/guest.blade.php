<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow relative">
                <img src="{{ asset('images/header-2.jpg') }}" alt="image_header" class="w-full h-72 object-cover">
                <div class="px-4 text-2xl md:text-4xl uppercase font-extrabold text-center drop-shadow-lg text-white absolute inset-0 flex items-center justify-center">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="mx-auto py-8 sm:px-6 lg:px-8 px-4 max-w-7xl">
            {{ $slot }}
        </main>
    </div>

    @fluxScripts
</body>

</html>
