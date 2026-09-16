<?php

namespace App\Filament\Resources\ScoringQuizzes;

use App\Filament\Resources\ScoringQuizzes\Pages\CreateScoringQuiz;
use App\Filament\Resources\ScoringQuizzes\Pages\EditScoringQuiz;
use App\Filament\Resources\ScoringQuizzes\Pages\ListScoringQuizzes;
use App\Filament\Resources\ScoringQuizzes\RelationManagers\ScoringSectionsRelationManager;
use App\Models\ScoringQuiz;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScoringQuizResource extends Resource
{
    protected static ?string $modelLabel = 'Questionnaires';

    protected static ?string $model = ScoringQuiz::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Scorings';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('name')->label('Nom')->required(),
                    Textarea::make('description')->label('Description')->columnSpanFull(),
                ])->columnSpan(2),
                Section::make()->schema([
                    FileUpload::make('image')->label('Image')->disk('public')->image()->directory('quizzes'),
                ])->columnSpan(1)
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image')->toggleable()->square(),
                TextColumn::make('name')->label('Nom')->sortable()->searchable(),
                TextColumn::make('description')->label('Description')->limit(50)->toggleable(),
                TextColumn::make('scorings_count')->label('Nombre de scorings')->counts('scorings')->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
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
            ScoringSectionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListScoringQuizzes::route('/'),
            'create' => CreateScoringQuiz::route('/create'),
            'edit' => EditScoringQuiz::route('/{record}/edit'),
        ];
    }
}
