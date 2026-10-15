<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <x-app-logo href="{{ route('home') }}" wire:navigate />

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="layout-grid" href="{{ route('dashboard') }}"
                :current="request()->routeIs('dashboard')" wire:navigate>
                Tableau de bord
            </flux:navbar.item>
        </flux:navbar>

        <flux:spacer />

        <!-- Desktop Guest Menu -->
        @guest
            <flux:navbar class="mr-1.5 space-x-0.5 py-0!">
                <flux:navbar.item class="" :href="route('login')" label="Connexion">Connexion</flux:navbar.item>
                <flux:navbar.item class="max-lg:hidden" :href="route('register')" label="Créer un compte">
                    Créer un compte
                </flux:navbar.item>
            </flux:navbar>
        @endguest

        <!-- Desktop User Menu -->
        @auth
            <flux:dropdown position="bottom" align="start">
                <flux:sidebar.profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down" data-test="sidebar-menu-button" />

                <flux:menu>
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                        <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />
                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                            <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                        </div>
                    </div>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        @can('access-panel')
                            <flux:menu.item :href="route('filament.admin.pages.dashboard')">
                                {{ __('Administration') }}
                            </flux:menu.item>
                        @endcan
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        @endauth
    </flux:header>

    <!-- Mobile Menu -->
    <flux:sidebar collapsible="mobile" sticky
        class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse
                class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        <flux:navlist variant="outline">
            <flux:navlist.group heading="Platform">
                <flux:navlist.item icon="layout-grid" href="{{ route('dashboard') }}"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    Tableau de bord
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        {{-- <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                Repository
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                Documentation
            </flux:navlist.item>
        </flux:navlist> --}}
    </flux:sidebar>

    {{ $slot }}

    @fluxScripts
</body>

</html>
