<flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

    <flux:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

    <x-app-logo href="{{ route('home') }}" wire:navigate />

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
            wire:navigate>
            {{ __('Dashboard') }}
        </flux:navbar.item>
    </flux:navbar>

    <flux:spacer />

    {{-- <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
        <flux:tooltip :content="__('Search')" position="bottom">
            <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#"
                :label="__('Search')" />
        </flux:tooltip>
        <flux:tooltip :content="__('Repository')" position="bottom">
            <flux:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="folder-git-2"
                href="https://github.com/laravel/livewire-starter-kit" target="_blank" :label="__('Repository')" />
        </flux:tooltip>
        <flux:tooltip :content="__('Documentation')" position="bottom">
            <flux:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="book-open-text"
                href="https://laravel.com/docs/starter-kits#livewire" target="_blank" :label="__('Documentation')" />
        </flux:tooltip>
    </flux:navbar> --}}

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
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer" data-test="logout-button">
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                    {{-- <flux:menu.item href="{{ route('login') }}">Se connecter</flux:menu.item> --}}
                    {{-- <flux:menu.item href="{{ route('register') }}" class="ml-4">S'enregistrer</flux:menu.item> --}}
                </flux:menu.radio.group>
            </flux:menu>
        </flux:dropdown>
    @endauth

    <!-- Mobile Menu -->
    <flux:sidebar collapsible="mobile" sticky
        class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('home') }}" wire:navigate />
            <flux:sidebar.collapse
                class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.group :heading="__('Platform')">
                <flux:sidebar.item icon="layout-grid" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:sidebar.item>
            </flux:sidebar.group>
        </flux:sidebar.nav>

        <flux:spacer />

        <flux:sidebar.nav>
            <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:sidebar.item>
            <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

</flux:header>
