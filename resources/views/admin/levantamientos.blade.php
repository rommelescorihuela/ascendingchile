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
                              <th scope="col">Ubicaci贸n en Estructura</th>
                              <th scope="col">Superior</th>
                              <th scope="col">Supervisa</th>
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
                                <td>
                                  <button onclick="permitir({{ $pro->id }})" class="btn btn-success">Permitir</button>
                                  <button onclick="supender({{ $pro->id }})" style="margin-top: 5px" class="btn btn-default">Supender</button>
                                  <button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar({{ $pro }})">Eliminar</button>
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
    
function eliminar(levantamiento){
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
        url: "{{ url('/eliminar-levantamiento') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            id: levantamiento.id,
        },
        success: function (response) {
            $('[data-id=' + levantamiento.id + ']').remove();
        }
      });
    }
  })
}
</script>
@endsection
