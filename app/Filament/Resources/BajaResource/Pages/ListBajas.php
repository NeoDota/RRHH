<?php

namespace App\Filament\Resources\BajaResource\Pages;

use App\Filament\Resources\BajaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBajas extends ListRecords
{
    protected static string $resource = BajaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
