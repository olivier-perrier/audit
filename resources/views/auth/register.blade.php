<x-auth-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <x-input name="name" label="Nom" autocomplete="name" />

        <!-- Email Address -->
        <x-input name="email" label="Email" autocomplete="username" required />

        <!-- Password -->
        <x-input name="password" label="Mot de passe" type="password" autocomplete="new-password" required />

        <!-- Confirm Password -->
        <x-input name="password_confirmation" label="Confirmation du mot de passe" type="password"
            autocomplete="new-password" required />

        <x-input name="company[name]" label="Nom de l'entreprise" required />

        <x-input name="company[address][city]" label="Adresse de l'entreprise" required />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Déjà enregistré ?') }}
            </a>

            <x-button class="ms-4">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</x-auth-layout>
