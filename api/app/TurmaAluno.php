<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaAluno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_aluno', 'id_turma', 
    ];

}
