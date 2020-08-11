@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('emp.menu', ['cual' =>4])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                @if($oferta->estado == 0)
                <span class="label label-danger pull-left">Inactiva</span><br>
                @endif
                <div class="card-header">
                    <small>Perfiles Postulando al Cargo</small><br>
                    "{{ $oferta->cargo }}"
                </div>
            </div>
<br>
            @if(count($perfiles) >= 1)
              @foreach($perfiles as $pro)
                <div class="clearfix" id="postula-{{ $pro->id }}" style="margin-bottom: 10px;">
                    <h4 class="pull-left">{{ $pro->titulos->profesion }}<br><small><i>Registrado el {{ \Carbon\Carbon::parse($pro->created_at)->format('d-m-Y') }}</i></small></h4>

                    <a class="btn btn-info pull-right" style="margin-left: 5px;" data-toggle="modal" data-target="#info-perfil-{{ $pro->id }}">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>

                    @php
                    $estado = $pro->estadoPostulacion($oferta->id);
                    @endphp
                    @if($estado == 1)
                    <span class="label label-success pull-right">Aceptado</span>
                    @elseif($estado == 2)
                    <span class="label label-danger pull-right">Rechazado</span>
                    @else
                        @if($oferta->estado == 1)
                        <a class="btn btn-danger pull-right botones-estado" style="margin-left: 5px;" onclick="estado({{ $pro->id }},2)">Rechazar</a>

                        <a class="btn btn-success pull-right botones-estado" style="margin-left: 5px;" onclick="estado({{ $pro->id }},1)">Aceptar</a>
                        @endif
                    @endif
                </div>
                <hr>
              @endforeach
              <p class="">{{ $perfiles->links() }}</p>
            @else
            No ha seleccionado perfiles de su interés.
            @endif
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
    @if(isset($perfiles) && count($perfiles) > 0)
        @foreach($perfiles as $pro)
            @include('modal-perfil', ['desde' => 2])
        @endforeach
    @endif
<script>
function estado(id, eo){
    var msg = (eo == 1 ? 'aceptar':'rechazar');
    var confirma = confirm("¿Está seguro que desea "+msg+" este postulante?");
    if(confirma){
        $.ajax({
            url: "{{ url('/estado-postulacion') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {
                idOf: {{ $oferta->id }},
                idPos: id,
                estado: eo,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('.botones-estado', '#postula-'+id).remove();
                    $('#postula-'+id).append('<span class="label label-success pull-right">Aceptado</span>');
                }
                else if(response == 2)
                {
                    $('.botones-estado', '#postula-'+id).remove();
                    $('#postula-'+id).append('<span class="label label-danger pull-right">Rechazado</span>');
                }
                else {
                    alert('No se pudo cambiar el estado de la postulación. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
@endsection
