@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('ope.menu', ['cual' => 7])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Postulaciones</div>
            </div>
<br>
            @if(count($postu) >= 1)
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            @foreach($postu as $xp)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading{{ $xp->id }}">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $xp->id }}" aria-expanded="false" aria-controls="collapse{{ $xp->id }}">+ Info</a>
                    @if($xp->estado == 1)
                        <button type="button" class="btn btn-success pull-right" style="margin: 0 5px;" disabled><i class="fa fa-check-square-o" aria-hidden="true"></i> Aceptado</button>
                    @elseif($xp->estado == 2)
                        <button type="button" class="btn btn-danger pull-right" style="margin: 0 5px;" disabled><i class="fa fa-ban" aria-hidden="true"></i> Rechazado</button>
                    @else
                        <button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Pendiente</button>
                    @endif
                    <h4 class="panel-title">
                      {{ $xp->oferta->cargo }}
                    </h4>
                    <small>Fecha postulación: {{ \Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y') }} | {{ $xp->oferta->ciudad }}</small>
                </div>
                <div id="collapse{{ $xp->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $xp->id }}">
                  <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <td width="30%"><b>Industria:</b></td>
                            <td>{{ DB::table('industria')->where('id', $xp->oferta->industria)->first()->industria }}</td>
                        </tr><tr>
                            <td><b>Lugar de Trabajo:</b></td>
                            <td>{{ $xp->oferta->lugar }}</td>
                        </tr><tr>
                            <td><b>Jornada:</b></td>
                            <td>{{ $xp->oferta->jornada }}</td>
                        </tr><tr>
                            <td><b>Descripción General:</b></td>
                            <td>{{ $xp->oferta->descripcion }}</td>
                        </tr><tr>
                            <td><b>Requisitos Excluyentes:</b></td>
                            <td>{{ $xp->oferta->excluyentes }}</td>
                        </tr><tr>
                            <td><b>Requisitos Deseables:</b></td>
                            <td>{{ $xp->oferta->deseables }}</td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td>{{ $xp->oferta->beneficios }}</td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td>{{ $xp->oferta->porque }}</td>
                        </tr>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
            <br>
            {{ $postu->links() }}
            @else
            No tienes postulaciones activas.
            @endif
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
@if(isset($yo))
    @include('ope.modal-perfil')
@endif
<script>
</script>
@endsection
