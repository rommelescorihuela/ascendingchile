<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaOp extends Model
{
    protected $fillable = [
        'industria', 'cargo', 'tipo_licencia', 'experiencia', 'lugar', 'zona', 'ciudad', 'jornada', 'descripcion', 'detalles', 'excluyentes', 'deseables', 'otros', 'renta_fija', 'renta_variable', 'bonos', 'estado',
    ];

    /* Lugar:
    - Oficina
    - Terreno
    - Ambas
    */

    /* Jornadas:
    - Full Time
    - Part Time
    - Temporada
    - Freelance
    */

    /* Estado:
    - 0 > Cerrada
    - 1 > Abierta
    */

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function postulacion()
    {
        return $this->hasMany('App\PostulacionOp', 'oferta_id');
    }

    public function nombreIndustria($in_id)
    {
        return DB::table('industria')->where('id', $in_id)->first()->industria; 
    }
}
