<x-app-layout>

    {{-- <flux:breadcrumbs>
        <flux:breadcrumbs.item>Tableau de bord</flux:breadcrumbs.item>
    </flux:breadcrumbs> --}}

    <div class="">
        <flux:heading>Retrouvez ici tout vos audits</flux:heading>
        <flux:text class="mt-2">Selectionnez un de vos audit pour continuer à répondre aux questions ou visualiser le rapport d'analyse.</flux:text>

        <div class="mt-6 flex flex-wrap gap-6">

            @foreach ($scorings as $scoring)
                <a href="{{ route('scorings.scoring-sections.index', $scoring) }}" wire:navigate>

                    <x-card class="h-52 w-52 relative"
                        style="background-image: url('images/bubble.svg'); object-fit: cover">
                        <span class="flex justify-center mt-2 text-3xl font-extrabold text-center">
                            {{ $scoring->scoringQuiz->name }}
                        </span>
                        <span class="flex justify-center text-center mt-2 text-xs">
                            Mise à jour le {{ $scoring->updated_at }}
                        </span>
                    </x-card>
                </a>
            @endforeach

        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('scorings.create') }}">
                <x-button>Nouvel audit</x-button>
            </a>
        </div>

    </div>
</x-app-layout>
