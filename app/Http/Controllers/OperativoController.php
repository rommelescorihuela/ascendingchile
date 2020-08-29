<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Operativo;
use App\ExperienciaOp;
use App\FormacionOp;
use App\PostulacionOp;
use App\OfertaOp;

class OperativoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if( is_null( Auth::user()->operativo ) )
        {
            return view('ope.perfil');
        }
        else {
            $yo = Auth::user()->operativo;
            return view('ope.perfil')->with('yo', $yo);
        }
    }

    public function index1($id)
    {
            $operativo = Operativo::where('user_id',$id)->get();
            foreach ($operativo as $k) {
                $yo=$k;
            }
            return view('admin.perfil')->with('yo', $yo);
        
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimetypes:image/jpeg,image/png',
        ], [
            'foto.mimetypes' => 'El formato del archivo no está permitido.'
        ]);

        if ($validator->fails()) {
            return redirect('perfil-op')
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('foto');
        $file_tmp = Storage::disk('public')->put('usuarios', $file);
        $foto = basename($file_tmp);

    	$pro = new Operativo();

    	$pro->fill($request->toArray());
        $pro->foto = $foto;
    	$pro->user_id = Auth::id();

    	if($pro->save())
    	{
	    	$mensaje = '<h2>Estimado(a) usuario<br>
	    		Ascending consulting te da la bienvenida</h2>
	    		<br>
	    		<p>Si eres cliente empresa y deseas contratar nuestros servicios podrás solicitarlos a través de nuestro sitio web, seleccionando la opción deseada.</p>
	    		<p>Si eres persona natural y estas en busca de empleo, te invitamos a estar atento y postular a nuestras vacantes de tu interés  en nuestro sitio web.</p>
	    		<br>
	    		<p>Atentamente, Ascending consulting</p>';

	    	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        mail($pro->email, 'Ascending consulting te da la bienvenida', $mensaje, $cabeceras);

            $mensaje2 = '<h2>Nuevo operativo registrado</h2>
                <br>
                <p>Se ha registrado un nuevo perfil operativo en Ascending.</p>
                <p>RUT: '.$pro->user->name.'</p>';
                
            mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Nuevo operativo registrado', $mensaje2, $cabeceras);

	        return redirect()->route('situacion-op');
	    }
    }

    public function editar(Request $request)
    {
        $pro = Auth::user()->operativo;

        $pro->fill($request->toArray());

        if($pro->save())
        {
            return redirect()->route('perfil-op');
        }
    }

    public function editar1(Request $request)
    {
        $operativo = Operativo::find($request->id);  

        $operativo->fill($request->toArray());

        if($operativo->save())
        {
            //return redirect()->route('perfil-op1');
            return redirect('admin-area/perfil-op1/'.$operativo->user_id);
        }
    }

    public function editarFoto(Request $request)
    {
        $pro = Auth::user()->operativo;

        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimetypes:image/jpeg,image/png',
        ], [
            'foto.mimetypes' => 'El formato del archivo no está permitido.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('foto');
        $file_tmp = Storage::disk('public')->put('usuarios', $file);
        $foto = basename($file_tmp);

        $oldfoto = $pro->foto;
        $pro->foto = $foto;

        if($pro->save())
        {
            Storage::disk('public')->delete('usuarios/'.$oldfoto);
            return redirect()->back();
        }
    }

    public function resumen()
    {
        if( is_null( Auth::user()->operativo ) )
        {
            return view('ope.resumen');
        }
        else {
            $yo = Auth::user()->operativo;
            if(is_null($yo->situacion))
                return view('ope.resumen');
            else
                return view('ope.resumen')->with('yo', $yo);
        }
    }

    public function resumen1($id)
    {
        $operativo = Operativo::where('user_id',$id)->get();
        foreach ($operativo as $k) {
            $yo=$k;
            }
        return view('admin.resumen')->with('yo', $yo);
        
    }
    public function resumir(Request $request)
    {
    	$pro = Auth::user()->operativo;

    	$pro->fill($request->toArray());

    	if($pro->save())
    	{
            if($pro->situacion == 0)
                return redirect()->route('formacion-op');
            else
        		return redirect()->route('experiencia-op');
    	}
    }

    public function editarResumen(Request $request)
    {
        $pro = Auth::user()->operativo;

        $pro->fill($request->toArray());

        if($request->situacion == 0) $pro->actividad = NULL;

        if($pro->save())
        {
            return redirect()->route('situacion-op');
        }
    }

    public function editarResumen1(Request $request)
    {
        $operativo = Operativo::find($request->id); 

        $operativo->fill($request->toArray());

        if($request->situacion == 0) $operativo->actividad = NULL;

        if($operativo->save())
        {
            return redirect('admin-area/perfil-op1/'.$operativo->user_id);
        }
    }

    public function experiencia()
    {
        $exp = Auth::user()->experienciasOp->sortByDesc('periodo_desde');

        if( is_null( Auth::user()->operativo ) )
        {
            return view('ope.experiencia')->with('exp', $exp);
        }
        else {
            $yo = Auth::user()->operativo;
            return view('ope.experiencia')->with('exp', $exp)->with('yo', $yo);
        }
    }

    public function experiencia1($id)
    {
       $experiencia = ExperienciaOp::where('user_id',$id)->get();
        foreach ($experiencia as $k) {
                $exp=$k;
            }
       $operativo = Operativo::where('user_id',$id)->get();
        foreach ($operativo as $k) {
            $yo=$k;
            }     

            return view('admin.experiencia')
            ->with('exp', $experiencia)
            ->with('yo', $yo);
        
    }

    public function experienciar(Request $request)
    {
        $exp = new ExperienciaOp();

        $exp->fill($request->toArray());
        $exp->user_id = Auth::id();

        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');

        if($exp->save())
        {
            /*$exps = Auth::user()->experiencias->count();
            if($exps == 1)
            {
                return redirect()->route('formacion');
            }*/
            return redirect()->route('experiencia-op');
        }
    }

    public function experienciar1(Request $request,$id)
    {
        $exp = new ExperienciaOp();

        $exp->fill($request->toArray());
        $exp->user_id = $id;
        //exit();
        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');

        if($exp->save())
        {
            return redirect('admin-area/experiencia-op1/'.$id);
        }
    }

    public function editarExp(Request $request)
    {
        $exp = ExperienciaOp::find($request->idexp);

        $exp->fill($request->toArray());

        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');

        if($exp->save())
        {
            return redirect()->back();
        }
    }

    public function borrarExp(Request $request)
    {
        $exp = ExperienciaOp::find($request->idexp);

        if($exp->user_id == Auth::id())
            $exp->delete();

        return redirect()->route('experiencia-op');
    }

    public function borrarExp1(Request $request)
    {
        $exp = ExperienciaOp::find($request->idexp);
        $exp->delete();

         return redirect()->back();
    }

    public function formacion()
    {
        $pro = Auth::user()->operativo;
        $exp = Auth::user()->formacionOp;

        return view('ope.formacion')
            ->with('exp', $exp)
            ->with('sit', $pro->nivel_educ)
            ->with('yo', $pro);
    }

    public function formacion1($id)
    {
        $operativo = Operativo::where('user_id',$id)->get();
            foreach ($operativo as $k) {
                $pro=$k;
            }
        //$pro = Auth::user()->operativo;
        $exp = FormacionOp::where('user_id',$id)->get();

        return view('admin.formacion')
            ->with('exp', $exp)
            ->with('sit', $pro->nivel_educ)
            ->with('yo', $pro);
    }

    public function formar(Request $request)
    {
        $exp = new FormacionOp();

        $exp->fill($request->toArray());
        $exp->user_id = Auth::id();
/*
        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');
*/
        if($exp->save())
        {
            return redirect()->route('formacion-op');
        }
    }

    public function formar1(Request $request,$id)
    {
        $exp = new FormacionOp();

        $exp->fill($request->toArray());
        $exp->user_id = $id;
/*
        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');
*/
        if($exp->save())
        {
            return redirect('admin-area/formacion-op1/'.$id);
        }
    }

    public function editarForm(Request $request)
    {
        $exp = FormacionOp::find($request->idform);

        $exp->fill($request->toArray());
/*
        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');
*/
        if($exp->save())
        {
            return redirect()->back();
        }
    }

    public function borrarForm(Request $request)
    {
        $exp = FormacionOp::find($request->idform);

        if($exp->user_id == Auth::id())
            $exp->delete();

        return redirect()->route('formacion-op');
    }

    public function borrarForm1(Request $request)
    {
        echo $request->idform;
        $exp = FormacionOp::find($request->idform);
        $exp->delete();

        return redirect('admin-area/formacion-op1/'.$exp->user_id);
    }

    public function guardaAcad(Request $request)
    {
        $pro = Auth::user()->operativo;

        $pro->fill($request->toArray());

        if($pro->save())
        {
            if(isset($request->primeravez))
                return redirect()->route('cv-op');
            else
                return redirect()->route('formacion-op');
        }
    }
    
    public function guardaAcad1(Request $request)
    {
        $operativo = Operativo::find($request->id);
        $operativo->fill($request->toArray());
        
        if($operativo->save())
        {
        
            
                return redirect('admin-area/formacion-op1/'.$operativo->user_id);
        }
    }
    public function cv()
    {
        $yo = Auth::user()->operativo;
        return view('ope.cv')->with('yo', $yo);
    }

    public function cvPost(Request $request)
    {
        $yo = Auth::user()->operativo;

        $primeravez = true;
        if($yo->cv) $primeravez = false;

        if(!empty($request->file('cv')))
        {
            $validator = Validator::make($request->all(), [
                'cv' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ], [
                'cv.mimetypes' => 'El formato del archivo no está permitido.'
            ]);

            if ($validator->fails()) {
                return redirect('cv-op')
                            ->withErrors($validator)
                            ->withInput();
            }

            if( Storage::disk('cvs')->exists($yo->cv) )
            {
                Storage::disk('cvs')->delete($yo->cv);
            }
            $file = $request->file('cv');
            $file_tmp = Storage::disk('cvs')->put('/', $file);
            $cv = basename($file_tmp);

            $yo->cv = $cv;
            session()->flash('mensaje', 'Currículum actualizado con éxito.');
        }

        if($yo->save())
        {
            if($primeravez)
            {
                session()->flash('exito', true);
                return redirect()->route('perfil-op');
            } else {
                return redirect()->route('cv-op');
            }
        }
    }

    public function ofertas(){
        $pro = Auth::user()->operativo;

        $ciudades = OfertaOp::select('ciudad')->groupBy('ciudad')->get();
        $industrias = OfertaOp::select('industria')->groupBy('industria')->get();

        $ofertas = OfertaOp::where('estado', 1);
        if(!is_null(request('industria')))
        {
            $ofertas->where('industria', request('industria'));
        }

        if(!is_null(request('ciudad')))
        {
            $ofertas->where('ciudad', request('ciudad'));
        }

        if(!is_null(request('jornada')))
        {
            $ofertas->where('jornada', request('jornada'));
        }

        return view('ope.ofertas')
            ->with('ofertas', $ofertas->orderBy('created_at', 'DESC')->paginate(10))
            ->with('industrias', $industrias)
            ->with('ciudades', $ciudades)
            ->with('yo', $pro);
    }

    public function postular(Request $request)
    {
        if(Auth::user()->tipo == 3)
        {
            $pos = new PostulacionOp();
            $pos->oferta_id = $request->idOf;
            $pos->operativo = Auth::user()->operativo->id;

            if($pos->save())
            {
                $oferta = OfertaOp::find($request->idOf);
                $operativo = Auth::user()->operativo;

                $mensaje = '<h2>Nueva Postulación</h2>
                    <br>
                    <p>Estimado(a), gusto saludarte.</p>
                    <p>Quiero informarte que tu curriculum ha sido recibido por nuestro departamento de selección.</p>
                    <p>Si tenemos algún cargo se ajuste a tu perfil, pronto, uno de nuestros ejecutivos se contactara con UD para invitarlo a una entrevista personal con nuestro cliente.</p>
                    <br><p>Atentamente, Ascending consulting</p>';

                $mensaje2 = '<h2>Nueva Postulación</h2>
                    <br>
                    <p>Cargo: '.$oferta->cargo.'</p>
                    <p>Industria: '.DB::table('industria')->where('id', $oferta->industria)->first()->industria.'</p>
                    <p>Ciudad: '.$oferta->ciudad.'</p>
                    <p>Jornada: '.$oferta->jornada.'</p>
                    <p>Renta fija: $'.$oferta->renta_fija.'</p>
                    <p>Renta variable: $'.$oferta->renta_variable.'</p>
                    <br>
                    <p>Empresa: '.$oferta->user->empresa->nombre.'</p>
                    <p>RUT: '.$oferta->user->name.'</p>
                    <p>Contacto: '.$oferta->user->empresa->contacto.'</p>
                    <p>Email: '.$oferta->user->empresa->email.'</p>
                    <p>Fono: '.$oferta->user->empresa->fono.'</p>
                    <p>Comuna: '.DB::table('comuna')->where('id', $oferta->user->empresa->comuna_id)->first()->comuna.'</p>
                    <b>
                    <p>operativo: '.$operativo->nombre.'</p>
                    <p>RUT: '.$operativo->user->name.'</p>
                    <p>Título: '.Titulo::find($operativo->titulo)->profesion.'</p>
                    <p>Email: '.$operativo->email.'</p>
                    <p>Fono: '.$operativo->fono.'</p>
                    <p>Comuna: '.DB::table('comuna')->where('id', $operativo->comuna_id)->first()->comuna.'</p>';

                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                
                mail($operativo->email, 'Ascending Consulting - Nueva Postulación', $mensaje, $cabeceras);
                
                mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Ascending Consulting - Nueva Postulación', $mensaje2, $cabeceras);

                return 1;
            } else {
                return 66;
            }
        } else {
            return 66;
        }
    }

    public function postulaciones(){
        $pro = Auth::user()->operativo;
        $postu = $pro->postulacion()->whereHas('oferta', function($q){
           $q->where('estado', 1);
        })->orderBy('created_at', 'DESC')->paginate(10);

        return view('ope.postulaciones')
            ->with('postu', $postu)
            ->with('yo', $pro);
    }
}
