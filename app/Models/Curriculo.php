<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curriculo extends Model
{
    protected $fillable = [
        'user_id',
        'foto_perfil',
        'formacao',
        'area_formacao',
        'lattes',
        'linkedin',
        'apresentacao',
        'qualificacao_profissional',
        'objetivo',
        'status',
    ];

    // Currículo pertence a um User (Orientador)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Currículo possui várias Unidades Curriculares
    public function unidadesCurriculares(): BelongsToMany
    {
        return $this->belongsToMany(
            UnidadeCurricular::class,
            'curriculo_unidade_curricular'
        )->withTimestamps();
    }

    // Accessor: retorna os cursos derivados das UCs deste currículo (sem repetição)
    public function getCursosVinculadosAttribute()
    {
        return Curso::whereHas('unidadesCurriculares', function ($query) {
            $query->whereIn(
                'unidade_curriculars.id',
                $this->unidadesCurriculares->pluck('id')
            );
        })->with(['unidadesCurriculares' => function ($query) {
            $query->whereIn(
                'unidade_curriculars.id',
                $this->unidadesCurriculares->pluck('id')
            );
        }])->get();
    }
}     