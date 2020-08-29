@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 3])
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Ofertas Laborales</div>
            </div>
            
                <div class="card-body">
                    @if(count($pros) >= 1)
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Empresa</th>
                              <th scope="col">Industria</th>
                              <th scope="col">Cargo</th>
                              <th scope="col">Ciudad</th>
                              <th scope="col">Más info</th>
                              <th scope="col">Acceso</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pros as $pro)
                            <tr data-id="{{ $pro->id }}">
                                <td>{{ $pro->user->name }}</td>
                                <td>{{ DB::table('industria')->where('id', $pro->industria)->first()->industria }}</td>
                                <td>{{ $pro->cargo }}</td>
                                <td>{{ $pro->ciudad }}</td>
                                <td>
                                  <a class="btn btn-info" data-toggle="modal" data-target="#perfil-oferta-{{ $pro->id }}"><i class="fa fa-info" aria-hidden="true"></i></a>
                                </td>
                                <td id="controles-{{ $pro->id }}">
                                  @if($pro->estado == 0)
                                  <p><span class="label label-danger">Suspendido</span></p> 
                                  <button onclick="aprobar({{ $pro->id }},1)" class="btn btn-success">Permitir</button>
                                  @else
                                  <p><span class="label label-success">Permitido</span></p>
                                  <button onclick="aprobar({{ $pro->id }},0)" style="margin-top: 5px" class="btn btn-default">Supender</button>
                                  @endif
                                  <button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar({{ $pro }})">Eliminar</button>
                                  <br><p><a href="editar-oferta/{{ $pro->id }}" class="btn btn-warning btn-sm">editar</a></p>
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


@foreach($pros as $pro)
  @include('admin/ofertas-modal', ['pro' => $pro])
@endforeach

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
        url: "{{ url('/eliminar-oferta') }}",
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
<script>
  function aprobar(id, eo){
  $.ajax({
    url: "{{ url('/estado-ofer') }}",
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
            $('#controles-'+id).html('<p><span class="label label-success">Permitido</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Suspender</button><br><a href="editar-oferta/'+id+'" class="btn btn-warning btn-sm">editar</a></p>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Permitir</button><br><a href="editar-oferta/'+id+'" class="btn btn-warning btn-sm">editar</a></p>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. Inténtalo más tarde.');
        }
    }
  });
}

</script>
@endsection
