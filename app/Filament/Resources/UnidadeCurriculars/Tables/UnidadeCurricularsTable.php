<?php

namespace App\Filament\Resources\UnidadeCurriculars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UnidadeCurricularsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('codigo')
                    ->searchable(),
                
                TextColumn::make('nome')
                    ->searchable(),
                
                TextColumn::make('carga_horaria')
                    ->label('Carga Horária')
                    ->icon(Heroicon::OutlinedClock)
                    ->iconPosition(IconPosition::After) //   
                    ->numeric()
                    ->sortable(),
                
                IconColumn::make('status')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Criado em:')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                    TextColumn::make('updated_at')
                    ->label('Atualizado em:')
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
