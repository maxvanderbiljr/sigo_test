<?php

namespace App\Filament\Resources\Curriculos\Schemas;

use App\Models\Curso;
use Filament\Forms\Components\FileUpload;
//TextEntry é o componente recomendado para exibir conteúdo HTML customizado, como os cards dos cursos vinculados
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class CurriculoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ──────────────────────────────────────────────────────────────
                // SEÇÃO 1 — Dados Pessoais
                // ──────────────────────────────────────────────────────────────
                Section::make('Dados Pessoais')
                    ->schema([

                        FileUpload::make('foto_perfil')
                            ->label('Foto de Perfil')
                            ->image()
                            ->directory('curriculos/fotos')
                            ->disk('public')
                            ->required(),
                        
                        TextInput::make('telefone')
                            ->label('Telefone')
                            ->mask('(00) 00000-0000')
                            ->required(),

                        Textarea::make('apresentacao')
                            ->label('Apresentação')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('objetivo')
                            ->label('Objetivo')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('qualificacao_profissional')
                            ->label('Qualificação Profissional')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                // ──────────────────────────────────────────────────────────────
                // SEÇÃO 2 — Formação Acadêmica
                // ──────────────────────────────────────────────────────────────
                Section::make('Formação Acadêmica')
                    ->schema([

                        Select::make('formacao')
                            ->label('Formação Acadêmica')
                            ->placeholder('Selecione sua formação acadêmica')
                            ->options([
                                'Ensino Médio Completo'      => 'Ensino Médio Completo',
                                'Ensino Superior Incompleto' => 'Ensino Superior Incompleto',
                                'Ensino Superior Completo'   => 'Ensino Superior Completo',
                                'Pós-Graduação Incompleta'   => 'Pós-Graduação Incompleta',
                                'Pós-Graduação Completa'     => 'Pós-Graduação Completa',
                                'Mestrado Incompleto'        => 'Mestrado Incompleto',
                                'Mestrado Completo'          => 'Mestrado Completo',
                                'Doutorado Incompleto'       => 'Doutorado Incompleto',
                                'Doutorado Completo'         => 'Doutorado Completo',
                            ])
                            ->live()
                            ->afterStateUpdated(fn(Set $set) => $set('area_formacao', null)),

                        TextInput::make('area_formacao')
                            ->label('Área de Formação')
                            ->placeholder('Ex: Mestrado em Administração, Pós em Marketing...')
                            ->hidden(fn(Get $get): bool => blank($get('formacao')))
                            ->required(fn(Get $get): bool => filled($get('formacao'))),

                        TextInput::make('linkedin')
                            ->label('LinkedIn')
                            ->prefix('https://'),

                        TextInput::make('lattes')
                            ->label('Lattes')
                            ->prefix('https://'),
                    ]),

                // ──────────────────────────────────────────────────────────────
                // SEÇÃO 3 — Competências Docentes
                // ──────────────────────────────────────────────────────────────
                Section::make('Competências Docentes')
                    ->description('Selecione todas as Unidades Curriculares que você está apto a lecionar. Os cursos vinculados serão exibidos automaticamente.')
                    ->schema([

                        // ── Select múltiplo ───────────────────────────────────
                        // Usa a relação BelongsToMany 'unidadesCurriculares' do Model Curriculo
                        // O Filament gerencia automaticamente a pivot curriculo_unidade_curricular
                        Select::make('unidadesCurriculares')
                            ->label('Disciplinas e Habilidades (Unidades Curriculares)')
                            ->relationship(
                                name: 'unidadesCurriculares',
                                titleAttribute: 'nome',
                            )
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->live()                            // Renderiza o schema ao mudar
                            ->afterStateUpdated(
                                // Força o Placeholder a re-avaliar seu conteúdo
                                fn(Set $set, Get $get) =>
                                    $set('_uc_trigger', implode(',', (array) $get('unidadesCurriculares')))
                            )
                            ->helperText('Busque pelo nome da UC. Você pode selecionar quantas quiser.')
                            ->columnSpanFull(),

                        // ── Placeholder reativo: exibe os cursos vinculados ───
                        // Atualiza automaticamente sempre que o Select acima muda
                        TextEntry::make('cursos_vinculados')
                            ->label('Cursos que você estará apto a lecionar')
                            ->state(function (Get $get): HtmlString {

                                $ucIds = $get('unidadesCurriculares');

                                // Estado vazio
                                if (empty($ucIds)) {
                                    return new HtmlString('
                                        <div class="flex items-center gap-2 text-sm italic text-gray-400
                                                    p-3 rounded-lg border border-dashed border-gray-200 bg-gray-50">
                                            🎓 Selecione as Unidades Curriculares acima para visualizar
                                               os cursos vinculados automaticamente.
                                        </div>
                                    ');
                                }

                                // Busca Cursos que possuem pelo menos uma das UCs selecionadas
                                // via pivot curso_unidade_curricular (já existente no seu projeto)
                                // Eager load com filtro: traz só as UCs que o orientador marcou
                                $cursos = Curso::whereHas(
                                    'unidadesCurriculares',
                                    fn($q) => $q->whereIn('unidade_curriculars.id', $ucIds)
                                )
                                ->with([
                                    'unidadesCurriculares' => fn($q) =>
                                        $q->whereIn('unidade_curriculars.id', $ucIds),
                                    'modalidade',
                                    'tipoAcao',
                                ])
                                ->where('status', 1)
                                ->get();

                                // Nenhum curso encontrado
                                if ($cursos->isEmpty()) {
                                    return new HtmlString('
                                        <div class="text-sm p-3 bg-amber-50 rounded-lg border border-amber-200 text-amber-700">
                                            Nenhum curso encontrado vinculado às UCs selecionadas.
                                               Verifique se os cursos estão ativos e associados às UCs.
                                        </div>
                                    ');
                                }

                                // Renderiza os cards de cada curso
                                $html = '<div class="space-y-2 mt-1">';

                                foreach ($cursos as $curso) {
                                    // Escapa os valores para evitar XSS
                                    $nomeCurso  = e($curso->nome);
                                    $chCurso    = e($curso->carga_horaria);
                                    $modalidade = e($curso->modalidade?->nome ?? '—');
                                    $tipoAcao   = e($curso->tipoAcao?->nome   ?? '—');

                                    // Apenas as UCs deste curso que o orientador selecionou
                                    $ucsDoOrientador = $curso->unidadesCurriculares
                                        ->map(fn($uc) => e($uc->nome))
                                        ->join(' · ');

                                    $html .= "
                                        <div class='p-3 bg-white rounded-lg border border-gray-200 shadow-sm
                                                    hover:border-primary-300 transition-colors duration-150'>
                                            <div class='flex items-start justify-between gap-2'>
                                                <p class='font-semibold text-gray-800 text-sm leading-tight'>
                                                    {$nomeCurso}
                                                </p>
                                                <span class='shrink-0 text-xs font-bold text-white
                                                             bg-primary-600 px-2 py-0.5 rounded-full'>
                                                    {$chCurso}h
                                                </span>
                                            </div>
                                            <div class='flex flex-wrap gap-3 mt-1.5'>
                                                <span class='text-xs text-gray-500'> {$modalidade}</span>
                                                <span class='text-xs text-gray-500'> {$tipoAcao}</span>
                                            </div>
                                            <p class='text-xs mt-1.5'>
                                                <span class='font-semibold text-primary-700'>UCs: </span>
                                                <span class='text-gray-600'>{$ucsDoOrientador}</span>
                                            </p>
                                        </div>
                                    ";
                                }

                                $html .= '</div>';

                                return new HtmlString($html);
                            })
                            ->columnSpanFull(),

                    ]),

            ]);
    }
}