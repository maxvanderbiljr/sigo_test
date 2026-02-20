<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Aqui estamos usando o SoftDeletes para permitir a exclusão lógica dos cursos, ou seja, eles não serão removidos fisicamente do banco de dados, mas sim marcados como excluídos.
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;
    //fillable para permitir a atribuição em massa dos campos
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
        'ativo',
    ];

    // ==========================================
    // RELACIONAMENTOS - belongsTo
    // ==========================================

    public function segmento()
    {
        return $this->belongsTo(Segmento::class);
    }

    public function eixo()
    {
        return $this->belongsTo(Eixo::class);
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function unidadeCurriculares()
    {
        return $this->belongsToMany(UnidadeCurricular::class, 'curso_unidade_curricular');
    }

    public function tipoAcao()
    {
        return $this->belongsTo(TipoAcao::class);
    }
}