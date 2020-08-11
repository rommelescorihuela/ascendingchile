@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu', ['cual' => 5])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional - Currículum Vitae</div>

                <div class="card-body">
                    @if($yo->cv)
                    <p><a href="{{ Storage::disk('cvs')->url($yo->cv) }}" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o" aria-hidden="true" style="margin-right: 5px;"></i> Ver mi CV.</a></p>
                    @endif
                    <br>

                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-right">
                            @if($yo->cv)
                                {{ __('Puedes cambiar tu Currículum Vitae si lo deseas.') }}
                            @else
                                {{ __('Puedes cargar tu Currículum Vitae si lo deseas.') }}
                            @endif
                            <br>
                            Formatos permitidos:<br>PDF o Word.
                            </label>

                            <div class="col-md-6">
                                <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}">

                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if(Session::has('mensaje'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ Session::get('mensaje') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                (opcional)
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion" id="upload">
                                @if($yo->cv)
                                    {{ __('Guardar') }}
                                @else
                                    {{ __('Finalizar Registro') }}
                                @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
@if(isset($yo))
    @include('pro.modal-perfil')
@endif
<script>
</script>
@endsection
