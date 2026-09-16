<x-app-layout>

    <div>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Tableau de bord</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('scorings.scoring-sections.index', $scoring)">Sections
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ $section->title }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <div class="mt-8 flex space-x-4">
            <img src="{{ Storage::disk('public')->exists($section->icon) ? Storage::disk('public')->url($section->icon) : asset('images/icon_section_gouvernance.png') }}"
                alt="icon" class="h-10">
            <x-h1 class="content-center">{{ $section->title }}</x-h1>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-y-6 lg:gap-10">

        <div class="col-span-2">

            {{-- Main card --}}
            <x-card>
                <span class="font-bold">{{ $question->points }} points</span>
                <p class="mt-2">{{ $question->question }}</p>

                <form id="submit"
                    action="{{ route('scorings.scoring-sections.scoring-questions.update', [$scoring, $section, $question]) }}"
                    method="post">
                    @csrf
                    @method('put')

                    <div class="mt-6">
                        <input type="radio" id="yes" name="answer" value="1" @checked($answer ? @$answer->answer == true : false)>
                        <label for="yes" class="content-center">Oui</label><br>
                        <input type="radio" id="no" name="answer" value="0" @checked($answer ? @$answer->answer == false : false)>
                        <label for="no">Non</label><br>
                        <input type="radio" id="i-dont-know" name="answer" value="" required
                            @checked($answer ? $answer->answer == null : false)>
                        <label for="i-dont-know">Je ne sais pas</label> <br>
                    </div>
                    @error('answer')
                        <span class="text-sm text-red-500">Vous devez choisir au moins une des réponses</span>
                    @enderror

                </form>

                <div class="mt-6 flex justify-between self-end">
                    <a
                        href="{{ $preview_question ? route('scorings.scoring-sections.scoring-questions.show', [$scoring, $section, $preview_question]) : '' }}">
                        <x-button :disabled="!$preview_question" variant="outline">
                            Précédent
                        </x-button>
                    </a>

                    {{ $question->sort . ' / ' . count($section->scoringQuestions) }}

                    <x-button form="submit" variant="primary" type="submit">
                        Suivant
                    </x-button>
                </div>

            </x-card>

            <div class="mt-6">

                <p class="text-sm">Vous avez le score de <b>{{ $section->getScoreAttribute($scoring) }}</b>
                    sur <b>{{ $section->pointsCount }}</b>,
                    soit <b>{{ $section->getScorePourcentage($scoring) }}</b>% sur le volet {{ $section->title }}
                </p>

            </div>

            @include('scoring-question.partials.list-questions', $section)

        </div>

        <div class="col-span-1">
            @include('scoring-question.partials.list-sections', $scoring)
        </div>

    </div>

</x-app-layout>
