<?php

namespace App\Filament\Exports;

use App\Models\ScoringQuestion;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class QuestionExporter extends Exporter
{
    protected static ?string $model = ScoringQuestion::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('Id')->visible(),
            ExportColumn::make('scoringSection.id')->label('Id section'),
            ExportColumn::make('scoringSection.title')->label('Titre section'),
            ExportColumn::make('sort')->label('Ordre'),
            ExportColumn::make('question')->label('Libellé'),
            ExportColumn::make('severity')->label('Gravité'),
            ExportColumn::make('probability')->label('Probabilité'),
            ExportColumn::make('impact')->label('Impact'),
            ExportColumn::make('priority')->label('Priorité'),
            ExportColumn::make('points'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your question export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
