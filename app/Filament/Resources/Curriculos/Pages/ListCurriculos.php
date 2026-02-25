<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;


class ListCurriculos extends ListRecords
{
    protected static string $resource = CurriculoResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        if (! $user || $user->curriculo) {
            return []; // Não mostra botão criar
        }

        return [
            CreateAction::make(),
        ];
    }
}