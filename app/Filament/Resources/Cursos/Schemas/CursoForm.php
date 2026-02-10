<?php

namespace App\Filament\Resources\Cursos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CursoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                Textarea::make('descricao')
                    ->columnSpanFull(),
                TextInput::make('carga_horaria')
                    ->numeric(),
                TextInput::make('preco')
                    ->numeric(),
                Select::make('nivel')
                    ->options(['basico' => 'Basico', 'intermediario' => 'Intermediario', 'avancado' => 'Avancado'])
                    ->default('basico')
                    ->required(),
                Toggle::make('ativo')
                    ->required(),
            ]);
    }
}
