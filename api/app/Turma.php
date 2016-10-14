<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'id_escola', 'ano',
    ];

}
