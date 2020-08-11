<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profesional()
    {
        return $this->hasOne('App\Profesional');
    }

    public function experiencias()
    {
        return $this->hasMany('App\Experiencia');
    }

    public function formacion()
    {
        return $this->hasMany('App\Formacion');
    }

    public function empresa()
    {
        return $this->hasOne('App\Empresa');
    }

    public function ofertas()
    {
        return $this->hasMany('App\Oferta');
    }

    public function levantamientos()
    {
        return $this->hasMany('App\Levantamiento');
    }

    public function operativo()
    {
        return $this->hasOne('App\Operativo');
    }

    public function experienciasOp()
    {
        return $this->hasMany('App\ExperienciaOp');
    }

    public function formacionOp()
    {
        return $this->hasMany('App\FormacionOp');
    }

    public function ofertasOp()
    {
        return $this->hasMany('App\OfertaOp');
    }
}
