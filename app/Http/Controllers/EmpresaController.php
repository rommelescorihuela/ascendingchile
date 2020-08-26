<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Freshwork\ChileanBundle\Rut;
use App\User;
use App\Profesional;
use App\Empresa;
use App\Oferta;
use App\Levantamiento;
use App\winwin;
use App\Interes;
use App\Postulacion;
use App\OfertaOp;


class EmpresaController extends Controller
{
    protected function registro(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'cl_rut', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.cl_rut' => 'El RUT ingresado no es válido.',
            'name.unique' => 'Ya existe un usuario con este RUT.',
        ]);

        $user = new User();
        //$user->fill($validatedData);

        $user = User::create([
            'name' => $request->name,
            #'email' => $userData['email'],
            'password' => Hash::make($request->password),
            'tipo' => '2',
        ]);

        if($user) {
        	$mensaje = '<h2>Nueva empresa registrada</h2>
	            <br>
	            <p>Se ha registrado una nueva empresa en Ascending.</p>
	            <p>RUT: '.$request->name.'</p>';

	        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Nueva empresa registrada', $mensaje, $cabeceras);

	        Auth::loginUsingId($user->id);
		    return redirect()->route('perfil-empresa');
        }
    }

    public function perfil()
    {
        if( is_null( Auth::user()->empresa ) )
        {
            return view('emp.perfil');
        }
        else {
            $yo = Auth::user()->empresa;
            return view('emp.perfil')->with('yo', $yo);
        }
    }

    public function perfilPublico($id)
    {
        $yo = User::find($id)->empresa;
        return view('emp.perfil-publico')->with('yo', $yo);
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimetypes:image/jpeg,image/png',
        ], [
            'foto.mimetypes' => 'El formato del archivo no está permitido.'
        ]);

        if ($validator->fails()) {
            return redirect('perfil-empresa')
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('foto');
        $file_tmp = Storage::disk('public')->put('logos', $file);
        $foto = basename($file_tmp);

    	$emp = new Empresa();

    	$emp->fill($request->toArray());
        $emp->foto = $foto;
    	$emp->user_id = Auth::id();

    	if($emp->save())
    	{
            $winwin = new winwin();
            $winwin->fill($request->toArray());
            $winwin->logo = $foto;
            $winwin->servicios = $request->nombre;
            $winwin->permiso = 1;
            $winwin->rut = Auth::user()->name;

            if($winwin->save()) return redirect()->route('sesion');
            else
                return redirect('perfil-empresa')
                        ->withInput();
	    }
    }

    public function sesion()
    {
        if( is_null( Auth::user()->empresa ) )
        {
        	return redirect()->route('perfil-empresa');
        }
        else {
            $yo = Auth::user()->empresa;
            return view('emp.sesion-iniciada')->with('yo', $yo);
        }
    }

    public function editar(Request $request)
    {
        $emp = Auth::user()->empresa;

        $emp->fill($request->toArray());

        if($emp->save())
        {
            $winwin = winwin::where('rut', Auth::user()->name)->first();
            if( !is_null($winwin) )
            {
                $winwin->fill($request->toArray());
                $winwin->servicios = $request->nombre;

                if(!$winwin->save())
                    return redirect('perfil-empresa')
                            ->withInput();

            }
            return redirect()->route('perfil-empresa');
        }
    }

    public function editarFoto(Request $request)
    {
        $emp = Auth::user()->empresa;

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
        $file_tmp = Storage::disk('public')->put('logos', $file);
        $foto = basename($file_tmp);

        $oldfoto = $emp->foto;
        $emp->foto = $foto;

        if($emp->save())
        {
            Storage::disk('public')->delete('logos/'.$oldfoto);
            $winwin = winwin::where('rut', Auth::user()->name)->first();
            if( !is_null($winwin) )
            {
                $winwin->logo = $foto;

                if(!$winwin->save())
                    return redirect()->back()
                            ->withInput();

            }
            return redirect()->back();
        }
    }

    public function ofertaLaboral()
    {
        if( is_null( Auth::user()->empresa ) )
        {
        	return redirect()->route('perfil-empresa');
        }
        else {
            $yo = Auth::user()->empresa;
            return view('emp.oferta')->with('yo', $yo)->with('exito', false);
        }
    }

    public function ofertaLaboralPost(Request $request)
    {
    	$exito = false;
    	$oferta = new Oferta();
        if($request->tipo_perfil == 2) $oferta = new OfertaOp();

    	$oferta->fill($request->toArray());
    	$oferta->user_id = Auth::id();

    	if($oferta->save())
    	{
        	$mensaje = '<h2>Nueva Oferta Laboral</h2>
	            <br>
	            <p>Se ha registrado una nueva oferta laboral en Ascending.</p>
	            <p>RUT empresa: '.Auth::user()->name.'</p>
	            <p>Industria cliente: '.DB::table('industria')->where('id', $request->industria)->first()->industria.'</p>
	            <p>Cargo: '.$request->cargo.'</p>
	            <p>Lugar de trabajo: '.$request->lugar.'</p>
	            <p>Jornada laboral: '.$request->jornada.'</p>
	            <p>Ciudad: '.$request->ciudad.'</p>
	            <p>Descripción general: '.$request->descripcion.'</p>
	            <p>Requisitos excluyentes: '.$request->excluyentes.'</p>
	            <p>Requisitos deseables: '.$request->deseables.'</p>';
                if($request->tipo_perfil == 1) {
    	            $mensaje .= '<p>Renta fija (líquido): '.$request->renta_fija.'</p>
    	            <p>Renta variable (líquido): '.$request->renta_variable.'</p>
    	            <p>Bonos: '.$request->bonos.'</p>
    	            <p>Beneficios: '.$request->beneficios.'</p>
    	            <p>Porqué debería postular: '.$request->porque.'</p>';
                }

	        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $asunto = 'Nueva oferta laboral';
            if($request->tipo_perfil == 1) $asunto .= ' - Perfil profesional';
            if($request->tipo_perfil == 2) $asunto .= ' - Perfil operativo';
	        
	        if(mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), $asunto, $mensaje, $cabeceras))
	        {
	        	$exito = true;
		    }
	    }

    	$yo = Auth::user()->empresa;
        return view('emp.oferta')->with('yo', $yo)->with('exito', $exito);
    }

    public function estadoOferta(Request $request)
    {
        if(Auth::user()->tipo == 2)
        {
            $ww = Oferta::find($request->idOf);
            $ww->estado = $request->estado;
            $ww->save();
            if($ww->estado == $request->estado)
                return $ww->estado;
            else
                return 66;
        } else {
            return 66;
        }
    }

    public function levantarPerfil()
    {
        if( is_null( Auth::user()->empresa ) )
        {
        	return redirect()->route('perfil-empresa');
        }
        else {
            $yo = Auth::user()->empresa;
            return view('emp.levantamiento')->with('yo', $yo)->with('exito', false);
        }
    }

    public function levantarPerfilPost(Request $request)
    {
    	$exito = false;
    	$lev = new Levantamiento();

    	$lev->fill($request->toArray());
    	$lev->user_id = Auth::id();

    	if($lev->save())
    	{
        	$mensaje = '<h2>Nuevo Levantamiento de Perfil</h2>
	            <br>
	            <p>Se ha registrado un nuevo levantamiento de perfil en Ascending.</p>
	            <p>RUT empresa: '.Auth::user()->name.'</p>
	            <p>Nombre del cargo: '.$request->cargo.'</p>
	            <p>Ubicación en la estructura organizacional: '.$request->ubicacion.'</p>
	            <p>Cargo superior al que reporta: '.$request->superior.'</p>
	            <p>Cargos que supervisa: '.$request->supervisa.'</p>
	            <p>Propósito del cargo: '.$request->proposito.'</p>
	            <p>Funciones del cargo: '.$request->funciones.'</p>
	            <p>Competencias del cargo: '.$request->competencias.'</p>
	            <p>Líneas de comunicación: '.$request->comunicacion.'</p>
	            <p>Requisitos deseables: '.$request->deseables.'</p>
	            <p>Requisitos excluyentes: '.$request->excluyentes.'</p>';

	        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        
	        if(mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Nuevo levantamiento de perfil', $mensaje, $cabeceras))
	        {
	        	$exito = true;
		    }
	    }

    	$yo = Auth::user()->empresa;
        return view('emp.levantamiento')->with('yo', $yo)->with('exito', $exito);
    }

    public function ofertas(){
        $yo = Auth::user()->empresa;
        $ofertas = Auth::user()->ofertas()->orderBy('created_at', 'DESC')->paginate(10);

        return view('emp.ofertas')
            ->with('ofertas', $ofertas)
            ->with('yo', $yo);
    }
    public function editarofertas($id)
    {
        
        $yo = Auth::user()->empresa;
        $oferta = Auth::user()->ofertas()->where('id',$id)->get();
        foreach ($oferta as $k) {
            $ofertas = $k;
        }

        return view('emp.editar-oferta')
            ->with('ofertas', $ofertas)
            ->with('exito', false)
            ->with('yo', $yo);
    }
    public function updateofertas(Request $request,$id)
    {

        $yo = Auth::user()->empresa;
        $oferta = Oferta::find($id);
        $oferta->fill($request->toArray());
        $oferta->id=$id;
        $oferta->user_id=$yo->user_id;
        $oferta->update();
       
        $oferta = Auth::user()->ofertas()->where('id',$id)->get();
        foreach ($oferta as $k) {
            $ofertas = $k;
        }

        return view('emp.editar-oferta')
            ->with('ofertas', $ofertas)
            ->with('exito', true)
            ->with('yo', $yo);
    }
    public function ofertasOp(){
        $yo = Auth::user()->empresa;
        $ofertasOp = Auth::user()->ofertasOp()->orderBy('created_at', 'DESC')->paginate(10);

        return view('emp.ofertas-op')
            ->with('ofertas', $ofertasOp)
            ->with('yo', $yo);
    }
    public function editarofertasop($id)
    {
        
        $yo = Auth::user()->empresa;
        $oferta = Auth::user()->ofertasOp()->where('id',$id)->get();
        foreach ($oferta as $k) {
            $ofertas = $k;
        }
        
        return view('emp.editar-oferta-op')
            ->with('ofertas', $ofertas)
            ->with('exito', false)
            ->with('yo', $yo);
    }
    public function updateofertasop(Request $request,$id)
    {

        $yo = Auth::user()->empresa;
        $oferta = OfertaOp::find($id);
        $oferta->fill($request->toArray());
        $oferta->id=$id;
        $oferta->user_id=$yo->user_id;
        $oferta->update();
       
        $oferta = Auth::user()->ofertasOp()->where('id',$id)->get();
        foreach ($oferta as $k) {
            $ofertas = $k;
        }

        return view('emp.editar-oferta-op')
            ->with('ofertas', $ofertas)
            ->with('exito', true)
            ->with('yo', $yo);
    }

    public function interes(){
        $yo = Auth::user()->empresa;
        //$perfiles = $yo->interes()->orderBy('created_at', 'DESC')->get();

        $perfiles = Profesional::whereHas('user', function($q){
           $q->where('permiso', 1);
        })->whereHas('interes', function($q){
           $q->where('empresa', Auth::user()->empresa->id);
        })
        ->paginate(12);

        return view('emp.perfiles')
            ->with('perfiles', $perfiles)
            ->with('yo', $yo);
    }

    public function meInteresa(Request $request)
    {
        $interes = new Interes();
        $interes->profesional = $request->idP;
        $interes->empresa = Auth::user()->empresa->id;

        if($interes->save())
        {
            $yo = Auth::user()->empresa;
            $el = Profesional::find($request->idP);

            $mensaje = '<h2>Empresa Interesada en un Perfil</h2>
                <br>
                <p>Una empresa ha indicado que le interesa un perfil profesional.</p>
                <br>
                <p>RUT empresa: '.Auth::user()->name.'</p>
                <p>Industria cliente: '.DB::table('industria')->where('id', $yo->industria)->first()->industria.'</p>
                <p>Contacto: '.$yo->contacto.'</p>
                <p>Email: '.$yo->email.'</p>
                <p>Teléfono: '.$yo->fono.'</p>
                <p>Comuna: '.DB::table('comuna')->where('id', $yo->comuna_id)->first()->comuna.'</p>
                <br>
                <h2>Datos del Profesional</h2>
                <br>
                <p>Nombre: '.$el->nombre.'</p>
                <p>RUT: '.$el->user->name.'</p>
                <p>Título: '.$el->titulos->profesion.'</p>
                <p>Email: '.$el->email.'</p>
                <p>Teléfono: '.$el->fono.'</p>
                <p>Comuna: '.DB::table('comuna')->where('id', $el->comuna_id)->first()->comuna.'</p>';

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            if(mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Empresa Interesada en un Perfil', $mensaje, $cabeceras))
            {
                return 1;
            }
        } else {
            return 66;
        }
    }

    public function postulaciones($id)
    {
        $yo = Auth::user()->empresa;
        $oferta = Oferta::find($id);

        $perfiles = Profesional::whereHas('user', function($q){
           $q->where('permiso', 1);
        })->whereHas('postulacion', function($q) use ($id){
           $q->where('oferta_id', $id);
        })
        ->paginate(10);

        return view('emp.postulaciones')
            ->with('oferta', $oferta)
            ->with('perfiles', $perfiles)
            ->with('yo', $yo);
    }

    public function estadoPostulacion(Request $request)
    {
        if(Auth::user()->tipo == 2)
        {
            $pos = Postulacion::where('oferta_id', $request->idOf)->where('profesional', $request->idPos)->where('estado', 0)->first();
            $pos->estado = $request->estado;
            $pos->save();

            if($pos->estado == $request->estado)
            {
                $oferta = Oferta::find($request->idOf);
                $profesional = Profesional::find($request->idPos);

                $mensaje = '<h2>Resultado de tu Postulación</h2>
                    <br>
                    <p><b>Cargo: </b> '.$oferta->cargo.'</p>
                    <br>
                    <p>Estimado postulante, gusto saludarte.</p>';

                    if($request->estado == 1)
                    $mensaje .= '<p>Informarte que tu curriculum ha sido seleccionado en la primera fase de "Selección de Curricular" para el cargo al cual te encuentras postulando.</p>
                    <p>Pronto, uno de nuestros ejecutivos se contactará con Ud para invitarlo a una entrevista personal con nuestro cliente.</p>';

                    if($request->estado == 2)
                    $mensaje .= '<p>Te informamos que en esta oportunidad tu curriculum no fue seleccionado para el cargo al cual estabas postulando. Té instamos a que sigas postulando a nuestras ofertas laborales. Si deseas más información o nuestra asesoría, contáctanos.</p>';
                    
                    $mensaje .= '<br><p>Atentamente, Ascending consulting</p>';

                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                
                if(mail($profesional->email, 'Ascending Consulting - Resultado Postulación', $mensaje, $cabeceras))
                {
                    return $pos->estado;
                } else {
                    return 66;
                }
            } else {
                return 66;
            }
        } else {
            return 66;
        }
    }
}