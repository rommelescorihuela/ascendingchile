@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 4])
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Levantamientos de perfil</div>
        </div>

                <div class="card-body">
                    @if(count($pros) >= 1)
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Empresa</th>
                              <th scope="col">Cargo</th>
                              <th scope="col">Ubicaci√≥n en Estructura</th>
                              <th scope="col">Superior</th>
                              <th scope="col">Supervisa</th>
                              <th scope="col">Mas Info</th>
                              <th scope="col">Acceso</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pros as $pro)
                            <tr data-id="{{ $pro->id }}">
                                <td>{{ $pro->user->name }}</td>
                                <td>{{ $pro->cargo }}</td>
                                <td>{{ $pro->ubicacion }}</td>
                                <td>{{ $pro->superior }}</td>
                                <td>{{ $pro->supervisa }}</td>
                                <td><a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-levantamiento-{{ $pro->id }}"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                @php $permiso = DB::table('users')->find($pro->user_id); @endphp
                                <td id="controles-{{ $pro->user_id }}">
                                   @if($permiso->permiso == 1)
                                  <p><span class="label label-success">Permitido</span></p><button onclick="aprobar({{ $pro->user_id }},1)" class="btn btn-success">Permitir</button>
                                  @else
                                  <p><span class="label label-danger">Suspendido</span></p><button onclick="aprobar({{ $pro->user_id }},0)" style="margin-top: 5px" class="btn btn-default">Supender</button>
                                  @endif
                                  <!--<button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar({{ $pro }})">Eliminar</button>-->
                                  <p><a href="levantamiento-perfil/{{ $pro->id }}" class="btn btn-warning btn-sm">editar</a></p>
                                </td>
                              </tr>
                            @endforeach
                        </table>
                    @endif

                    {{ $pros->links() }}
                </div>
            
        </div>
    </div>
</div>

<script>
    
function aprobar(id, eo){
  $.ajax({
    url: "{{ url('/estado-lev') }}",
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
            $('#controles-'+id).html('<p><span class="label label-success">Permitido</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Suspender</button><br><a href="perfil1/{{ $pro->id }}">editar</a></p>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Permitir</button><br><a href="perfil1/{{ $pro->id }}">editar</a></p>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. IntÈntalo m·s tarde.');
        }
    }
  });
}

function eliminar(id){
  Swal.fire({
    title: 'øEstas seguro?',
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
        url: "{{ url('/eliminar-pros') }}",
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
</script>
</script>
@endsection
@if(isset($pros) && count($pros) > 0)
  @foreach($pros as $prof)
    @include('admin.modal-levantamiento',['pro' => $prof])
  @endforeach
@endif