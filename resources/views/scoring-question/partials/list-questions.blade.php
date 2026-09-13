@props(['section'])

<div class="mt-10 border rounded p-4 bg-white">

    <div class="overflow-x-auto">
        <table>
            <thead>
                <tr class="border-b border-gray-200 ">
                    <th class="mx-2">Question</th>
                    <th>
                        <span class="mx-2">Réponse</span>
                    </th>
                    <th>
                        <span class="mx-2">Score</span>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($section->scoringQuestions()->orderBy('sort')->get() as $question)
                    <tr class="border-b border-gray-200 ">
                        <td class="text-sm py-2">
                            <span>{{ $question->question }}</span>
                        </td>
                        <td>
                            <span class="flex justify-center">
                                <?php $answer = $question->getAnswer($scoring); ?>
                                @if ($answer)
                                    @if ($question->getAnswer($scoring)->answer == true)
                                        Oui
                                    @elseif($question->getAnswer($scoring)->answer == false)
                                        Non
                                    @else
                                        Je ne sais pas
                                    @endif
                                @endif

                            </span>
                        </td>
                        <td>
                            <span class="flex justify-center">
                                {{ $question->points }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('scorings.scoring-sections.scoring-questions.show', [$scoring, $section, $question]) }}"
                                class="text-sm text-blue-500 hover:underline">
                                Modifier
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
