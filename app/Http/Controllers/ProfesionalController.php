<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Profesional;
use App\Experiencia;
use App\Formacion;
use App\Postulacion;
use App\Oferta;
use App\Titulo;

class ProfesionalController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if( is_null( Auth::user()->profesional ) )
            return redirect()->route('perfil');
        else
            return view('pro.home');
    }

    public function index()
    {
        if( is_null( Auth::user()->profesional ) )
        {
            return view('pro.perfil');
        }
        else {
            $yo = Auth::user()->profesional;
            return view('pro.perfil')->with('yo', $yo);
            //return redirect()->route('home');
        }
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimetypes:image/jpeg,image/png',
        ], [
            'foto.mimetypes' => 'El formato del archivo no está permitido.'
        ]);

        if ($validator->fails()) {
            return redirect('perfil')
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('foto');
        $file_tmp = Storage::disk('public')->put('usuarios', $file);
        $foto = basename($file_tmp);

    	$pro = new Profesional();

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

            $mensaje2 = '<h2>Nuevo profesional registrado</h2>
                <br>
                <p>Se ha registrado un nuevo profesional en Ascending.</p>
                <p>RUT: '.$pro->user->name.'</p>';
                
            mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Nuevo profesional registrado', $mensaje2, $cabeceras);

	        return redirect()->route('resumen');
	    }
    }

    public function editar(Request $request)
    {
        $pro = Auth::user()->profesional;

        $pro->fill($request->toArray());

        if($pro->save())
        {
            return redirect()->route('perfil');
        }
    }

    public function editarFoto(Request $request)
    {
        $pro = Auth::user()->profesional;

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
        if( is_null( Auth::user()->profesional ) )
        {
            return view('pro.resumen');
        }
        else {
            $yo = Auth::user()->profesional;
            if(is_null($yo->resumen))
                return view('pro.resumen');
            else
                return view('pro.resumen')->with('yo', $yo);
        }
    }

    public function resumir(Request $request)
    {
    	$pro = Auth::user()->profesional;

    	$pro->fill($request->toArray());

    	if($pro->save())
    	{
            if($pro->situacion == 0)
                return redirect()->route('formacion');
            else
        		return redirect()->route('experiencia');
    	}
    }

    public function editarResumen(Request $request)
    {
        $pro = Auth::user()->profesional;

        $pro->fill($request->toArray());

        if($pro->save())
        {
            return redirect()->route('resumen');
        }
    }

    public function experiencia()
    {
        $exp = Auth::user()->experiencias->sortByDesc('periodo_desde');

        if( is_null( Auth::user()->profesional ) )
        {
            return view('pro.experiencia')->with('exp', $exp);
        }
        else {
            $yo = Auth::user()->profesional;
            return view('pro.experiencia')->with('exp', $exp)->with('yo', $yo);
        }
    }

    public function experienciar(Request $request)
    {
        $exp = new Experiencia();

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
            return redirect()->route('experiencia');
        }
    }

    public function editarExp(Request $request)
    {
        $exp = Experiencia::find($request->idexp);

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
        $exp = Experiencia::find($request->idexp);

        if($exp->user_id == Auth::id())
            $exp->delete();

        return redirect()->route('experiencia');
    }

    public function formacion()
    {
        $pro = Auth::user()->profesional;
        $exp = Auth::user()->formacion->sortByDesc('periodo_desde');

        /*if( is_null( $pro->situacion_acad ) )
        {
            return view('pro.formacion')
                ->with('exp', $exp)
                ->with('sit', $pro->situacion_acad)
                ->with('ing', $pro->ingles);
        }
        else {*/
            return view('pro.formacion')
                ->with('exp', $exp)
                ->with('sit', $pro->situacion_acad)
                ->with('ing', $pro->ingles)
                ->with('yo', $pro);
        //}
    }

    public function formar(Request $request)
    {
        $exp = new Formacion();

        $exp->fill($request->toArray());
        $exp->user_id = Auth::id();

        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');

        if($exp->save())
        {
            return redirect()->route('formacion');
        }
    }

    public function editarForm(Request $request)
    {
        $exp = Formacion::find($request->idform);

        $exp->fill($request->toArray());

        $exp->periodo_desde = \Carbon\Carbon::parse($request->periodo_desde)->format('Y-m-d');
        $exp->periodo_hasta = \Carbon\Carbon::parse($request->periodo_hasta)->format('Y-m-d');

        if($exp->save())
        {
            return redirect()->back();
        }
    }

    public function borrarForm(Request $request)
    {
        $exp = Formacion::find($request->idform);

        if($exp->user_id == Auth::id())
            $exp->delete();

        return redirect()->route('formacion');
    }

    public function guardaAcad(Request $request)
    {
        $pro = Auth::user()->profesional;

        $pro->fill($request->toArray());

        if($pro->save())
        {
            if(isset($request->primeravez))
                return redirect()->route('cv');
            else
                return redirect()->route('formacion');
        }
    }

    public function cv()
    {
        $yo = Auth::user()->profesional;
        return view('pro.cv')->with('yo', $yo);
    }

    public function cvPost(Request $request)
    {
        $yo = Auth::user()->profesional;

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
                return redirect('cv')
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
                return redirect()->route('perfil');
            } else {
                return redirect()->route('cv');
            }
        }
    }

    public function ofertas(){
        $pro = Auth::user()->profesional;

        $ciudades = Oferta::select('ciudad')->groupBy('ciudad')->get();
        $industrias = Oferta::select('industria')->groupBy('industria')->get();

        $ofertas = Oferta::where('estado', 1);
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

        return view('pro.ofertas')
            ->with('ofertas', $ofertas->orderBy('created_at', 'DESC')->paginate(10))
            ->with('industrias', $industrias)
            ->with('ciudades', $ciudades)
            ->with('yo', $pro);
    }

    public function postular(Request $request)
    {
        if(Auth::user()->tipo == 1)
        {
            $pos = new Postulacion();
            $pos->oferta_id = $request->idOf;
            $pos->profesional = Auth::user()->profesional->id;

            if($pos->save())
            {
                $oferta = Oferta::find($request->idOf);
                $profesional = Auth::user()->profesional;

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
                    <p>Profesional: '.$profesional->nombre.'</p>
                    <p>RUT: '.$profesional->user->name.'</p>
                    <p>Título: '.Titulo::find($profesional->titulo)->profesion.'</p>
                    <p>Email: '.$profesional->email.'</p>
                    <p>Fono: '.$profesional->fono.'</p>
                    <p>Comuna: '.DB::table('comuna')->where('id', $profesional->comuna_id)->first()->comuna.'</p>';

                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                
                mail($profesional->email, 'Ascending Consulting - Nueva Postulación', $mensaje, $cabeceras);
                
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
        $pro = Auth::user()->profesional;
        $postu = $pro->postulacion()->whereHas('oferta', function($q){
           $q->where('estado', 1);
        })->orderBy('created_at', 'DESC')->paginate(10);

        return view('pro.postulaciones')
            ->with('postu', $postu)
            ->with('yo', $pro);
    }
}
