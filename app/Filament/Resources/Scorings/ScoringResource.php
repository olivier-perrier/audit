<?php

namespace App\Filament\Resources\Scorings;

use App\Filament\Resources\Scorings\Pages\CreateScoring;
use App\Filament\Resources\Scorings\Pages\EditScoring;
use App\Filament\Resources\Scorings\Pages\ListScorings;
use App\Filament\Resources\ScoringSections\RelationManagers\ScoringAnswersRelationManager;
use App\Models\Scoring;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ScoringResource extends Resource
{
    protected static ?string $model = Scoring::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Scorings';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextEntry::make('scoringQuiz.name')->label('Questionnaire'),
                    TextEntry::make('author.name')->label('Auteur'),
                    TextEntry::make('id')->label('Nombre de questions')
                        ->formatStateUsing(fn ($record) => $record->scoringAnswers()->count() . ' / ' . $record->scoringQuiz->scoringQuestions()->count()),
                    TextEntry::make('score')->label('Score'),
                    TextEntry::make('score_pourcentage')->label('Score en pourcentage')->suffix('%'),
                ])
                    ->columnSpanFull()
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with(['scoringQuiz', 'scoringAnswers', 'author']))
            ->columns([
                TextColumn::make('scoringQuiz.name')->label('Questionnaire'),
                TextColumn::make('author.name')->label('Auteur'),
                TextColumn::make('updated_at')->label('Date de mise à jour')->date()->sortable(),
                TextColumn::make('score')->label('Score'),
                // TextColumn::make('company.name')->label('Entreprise')
                //     ->visible(request()->user()->can('view-any', Company::class))
                //     ->sortable()
                //     ->toggleable(),
                // TextColumn::make('company.category.name')->label("Catégorie d'entreprise")
                //     ->visible(request()->user()->can('view-any', Company::class))
                //     ->sortable()
                //     ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('Questionnaire')
                    ->relationship('scoringQuiz', 'name'),
                SelectFilter::make('Auteur')
                    ->relationship('author', 'name'),
                // SelectFilter::make("Catégorie d'entreprise")
                //     ->relationship('author.company.category', 'name', fn(Builder $query) => $query->ofCompany()),
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make()
                    ->url(fn($record) => route('scorings.show', $record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ScoringAnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListScorings::route('/'),
            'create' => CreateScoring::route('/create'),
            'edit' => EditScoring::route('/{record}/edit'),
        ];
    }
}
