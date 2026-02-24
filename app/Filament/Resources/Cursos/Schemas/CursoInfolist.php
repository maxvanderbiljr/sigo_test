<?php

namespace App\Filament\Resources\Cursos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CursoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome')
                ->label('Nome do Curso:'),
                
                TextEntry::make('descricao')
                    ->label('Descrição')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('carga_horaria')
                    ->label('Carga Horária:')    
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('nivel')
                    ->label('Nível:')
                    ->badge(),
                IconEntry::make('ativo')
                    ->label('Status:')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('Criado em:')
                    ->formatStateUsing(fn ($state) => $state ? $state->locale('pt_BR')->translatedFormat('d/m/Y H:i') : '-')
                    ->placeholder('-'), 
                TextEntry::make('updated_at')
                    ->label('Atualizado em:')
                    ->formatStateUsing(fn ($state) => $state ? $state->locale('pt_BR')->translatedFormat('d/m/Y H:i') : '-')
                    ->placeholder('-'),
            ]);
    }
}
