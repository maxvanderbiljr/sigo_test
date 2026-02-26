<?php

namespace App\Filament\Resources\UnidadeCurriculars\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UnidadeCurricularInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('unidade_operativa_id')
                    ->numeric(),
                TextEntry::make('codigo'),
                TextEntry::make('nome'),
                TextEntry::make('descricao')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('carga_horaria')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('competencias')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('habilidades')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('atitudes_valores')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('recursos_necessarios')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('bibliografia')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->label('Status')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('Criado em:')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Atualizado em:')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
            ]);
    }
}
