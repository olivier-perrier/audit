<x-app-layout>

    <span>
        <a href="{{ route('scorings.scoring-sections.index', $scoring) }}" class="text-blue-500 hover:underline">
            < Retour au tableau de bord </span>
        </a>

        <x-h1 class="mt-4">Compte rendu de votre audit</x-h1>

        <div class="mt-6">
            <span class="text-xs opacity-75 pl-1">Mise à jour le {{ $scoring->updated_at }}</span>

            <x-card class="mt-2">
                <x-h2>Analyse générale</x-h2>
                <p class="mt-2 text-sm">Félicitations, vous avez complété l'ensemble des informations
                    nécéssaires au calcul de
                    votre audit. Vous en trouverez le détail ci dessous ainsi que les points
                    d'amélioration clés à mettre en oeuvre.</p>

                <?php $score = $scoring->score; ?>
                <?php $points = $scoring->scoringQuiz->scoringQuestions()->sum('points'); ?>

                <p class="mt-2 text-sm">Vous avez obtenu le score de
                    <b>{{ $score }}</b>
                    sur
                    <b>{{ $points }}</b>.
                    Ce score vous permet d'avoir un pourcentage de
                    <b>{{ round(($score * 100) / $points) }}%
                    </b>.
                </p>

                {{-- <p class="mt-2 text-sm">Vous excellez particulièrement dans les domaines du recrutement et
                        de la communication,
                        avec des scores respectifs de 85 et 95 sur 100, indiquant des pratiques de recrutement
                        inclusives et des stratégies de communication claires et valorisaantes sur les employés
                        seniors.</p> --}}
            </x-card>
        </div>

        <div class="mt-6">

            <x-card>

                <div>
                    <x-h2>Analyse par domaine</x-h2>
                    <p class="mt-2 text-sm">Vous trouverez ci dessous les analyses et proportions d'actions
                        par domaine. Vous pouvez également modifier directement les réponses aux questions
                        dans les tableaux récapitulatifs.</p>

                    <div class="mt-4 space-y-4">
                        @foreach ($scoring->scoringQuiz->scoringSections as $section)
                            <?php $score = $section->getScoreAttribute($scoring); ?>
                            <?php $points = $section->scoringQuestions()->sum('points'); ?>
                            <?php $poucentage = round(($score * 100) / $points); ?>

                            <div>
                                <h3 class="font-bold">{{ $section->title }}
                                    ({{ $score }} points)
                                </h3>

                                <x-progress :pourcent="$poucentage">{{ $poucentage }}%</x-progress>

                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6">
                    <x-h2>Problèmes</x-h2>

                    <table>
                        <thead>
                            <tr>
                                <th class="w-1/2">Problème</th>
                                <th>Gravité</th>
                                <th>Probabilité</th>
                                <th>Impact</th>
                                <th>Priorité</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scoring->scoringAnswers as $answer)
                                <?php $points = $answer->points; ?>

                                @if ($points == 0)
                                    <tr class="text-sm">
                                        <td>
                                            <span>{{ $answer->scoringQuestion->question }}</span>
                                        </td>
                                        <td>
                                            @if ($answer->scoringQuestion->severity)
                                                <div class="flex justify-content items-center gap-2">
                                                    <div @class([
                                                        'w-3 h-3 rounded-full',
                                                        $answer->scoringQuestion->severity->getBackgroundColorClass(),
                                                    ])></div>
                                                    <p @class([
                                                        'font-bold',
                                                        $answer->scoringQuestion->severity->getColorClass(),
                                                    ])>
                                                        {{ $answer->scoringQuestion->severity->getLabel() }}
                                                    </p>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($answer->scoringQuestion->probability)
                                                <p>
                                                    {{ $answer->scoringQuestion->probability->getLabel() }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($answer->scoringQuestion->impact)
                                                <p>
                                                    {{ $answer->scoringQuestion->impact->getLabel() }}
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($answer->scoringQuestion->priority)
                                                <p>
                                                    {{ $answer->scoringQuestion->priority->getLabel() }}
                                                </p>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="mt-6">
                    <x-h2>Axes d'amélioration</x-h2>
                </div>

            </x-card>

            {{-- Details --}}
            <div class="mt-6">
                <x-h2>Détails</x-h2>

                <div class="mt-2">
                    @include('scoring.partials.certification-details', $scoring)
                </div>

            </div>

        </div>

        <div class="flex justify-center mt-6 space-x-4">
            <a href="{{ route('scorings.certification', $scoring) }}" class="self-center" wire:navigate>
                <x-secondary-button>Télécharger</x-secondary-button>
            </a>
        </div>

</x-app-layout>
