<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormacionOp extends Model
{
    protected $fillable = [
        'curso', 'casa', 'duracion', 'diploma',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
