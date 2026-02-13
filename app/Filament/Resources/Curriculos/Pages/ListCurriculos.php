<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCurriculos extends ListRecords
{
    protected static string $resource = CurriculoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
