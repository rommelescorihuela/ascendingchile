@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 5])
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Win Win</div>
            </div>
<br>
            @if(count($pros) >= 1)
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Industria</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Contacto</th>
                      <th scope="col" width="1">Logo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pros as $pro)
                      <tr data-id="{{ $pro->id }}">
                        <td>{{ DB::table('industria')->where('id', $pro->industria)->first()->industria }}</td>
                        <td>{{ $pro->servicios }}</td>
                        <td><b>Sitio web:</b> {{ $pro->web }}<br>
                          <b>Email:</b> {{ $pro->email }}<br>
                          @if(!is_null($pro->fono))
                            <b>Teléfono:</b> {{ $pro->fono }}<br>
                          @endif
                          @if(!is_null($pro->twitter) || !is_null($pro->instagram) || !is_null($pro->facebook))
                            <button class="btn btn-group" title="Redes Sociales" data-toggle="popover" data-placement="top" data-content="
                            {{ (!is_null($pro->twitter) ? '<b>Twitter:</b> '.$pro->twitter.'<br>':'') }}
                            {{ (!is_null($pro->instagram) ? '<b>Instagram:</b> '.$pro->instagram.'<br>':'') }}
                            {{ (!is_null($pro->facebook) ? '<b>Facebook:</b> '.$pro->facebook.'<br>':'') }}
                            " data-html="true"><i class="fa fa-info" aria-hidden="true"></i></button>
                          @endif
                        </td>
                        <td>
                            <img src="{{ Storage::disk('public')->url('logos/'.$pro->logo) }}" class="img-perfil perfil-admin" width="100" height="100">
                        </td>
                        <td id="controles-{{ $pro->id }}">
                        @if($pro->permiso == 1)
                          <p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar({{ $pro->id }}, 0)">Ocultar</button>
                        @else
                          <p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar({{ $pro->id }}, 1)">Aprobar</button>
                        @endif
                        <p><button style="margin-top: 10px" onclick="eliminar({{ $pro->id }})" class="btn btn-danger">Eliminar</button></p>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                {{ $pros->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
<script>
function eliminar(id){
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
        url: "{{ url('/eliminar-winwin') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            idEmp: id,
        },
        success: function (response) {
            $('[data-id=' + id + ']').remove();
        }
      });
    }
  })
}

$(function () {
  $('[data-toggle="popover"]').popover()
});

function aprobar(id, eo){
  $.ajax({
    url: "{{ url('/estado-winwin') }}",
    method: "POST",
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
    },
    data: {
        idEmp: id,
        estado: eo,
    },
    success: function (response) {
        if(response == 1)
        {
            $('#controles-'+id).html('<p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Ocultar</button>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Aprobar</button>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. Inténtalo más tarde.');
        }
    }
  });
}
</script>
@endsection
