<?php

namespace App\Filament\Resources\Curriculos\Pages;

use App\Filament\Resources\Curriculos\CurriculoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCurriculo extends CreateRecord
{
    protected static string $resource = CurriculoResource::class;

    // Injeta o user_id automaticamente antes de salvar
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }

    // Redireciona para edição após criar
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
//Resumo do fluxo completo
//Orientador seleciona UCs → Select::make() dispara ->live()
                         //→ afterStateUpdated atualiza estado
                         //→ Placeholder re-renderiza
                        //→ Query busca Cursos via curso_unidade_curricular
                        //→ Exibe cards com Nome, Carga Horária, Modalidade, Tipo de Ação e UCs
}

