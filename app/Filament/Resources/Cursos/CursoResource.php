<?php

namespace App\Filament\Resources\Cursos;

use App\Filament\Resources\Cursos\Pages\CreateCurso;
use App\Filament\Resources\Cursos\Pages\EditCurso;
use App\Filament\Resources\Cursos\Pages\ListCursos;
use App\Filament\Resources\Cursos\Pages\ViewCurso;
use App\Filament\Resources\Cursos\Schemas\CursoForm;
use App\Filament\Resources\Cursos\Schemas\CursoInfolist;
use App\Filament\Resources\Cursos\Tables\CursosTable;
use App\Models\Curso;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CursoResource extends Resource
{
    protected static ?string $model = Curso::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;
    
    // Título singular para o recurso
    protected static ?string $label = 'Curso';
    
    // Título plural para o recurso, usado em listagens e navegação
    protected static ?string $pluralLabel = 'Cursos';

    //Título breadcrumb personalizado para o recurso
    protected static ?string $breadcrumb = 'Curso';

    // Atributo usado como título do registro
    // protected static ?string $recordTitleAttribute = 'nome';
    public static function getTitle(?Curso $record): ?string
        {
            return 'Curso';
        }

    public static function form(Schema $schema): Schema
    {
        return CursoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CursoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CursosTable::configure($table);
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
            'index' => ListCursos::route('/'),
            'create' => CreateCurso::route('/create'),
            'view' => ViewCurso::route('/{record}'),
            'edit' => EditCurso::route('/{record}/edit'),
        ];
    }
}
