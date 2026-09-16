@props(['scoring'])

<x-card class="h-fit">

    <div class="space-y-6">

        @foreach ($scoring->scoringQuiz->scoringSections as $section)
            <div class="grid grid-cols-3 items-center justify-items-stretch">
                <div class="col-span-2 flex items-center space-x-4">
                    <img src="{{ Storage::disk('public')->exists($section->icon) ? Storage::disk('public')->url($section->icon) : asset('images/icon_section_gouvernance.png') }}"
                        alt="icon" class="h-10 w-10">
                    <span class="font-semibold">{{ $section->title }}</span>
                    <span class="text-sm whitespace-nowrap">
                        {{ count($section->getAnswers($scoring)) }}
                        /
                        {{ $section->scoringQuestions()->count() }}
                    </span>
                </div>
                <div class="justify-self-end">
                    <flux:link href="{{ route('scorings.scoring-sections.show', [$scoring, $section]) }}"
                        class="text-primary">
                        Accéder
                    </flux:link>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10 flex justify-center">
        <a href="{{ route('scorings.show', $scoring) }}" wire:navigate>
            <x-button variant="primary">
                Voir l'évaluation globale
            </x-button>
        </a>
    </div>

</x-card>
