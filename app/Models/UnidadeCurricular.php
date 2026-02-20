<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeCurricular extends Model
{
    //fillable
    protected $fillable = [
        'unidade_operativa_id',
        'nome',
        'codigo',
        'carga_horaria',
        'descricao',        
        'competencias',
        'habilidades',
        'atitudes_valores',
        'recursos_necessarios',
        'bibliografia', 
        'ativo',
    ];

    // ==========================================
    // RELACIONAMENTOS - belongsTo
    // ==========================================   

    public function unidadeOperativa()
    {
        return $this->belongsTo(UnidadeOperativa::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_unidade_curricular');
    }
    

}
