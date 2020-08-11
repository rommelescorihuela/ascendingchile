<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaOp extends Model
{
    protected $fillable = [
        'ocupacion', 'empresa', 'periodo_desde', 'periodo_hasta', 'region', 'sueldo', 'detalle', 'referencia',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function nombreIndustria($in_id)
    {
        return DB::table('industria')->where('id', $in_id)->first()->industria; 
    }
}
