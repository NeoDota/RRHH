<?php

namespace App\Filament\Resources\LlaResource\Pages;

use App\Filament\Resources\LlaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLlas extends ListRecords
{
    protected static string $resource = LlaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
