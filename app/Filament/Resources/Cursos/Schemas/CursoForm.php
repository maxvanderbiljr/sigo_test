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
                    ->label('Nome do Curso')
                    ->required()
                    ->columnSpanFull(),
                
                Textarea::make('descricao')
                    ->label('Descrição')
                    ->columnSpanFull(),
                
                TextInput::make('carga_horaria')
                    ->label('Carga Horária')        
                    ->numeric(),
                
                Select::make('unidadesCurriculares')
                    ->label('Unidades Curriculares')   
                    ->relationship('unidadesCurriculares', 'nome')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),
                
                Select::make('segmento_id') 
                    ->label('Segmento')
                    ->relationship(name:'segmento', titleAttribute:'nome')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                    TextInput::make('nome')
                        ->label('Nome do Segmento')
                        ->required(),
                ]),

                Select::make('eixo_id')
                    ->label('Eixo')     
                    ->relationship(name:'eixo', titleAttribute:'nome')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                    TextInput::make('nome')
                        ->label('Nome do Eixo')
                        ->required(),
                ]),

                Select::make('modalidade_id')
                    ->label('Modalidade')       
                    ->relationship(name:'modalidade', titleAttribute:'nome')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                    TextInput::make('nome')
                        ->label('Nome da Modalidade')
                        ->required(),
                ]),

                Select::make('tipo_acao_id')
                    ->label('Tipo de Ação')
                    ->relationship(name:'tipoAcao', titleAttribute:'nome')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                    TextInput::make('nome')
                        ->label('Nome do Tipo de Ação')
                        ->required(),
                ]),

                Select::make('nivel')
                    ->label('Nível')
                    ->options(['basico' => 'Básico', 'intermediario' => 'Intermediário', 'avancado' => 'Avançado'])
                    ->default('basico')
                    ->required(),
                
                Toggle::make('ativo')
                    ->label('Ativo')    
                    ->required(),
            ]);
    }
}
