<?php

namespace App\Filament\Resources\RassoResource\Pages;

use App\Filament\Resources\RassoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRassos extends ListRecords
{
    protected static string $resource = RassoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
