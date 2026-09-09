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

class ScoringQuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'scoringQuestions';

    protected static ?string $title = 'Questions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('question')->label('Libellé de la question')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                ToggleButtons::make('severity')->label('Gravité')->inline()->default(QuestionSeverity::Medium)
                    ->options(QuestionSeverity::class)
                    ->required(),
                Select::make('probability')->label('Probabilité')->default(QuestionProbability::Medium)
                    ->options(QuestionProbability::class)
                    ->required(),
                Select::make('impact')->label('Impact')->default(QuestionImpact::Medium)
                    ->options(QuestionImpact::class)
                    ->required(),
                Select::make('priority')->label('Priorité')->default(QuestionPriority::P2)
                    ->options(QuestionPriority::class)
                    ->required(),
                TextInput::make('points')->label('Nombre de point')->default(1)
                    ->required()
                    ->numeric()->minValue(0),
                Select::make('type')
                    ->label('Type de question')
                    ->options([
                        ScoringQuestion::QUESTION_TOGGLE => 'Question à point',
                    ])
                    ->default(ScoringQuestion::QUESTION_TOGGLE)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                TextColumn::make('question')->limit(50)->sortable()->searchable(),
                TextColumn::make('severity')->label('Gravité')->sortable()->searchable()->toggleable(),
                TextColumn::make('probability')->label('Probabilité')->sortable()->toggleable(),
                TextColumn::make('impact')->label('Impact')->sortable()->toggleable(),
                TextColumn::make('priority')->label('Priorité')->sortable()->toggleable(),
                TextColumn::make('points')->sortable()->toggleable()->toggledHiddenByDefault(),
            ])
            ->filters([
                SelectFilter::make('severity')->label('Gravité')->options(QuestionSeverity::class)->multiple(),
                SelectFilter::make('probability')->label('Probabilité')->options(QuestionProbability::class)->multiple(),
                SelectFilter::make('impact')->label('Impact')->options(QuestionImpact::class)->multiple(),
                SelectFilter::make('priority')->label('Priorité')->options(QuestionPriority::class)->multiple(),
            ])
            ->headerActions([
                CreateAction::make()->label('Créer une question')
                    ->modalHeading('Créer une question')
                    ->mutateDataUsing(function ($data) {
                        $data['sort'] = 0;

                        return $data;
                    }),
            ])
            ->reorderableColumns()
            ->recordActions([
                EditAction::make()
                    ->modalHeading('Modifier la question'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort')
            ->reorderable('sort');
    }
}
