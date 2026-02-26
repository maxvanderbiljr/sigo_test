<?php

namespace App\Filament\Resources\UnidadeOperativas\Pages;

use App\Filament\Resources\UnidadeOperativas\UnidadeOperativaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewUnidadeOperativa extends ViewRecord
{
    protected static string $resource = UnidadeOperativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar Unidade Operativa')
                ->icon(Heroicon::OutlinedPencil)
                ->button(),
        ];
    }
}
