@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 2])
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Empresas</div>
            </div>

                <div class="card-body">
                    @if(count($pros) >= 1)
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">RUT</th>
                              <th scope="col">Nombre</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pros as $pro)
                              <tr  data-id="{{ $pro->id }}">
                                <td>{{ $pro->name }}</td>
                                <td>
                                    @if(!is_null($pro->empresa))
                                    {{ $pro->empresa->nombre }}
                                    @endif
                                </td>
                                <td>
                                  <a target="_blank" href="{{ route('perfil-publico', $pro->id) }} " class="btn btn-default btn-sm">Ver perfil</a>
                                    <p><button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar({{ $pro }})">Eliminar</button></p>
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
    function eliminar(profesional){
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
        console.info(profesional)
        
      $.ajax({
        url: "{{ url('/eliminar-empresa') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            id: profesional.empresa.id,
        },
        success: function (response) {
            $('[data-id=' + profesional.id + ']').remove();
        }
      });
    }
  })
}
</script>
@endsection
