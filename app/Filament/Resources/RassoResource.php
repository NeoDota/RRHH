<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RassoResource\Pages;
use App\Filament\Resources\RassoResource\RelationManagers;
use App\Models\Rasso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RassoResource extends Resource
{
    protected static ?string $model = Rasso::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?String $navigationLabel = 'Asso';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRassos::route('/'),
            'create' => Pages\CreateRasso::route('/create'),
            'edit' => Pages\EditRasso::route('/{record}/edit'),
        ];
    }
}
