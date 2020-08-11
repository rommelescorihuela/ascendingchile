@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <img src="img/ascending-logo.svg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(isset($profesionales) && count($profesionales) > 0)
					    @foreach($profesionales as $pro)
					        <h3>{{ $pro->titulo }} <button class="btn btn-primary float-right">Solicitar</button></h3>
					        <hr>
					    @endforeach
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
