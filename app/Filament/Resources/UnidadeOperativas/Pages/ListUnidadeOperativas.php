<?php

namespace App\Filament\Resources\UnidadeOperativas\Pages;

use App\Filament\Resources\UnidadeOperativas\UnidadeOperativaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnidadeOperativas extends ListRecords
{
    protected static string $resource = UnidadeOperativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
