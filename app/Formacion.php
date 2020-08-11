<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    protected $fillable = [
        'profesion', 'casa', 'periodo_desde', 'periodo_hasta',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
