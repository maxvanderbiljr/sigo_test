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
use Illuminate\Database\Eloquent\Model;

class CurriculoResource extends Resource
{
    protected static ?string $model = Curriculo::class;

    //Icone para o recurso, usando um ícone do Heroicons
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    //Título singular e plural para o recurso
    protected static ?string $label = 'Currículo';

    //Título plural para o recurso, usado em listagens e navegação
    protected static ?string $pluralLabel = 'Currículos';

    // Atributo usado para representar o título de um registro, aqui usamos o nome do usuário relacionado
    protected static ?string $recordTitleAttribute = null;

    // Breadcrumb personalizado para o recurso
    protected static ?string $breadcrumb = 'Currículo';

    public static function getRecordTitle(?Model $record): ?string
    {
        if (! $record) {
            return null;
        }

        return $record->user?->name
            ? "Currículo de {$record->user->name}"
            : "Currículo #{$record->id}";
    }

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
