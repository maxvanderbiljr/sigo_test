<?php

namespace App\Filament\Resources\Curriculos\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class CurriculoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Nome Completo:'),

                TextEntry::make('user.email')
                    ->label('E-mail:'),

                TextEntry::make('telefone')
                    ->label('Telefone:'),

                TextEntry::make('apresentacao') 
                    ->label('Apresentação:')
                    ->columnSpanFull(),

                TextEntry::make('formacao')
                    ->label('Formação:')
                    ->columnSpanFull(),

                TextEntry::make('area_formacao')
                    ->label('Área de Formação:')
                    ->columnSpanFull(),

                TextEntry::make('objetivo')
                    ->label('Objetivo:')
                    ->columnSpanFull(),

                ImageEntry::make('foto_perfil')
                   ->label('Foto de Perfil:')
                   ->disk('public')
                   ->circular()
                    ->columnSpanFull(),

                TextEntry::make('lattes')
                    ->label('Lattes:'),

                TextEntry::make('linkedin')
                    ->label('LinkedIn:'),

                TextEntry::make('created_at')
                    ->label('Criado em:')
                    ->formatStateUsing(fn ($state) => $state ? $state->locale('pt_BR')->translatedFormat('d/m/Y H:i') : '-')
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Atualizado em:')
                    ->formatStateUsing(fn ($state) => $state ? $state->locale('pt_BR')->translatedFormat('d/m/Y H:i') : '-')
                    ->placeholder('-'),
            ]);
    }
}
