<x-card>
    <div>
        @foreach ($scoring->scoringQuiz->scoringSections as $section)
            <x-h3>
                Section {{ $section->title }} :
                {{ $section->getScoreAttribute($scoring) }}
                points</x-h3>
            <ul class="list-inside list-disc">
                @foreach ($section->scoringQuestions as $question)
                    <li>
                        {{ $question->question }}
                        <div class="text-sm italic">
                            <?php $scoring_answer = $question->getAnswer($scoring); ?>
                            <?php $points = $scoring_answer?->getPointAttribute($scoring); ?>
                            @if ($question->type == App\Models\ScoringQuestion::QUESTION_TOGGLE)
                                <b>{{ $scoring_answer?->answer ? 'Oui' : 'Non' }}</b>
                                {{ ' : ' . ($points ?? 0) . ' points' }}
                            @elseif($question->type == App\Models\ScoringQuestion::QUESTION_INPUT)
                                <b>{{ $scoring_answer?->answer }}</b>
                            @elseif($question->type == App\Models\ScoringQuestion::QUESTION_COMPLEXE)
                                <b>{{ $scoring_answer?->answer }}</b>
                                {{ ' : ' . $points . ' points' }}
                            @endif
                            </span>
                    </li>
                @endforeach
            </ul>
            <br>
        @endforeach
    </div>
</x-card>
