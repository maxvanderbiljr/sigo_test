<?php

namespace App\Filament\Resources\Curriculos;

use App\Filament\Resources\Curriculos\Pages\CreateCurriculo;
use App\Filament\Resources\Curriculos\Pages\EditCurriculo;
use App\Filament\Resources\Curriculos\Pages\ListCurriculos;
use App\Filament\Resources\Curriculos\Pages\ViewCurriculo;
use App\Filament\Resources\Curriculos\Schemas\CurriculoForm;
use App\Filament\Resources\Curriculos\Schemas\CurriculoInfolist;
use App\Filament\Resources\Curriculos\Tables\CurriculosTable;
use App\Models\Curriculo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CurriculoResource extends Resource
{
    protected static ?string $model = Curriculo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'apresentacao';

    public static function form(Schema $schema): Schema
    {
        return CurriculoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CurriculoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CurriculosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCurriculos::route('/'),
            'create' => CreateCurriculo::route('/create'),
            'view' => ViewCurriculo::route('/{record}'),
            'edit' => EditCurriculo::route('/{record}/edit'),
        ];
    }
}
