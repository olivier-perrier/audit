<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-flux-theme="light" prefers-color-scheme="light">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <div class="">

        @include('layouts.navigation')

        <main class="py-8 max-w-7xl mx-auto px-4 md:px-8">
            {{ $slot }}
        </main>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist
    </div>

    @fluxScripts
</body>

</html>
