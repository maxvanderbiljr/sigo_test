<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curriculo extends Model
{
    //fillable
    protected $fillable = [
        'user_id',
        'unidade_curricular_id',
        'foto_perfil', 
        'formacao',
        'area_formacao',
        'apresentacao',
        'qualificacao_profissional',
        'objetivo',
        'lattes',     
        'linkedin',
        'status',
    ];

    // ==========================================
    // RELACIONAMENTOS - belongsTo
    // ==========================================

    public function unidadeCurricular(): BelongsTo
    {
        return $this->belongsTo(UnidadeCurricular::class);
    }

}
