<x-layouts.app>

    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">Tableau de bord</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Nouvel audit</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex justify-center mt-10">
        <x-h1 class="mt-4">Lancez vous dans un nouvel audit</x-h1>
    </div>

    <form action="{{ route('scorings.store') }}" method="post">
        @csrf

        <div class="mt-6">
            <x-label>Selectionnez un audit</x-label>
            <flux:select name="scoring_quiz_id" placeholder="Selectionnez un audit" required>
                @foreach ($quizzes as $quiz)
                    <flux:select.option value="{{ $quiz->id }}">{{ $quiz->name }}</flux:select.option>
                @endforeach
            </flux:select>
            <x-error name="scoring_quiz_id" class="mt-2" />
        </div>

        <div class="flex justify-center mt-6">
            <x-button type="submit">
                Démarrer l'audit
            </x-button>
        </div>

    </form>

</x-layouts.app>
