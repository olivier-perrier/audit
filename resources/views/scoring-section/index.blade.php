<x-app-layout>

    <?php $scoring_questions_count = count($scoring->scoringQuiz->scoringQuestions); ?>
    <?php $scoring_answers_count = count($scoring->scoringAnswers); ?>

    <x-h1>Votre évaluation {{ Str::lower($scoring->scoringQuiz->name) }}</x-h1>
    <p>Vous trouverez ci dessous les {{ count($scoring->scoringQuiz->scoringSections) }} thèmes de l'audit.
        Il vous reste actuellement <b>{{ $scoring_questions_count - $scoring_answers_count }} questions</b> auxquelles
        répondre pour obtenir votre évaluation globale.</p>

    @if ($scoring->isCompleted())
        <div class="mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            <p>Félicitations ! Vous avez terminé votre évaluation.</p>
        </div>
    @endif

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

        @foreach ($scoring->scoringQuiz->scoringSections as $section)
            <a href="{{ route('scorings.scoring-sections.show', [$scoring, $section]) }}" wire:navigate>

                <div class="bg-white px-4 py-4 rounded hover:bg-indigo-200">
                    <div class="flex">
                        <img src="{{ $section->icon ? asset($section->icon) : asset('images/icon_section_gouvernance.png') }}"
                            alt="icon" class="p-2 h-16">
                        <span class="ml-4 font-bold text-lg content-center">{{ $section->title }}</span>
                    </div>
                    <span>{{ count($section->scoringQuestions) }} question(s)</span>

                    <?php
                    $answer_count = count($section->getAnswers($scoring));
                    $remaining_answer_count = count($section->scoringQuestions) - $answer_count;
                    ?>

                    <div class="flex justify-between">
                        <div>
                            @if ($remaining_answer_count == 0)
                                <span class="bg-green-500 text-white rounded-full px-4">Terminé</span>
                            @elseif($answer_count == 0)
                                <span class="bg-blue-500 text-white rounded-full px-4">A faire</span>
                            @else
                                <span class="bg-orange-500 text-white rounded-full px-4">En cours...</span>
                            @endif
                        </div>
                        <span class="text-blue-500 hover:underline">Modifier</span>
                    </div>
                    <span class="italic text-sm text-gray-700">
                        {{ $remaining_answer_count }}
                        réponse(s) manquante(s)
                    </span>
                </div>
            </a>
        @endforeach

    </div>

    @if ($scoring->isCompleted() || true)
        <div class="mt-6 flex justify-center">
            <a href="{{ route('scorings.show', $scoring) }}" wire:navigate>
                <x-button>
                    Voir votre analyse de l'audit
                </x-button>
            </a>
        </div>
    @endif

    <div class="mt-10">
        <form action="{{ route('scorings.destroy', $scoring) }}" method="post" class="self-center"
            onsubmit="return confirm('Êtes vous sûr de vouloir supprimer cette évaluation ? (Cette action est irreversible)');">
            @method('delete')
            @csrf
            <button class="text-red-500 hover:text-red-700 opacity-75 text-sm" type="submit">Supprimer</button>
        </form>
    </div>

</x-app-layout>
