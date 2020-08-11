<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levantamiento extends Model
{
    protected $fillable = [
        'cargo', 'ubicacion', 'superior', 'supervisa', 'proposito', 'funciones', 'competencias', 'comunicacion', 'deseables', 'excluyentes',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
