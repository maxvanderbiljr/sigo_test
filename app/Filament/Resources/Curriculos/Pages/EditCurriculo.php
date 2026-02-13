<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCurriculo extends EditRecord
{
    protected static string $resource = CurriculoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
