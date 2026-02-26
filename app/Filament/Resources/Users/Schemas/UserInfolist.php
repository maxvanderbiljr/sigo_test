<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nome'),
                TextEntry::make('email')
                    ->label('E-mail'),
                TextEntry::make('perfis')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Administrador',
                        'coordenador' => 'Coordenador',
                        'orientador' => 'Orientador',
                        default => $state,
                    }),
                IconEntry::make('status')
                    ->label('Status')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->label('Excluído em')
                    ->dateTime()
                    ->placeholder('-')
                    ->visible(fn (User $record): bool => $record->trashed()),
            ]);
    }
}
