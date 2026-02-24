<?php

namespace App\Filament\Resources\Curriculos\Schemas;

use App\Models\Curriculo;
use App\Models\UnidadeCurricular;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;


// use Laravel\Pail\File;

class CurriculoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Dados Pessoais')
                ->schema([

                FileUpload::make('foto_perfil')
                    ->required(),
            
                     Textarea::make('apresentacao')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('objetivo')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('qualificacao_profissional')
                    ->required()
                    ->columnSpanFull(),
       
                TextInput::make('status')
                    ->required(),
            ]),
                
        Section::make('Formação Acadêmica')
            ->schema([
               Select::make('formacao')
                ->label('Formação Acadêmica')
                ->placeholder('Selecione sua formação acadêmica')
                ->options([
                    'Ensino Médio Completo'      => 'Ensino Médio Completo',
                    'Ensino Superior Incompleto' => 'Ensino Superior Incompleto',
                    'Ensino Superior Completo'   => 'Ensino Superior Completo',
                    'Pós-Graduação Incompleta'   => 'Pós-Graduação Incompleta',
                    'Pós-Graduação Completa'     => 'Pós-Graduação Completa',
                    'Mestrado Incompleto'        => 'Mestrado Incompleto',
                    'Mestrado Completo'          => 'Mestrado Completo',
                    'Doutorado Incompleto'       => 'Doutorado Incompleto',
                    'Doutorado Completo'         => 'Doutorado Completo',
                ])
                ->live()
                ->afterStateUpdated(fn (Set $set) => $set('area_formacao', null)), // Limpa ao trocar

            TextInput::make('area_formacao')
                ->label('Área de Formação')
                ->placeholder('Ex: Mestrado em Administração, Pós em Marketing...')
                ->hidden(fn (Get $get): bool => blank($get('formacao')))
                ->required(fn (Get $get): bool => filled($get('formacao'))),

                TextInput::make('linkedin')
                     ->prefix('https://'),

                TextInput::make('lattes')
                    ->prefix('https://'),
                
                Select::make('unidade_curricular_id')
                    ->relationship('unidadeCurricular', 'nome')
                    ->label('Discplinas e Habilidades')
                    ->preload()
                    ->required(),

            ]),
        ]);
    }
}
