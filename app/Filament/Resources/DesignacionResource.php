<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignacionResource\Pages;
use App\Filament\Resources\DesignacionResource\RelationManagers;
use App\Models\Designacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesignacionResource extends Resource
{
    protected static ?string $model = Designacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?String $navigationLabel = 'Designación';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 2;

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
            'index' => Pages\ListDesignacions::route('/'),
            'create' => Pages\CreateDesignacion::route('/create'),
            'edit' => Pages\EditDesignacion::route('/{record}/edit'),
        ];
    }
}
