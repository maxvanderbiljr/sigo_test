<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    //Fillable para permitir a atribuição em massa dos campos
    protected $fillable = [
        'nome',
    ];
    
    // ==========================================
    // RELACIONAMENTOS - hasMany
    // ==========================================   

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

}
