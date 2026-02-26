<?php

namespace App\Filament\Resources\UnidadeOperativas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UnidadeOperativaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            Section::make('Informações da Unidade Operativa')
            ->schema([

                TextEntry::make('nome')
                    ->label('Nome da Unidade Operativa:'),
                
                TextEntry::make('sigla')
                    ->label('Sigla'),
                
                TextEntry::make('cnpj')
                    ->label('CNPJ'),
                
                TextEntry::make('telefone')
                    ->label('Telefone'),

                TextEntry::make('email')
                    ->label('E-mail'),
                
                TextEntry::make('responsavel')
                    ->label('Responsável'),
                
                TextEntry::make('endereco')
                    ->label('Endereço'),
            ]),
            
            Section::make('Relações')
            ->schema([

                TextEntry::make('cidade')
                    ->label('Cidade'),
                
                TextEntry::make('estado')
                    ->label('Estado'),
                
                TextEntry::make('cep')
                    ->label('CEP'),
                
                IconEntry::make('status')                  
                    ->label('Status')
                    ->boolean(),
                
                TextEntry::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
                
                TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
    
            ]),
            ]);
    }
}
