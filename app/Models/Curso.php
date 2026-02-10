<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //fillable para permitir a atribuição em massa dos campos
    protected $fillable = [
        'nome',
        'descricao',
        'carga_horaria',
        'preco',
        'nivel',
        'ativo',
    ];
}
