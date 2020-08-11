<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Oferta extends Model
{
    protected $fillable = [
        'industria', 'cargo', 'lugar', 'jornada', 'ciudad', 'descripcion', 'excluyentes', 'deseables', 'renta_fija', 'renta_variable', 'bonos', 'beneficios', 'porque', 'estado',
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
        return $this->hasMany('App\Postulacion', 'oferta_id');
    }

    public function nombreIndustria($in_id)
    {
        return DB::table('industria')->where('id', $in_id)->first()->industria; 
    }
}
