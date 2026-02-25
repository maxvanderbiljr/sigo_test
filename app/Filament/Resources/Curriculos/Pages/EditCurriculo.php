<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCurriculo extends EditRecord
{
    protected static string $resource = CurriculoResource::class;

    // Redireciona para a listagem após salvar ou excluir
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // public function getBreadcrumbs(): array
    // {
    //     return [
    //         CurriculoResource::getUrl('index') => CurriculoResource::getBreadcrumb(),
    //         $this->getBreadcrumb(),
    //     ];
    // }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
