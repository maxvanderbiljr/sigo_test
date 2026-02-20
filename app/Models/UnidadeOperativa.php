<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeOperativa extends Model
{
    //fillable
    protected $fillable = [
        'nome',
        'sigla',
        'cnpj',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'email',
        'responsavel',
        'ativo',
    ];

    // ==========================================
    // RELACIONAMENTOS - hasMany
    // ==========================================

    public function unidadesCurriculares()
    {
        return $this->hasMany(UnidadeCurricular::class);
    }

    
}
