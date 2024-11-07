<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LlaResource\Pages;
use App\Filament\Resources\LlaResource\RelationManagers;
use App\Models\Lla;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LlaResource extends Resource
{
    protected static ?string $model = Lla::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static ?String $navigationLabel = 'Llamada de Atención';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 5;

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
            'index' => Pages\ListLlas::route('/'),
            'create' => Pages\CreateLla::route('/create'),
            'edit' => Pages\EditLla::route('/{record}/edit'),
        ];
    }
}
