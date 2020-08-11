<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Experiencia extends Model
{
    protected $fillable = [
        'cargo', 'empresa', 'industria', 'periodo_desde', 'periodo_hasta', 'responsabilidades', 'logros',
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
