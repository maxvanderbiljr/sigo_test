<?php

namespace App\Filament\Resources\UnidadeOperativas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UnidadeOperativaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome'),
                TextEntry::make('sigla'),
                TextEntry::make('cnpj'),
                TextEntry::make('endereco'),
                TextEntry::make('cidade'),
                TextEntry::make('estado'),
                TextEntry::make('cep'),
                TextEntry::make('telefone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('responsavel'),
                IconEntry::make('ativo')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
