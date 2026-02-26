<?php

namespace App\Filament\Resources\Cursos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CursoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
        
            Section::make('Informações do Curso')
            ->schema([
                
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

                TextEntry::make('unidadesCurriculares.nome')
                    ->label('Unidades Curriculares'),
            ]),

            Section::make('Relações')
            ->schema([  
                
                TextEntry::make('Segmento.nome') 
                    ->label('Segmento'),

                TextEntry::make('Eixo.nome')
                    ->label('Eixo'),

                TextEntry::make('Modalidade.nome')
                    ->label('Modalidade'),

                TextEntry::make('tipoAcao.nome')
                    ->label('Tipo de Ação'),

                IconEntry::make('status')
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
            ]),
        ]);
    }
}
