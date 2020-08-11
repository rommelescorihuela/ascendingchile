<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class winwin extends Model
{
    protected $fillable = [
        'logo', 'web', 'servicios', 'industria', 'email', 'twitter', 'instagram', 'facebook', 'fono', 'rut',
    ];

    public function nombreIndustria($in_id)
    {
        return DB::table('industria')->where('id', $in_id)->first()->industria; 
    }
}
