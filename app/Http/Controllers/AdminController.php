<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Profesional;
use App\Empresa;
use App\Oferta;
use App\Levantamiento;
use App\winwin;
use App\contacto;
use App\Operativo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->genero = ['Masculino', 'Femenino', 'Otro'];
        $this->civil = ['Soltero', 'Casado', 'Divorciado'];
        $this->situacion = ['Primer Empleo', 'Nuevas Oportunidades', 'Desempleado'];
        $this->grado = ['Estudiante de Educación Superior', 'Egresado/a', 'Titulado/a', 'Diplomado/a', 'Magister', 'Carrera congelada'];
        $this->ingles = ['Nulo', 'Bajo', 'Medio', 'Avanzado', 'Nativo'];
    }

    public function dashboard()
    {
        $pros = User::where('tipo', 1)
            ->paginate(10);

        return view('admin.dashboard')->with('pros', $pros);
    }

    public function empresas()
    {
        $pros = User::where('tipo', 2)->paginate(10);

        return view('admin.empresas')->with('pros', $pros);
    }

    public function ofertas()
    {
        $pros = Oferta::paginate(10);

        return view('admin.ofertas')->with('pros', $pros);
    }
    
    public function eliminarOferta(Request $request)
    {
        $oferta = Oferta::find($request->id);
        $oferta->delete();
    }
    
    public function eliminarLevantamiento(Request $request)
    {
        $levantamiento = Levantamiento::find($request->id);
        $levantamiento->delete();
    }
    
    public function eliminarOperativo(Request $request)
    {
        $operativo = Operativo::find($request->id);
        $operativo->delete();
    }

    public function levantamientos()
    {
        $pros = Levantamiento::paginate(10);

        return view('admin.levantamientos')->with('pros', $pros);
    }

    public function winwin()
    {
        $pros = winwin::paginate(10);

        return view('admin.winwin')->with('pros', $pros);
    }

    public function contacto()
    {
        $pros = contacto::paginate(10);

        return view('admin.contactos')->with('pros', $pros);
    }

    public function operativos()
    {
        $pros = User::where('tipo', 3)->paginate(10);

        return view('admin.operativos')->with('pros', $pros);
    }

    // GETS:

    public function infoPro($id)
    {
        $user = User::find($id);
        $pro = $user->profesional;

        return view('admin.pro')->with('pro', $pro);
    }

    // POSTS:

    public function infoPros(Request $request)
    {
        if(Auth::user()->tipo == 0)
        {
            $user = User::find($request->idEmp);
            $pro = $user->profesional;

            $datos = [];
            if(!is_null($pro))
            {
                $datos['fnac'] = $pro->fnac;
                $datos['genero'] = $this->genero[$pro->genero];
                $datos['direccion'] = $pro->direccion;
                $datos['comuna'] = DB::table('comuna')->where('id', $pro->comuna_id)->first()->comuna;
                $datos['civil'] = $this->civil[$pro->civil];
                $datos['resumen'] = $pro->resumen;
            }

            return response()->json(["tipo" => 1, "usuario" => $datos]);
        } else {
            return 66;
        }
    }

    public function estadoPros(Request $request)
    {
        if(Auth::user()->tipo == 0)
        {
            $user = User::find($request->idEmp);
            $user->permiso = $request->estado;
            $user->save();
            if($user->permiso == $request->estado)
                return $user->permiso;
            else
                return 66;
        } else {
            return 66;
        }
    }

    public function eliminarPros(Request $request)
    {
        $user = User::find($request->idEmp);
        $prefesional = $user->profesional();
        $prefesional->delete();
        $user->delete();

    }
    
    public function eliminarEmpresa(Request $request)
    {
        $empresa = Empresa::find($request->id);
        $empresa->delete();

    }

    public function eliminarWinwin(Request $request)
    {
        $winwin = winwin::find($request->idEmp);
        $winwin->delete();

    }

    public function estadoWinwin(Request $request)
    {
        if(Auth::user()->tipo == 0)
        {
            $ww = winwin::find($request->idEmp);
            $ww->permiso = $request->estado;
            $ww->save();
            if($ww->permiso == $request->estado)
                return $ww->permiso;
            else
                return 66;
        } else {
            return 66;
        }
    }

}
