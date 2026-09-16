@props(['section'])

<x-card class="mt-10">

    <flux:table>
        <flux:table.columns>
            <flux:table.column>Question</flux:table.column>
            <flux:table.column>Réponse</flux:table.column>
            <flux:table.column>Score</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        @foreach ($section->scoringQuestions as $question)
            <flux:table.row>
                <flux:table.cell class="text-sm py-2">
                    <span class="text-wrap">{{ $question->question }}</span>
                </flux:table.cell>
                <flux:table.cell>
                    <span class="flex justify-center">
                        <?php $answers = $question->scoringAnswers; ?>
                        @if ($answers->count() > 0)
                            <?php $answer = $answers->first(); ?>
                            @if ($answer->answer == true)
                                Oui
                            @elseif($answer->answer == false)
                                Non
                            @else
                                Je ne sais pas
                            @endif
                        @endif

                    </span>
                </flux:table.cell>
                <flux:table.cell>
                    <span class="flex justify-center">
                        {{ $question->points }}
                    </span>
                </flux:table.cell>
                <flux:table.cell>
                    <flux:link
                        href="{{ route('scorings.scoring-sections.scoring-questions.show', [$scoring, $section, $question]) }}"
                        class="text-primary">
                        Modifier
                    </flux:link>
                </flux:table.cell>
            </flux:table.row>
        @endforeach

    </flux:table>

</x-card>
