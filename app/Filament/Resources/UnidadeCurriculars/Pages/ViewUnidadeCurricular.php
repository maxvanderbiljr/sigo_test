<?php

namespace App\Filament\Resources\UnidadeCurriculars\Pages;

use App\Filament\Resources\UnidadeCurriculars\UnidadeCurricularResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewUnidadeCurricular extends ViewRecord
{
    protected static string $resource = UnidadeCurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar Unidade Curricular')
                ->icon(Heroicon::OutlinedPencil)
                ->button(),
        ];
    }
}
