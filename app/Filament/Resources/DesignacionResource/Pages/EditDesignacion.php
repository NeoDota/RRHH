<?php

namespace App\Filament\Resources\DesignacionResource\Pages;

use App\Filament\Resources\DesignacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesignacion extends EditRecord
{
    protected static string $resource = DesignacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
