<?php

namespace App\Filament\Resources\UnidadeCurriculars\Pages;

use App\Filament\Resources\UnidadeCurriculars\UnidadeCurricularResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUnidadeCurricular extends EditRecord
{
    protected static string $resource = UnidadeCurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
