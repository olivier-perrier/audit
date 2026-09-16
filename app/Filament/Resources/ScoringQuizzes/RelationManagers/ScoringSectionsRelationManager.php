<?php

namespace App\Filament\Resources\ScoringQuizzes\RelationManagers;

use App\Filament\Resources\ScoringSections\ScoringSectionResource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScoringSectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'scoringSections';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('icon')->label('Icon')->toggleable()->square(),
                TextColumn::make('title')->label('Titre')->sortable()->searchable(),
                TextColumn::make('description')->label('Description')->limit(50)->toggleable(),
                TextColumn::make('scoring_questions_count')->label('Nombre de questions')->counts('scoringQuestions')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data): array {
                        $data['sort'] = 0;

                        return $data;
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->url(fn ($record) => ScoringSectionResource::getUrl('edit', [$record])),
                DeleteAction::make(),
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
            ->toolbarActions([
                BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
