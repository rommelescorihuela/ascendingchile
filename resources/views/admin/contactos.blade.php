@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        @include('admin.menu', ['cual' => 6])
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Contactos</div>
            </div>
            <br>
            @if(count($pros) >= 1)
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Fono</th>
                      <th scope="col">Email</th>
                      <th scope="col">Asunto</th>
                      <th scope="col">Mensaje</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pros as $pro)
                      <tr>
                        <td>{{ $pro->nombre }}</td>
                        <td>{{ $pro->fono }}</td>
                        <td>{{ $pro->email }}</td>
                        <td>{{ $pro->asunto }}</td>
                        <td>
                            @if(!is_null($pro->mensaje))
                            {{ $pro->mensaje }}
                            @endif
                        </td>
                      </tr>
                    @endforeach
                </table>
            @endif

            {{ $pros->links() }}
        </div>
    </div>
</div>
@endsection
