@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('emp.menu', ['cual' => 3])
        </div>
    @endif
        <div class="col-md-8">
            @if($exito)
            <div class="alert alert-success" role="alert">
                <strong>¡Gracias!</strong> El formulario se ha enviado con éxito.
            </div>
            @endif

            <div class="card azul">
                <div class="card-header" style="padding-bottom: 0px;">FORMULARIO PARA LEVANTAMIENTO DE PERFIL</div>
                <p style="color: #fff;">Realiza Levantamiento de perfil online y agiliza tu requerimiento de reclutamiento y/o selección o publicación de tu oferta laboral.</p>
                <br>
                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Cargo') }}</label>

                            <div class="col-md-8">
                                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ $pros->cargo }}" required autocomplete="cargo" maxlength="255">

                                @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion" class="col-md-4 col-form-label text-md-right">{{ __('Ubicación del cargo en la estructura organizacional') }}</label>

                            <div class="col-md-8">
                                <input id="ubicacion" type="text" class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion" value="{{ $pros->ubicacion }}" required autocomplete="ubicacion" maxlength="255">

                                @error('ubicacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="superior" class="col-md-4 col-form-label text-md-right">{{ __('Cargo superior al que reporta') }}</label>

                            <div class="col-md-8">
                                <input id="superior" type="text" class="form-control @error('superior') is-invalid @enderror" name="superior" value="{{ $pros->superior }}" required autocomplete="superior" maxlength="255">

                                @error('superior')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="supervisa" class="col-md-4 col-form-label text-md-right">{{ __('Cargos que supervisa') }}</label>

                            <div class="col-md-8">
                                <textarea id="supervisa" class="form-control @error('supervisa') is-invalid @enderror" name="supervisa" required autocomplete="supervisa" rows="4" maxlength="255">{{ $pros->supervisa  }}</textarea>

                                @error('supervisa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proposito" class="col-md-4 col-form-label text-md-right">{{ __('Propósito del Cargo') }}</label>

                            <div class="col-md-8">
                                <textarea id="proposito" class="form-control @error('proposito') is-invalid @enderror" name="proposito" required autocomplete="proposito" rows="4" maxlength="1000">{{ $pros->proposito }}</textarea>

                                @error('proposito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="funciones" class="col-md-4 col-form-label text-md-right">{{ __('Funciones del Cargo') }}</label>

                            <div class="col-md-8">
                                <textarea id="funciones" class="form-control @error('funciones') is-invalid @enderror" name="funciones" required autocomplete="funciones" rows="4" maxlength="1000">{{ $pros->funciones }}</textarea>

                                @error('funciones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="competencias" class="col-md-4 col-form-label text-md-right">{{ __('Competencias del Cargo') }}</label>

                            <div class="col-md-8">
                                <input id="competencias" type="text" class="form-control @error('competencias') is-invalid @enderror" name="competencias" value="{{ $pros->competencias }}" required autocomplete="competencias" maxlength="255">

                                @error('competencias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comunicacion" class="col-md-4 col-form-label text-md-right">{{ __('Líneas de comunicación internas y externas') }}</label>

                            <div class="col-md-8">
                                <input id="comunicacion" type="text" class="form-control @error('comunicacion') is-invalid @enderror" name="comunicacion" value="{{ $pros->comunicacion }}" required autocomplete="comunicacion" maxlength="255">

                                @error('comunicacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deseables" class="col-md-4 col-form-label text-md-right">{{ __('Requisitos Deseables') }}</label>

                            <div class="col-md-8">
                                <textarea id="deseables" class="form-control @error('deseables') is-invalid @enderror" name="deseables" required autocomplete="deseables" rows="4" maxlength="1000">{{ $pros->deseables }}</textarea>

                                @error('deseables')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="excluyentes" class="col-md-4 col-form-label text-md-right">{{ __('Requisitos Excluyentes') }}</label>

                            <div class="col-md-8">
                                <textarea id="excluyentes" class="form-control @error('excluyentes') is-invalid @enderror" name="excluyentes" required autocomplete="excluyentes" rows="4" maxlength="1000">{{ $pros->excluyentes }}</textarea>

                                @error('excluyentes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
