<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransferenciaResource\Pages;
use App\Filament\Resources\TransferenciaResource\RelationManagers;
use App\Models\Transferencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransferenciaResource extends Resource
{
    protected static ?string $model = Transferencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?String $navigationLabel = 'Transferencia';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 7;

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
            'index' => Pages\ListTransferencias::route('/'),
            'create' => Pages\CreateTransferencia::route('/create'),
            'edit' => Pages\EditTransferencia::route('/{record}/edit'),
        ];
    }
}
