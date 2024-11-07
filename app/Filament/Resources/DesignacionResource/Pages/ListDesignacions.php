<?php

namespace App\Filament\Resources\DesignacionResource\Pages;

use App\Filament\Resources\DesignacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesignacions extends ListRecords
{
    protected static string $resource = DesignacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
