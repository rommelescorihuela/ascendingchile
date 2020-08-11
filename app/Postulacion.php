<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $fillable = [
        'oferta_id', 'profesional', 'estado',
    ];

    /* Estado:
    - 0 > Pendiente
    - 1 > Aprobada
    - 2 > Rechazada
    */

    public function oferta()
    {
        return $this->belongsTo('App\Oferta', 'oferta_id');
    }

    public function profesional()
    {
        return $this->belongsTo('App\Profesional', 'profesional');
    }
}
