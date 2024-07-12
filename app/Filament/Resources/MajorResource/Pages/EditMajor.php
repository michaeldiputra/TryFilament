<?php

namespace App\Filament\Resources\MajorResource\Pages;

use App\Filament\Resources\MajorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMajor extends EditRecord
{
    protected static string $resource = MajorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
