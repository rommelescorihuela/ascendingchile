<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operativo extends Model
{
    protected $fillable = [
        'foto', 'nombre', 'fnac', 'genero', 'nacionalidad', 'civil', 'afp', 'salud', 'fono', 'email', 'direccion', 'comuna_id', 'situacion', 'inicio_sit', 'ultimo_salario', 'actividad', 'nivel_educ', 'licencia', 'cv',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function postulacion()
    {
        return $this->hasMany('App\PostulacionOp', 'operativo');
    }

    public function estadoPostulacion($of_id)
    {
        return $this->postulacion->where('oferta_id', $of_id)->first()->estado; 
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

    public function nivel_educ()
    {
        switch($this->nivel_educ) {
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
}
