<?php

namespace App\Filament\Resources\ScoringSections\RelationManagers;

use App\Enums\QuestionImpact;
use App\Enums\QuestionPriority;
use App\Enums\QuestionProbability;
use App\Enums\QuestionSeverity;
use App\Models\ScoringQuestion;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ScoringAnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'scoringAnswers';

    protected static ?string $title = 'Réponses';

    protected static ?string $modelLabel = 'Réponse';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('answer')->label('Réponse')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                TextColumn::make('scoringQuestion.question')
                    ->label('Libellé de la question')->limit(50)->sortable()->searchable(),
                TextColumn::make('scoringQuestion.points')
                    ->label('Points de la question')->sortable()->searchable(),
                TextColumn::make('answer')->label('Réponse')->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            "1" => 'Oui',
                            "0" => 'Non',
                            null => 'Non répondu',
                            default => $state,
                        };
                    }),
            ])
            ->filters([])
            ->headerActions([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
