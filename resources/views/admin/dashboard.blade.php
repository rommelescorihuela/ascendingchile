@extends('layouts.app')

@section('content')


<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 1])
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Profesionales</div>
            </div>
          <div class="col-md-12">
              <div class="col-md-12">Buscador</div>
            <form class="form-inline">
              <div class="col-md-3" style="margin-right: 1%;"><input name="titulo" class="form-control" type="search" placeholder="Titulo" aria-label="Search"></div>
              <div class="col-md-4" style="margin-right: 1.5%;"><select id="profesion" class="form-control " style="width: 275px" name="profesion">
                                    <option value="" selected disabled>Seleccione Profesion...</option>
                                    @php
                                        $profesiones = DB::table('profesiones')->get()->sortBy('profesiones');
                                    @endphp
                                    @foreach($profesiones as $profesion)
                                        <option value="{{ $profesion->id }}">{{ $profesion->profesion }}</option>
                                    @endforeach
                                </select></div>
              <div class="col-md-3"><select id="acceso" class="form-control" name="acceso">
                                    <option value="" selected disabled>Seleccione Acceso...</option>
                                        <option value="0">Suspendido</option>
                                        <option value="1">permitido</option>
                                </select></div>
              <div class="col-md-1"><button class="btn btn-outline-success" type="submit">Buscar</button></div>
          </form>
        </div>

        <div class="col-md-12 my-5" style="height: 1%;"></div>
            @if(count($pros) >= 1)

            <div class="table-responsive col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Datos Personales</th>
                      <th scope="col">Título</th>
                      <th scope="col">Contacto</th>
                      <th scope="col" width="1">Foto</th>
                      <th>Más Info</th>
                      <th>Acceso</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pros as $pro)
                      <tr data-id="{{ $pro->id }}">
                        <td>
                          <b>RUT:</b> <span id="nombre-{{ $pro->id }}">{{ $pro->name }}</span><br>
                          @if(!is_null($pro->profesional))
                          <b>Nombre:</b> {{ $pro->profesional->nombre }}
                          @endif
                        </td>
                        <td>
                          @if(!is_null($pro->profesional))
                          {{ $pro->profesional->titulos->profesion }}
                          @endif
                        </td>
                        <td>
                          @if(!is_null($pro->profesional))
                          <b>Email:</b> {{ $pro->profesional->email }}<br>
                          <b>Teléfono:</b> {{ $pro->profesional->fono }}
                          @endif
                        </td>
                        <td>
                            @if(!is_null($pro->profesional))
                            <img src="{{ Storage::disk('usuarios')->url($pro->profesional->foto) }}" class="img-perfil perfil-admin" width="100" height="100">
                            @endif
                        </td>
                        <td>
                          {{--<!--button class="btn btn-group" onclick="mostrar({{ $pro->id }})"><i class="fa fa-info" aria-hidden="true"></i></button-->
                          <!--a class="btn btn-info" href="{{ route('info-pro', $pro->id) }}" target="_blank"><i class="fa fa-info" aria-hidden="true"></i></a-->--}}
                          @if(!is_null($pro->profesional))
                            <a class="btn btn-info" data-toggle="modal" data-target="#info-perfil-{{ $pro->profesional->id }}"><i class="fa fa-info" aria-hidden="true"></i></a>
                          @endif
                        </td>
                        <td id="controles-{{ $pro->id }}">
                        @if($pro->permiso == 1)
                          <p><span class="label label-success">Permitido</span></p><button class="btn btn-default" onclick="aprobar({{ $pro->id }}, 0)">Suspender</button>
                        @else
                          <p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info" onclick="aprobar({{ $pro->id }}, 1)">Permitir</button>
                        @endif
                        <p><button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar({{ $pro->id }})">Eliminar</button></p>
                        <p><a href="perfil1/{{ $pro->id }}">editar</a></p>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            {{ $pros->links() }}
            @endif
        </div>
    </div>
</div>
@endsection


@section('script_adicional')
    @if(isset($pros) && count($pros) > 0)
        @foreach($pros as $prof)
            @if(!is_null($prof->profesional))
              @include('modal-perfil', ['pro' => $prof->profesional])
            @endif
        @endforeach
    @endif

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function mostrar(id){
  $('#myModalLabel').html( $('#nombre-'+id).html() );

  $.ajax({
    url: "{{ url('/info-pros') }}",
    method: "POST",
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
    },
    data: {
        idEmp: id,
    },
    success: function (response) {
        if(response.tipo == 1)
        {
            var cuerpo = "";
            if(Object.keys(response.usuario).length == 0){
              cuerpo = "Registro incompleto.";
            } else {
              cuerpo = '<b>Fecha de nacimiento:</b> '+(response.usuario.fnac ?? '---');
            }

            $('.modal-body', '#myModal').html(cuerpo);
            $('#myModal').modal();
        }
        else {
            alert('No se pudo obtener la información. Inténtalo más tarde.');
        }
    }
  });
}

function aprobar(id, eo){
  $.ajax({
    url: "{{ url('/estado-pros') }}",
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
            $('#controles-'+id).html('<p><span class="label label-success">Permitido</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Suspender</button>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Permitir</button>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. Inténtalo más tarde.');
        }
    }
  });
}

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
@endsection
