@extends('layouts.app')

@section('assets_adicionales')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu', ['cual' => 6])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ofertas Laborales</div>
            </div>
            <br>
            <form method="get">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Industria</label>
                        <select name="industria" class="form-control select2">
                            <option></option>
                            @foreach($industrias as $ind)
                            <option value="{{ $ind->industria }}" {{ ($ind->industria == request('industria') ? 'selected':'') }}>{{ $ind->nombreIndustria($ind->industria) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ciudad</label>
                        <select name="ciudad" class="form-control select2">
                            <option></option>
                            @foreach($ciudades as $city)
                            <option value="{{ $city->ciudad }}" {{ ($city->ciudad == request('ciudad') ? 'selected':'') }}>{{ $city->ciudad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo de Jornada</label>
                        <select name="jornada" class="form-control select2">
                            <option value="" selected disabled></option>
                            <option value="Full Time" {{ (request('jornada') == 'Full Time' ? 'selected':'') }}>Full Time</option>
                            <option value="Part Time" {{ (request('jornada') == 'Part Time' ? 'selected':'') }}>Part Time</option>
                            <option value="Temporada" {{ (request('jornada') == 'Temporada' ? 'selected':'') }}>Temporada</option>
                            <option value="Freelance" {{ (request('jornada') == 'Freelance' ? 'selected':'') }}>Freelance</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary pull-right">Aplicar filtros</button>
                </div>
            </div>
            </form>
            @if(count($ofertas) >= 1)
            <br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            @foreach($ofertas as $xp)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading{{ $xp->id }}">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $xp->id }}" aria-expanded="false" aria-controls="collapse{{ $xp->id }}">+ Info</a>
                    @if($xp->postulacion->where('profesional', Auth::user()->profesional->id)->count() > 0)
                        @if($xp->postulacion->where('profesional', Auth::user()->profesional->id)->first()->estado == 1)
                        <button type="button" class="btn btn-success pull-right" style="margin: 0 5px;" disabled><i class="fa fa-check-square-o" aria-hidden="true"></i> Aceptado</button>
                        @elseif($xp->postulacion->where('profesional', Auth::user()->profesional->id)->first()->estado == 2)
                        <button type="button" class="btn btn-danger pull-right" style="margin: 0 5px;" disabled><i class="fa fa-ban" aria-hidden="true"></i> Rechazado</button>
                        @else
                        <button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Postulando</button>
                        @endif
                    @else
                    <span id="oferta-{{ $xp->id }}" class="pull-right"><button type="button" class="btn btn-default" onclick="postular({{ $xp->id }})" style="margin: 0 5px;">Postular</button></span>
                    @endif
                    <h4 class="panel-title">
                      {{ $xp->cargo }}
                    </h4>
                    <small>{{ \Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y') }} | {{ $xp->ciudad }}</small>
                </div>
                <div id="collapse{{ $xp->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $xp->id }}">
                  <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <td width="30%"><b>Industria:</b></td>
                            <td>{{ DB::table('industria')->where('id', $xp->industria)->first()->industria }}</td>
                        </tr><tr>
                            <td><b>Lugar de Trabajo:</b></td>
                            <td>{{ $xp->lugar }}</td>
                        </tr><tr>
                            <td><b>Jornada:</b></td>
                            <td>{{ $xp->jornada }}</td>
                        </tr><tr>
                            <td><b>Descripción General:</b></td>
                            <td>{{ $xp->descripcion }}</td>
                        </tr><tr>
                            <td><b>Requisitos Excluyentes:</b></td>
                            <td>{{ $xp->excluyentes }}</td>
                        </tr><tr>
                            <td><b>Requisitos Deseables:</b></td>
                            <td>{{ $xp->deseables }}</td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td>{{ $xp->beneficios }}</td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td>{{ $xp->porque }}</td>
                        </tr>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
            <br>
            {{ $ofertas->links() }}
            @else
            No hay ofertas laborales disponibles.
            @endif
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
@if(isset($yo))
    @include('pro.modal-perfil')
@endif
<script>
$(document).ready(function() {
    $('.select2').select2();
});

function postular(idOf){
    var confirma = confirm("Vas a postular a esta oferta laboral.");
    if(confirma){
        $.ajax({
            url: "{{ url('/postular') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {
                idOf: idOf,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('#oferta-'+idOf).html('<button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Postulando</button>');
                }
                else {
                    alert('No se pudo realizar la postulación. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
@endsection
