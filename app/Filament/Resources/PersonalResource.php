<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalResource\Pages;
use App\Filament\Resources\PersonalResource\RelationManagers;
use App\Models\Personal;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonalResource extends Resource
{
    protected static ?string $model = Personal::class;

    protected static ?String $navigationLabel = 'Personal';

    protected static ?String $navigationGroup = 'Datos Personales';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /* Datos Personales */
                Fieldset::make('Datos Personales')
                ->schema([
                    // ...
                    Forms\Components\TextInput::make('primer_nombre')
                    ->label('Primer Nombre')
                    ->rule('regex:/^[a-zA-Z\s]+$/')
                    ->required(),
                    Forms\Components\TextInput::make('segundo_nombre')
                    ->label('Segundo Nombre')
                    ->rule('regex:/^[a-zA-Z\s]+$/'),
                    Forms\Components\TextInput::make('apellido_paterno')
                    ->label('Apellido Paterno')
                    ->rule('regex:/^[a-zA-Z\s]+$/'),
                    Forms\Components\TextInput::make('apellido_materno')
                    ->label('Apellido Materno')
                    ->rule('regex:/^[a-zA-Z\s]+$/'),
                    Forms\Components\TextInput::make('ci')
                    ->Label('Carnet de Identidad (C.I.)')
                    ->numeric()
                    ->minLength(6)
                    ->maxLength(11)
                    ->required(),
                    Forms\Components\Select::make('complemento')
                    ->searchable()
                    ->required()
                    ->preload()/* PRELOAD */
                    ->options([
                        'De Bolivia' => [
                            'LP' => 'LP',
                            'CB' => 'CB',
                            'SC' => 'SC',
                            'OR' => 'OR',
                            'PT' => 'PT',
                            'TJ' => 'TJ',
                            'BN' => 'BN',
                            'PD' => 'PD',
                            'QR'=> 'QR',
                        ],
                        'Extranjero' => [
                            'AR' => 'Argentina',
                            'BR' => 'Brasil',
                            'CL' => 'Chile',
                            'CO' => 'Colombia',
                            'EC' => 'Ecuador',
                            'PE' => 'Perú',
                            'UY' => 'Uruguay',
                            'VE' => 'Venezuela',
                        ],
                    ])
                    ->default('LP'),
                    Forms\Components\TextInput::make('telefono')
                    ->numeric()
                    ->label('Télefono o Celular')
                    ->suffixIcon('heroicon-m-phone'),
                ])->columns(4),
                /* Datos Profesionales */
                Fieldset::make('Datos Profesionales')
                ->schema([
                    // ...
                    Forms\Components\TextInput::make('cargo')
                    ->required()
                    ->label('Cargo')
                    ->rule('regex:/^[a-zA-Z0-9\s\.]+$/'),
                    Forms\Components\TextInput::make('item')
                    ->numeric()
                    ->label('Item')
                    ->minLength(3)
                    ->maxLength(6),
                    Forms\Components\TextInput::make('establecimiento')
                    ->required()
                    ->label('Establecimiento')
                    ->rule('regex:/^[a-zA-Z0-9\s\.\-]+$/'),
                    Forms\Components\TextInput::make('red')
                    ->required()
                    ->label('Red')
                    ->rule('regex:/^[a-zA-Z0-9\s\.\-]+$/'),
                ])->columns(4),
                /* Datos de Especialidad */
                Fieldset::make('Datos de Especialidad')
                ->schema([
                    Forms\Components\TextInput::make('especialidad')
                    ->label('Especialidad')
                    ->rule('regex:/^[a-zA-Z0-9\s\.\-]+$/'),
                    Forms\Components\DatePicker::make('fecha_inicio')
                    ->label('Fecha de Inicio'),
                    Forms\Components\DatePicker::make('fecha_fin')
                    ->label('Fecha de Fin'),
                ])
                ->columns(3),
                /* Datos de Transferencia */
                Fieldset::make('Datos de Transferencia')
                ->schema([
                    Forms\Components\TextInput::make('cargo_anterior')
                    ->label('Cargo Anterior')
                    ->rule('regex:/^[a-zA-Z0-9\s\.]+$/'),
                    Forms\Components\TextInput::make('item_anterior')
                    ->numeric()
                    ->label('Item Anterior')
                    ->minLength(3)
                    ->maxLength(6),
                    Forms\Components\TextInput::make('establecimiento_anterior')
                    ->label('Establecimiento Anterior')
                    ->rule('regex:/^[a-zA-Z0-9\s\.\-]+$/'),
                    Forms\Components\TextInput::make('red_anterior')
                    ->label('Red Anterior')
                    ->rule('regex:/^[a-zA-Z0-9\s\.\-]+$/'),
                ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->selectable()
            ->columns([
                TextColumn::make('primer_nombre')
                ->sortable()
                ->searchable()
                ->weight(FontWeight::Bold)
                ->wrap()
                ->label('Nombre Completo')
                ->getStateUsing(fn (Model $record) => "{$record->primer_nombre} {$record->segundo_nombre} {$record->apellido_paterno} {$record->apellido_materno}"),
                TextColumn::make('ci')
                ->sortable()
                ->formatStateUsing(function ($record) {
                    return "{$record->ci} {$record->complemento}.";
                })
                ->searchable()
                ->label('CI'),
                /* TextColumn::make('ci')
                ->sortable()
                ->searchable()
                ->label('CI'),
                TextColumn::make('complemento')
                ->sortable()
                ->searchable()
                ->alignCenter(), */
                TextColumn::make('cargo')
                ->sortable()
                ->searchable()
                ->alignCenter()
                ->color('success'),
                TextColumn::make('item')
                ->sortable()
                ->searchable()
                ->alignCenter()
                ->color('success'),
                TextColumn::make('establecimiento')
                ->sortable()
                ->searchable()
                ->alignCenter()
                ->color('success'),
                TextColumn::make('red')
                ->sortable()
                ->searchable()
                ->alignCenter()
                ->color('success'),
                TextColumn::make('telefono')
                ->sortable()
                ->searchable()
                ->alignEnd()
                ->icon('heroicon-m-phone')
                ->iconColor('info')
                ->copyable()
                ->copyMessage('Número Copiado!')
                ->copyMessageDuration(1500),
            ])
            /* ->defaultSort('stock', 'desc') */
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Ver'),
                Tables\Actions\DeleteAction::make()
                ->label('Borrar'),
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
            'index' => Pages\ListPersonals::route('/'),
            'create' => Pages\CreatePersonal::route('/create'),
            'edit' => Pages\EditPersonal::route('/{record}/edit'),
        ];
    }
}
