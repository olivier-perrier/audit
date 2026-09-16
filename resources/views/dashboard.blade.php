<x-app-layout>
    <div>
        <div class="flex flex-wrap gap-6">

            @foreach ($scorings as $scoring)
                <a href="{{ route('scorings.scoring-sections.index', $scoring) }}" wire:navigate>

                    <x-card class="h-52 w-52 relative"
                        style="background-image: url('images/bubble.svg'); object-fit: cover">
                        <span class="flex justify-center mt-2 text-3xl font-extrabold text-center mt-6">
                            {{ $scoring->scoringQuiz->name }}
                        </span>
                        <span class="flex justify-center text-center mt-2 text-xs">
                            Mise à jour le {{ $scoring->updated_at }}
                        </span>
                    </x-card>
                </a>
            @endforeach

        </div>

        <div class="flex justify-center mt-12">
            <a href="{{ route('scorings.create') }}">
                <x-button>
                    Nouvel audit
                </x-button>
            </a>
        </div>

    </div>
</x-app-layout>
