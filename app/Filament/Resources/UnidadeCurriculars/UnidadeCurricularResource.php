<?php

namespace App\Filament\Resources\UnidadeCurriculars;

use App\Filament\Resources\UnidadeCurriculars\Pages\CreateUnidadeCurricular;
use App\Filament\Resources\UnidadeCurriculars\Pages\EditUnidadeCurricular;
use App\Filament\Resources\UnidadeCurriculars\Pages\ListUnidadeCurriculars;
use App\Filament\Resources\UnidadeCurriculars\Pages\ViewUnidadeCurricular;
use App\Filament\Resources\UnidadeCurriculars\Schemas\UnidadeCurricularForm;
use App\Filament\Resources\UnidadeCurriculars\Schemas\UnidadeCurricularInfolist;
use App\Filament\Resources\UnidadeCurriculars\Tables\UnidadeCurricularsTable;
use App\Models\UnidadeCurricular;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UnidadeCurricularResource extends Resource
{
    protected static ?string $model = UnidadeCurricular::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    // protected static ?string $recordTitleAttribute = 'nome';
    public static function getTitle(?UnidadeCurricular $record): ?string
    {
        return 'Unidade Curricular';
    }

     // Título breadcrumb personalizado para o recurso
     protected static ?string $breadcrumb = 'Unidade Curricular';


    // Título singular para o recurso
    protected static ?string $label = 'Unidade Curricular';

    // Título plural para o recurso, usado em listagens e navegação
    protected static ?string $pluralLabel = 'Unidades Curriculares';


    public static function form(Schema $schema): Schema
    {
        return UnidadeCurricularForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UnidadeCurricularInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnidadeCurricularsTable::configure($table);
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
            'index' => ListUnidadeCurriculars::route('/'),
            'create' => CreateUnidadeCurricular::route('/create'),
            'view' => ViewUnidadeCurricular::route('/{record}'),
            'edit' => EditUnidadeCurricular::route('/{record}/edit'),
        ];
    }
}
