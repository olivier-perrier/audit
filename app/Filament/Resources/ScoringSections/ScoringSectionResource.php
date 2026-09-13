<?php

namespace App\Filament\Resources\ScoringSections;

use App\Filament\Resources\ScoringSections\Pages\CreateScoringSection;
use App\Filament\Resources\ScoringSections\Pages\EditScoringSection;
use App\Filament\Resources\ScoringSections\Pages\ListScoringSections;
use App\Filament\Resources\ScoringSections\RelationManagers\ScoringQuestionsRelationManager;
use App\Models\ScoringSection;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ScoringSectionResource extends Resource
{
    protected static ?string $model = ScoringSection::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('title')->label('Titre de la section'),
                ])->columnSpan(3),
                // FileUpload::make('icon')->label("Icon")->image()->columnSpan(1),
                // Section::make()->schema([
                // FileUpload::make('icon')->label("Icon")->image()
                // ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ScoringQuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListScoringSections::route('/'),
            'create' => CreateScoringSection::route('/create'),
            'edit' => EditScoringSection::route('/{record}/edit'),
        ];
    }
}
