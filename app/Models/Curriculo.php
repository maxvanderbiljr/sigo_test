<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    //fillable
    protected $fillable = [
        'apresentacao',
        'qualificacao_profissional',
        'objetivo',
        'foto_perfil',      
        'linkedin',
        'status',
    ];

}
