<?php

namespace App\Filament\Resources\ScoringSections\Pages;

use App\Filament\Resources\ScoringQuizzes\Pages\EditScoringQuiz;
use App\Filament\Resources\ScoringSections\ScoringSectionResource;
use App\Models\ScoringSection;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditScoringSection extends EditRecord
{
    protected static string $resource = ScoringSectionResource::class;

    protected function getHeaderActions(): array
    {
        /* @var ScoringSection $section */
        $section = $this->getRecord();

        return [
            DeleteAction::make()
                ->successRedirectUrl(EditScoringQuiz::getUrl(['record' => $section->scoringQuiz])),
        ];
    }
}
