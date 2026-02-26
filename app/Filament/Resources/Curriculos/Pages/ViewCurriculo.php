<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCurriculo extends ViewRecord
{
    protected static string $resource = CurriculoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
