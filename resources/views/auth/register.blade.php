<x-auth-layout>

    <x-slot name="header">Créer un compte</x-slot>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <x-textInput name="name" label="Nom" autocomplete="name" />

        <!-- Email Address -->
        <x-textInput name="email" label="Email" autocomplete="username" required />

        <!-- Password -->
        <x-textInput name="password" label="Mot de passe" type="password" autocomplete="new-password" required />

        <!-- Confirm Password -->
        <x-textInput name="password_confirmation" label="Confirmation du mot de passe" type="password"
            autocomplete="new-password" required />

        <x-textInput name="company[name]" label="Nom de l'entreprise" required />

        <x-textInput name="company[address][city]" label="Adresse de l'entreprise" required />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Déjà enregistré ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
