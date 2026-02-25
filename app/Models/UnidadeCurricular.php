<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeCurricular extends Model
{
    protected $table = 'unidade_curriculars';

    protected $fillable = [
        'unidade_operativa_id',
        'codigo',
        'nome',
        'descricao',
        'carga_horaria',
        'competencias',
        'habilidades',
        'atitudes_valores',
        'recursos_necessarios',
        'bibliografia',
        'status',
    ];

    // UC pertence a uma Unidade Operativa
    public function unidadeOperativa(): BelongsTo
    {
        return $this->belongsTo(UnidadeOperativa::class);
    }

    // UC pertence a vários Cursos
    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(
            Curso::class,
            'curso_unidade_curricular'
        )->withTimestamps();
    }

    // UC pertence a vários Currículos
    public function curriculos(): BelongsToMany
    {
        return $this->belongsToMany(
            Curriculo::class,
            'curriculo_unidade_curricular'
        )->withTimestamps();
    }
}