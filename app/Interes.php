<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    protected $fillable = [
        'empresa', 'profesional',
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresa');
    }

    public function profesional()
    {
        return $this->belongsTo('App\Profesional', 'profesional');
    }
}
