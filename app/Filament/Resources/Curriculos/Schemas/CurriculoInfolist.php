<?php

namespace App\Filament\Resources\Curriculos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CurriculoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('apresentacao')
                    ->columnSpanFull(),
                TextEntry::make('objetivo')
                    ->columnSpanFull(),
                TextEntry::make('foto_perfil'),
                TextEntry::make('linkedin'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
