<?php

namespace App\Filament\Imports;

use App\Enums\QuestionProbability;
use App\Enums\QuestionSeverity;
use App\Models\ScoringQuestion;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class QuestionImporter extends Importer
{
    protected static ?string $model = ScoringQuestion::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id')->label('Id')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('scoringSection')->label('Id section')
                ->relationship()
                ->requiredMapping(),
            ImportColumn::make('question')->label('Libellé')
                ->requiredMapping()
                ->rules(['required', 'max:16000']),
            ImportColumn::make('severity')->label('Gravité')
                ->requiredMapping()
                ->enum(QuestionSeverity::class),
            ImportColumn::make('probability')->label('Probabilité')
                ->requiredMapping()
                ->enum(QuestionProbability::class),
            ImportColumn::make('impact')->label('Impact')
                ->requiredMapping()
                ->rules(['max:255']),
            ImportColumn::make('priority')->label('Priorité')
                ->requiredMapping()
                ->enum(QuestionProbability::class),
            ImportColumn::make('points')->label('Points')
                ->requiredMapping()
                ->numeric()
                ->rules(['numeric', 'min:0']),
        ];
    }

    public function resolveRecord(): ScoringQuestion
    {
        return ScoringQuestion::firstOrNew([
            'id' => $this->data['id'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your question import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
