<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('foto')
                //     ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                // TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('data_nascimento')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('cpf')
                //     ->searchable(),
                // TextColumn::make('estado_civil')
                //     ->badge(),
                // TextColumn::make('telefone')
                //     ->searchable(),
                // TextColumn::make('estado')
                //     ->searchable(),
                // TextColumn::make('cidade')
                //     ->searchable(),
                // TextColumn::make('cep')
                //     ->searchable(),
                TextColumn::make('perfis')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Administrador',
                        'coordenador' => 'Coordenador',
                        'orientador' => 'Orientador',
                        default => $state,
                    }),
                IconColumn::make('status')
                    ->label('Status')
                    ->boolean(),
                // IconColumn::make('primeiro_acesso')
                //     ->boolean(),
                // TextColumn::make('ultimo_acesso')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
