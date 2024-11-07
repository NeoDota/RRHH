<?php

namespace App\Filament\Resources\LlaResource\Pages;

use App\Filament\Resources\LlaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLla extends EditRecord
{
    protected static string $resource = LlaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
