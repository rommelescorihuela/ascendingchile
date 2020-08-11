<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'foto', 'nombre', 'industria', 'gerente', 'contacto', 'fono', 'direccion', 'comuna_id', 'email', 'web', 'colaboradores',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function interes()
    {
        return $this->hasMany('App\Interes', 'empresa');
    }

    public function interesado($pro_id)
    {
        return $this->interes->where('profesional', $pro_id)->count() > 0; 
    }
}
