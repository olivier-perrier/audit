<x-card>
    <x-h2>Détails</x-h2>

    <div>
        @foreach ($scoring->scoringQuiz->scoringSections as $section)
            <div class="mt-6">
                <x-h3>
                    Section {{ $section->title }} :
                    {{ $section->getScoreAttribute($scoring) }}
                    points
                </x-h3>
                <ul class="list-inside list-disc">
                    @foreach ($section->scoringQuestions as $question)
                        <li>
                            {{ $question->question }}
                            <div class="text-sm italic">
                                <?php $scoring_answer = $question->getAnswer($scoring); ?>
                                <?php $points = $scoring_answer?->points; ?>
                                @if ($question->type == App\Models\ScoringQuestion::QUESTION_TOGGLE)
                                    <b>{{ $scoring_answer?->answer ? 'Oui' : 'Non' }}</b>
                                    {{ ' : ' . ($points ?? 0) . ' points' }}
                                @elseif($question->type == App\Models\ScoringQuestion::QUESTION_INPUT)
                                    <b>{{ $scoring_answer?->answer }}</b>
                                @endif
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-card>
