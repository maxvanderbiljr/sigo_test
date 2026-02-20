<?php

namespace App\Filament\Resources\UnidadeCurriculars\Pages;

use App\Filament\Resources\UnidadeCurriculars\UnidadeCurricularResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnidadeCurriculars extends ListRecords
{
    protected static string $resource = UnidadeCurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
