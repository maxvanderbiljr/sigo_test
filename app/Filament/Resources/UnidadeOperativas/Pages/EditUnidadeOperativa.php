<?php

namespace App\Filament\Resources\UnidadeOperativas\Pages;

use App\Filament\Resources\UnidadeOperativas\UnidadeOperativaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUnidadeOperativa extends EditRecord
{
    protected static string $resource = UnidadeOperativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
