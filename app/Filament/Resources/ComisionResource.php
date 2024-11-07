<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComisionResource\Pages;
use App\Filament\Resources\ComisionResource\RelationManagers;
use App\Models\Comision;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComisionResource extends Resource
{
    protected static ?string $model = Comision::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?String $navigationLabel = 'Comisión';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 4;

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
            'index' => Pages\ListComisions::route('/'),
            'create' => Pages\CreateComision::route('/create'),
            'edit' => Pages\EditComision::route('/{record}/edit'),
        ];
    }
}
