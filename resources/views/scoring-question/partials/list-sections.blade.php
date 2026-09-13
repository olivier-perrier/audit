@props(['scoring'])

<x-card class="h-fit">

    <div class="py-4">

        <div class="space-y-6">

            @foreach ($scoring->scoringQuiz->scoringSections as $section)
                <div class="grid grid-cols-3 items-center justify-items-stretch">
                    <div class="col-span-2 flex items-center space-x-4">
                        <img src="{{ $section->icon ? asset($section->icon) : asset('images/icon_section_gouvernance.png') }}"
                            alt="icon" class="h-8">
                        <span class="font-bold">{{ $section->title }}</span>
                        <span class="text-sm whitespace-nowrap">
                            {{ count($section->getAnswers($scoring)) }}
                            /
                            {{ $section->scoringQuestions()->count() }}
                        </span>
                    </div>
                    <div class="justify-self-end">
                        <a href="{{ route('scorings.scoring-sections.show', [$scoring, $section]) }}" wire:navigate>
                            <span class="text-primary font-semibold hover:underline">Accéder</span >
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            <a href="{{ route('scorings.show', $scoring) }}" wire:navigate>
                <x-primary-button>
                    Voir lévaluation globale
                </x-primary-button>
            </a>
        </div>

    </div>

</x-card>
