<?php

namespace App\Filament\Resources\Scorings\Pages;

use App\Filament\Resources\Scorings\ScoringResource;
use App\Models\ScoringAnswer;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class EditScoring extends EditRecord
{
    protected static string $resource = ScoringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
