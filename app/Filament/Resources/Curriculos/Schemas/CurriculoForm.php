<?php

namespace App\Filament\Resources\Curriculos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CurriculoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('apresentacao')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('objetivo')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('foto_perfil')
                    ->required(),
                TextInput::make('linkedin')
                    ->required(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
