@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('emp.menu', ['cual' => 5])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfiles Profesionales de Interés</div>
            </div>
<br>
            @if(count($perfiles) >= 1)
              @foreach($perfiles as $pro)
                <div class="clearfix" style="margin-bottom: 10px;">
                    <h4 class="pull-left">{{ $pro->titulos->profesion }}<br><small><i>Registrado el {{ \Carbon\Carbon::parse($pro->created_at)->format('d-m-Y') }}</i></small></h4>

                    <a class="btn btn-info pull-right" data-toggle="modal" data-target="#info-perfil-{{ $pro->id }}">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>
                </div>
                <hr>
              @endforeach
            <p class="text-center">{{ $perfiles->links() }}</p>
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
</script>
@endsection
