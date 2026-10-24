<div>
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update your account\'s appearance settings')">

        <h1>{{ $count }}</h1>

        <button wire:click="increment">+</button>

        <button wire:click="decrement">-</button>
    </x-settings.layout>
</div>
