<?php

namespace App\Filament\Resources\UnidadeCurriculars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UnidadeCurricularForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required(),
                
                TextInput::make('nome')
                    ->required(),
                
                TextInput::make('carga_horaria')
                    ->numeric(),
                
                Select::make('unidade_operativa_id')
                    ->label('Unidade Operativa')   
                    ->relationship(name:'unidadeOperativa', titleAttribute:'nome')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                    TextInput::make('nome')
                        ->label('Nome da Unidade Operativa')
                        ->required(),
                ]),

                Textarea::make('descricao')
                    ->columnSpanFull(),
            
                Textarea::make('competencias')
                    ->columnSpanFull(),
                Textarea::make('habilidades')
                    ->columnSpanFull(),
                Textarea::make('atitudes_valores')
                    ->columnSpanFull(),
                Textarea::make('recursos_necessarios')
                    ->columnSpanFull(),
                Textarea::make('bibliografia')
                    ->columnSpanFull(),
                Toggle::make('ativo')
                    ->required(),
            ]);
    }
}
