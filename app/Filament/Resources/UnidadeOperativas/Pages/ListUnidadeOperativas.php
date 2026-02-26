<?php

namespace App\Filament\Resources\UnidadeOperativas\Pages;

use App\Filament\Resources\UnidadeOperativas\UnidadeOperativaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListUnidadeOperativas extends ListRecords
{
    protected static string $resource = UnidadeOperativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Criar Unidade Operativa')
                ->icon(Heroicon::OutlinedPlus)
                ->color('success')
                ->button(),
        ];
    }
}
