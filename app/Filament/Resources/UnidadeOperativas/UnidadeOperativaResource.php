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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    // Título singular para o recurso
    protected static ?string $label = 'Unidade Operativa';

    // Título plural para o recurso, usado em listagens e navegação
    protected static ?string $pluralLabel = 'Unidades Operativas';

    //breadcrumb personalizado para o recurso
    public static function getTitle(?UnidadeOperativa $record): ?string
    {
        return 'Unidade Operativa';
    }

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
