<?php

namespace App\Http\Middleware;

use Closure;

class VerificaTipoPerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tipo = null)
    {
        $tipos = explode("|", $tipo);
        foreach($tipos as $tipo) {
            if( $request->user()->tipo == $tipo ) {
                return $next($request);
            }
        }
        #abort(403, "No tienes autorización para ingresar.");
        return redirect('/');
    }
}
