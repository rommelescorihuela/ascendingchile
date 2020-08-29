@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('emp.menu', ['cual' => 4])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Ofertas Laborales (operativos)</div>
                <p class="text-right"><a class="btn btn-success" href="{{ route('mis-ofertas') }}" style="margin-left: 10px;">Perfiles Profesionales <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
            </div>
<br>
            @if(count($ofertas) >= 1)
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            @foreach($ofertas as $xp)
            <div class="panel panel-default" data-id="{{ $xp->id }}">
                <div class="panel-heading" role="tab" id="heading{{ $xp->id }}">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $xp->id }}" aria-expanded="false" aria-controls="collapse{{ $xp->id }}">+ Info</a>
                    @if($xp->estado == 1)
                    <button type="button" class="btn btn-default pull-right boton-estado" onclick="activar({{ $xp->id }},0)" style="margin: 0 5px;">Desactivar</button>
                    @else
                    <button type="button" class="btn btn-default pull-right boton-estado" onclick="activar({{ $xp->id }},1)" style="margin: 0 5px;">Activar</button>
                    @endif
                    <h4 class="panel-title">
                      {{ $xp->cargo }}
                    </h4>
                    @if($xp->estado == 1)
                        <span class="label label-success etiqueta">Activa</span>
                    @else
                        <span class="label label-danger etiqueta">Inactiva</span>
                    @endif
                    <small>&nbsp; {{ \Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y') }} | {{ $xp->ciudad }}</small>
                </div>
                <div id="collapse{{ $xp->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $xp->id }}">
                  <div class="panel-body">
                    <div class="text-right" style="margin-bottom: 10px;">
                        @php
                            $postu = $xp->postulacion->count();
                        @endphp
                        @if($postu > 0)
                            {{ $postu.($postu == 1 ? ' postulante':' postulantes') }} <a class="btn btn-success" href="{{ route('postulaciones', $xp->id) }}" style="margin-left: 10px;">Ver <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        @else
                            Sin postulantes.
                        @endif
                    </div>
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr data-id="{{ $xp->id }}">
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
                            <td><b>Renta Fija:</b></td>
                            <td>{{ $xp->renta_fija }}</td>
                        </tr><tr>
                            <td><b>Renta Variable:</b></td>
                            <td>{{ $xp->renta_variable }}</td>
                        </tr><tr>
                            <td><b>Bonos:</b></td>
                            <td>{{ $xp->bonos }}</td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td>{{ $xp->beneficios }}</td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td>{{ $xp->porque }}</td>
                        </tr>
                        <tr><td><a href="editar-oferta-op/{{$xp->id}}" class="btn btn-primary">Editar</a>
                        <a href="customer/Empresaofertaopprint-pdf/{{$xp->id}}" class="btn btn-default">PrintPDF</a>
                        </td><td><button class="btn btn-danger" style="margin-top: 0px" onclick="eliminar({{ $xp }})">Eliminar</button></td>
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
<script>
function activar(id, eo){
    var msg = (eo == 1 ? 'activar':'desactivar');
    var confirma = confirm("¿Está seguro que desea "+msg+" esta oferta?");
    if(confirma){
        $.ajax({
            url: "{{ url('/estado-oferta') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {
                idOf: id,
                estado: eo,
            },
            success: function (response) {
                if(response == 1)
                {
                    //$('#controles-'+id).html('<p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Ocultar</button>');
                    $('.etiqueta', '#heading'+id).removeClass('label-danger').addClass('label-success').html('Activa');
                    $('.boton-estado', '#heading'+id).html('Desactivar').attr('onclick', 'activar('+id+',0)');
                }
                else if(response == 0)
                {
                    //$('#controles-'+id).html('<p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Aprobar</button>');
                    $('.etiqueta', '#heading'+id).removeClass('label-success').addClass('label-danger').html('Inactiva');
                    $('.boton-estado', '#heading'+id).html('Activar').attr('onclick', 'activar('+id+',1)');
                }
                else {
                    alert('No se pudo cambiar el estado de la oferta. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
<script>
    
function eliminar(oferta){
  Swal.fire({
    title: '¿Estás seguro?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "{{ url('/eliminar-ofertaop') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            id: oferta.id,
        },
        success: function (response) {
            $('[data-id=' + oferta.id + ']').remove();
        }
      });
    }
  })
}
</script>
@endsection
