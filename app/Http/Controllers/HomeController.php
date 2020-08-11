<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use App\User;
use App\Profesional;
use App\Experiencia;
use App\winwin;
use App\contacto;
use App\Titulo;
use App\Comuna;
use Carbon\Carbon;
use App\Operativo;
use App\ExperienciaOp;

class HomeController extends Controller
{
    public function index()
    {
        $wws = winwin::where('permiso', 1)->limit(12)->get();
        return view('index')->with('wws', $wws);
    }

    public function contacto(Request $request)
    {
        $exito = false;

        $mensaje = '<h2>Contacto desde Ascending consulting</h2>
            <br>
            <p>Nombre: '.$request->nombre.'</p>
            <p>Teléfono: '.$request->fono.'</p>
            <p>Email: '.$request->email.'</p>
            <p>Asunto: '.$request->asunto.'</p>
            <p>Mensaje: '.$request->mensaje.'</p>';

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if(mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Contacto desde Ascending consulting', $mensaje, $cabeceras))
        {
            $cont = new contacto();
            $cont->fill($request->toArray());
            $cont->save();

            $exito = true;
        }

        return view('contacto')->with('exito', $exito);
    }

    public function winwin(Request $request)
    {
        $exito = false;

        $file = $request->file('logo');
        $file_tmp = Storage::disk('public')->put('logos', $file);
        $logo = basename($file_tmp);

        $winwin = new winwin();

        $winwin->fill($request->toArray());
        $winwin->logo = $logo;

        if($winwin->save())
        {
            $mensaje = '<h2>Registro de Empresa desde WinWin</h2>
                <br>
                <p>Sitio web: '.$request->web.'</p>
                <p>Descripción de servicios: '.$request->servicios.'</p>
                <p>Industria: '.DB::table('industria')->where('id', $request->industria)->first()->industria.'</p>
                <p>Email: '.$request->email.'</p>
                <p>Twitter: '.$request->twitter.'</p>
                <p>Instagram: '.$request->instagram.'</p>
                <p>Facebook: '.$request->facebook.'</p>
                <p>Teléfono: '.$request->fono.'</p>';

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            if(mail(env('MAIL_DESTINATARIO', 'aaron@dcmedia.cl'), 'Registro de Empresa desde WinWin', $mensaje, $cabeceras))
            {
                $exito = true;
            }
        }

        return view('winwin')->with('exito', $exito);
    }

    public function empresas()
    {
        $empresas = winwin::where('permiso', 1);

        if(!is_null(request('industria')))
        {
            $empresas->where('industria', request('industria'));
        }
		
		$industrias = winwin::select('industria')->where('permiso', 1)->groupBy('industria')->get();

        return view('empresas')->with('empresas', $empresas->limit(24)->get())->with('industrias', $industrias);
    }

    public function perfiles()
    {
        if(Auth::guest())
        {
            $profesionales = Profesional::whereHas('user', function($q){
               $q->where('permiso', 1);
            })->limit(12)->get();
        } else
        {
            $profesionales = Profesional::whereHas('user', function($q){
               $q->where('permiso', 1);
            });

            if(!is_null(request('industria')))
            {
                $industria = request('industria');
                $profesionales->whereHas('user', function($q) use($industria){
                    $q->where('permiso', 1)->whereHas('experiencias', function($r) use($industria){
                        $r->where('industria', $industria);
                    });
                });
            }
            if(!is_null(request('titulo')))
            {
                $profesionales->where('titulo', request('titulo'));
            }
            if(!is_null(request('experiencia')))
            {
                if(request('experiencia') > 1) {
                    switch (request('experiencia')) {
                        case 2:
                            $añosd = 2;
                            $añosh = 0;
                            break;
                        case 3:
                            $añosd = 5;
                            $añosh = 2;
                            break;
                        case 4:
                            $añosd = 10;
                            $añosh = 5;
                            break;
                        case 5:
                            $añosd = 100;
                            $añosh = 10;
                            break;
                    }
                    $antiguedad = Carbon::now()->subYears($añosd);
                    $antiguedah = Carbon::now()->subYears($añosh);
                    
                    $profesionales->whereHas('user', function($q) use($antiguedad, $antiguedah){
                        $q->where('permiso', 1)->whereHas('experiencias', function($r) use($antiguedad, $antiguedah){
                            $r->whereBetween('periodo_desde', [$antiguedad, $antiguedah]);
                        });
                    });
                } else {
                    $profesionales->whereHas('user', function($q){
                        $q->where('permiso', 1)->doesntHave('experiencias');
                    });
                }
            }
            if(!is_null(request('comuna')))
            {
                $profesionales->where('comuna_id', request('comuna'));
            }
            if(!is_null(request('genero')))
            {
                $profesionales->where('genero', request('genero'));
            }

            $profesionales = $profesionales->paginate(10);
        }
        if(count($profesionales) < 1 && Auth::guest())
        {
            return redirect()->route('registro-empresa');
        }
        else {
            $industrias = Experiencia::select('industria')->whereHas('user', function($q){
                $q->where('permiso', 1);
            })->groupBy('industria')->get();
            $titulos = Titulo::join('profesionals', 'profesionals.titulo', '=', 'profesiones.id')->get();
            $comunas = Comuna::join('profesionals', 'profesionals.comuna_id', '=', 'comuna.id')->get();

            return view('perfiles')
                ->with('profesionales', $profesionales)
                ->with('industrias', $industrias)
                ->with('titulos', $titulos)
                ->with('comunas', $comunas);
        }
    }

    public function perfilesOp()
    {
        if(Auth::guest())
        {
            $profesionales = Operativo::whereHas('user', function($q){
               $q->where('permiso', 1);
            })->limit(12)->get();
        } else
        {
            $profesionales = Operativo::whereHas('user', function($q){
               $q->where('permiso', 1);
            });

            if(!is_null(request('industria')))
            {
                $industria = request('industria');
                $profesionales->whereHas('user', function($q) use($industria){
                    $q->where('permiso', 1)->whereHas('experiencias', function($r) use($industria){
                        $r->where('industria', $industria);
                    });
                });
            }
            if(!is_null(request('titulo')))
            {
                $profesionales->where('titulo', request('titulo'));
            }
            if(!is_null(request('experiencia')))
            {
                if(request('experiencia') > 1) {
                    switch (request('experiencia')) {
                        case 2:
                            $añosd = 2;
                            $añosh = 0;
                            break;
                        case 3:
                            $añosd = 5;
                            $añosh = 2;
                            break;
                        case 4:
                            $añosd = 10;
                            $añosh = 5;
                            break;
                        case 5:
                            $añosd = 100;
                            $añosh = 10;
                            break;
                    }
                    $antiguedad = Carbon::now()->subYears($añosd);
                    $antiguedah = Carbon::now()->subYears($añosh);
                    
                    $profesionales->whereHas('user', function($q) use($antiguedad, $antiguedah){
                        $q->where('permiso', 1)->whereHas('experiencias', function($r) use($antiguedad, $antiguedah){
                            $r->whereBetween('periodo_desde', [$antiguedad, $antiguedah]);
                        });
                    });
                } else {
                    $profesionales->whereHas('user', function($q){
                        $q->where('permiso', 1)->doesntHave('experiencias');
                    });
                }
            }
            if(!is_null(request('comuna')))
            {
                $profesionales->where('comuna_id', request('comuna'));
            }
            if(!is_null(request('genero')))
            {
                $profesionales->where('genero', request('genero'));
            }

            $profesionales = $profesionales->paginate(10);
        }
        if(count($profesionales) < 1 && Auth::guest())
        {
            return redirect()->route('registro-empresa');
        }
        else {
            $comunas = Comuna::join('profesionals', 'profesionals.comuna_id', '=', 'comuna.id')->get();

            return view('perfiles-op')
                ->with('profesionales', $profesionales)
                ->with('industrias', "")
                ->with('titulos', "")
                ->with('comunas', $comunas);
        }
    }
}
