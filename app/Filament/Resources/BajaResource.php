<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BajaResource\Pages;
use App\Filament\Resources\BajaResource\RelationManagers;
use App\Models\Baja;
use App\Models\Personal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BajaResource extends Resource
{
    protected static ?string $model = Baja::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-minus';

    protected static ?String $navigationLabel = 'Baja';

    protected static ?String $navigationGroup = 'Memorandums';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                ->numeric()
                ->label('Número de Memorandum')
                ->required(),
                Forms\Components\TextInput::make('cite')
                ->maxLength(10)
                ->label('Cité')
                ->required(),
                Forms\Components\TextInput::make('cargo')
                ->label('Cargo')
                ->required(),
                Forms\Components\TextInput::make('lugar')
                ->label('Lugar')
                ->required(),
                Forms\Components\TextInput::make('red')
                ->label('Red')
                ->required(),
                Forms\Components\DatePicker::make('fecha_entrega')
                ->format('d/m/Y')
                ->label('Número de Memorandum')
                ->required(),
                Forms\Components\TextInput::make('observacion')
                ->label('Observación'),
                Forms\Components\TextInput::make('estado')
                ->label('Estado'),
                Forms\Components\ColorPicker::make('color')
                ->label('Color')
                ->default('#000000'),
                Forms\Components\Select::make('personals_id')
                ->relationship(
                    name: 'personal',
                    modifyQueryUsing: fn (Builder $query) => $query->orderBy('primer_nombre')->orderBy('apellido_paterno')
                )
                ->getOptionLabelFromRecordUsing(fn (Personal $record) => "{$record->primer_nombre} {$record->segundo_nombre} {$record->apellido_paterno} {$record->apellido_materno}")
                ->searchable(['primer_nombre', 'segundo_nombre', 'apellido_paterno', 'apellido_materno']),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero')
                ->sortable()
                ->alignCenter()
                ->weight(FontWeight::Bold)
                ->searchable()
                ->color('info'),
                TextColumn::make('personal.primer_nombre')
                ->sortable()
                ->searchable()
                ->weight(FontWeight::Bold)
                ->wrap()
                ->label('Nombre Completo')
                ->getStateUsing(fn (Model $record) => "{$record->personal->primer_nombre} {$record->personal->segundo_nombre} {$record->personal->apellido_paterno} {$record->personal->apellido_materno}"),
                TextColumn::make('cite')
                ->sortable()
                ->alignCenter()
                ->searchable(),
                TextColumn::make('cargo')
                ->sortable()
                ->alignCenter()
                ->wrap()
                ->weight(FontWeight::Bold)
                ->searchable(),
                TextColumn::make('personal.item')
                ->sortable()
                ->alignCenter()
                ->searchable()
                ->color('success')
                ->weight(FontWeight::Bold)
                ->label('Item'),
                TextColumn::make('lugar')
                ->sortable()
                ->alignCenter()
                ->wrap()
                ->searchable(),
                TextColumn::make('red')
                ->sortable()
                ->toggleable()
                ->alignCenter()
                ->searchable(),
                TextInputColumn::make('observacion')
                ->sortable()
                ->alignCenter()
                ->searchable(),
                TextColumn::make('fecha_entrega')
                ->sortable()
                ->alignCenter()
                ->searchable(),
                SelectColumn::make('estado')
                ->options([
                    'Pendiente' => 'Pendiente',
                    'Entregado' => 'Entregado',
                    'Notificado' => 'Notificado',
                ])
                ->sortable()
                ->alignCenter()
                ->searchable()
                ->default('Pendiente'),
                ColorColumn::make('color')
                ->sortable()
                ->alignCenter()
                ->searchable(),
                TextColumn::make('copia')
                ->sortable()
                ->alignCenter()
                ->toggleable()
                ->searchable(),
                TextColumn::make('habilitacion')
                ->sortable()
                ->alignCenter()
                ->toggleable()
                ->searchable(),
                TextColumn::make('file')
                ->sortable()
                ->alignCenter()
                ->toggleable()
                ->searchable(),
                TextColumn::make('direccion')
                ->sortable()
                ->alignCenter()
                ->toggleable()
                ->searchable(),
                TextColumn::make('bienes')
                ->sortable()
                ->alignCenter()
                ->toggleable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                /* Tables\Actions\ViewAction::make(), */
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('numero', 'desc');
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
            'index' => Pages\ListBajas::route('/'),
            'create' => Pages\CreateBaja::route('/create'),
            'edit' => Pages\EditBaja::route('/{record}/edit'),
        ];
    }
}
