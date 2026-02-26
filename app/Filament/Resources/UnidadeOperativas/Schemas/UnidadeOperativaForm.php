<?php

namespace App\Filament\Resources\UnidadeOperativas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UnidadeOperativaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                TextInput::make('sigla')
                    ->required(),
                TextInput::make('cnpj')
                    ->required(),
                TextInput::make('endereco')
                    ->required(),
                TextInput::make('cidade')
                    ->required(),
                TextInput::make('estado')
                    ->required(),
                TextInput::make('cep')
                    ->required(),
                TextInput::make('telefone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('responsavel')
                    ->required(),
                Toggle::make('status')
                    ->label('Status')
                    ->required(),
            ]);
    }
}
