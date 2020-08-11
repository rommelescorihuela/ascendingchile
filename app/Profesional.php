<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $fillable = [
        'foto', 'nombre', 'titulo', 'email', 'fnac', 'genero', 'fono', 'direccion', 'comuna_id', 'civil', 'hijos', 'afp', 'salud', 'resumen', 'situacion', 'renta', 'cargo', 'porque', 'situacion_acad', 'ingles', 'cv',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function titulos()
    {
        return $this->hasOne('App\Titulo', 'id', 'titulo');
    }

    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function postulacion()
    {
        return $this->hasMany('App\Postulacion', 'profesional');
    }

    public function estadoPostulacion($of_id)
    {
        return $this->postulacion->where('oferta_id', $of_id)->first()->estado; 
    }

    public function interes()
    {
        return $this->hasMany('App\Interes', 'profesional');
    }

    // no parametrizados:

    public function genero()
    {
        switch($this->genero) {
            case 0:
                return 'Masculino';
                break;
            case 1:
                return 'Femenino';
                break;
            case 2:
                return 'Otro';
                break;
        }
    }

    public function civil()
    {
        switch($this->civil) {
            case 1:
                return 'Casado';
                break;
            case 2:
                return 'Divorciado';
                break;
            default:
                return 'Soltero';
        }
    }

    public function situacion()
    {
        switch($this->situacion) {
            case 1:
                return 'Nuevas Oportunidades';
                break;
            case 2:
                return 'Desempleado';
                break;
            default:
                return 'Primer Empleo';
        }
    }

    public function situacion_acad()
    {
        switch($this->situacion_acad) {
            case '0':
                return 'Estudiante de Educación Superior';
                break;
            case 1:
                return 'Egresado/a';
                break;
            case 2:
                return 'Titulado/a';
                break;
            case 3:
                return 'Diplomado/a';
                break;
            case 4:
                return 'Magister';
                break;
            case 5:
                return 'Carrera congelada';
                break;
            default:
                return '---';
        }
    }

    public function ingles()
    {
        switch($this->ingles) {
            case 1:
                return 'Bajo';
                break;
            case 2:
                return 'Medio';
                break;
            case 3:
                return 'Avanzado';
                break;
            case 4:
                return 'Nativo';
                break;
            default:
                return 'Nulo';
        }
    }
}
