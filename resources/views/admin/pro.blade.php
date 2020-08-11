@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="titulo-card">
            Datos Personales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Título profesional:</b></td>
                    <td width="70%">{{ $pro->titulos->profesion }}</td>
                </tr><tr>
                    <td><b>AFP:</b></td>
                    <td>{{ \DB::table('afps')->where('id', $pro->afp)->first()->afp }}</td>
                </tr><tr>
                    <td><b>Salud:</b></td>
                    <td>{{ \DB::table('isapres')->where('id', $pro->salud)->first()->isapre }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="titulo-card">
            Resumen Ejecutivo
        </div>
        <p>{{ $pro->resumen }}</p>
        <br>
        <div class="titulo-card">
            Situación Laboral Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%">{{ $pro->situacion() }}</td>
                </tr><tr>
                    <td><b>Expectativas de Renta:</b></td>
                    <td>{{ $pro->renta }}</td>
                </tr><tr>
                @if($pro->situacion != 0)
                    <td><b>Cargo que desempeña:</b></td>
                    <td>{{ $pro->cargo }}</td>
                </tr><tr>
                @endif
                    <td><b>¿Por qué te deberían contratar?:</b></td>
                    <td>{{ $pro->porque }}</td>
                </tr>
            </table>
        </div>
        <br>
        @if($pro->situacion != 0 && $pro->user->experiencias->count() > 0)
        <div class="titulo-card">
            Experiencia
        </div>
        <div class="table-responsive">
            @foreach($pro->user->experiencias as $xp)
            <table class="table table-bordered">
                @if(!empty($xp->cargo))
                  <tr style="background-color:#CCC;color:#000">
                    <th scope="row">Cargo</th>
                    <td width="70%">{{ $xp->cargo }}</td>
                  </tr>
                @endif
                @if(!empty($xp->empresa))
                  <tr>
                    <th scope="row">Empresa</th>
                    <td>{{ $xp->empresa }}</td>
                  </tr>
                @endif
                @if(!empty($xp->industria))
                  <tr>
                    <th scope="row">Industria</th>
                    <td>{{ DB::table('industria')->where('id', $xp->industria)->first()->industria }}</td>
                  </tr>
                @endif
                @if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta))
                  <tr>
                    <th scope="row">Periodo</th>
                    <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                  </tr>
                @endif
                @if(!empty($xp->responsabilidades))
                  <tr>
                    <th scope="row">Responsabilidades</th>
                    <td>{{ $xp->responsabilidades }}</td>
                  </tr>
                @endif
                @if(!empty($xp->logros))
                  <tr>
                    <th scope="row">Logros</th>
                    <td>{{ $xp->logros }}</td>
                  </tr>
                @endif
            </table>
            @endforeach
        </div>
        <br>
        @endif
        <div class="titulo-card">
            Situación Académica Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%">{{ $pro->situacion_acad() }}</td>
                </tr><tr>
                    <td><b>Dominio de inglés:</b></td>
                    <td>{{ $pro->ingles() }}</td>
                </tr>
            </table>
        </div>
        <br>
        @if($pro->user->formacion->count() > 0)
        <div class="titulo-card">
            Formación
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Profesión, Diplomado o Mágister</th>
                  <th scope="col">Casa de Estudios</th>
                  <th scope="col">Periodos</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pro->user->formacion as $xp)
                  <tr>
                    <td>{{ $xp->profesion }}</td>
                    <td>{{ DB::table('casas')->where('id', $xp->casa)->first()->casa }}</td>
                    <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <br>
        @endif
        </div>
    </div>
</div>
@endsection
