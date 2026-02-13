<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeCurricular extends Model
{
    //fillable
    protected $fillable = [
        'codigo',
        'unidade_operativa',
        'nome',
        'descricao',        
        'carga_horaria',
        'competencias',
        'habilidades',
        'atitudes_valores',
        'recursos_necessarios',
        'bibliografia', 
        'ativo',
    ];

}
