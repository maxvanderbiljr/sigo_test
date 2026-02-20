<?php

namespace App\Filament\Resources\UnidadeOperativas;

use App\Filament\Resources\UnidadeOperativas\Pages\CreateUnidadeOperativa;
use App\Filament\Resources\UnidadeOperativas\Pages\EditUnidadeOperativa;
use App\Filament\Resources\UnidadeOperativas\Pages\ListUnidadeOperativas;
use App\Filament\Resources\UnidadeOperativas\Pages\ViewUnidadeOperativa;
use App\Filament\Resources\UnidadeOperativas\Schemas\UnidadeOperativaForm;
use App\Filament\Resources\UnidadeOperativas\Schemas\UnidadeOperativaInfolist;
use App\Filament\Resources\UnidadeOperativas\Tables\UnidadeOperativasTable;
use App\Models\UnidadeOperativa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UnidadeOperativaResource extends Resource
{
    protected static ?string $model = UnidadeOperativa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return UnidadeOperativaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UnidadeOperativaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnidadeOperativasTable::configure($table);
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
            'index' => ListUnidadeOperativas::route('/'),
            'create' => CreateUnidadeOperativa::route('/create'),
            'view' => ViewUnidadeOperativa::route('/{record}'),
            'edit' => EditUnidadeOperativa::route('/{record}/edit'),
        ];
    }
}
