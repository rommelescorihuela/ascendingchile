<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Profesional;
use App\Empresa;
use App\Oferta;
use App\OfertaOp;
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

    public function dashboard(Request $request)
    {
        $titulo = $request->get('titulo');
        $profesion = $request->get('profesion');
        $acceso = $request->get('acceso');
        if($profesion!='')
        {
            if($acceso!='')
            {
                $pros1 = User::from('users as a')
                ->join('profesionals as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->select('a.*')
                ->where('a.tipo', 1)
                ->where('b.titulo',$profesion)
                ->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
            }
            else
            {
                $pros1 = User::from('users as a')
                ->join('profesionals as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->select('a.*')
                ->where('a.tipo', 1)
                ->where('b.titulo',$profesion)
                ->distinct()
                ->paginate(10);
            }

            
        }
        elseif($titulo!='')
        {
            if($acceso!='')
            {
            echo 'hola';
                $pros1 = User::from('users as a')
                ->join('profesionals as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->join('profesiones as c', function($join){
                    $join->on('c.id', '=', 'b.titulo');
                })
                ->select('a.*')
                ->where('a.tipo', 1)
                ->where('c.profesion', 'LIKE','%'.$titulo.'%')
                ->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
            }
            else
            {
                $pros1 = User::from('users as a')
                ->join('profesionals as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->join('profesiones as c', function($join){
                    $join->on('c.id', '=', 'b.titulo');
                })
                ->select('a.*')
                ->where('a.tipo', 1)
                ->where('c.profesion', 'LIKE','%'.$titulo.'%')
                ->distinct()
                ->paginate(10);
            }

            
        }
        elseif($acceso!='')
        {
            $pros1 = User::from('users as a')
                ->join('profesionals as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->join('profesiones as c', function($join){
                    $join->on('c.id', '=', 'b.titulo');
                })
                ->select('a.*')
                ->where('a.tipo', 1)
                ->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
        }
        else
        {
        $pros1 = User::where('tipo', 1)
                ->paginate(10);  
        }

        return view('admin.dashboard')->with('pros', $pros1);
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

    public function editaroferta($id)
    {
        $oferta = Oferta::find($id);
        return view('admin.editar-oferta')
        ->with('ofertas', $oferta)
        ->with('exito',false);

    }

    public function updateoferta(Request $request,$id)
    {
        $oferta = Oferta::find($id);
        $oferta->fill($request->toArray());
        $oferta->id=$id;
        $oferta->save();

        return view('admin.editar-oferta')
        ->with('ofertas', $oferta)
        ->with('exito',true);
    }
    
    public function eliminarOferta(Request $request)
    {
        $oferta = Oferta::find($request->id);
        $oferta->delete();
    }

    public function eliminarOfertaop(Request $request)
    {
        $oferta = OfertaOp::find($request->id);
        $oferta->delete();
    }
    
    public function estadoOfer(Request $request)
    {
        if(Auth::user()->tipo == 0)
        {
            $oferta = Oferta::find($request->idEmp);
            $oferta->estado = $request->estado;
            $oferta->save();
            if($oferta->estado == $request->estado)
                return $oferta->estado;
            else
                return 66;
        } else {
            return 66;
        }
    }

    public function eliminarLevantamiento(Request $request)
    {
        $levantamiento = Levantamiento::find($request->id);
        $levantamiento->delete();
    }

    public function editarLevantamiento($id)
    {
        $levantamiento = Levantamiento::find($id);

        return view('admin.editarlevantamiento')
        ->with('pros', $levantamiento)
        ->with('exito',false);
        //var_dump($levantamiento->ubicacion);

    }

    public function updateLevantamiento(Request $request,$id)
    {
        $levantamiento = Levantamiento::find($id);

        $levantamiento->fill($request->toArray());
        $levantamiento->id=$id;
        $levantamiento->save();
        return view('admin.editarlevantamiento')
        ->with('pros', $levantamiento)
        ->with('exito',true);
        //$levantamiento->delete();
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

    public function operativos(Request $request)
    {

        $titulo = $request->get('titulo');
        //$profesion = $request->get('profesion');
        $acceso = $request->get('acceso');
        if($titulo!='' and $acceso!='')
        {
            $pros1 = User::from('users as a')
                ->join('experiencia_ops as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->select('a.*')
                ->where('a.tipo', 3)
                ->where('b.ocupacion','like','%'.$titulo.'%')
                ->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
        }
        elseif ($titulo!='') 
        {
            $pros1 = User::from('users as a')
                ->join('experiencia_ops as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->select('a.*')
                ->where('a.tipo', 3)
                ->where('b.ocupacion','like','%'.$titulo.'%')
                //->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
        }
        else
        {
            $pros1 = User::from('users as a')
                ->join('operativos as b', function($join){
                    $join->on('a.id', '=', 'b.user_id');
                })
                ->select('a.*')
                ->where('a.tipo', 3)
                //->where('b.titulo',$profesion)
                ->where('a.permiso', 'LIKE','%'.$acceso.'%')
                ->distinct()
                ->paginate(10);
        }
        
        $pros = User::where('tipo', 3)->paginate(10);

        return view('admin.operativos')->with('pros', $pros1);
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

    public function estadoLev(Request $request)
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
