@extends('layouts.app')

@section('assets_adicionales')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>
@endsection

@section('content')
<div class="container py-5 perfiles">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center" id="service">
                <h3>Perfiles Profesionales</h3>
                <br><br>
            </div>
        </div>

        @auth
        <div class="col-md-4" style="padding-right: 5%;">
            <h4>Filtrar por:</h4>
            @if(!is_null( request('industria') ))
            <span class="badge badge-pill badge-info">{{ DB::table('industria')->where('id', request('industria'))->first()->industria }}</span>
            @endif
            @if(!is_null( request('titulo') ))
            <span class="badge badge-pill badge-info">{{ \App\Titulo::find(request('titulo'))->profesion }}</span>
            @endif
            @if(!is_null( request('experiencia') ))
            <span class="badge badge-pill badge-info">
                @switch(request('experiencia'))
                    @case(2)
                        Menos de 2 años
                        @break
                    @case(3)
                        Entre 3 y 5 años
                        @break
                    @case(4)
                        Entre 6 y 10 años
                        @break
                    @case(5)
                        Mayor a 11 años
                        @break
                    @default
                        Sin experiencia
                @endswitch
            </span>
            @endif
            @if(!is_null( request('comuna') ))
            <span class="badge badge-pill badge-info">{{ \App\Comuna::find(request('comuna'))->comuna }}</span>
            @endif
            @if(!is_null( request('genero') ))
            <span class="badge badge-pill badge-info">
                @switch(request('genero'))
                    @case(1)
                        Femenino
                        @break
                    @case(2)
                        Otro
                        @break
                    @default
                        Masculino
                @endswitch
            </span>
            @endif

            @if(count($_GET) >= 1)
            <br>
            @endif
            <br>
            <form method="get">
                <p>Industria <br><select name="industria" class="form-control select2">
                    <option></option>
                    @foreach($industrias as $ind)
                    <option value="{{ $ind->industria }}" {{ ($ind->industria == request('industria') ? 'selected':'') }}>{{ $ind->nombreIndustria($ind->industria) }}</option>
                    @endforeach
                </select></p>
                <p>Profesión <br><select name="titulo" class="form-control select2">
                    <option></option>
                    @foreach($titulos as $tit)
                    <option value="{{ $tit->titulo }}" {{ ($tit->titulo == request('titulo') ? 'selected':'') }}>{{ $tit->profesion }}</option>
                    @endforeach
                </select></p>
                <p>Experiencia <br><select name="experiencia" class="form-control select2">
                    <option></option>
                    <option value="1" {{ (request('experiencia') == '1' ? 'selected':'') }}>Sin experiencia</option>
                    <option value="2" {{ (request('experiencia') == '2' ? 'selected':'') }}>Menos de 2 años</option>
                    <option value="3" {{ (request('experiencia') == '3' ? 'selected':'') }}>Entre 3 y 5 años</option>
                    <option value="4" {{ (request('experiencia') == '4' ? 'selected':'') }}>Entre 6 y 10 años</option>
                    <option value="5" {{ (request('experiencia') == '5' ? 'selected':'') }}>Mayor a 11 años</option>
                </select></p>
                <p>Comuna <br><select name="comuna" class="form-control select2">
                    <option></option>
                    @foreach($comunas as $com)
                    <option value="{{ $com->comuna_id }}" {{ ($com->comuna_id == request('comuna') ? 'selected':'') }}>{{ $com->comuna }}</option>
                    @endforeach
                </select></p>
                <!--p>Género <br><select name="genero" class="form-control select2">
                    <option></option>
                    <option value="1" {{ (request('genero') == '1' ? 'selected':'') }}>Femenino</option>
                    <option value="0" {{ (request('genero') == '0' ? 'selected':'') }}>Masculino</option>
                    <option value="2" {{ (request('genero') == '2' ? 'selected':'') }}>Otro</option>
                </select></p-->
                <br>
                <p><button class="btn btn-primary">Aplicar filtros</button></p>
            </form>
            @if(count($_GET) >= 1)
            <p style="margin-top: 10px;"><form><button class="btn btn-link">Limpiar filtros</button></form></p>
            @endif
            <br>
        </div>
        @endauth

        @if(isset($profesionales) && count($profesionales) > 0)
        <div class="col-md-8 {{ (Auth::check() ? '':'col-md-offset-2') }}">
            @foreach($profesionales as $pro)
            <div class="clearfix" style="margin-bottom: 10px;">
                <h4 class="pull-left">{{ $pro->titulos->profesion }}<br><small><i>Registrado el {{ \Carbon\Carbon::parse($pro->created_at)->format('d-m-Y') }}</i></small></h4>

                <a class="btn btn-info pull-right" style="margin-left: 5px;" data-toggle="modal" data-target="#info-perfil-{{ $pro->id }}">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>
                @auth
                    @if(Auth::user()->tipo == 2)
                        @if(Auth::user()->empresa->interesado($pro->id))
                        <!--span class="label label-success pull-right">Interesado <i class="fa fa-star" aria-hidden="true"></i></span-->
                        <button class="btn btn-link pull-right" disabled>Interesado <i class="fa fa-star" aria-hidden="true"></i></button>
                        @else
                        <span class="pull-right interes-{{ $pro->id }}"><button class="btn btn-primary" onclick="interes({{ $pro->id }})">Me interesa &nbsp; <i class="fa fa-thumb-tack" aria-hidden="true"></i></button></span>
                        @endif
                    @endif
                @endauth
            </div>
            <hr>
            @endforeach
            @auth
            {{ $profesionales->links() }}
            @endauth
        </div>
        @else
            @auth
            <div class="col-md-8">
                @if(count($_GET) >= 1)
                <h4>Ningún perfil coincide con los criterios de búsqueda seleccionados.</h4>
                @else
                <h3>Por el momento, no hay profesionales disponibles.</h3>
                @endif
            </div>
            @else
            <div class="col-md-12 text-center">
                <h3>Por el momento, no hay profesionales disponibles.</h3>
            </div>
            @endauth
        @endif
        @guest
        <div class="col-md-12 text-center">
            <br>
            <h3>Para ver todos los perfiles</h3>
            <br>
            <a href="{{ route('registro-empresa') }}" class="btn btn-style-one text-center">Regístrate aquí</a>
        </div>
        @endguest
    </div>
</div>
@endsection

@section('script_adicional')
    @if(isset($profesionales) && count($profesionales) > 0)
        @foreach($profesionales as $pro)
            @include('modal-perfil')
        @endforeach
    @endif
<script>
function interes(p){
    var confirma = confirm("¿Te interesa este perfil?");
    if(confirma){
        $.ajax({
            url: "{{ url('/me-interesa') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {
                idP: p,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('.interes-'+p).html('<button class="btn btn-link pull-right" disabled>Interesado <i class="fa fa-star" aria-hidden="true"></i></button>');
                }
                else {
                    alert('No se pudo registrar su interés por el perfil seleccionado. Inténtalo más tarde.');
                }
            }
          });
    }
}

$(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Seleccione...',
      allowClear: true,
    });
});
</script>
@endsection