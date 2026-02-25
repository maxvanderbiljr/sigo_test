<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'carga_horaria',
        'segmento_id',
        'eixo_id',
        'modalidade_id',
        'tipo_acao_id',
        'descricao',
        'requisitos',
        'objetivo',
        'nivel',
        'status',
    ];

    public function segmento(): BelongsTo
    {
        return $this->belongsTo(Segmento::class);
    }

    public function eixo(): BelongsTo
    {
        return $this->belongsTo(Eixo::class);
    }

    public function modalidade(): BelongsTo
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function tipoAcao(): BelongsTo
    {
        return $this->belongsTo(TipoAcao::class);
    }

    // Curso possui várias Unidades Curriculares
    public function unidadesCurriculares(): BelongsToMany
    {
        return $this->belongsToMany(
            UnidadeCurricular::class,
            'curso_unidade_curricular'
        )->withTimestamps();
    }
}