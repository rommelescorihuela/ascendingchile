@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('emp.menu', ['cual' => 4])
        </div>
    @endif
        <div class="col-md-8">
            @if($exito)
            <div class="alert alert-success" role="alert">
                <strong>¡Gracias!</strong> El formulario se ha enviado con éxito.
            </div>
            @endif

            <div class="card azul">
                <div class="card-header">FORMULARIO PARA EDITAR OFERTA LABORAL OPERATIVA</div>

                <div class="card-body">
                    <div class="form-group row">
                        <!--<label for="cualperfil" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de perfil') }}</label>-->

                        <div class="col-md-8">
                            <!--<select id="cualperfil" class="form-control">
                                <option value="" selected disabled>Seleccione tipo de perfil...</option>
                                <option value="1">Perfil Profesional</option>
                                <option value="2">Perfio Operativo</option>
                            </select>-->
                        </div>
                    </div>

                   


                    <form method="POST" id="pope">
                        @csrf

                        <div class="form-group row">
                            <label for="industria" class="col-md-4 col-form-label text-md-right">{{ __('Industria Cliente') }}</label>

                            <div class="col-md-8">
                                <select id="industria" class="comunas form-control{{ $errors->has('industria') ? ' is-invalid' : '' }}" name="industria" required autofocus>
                                    <option value="" selected disabled>Seleccione industria...</option>
                                    @php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    @endphp
                                    @foreach($industrias as $industria)
                                        <option value="{{ $industria->id }}" {{ (old('industria',($ofertas->industria ?? '')) == $industria->id) ? 'selected':'' }}>{{ $industria->industria }}</option>
                                    @endforeach
                                </select>

                                @error('industria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-8">
                                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ $ofertas->cargo}}" required autocomplete="cargo" maxlength="255">

                                @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_licencia" class="col-md-4 col-form-label text-md-right">{{ __('Licencia de Conducir') }}</label>

                            <div class="col-md-8">
                                <select id="tipo_licencia" class="form-control @error('tipo_licencia') is-invalid @enderror" name="tipo_licencia" required>
                                    <option value="" selected disabled></option>
                                    <option value="0" {{ ($ofertas->tipo_licencia == '0' ? 'selected':'') }}>No requerido</option>
                                    <option value="1" {{ ($ofertas->tipo_licencia == '1' ? 'selected':'') }}>Clase A1</option>
                                    <option value="2" {{ ($ofertas->tipo_licencia == '2' ? 'selected':'') }}>Clase A2</option>
                                    <option value="3" {{ ($ofertas->tipo_licencia == '3' ? 'selected':'') }}>Clase A3</option>
                                    <option value="4" {{ ($ofertas->tipo_licencia == '4' ? 'selected':'') }}>Clase A4</option>
                                    <option value="5" {{ ($ofertas->tipo_licencia == '5' ? 'selected':'') }}>Clase A5</option>
                                    <option value="6" {{ ($ofertas->tipo_licencia == '6' ? 'selected':'') }}>Clase B</option>
                                    <option value="7" {{ ($ofertas->tipo_licencia == '7' ? 'selected':'') }}>Clase C</option>
                                    <option value="8" {{ ($ofertas->tipo_licencia == '8' ? 'selected':'') }}>Clase D</option>
                                    <option value="9" {{ ($ofertas->tipo_licencia == '9' ? 'selected':'') }}>Clase E</option>
                                    <option value="10" {{ ($ofertas->tipo_licencia == '10' ? 'selected':'') }}>Clase F</option>
                                </select>

                                @error('tipo_licencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experiencia" class="col-md-4 col-form-label text-md-right">{{ __('Años de Experiencia') }}</label>

                            <div class="col-md-8">
                                <input id="experiencia" type="number" class="form-control @error('experiencia') is-invalid @enderror" name="experiencia" value="{{ $ofertas->experiencia }}" required autocomplete="experiencia" maxlength="255">

                                @error('experiencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lugar" class="col-md-4 col-form-label text-md-right">{{ __('Lugar de Trabajo') }}</label>

                            <div class="col-md-8">
                                <select id="lugar" class="form-control @error('lugar') is-invalid @enderror" name="lugar" required>
                                    <option value="" selected disabled></option>
                                    <option value="Oficina" {{ ($ofertas->lugar == 'Oficina' ? 'selected':'') }}>Oficina</option>
                                    <option value="Terreno" {{ ($ofertas->lugar == 'Terreno' ? 'selected':'') }}>Terreno</option>
                                    <option value="Ambas" {{ ($ofertas->lugar == 'Ambas' ? 'selected':'') }}>Ambas</option>
                                </select>

                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zona o Región') }}</label>

                            <div class="col-md-8">
                                <input id="zona" type="text" class="form-control @error('zona') is-invalid @enderror" name="zona" value="{{ $ofertas->zona }}" required autocomplete="zona" maxlength="255">

                                @error('zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-8">
                                <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ $ofertas->ciudad }}" required autocomplete="ciudad" maxlength="255">

                                @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jornada" class="col-md-4 col-form-label text-md-right">{{ __('Jornada Laboral') }}</label>

                            <div class="col-md-8">
                                <select id="jornada" class="form-control @error('jornada') is-invalid @enderror" name="jornada" required>
                                    <option value="" selected disabled></option>
                                    <option value="Full Time" {{ ($ofertas->jornada == 'Full Time' ? 'selected':'') }}>Full Time</option>
                                    <option value="Part Time" {{ ($ofertas->jornada == 'Part Time' ? 'selected':'') }}>Part Time</option>
                                    <option value="Temporada" {{ ($ofertas->jornada == 'Temporada' ? 'selected':'') }}>Temporada</option>
                                    <option value="Freelance" {{ ($ofertas->jornada == 'Freelance' ? 'selected':'') }}>Freelance</option>
                                </select>

                                @error('jornada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción General del Cargo') }}</label>

                            <div class="col-md-8">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="descripcion" rows="4" maxlength="1000">{{ $ofertas->descripcion }}</textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalles" class="col-md-4 col-form-label text-md-right">{{ __('Detalles de las Actividades a Realizar') }}</label>

                            <div class="col-md-8">
                                <textarea id="detalles" class="form-control @error('detalles') is-invalid @enderror" name="detalles" required autocomplete="detalles" rows="4" maxlength="1000">{{ $ofertas->detalles }}</textarea>

                                @error('detalles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="excluyentes" class="col-md-4 col-form-label text-md-right">{{ __('Requisitos Excluyentes') }}</label>

                            <div class="col-md-8">
                                <textarea id="excluyentes" class="form-control @error('excluyentes') is-invalid @enderror" name="excluyentes" required autocomplete="excluyentes" rows="4" maxlength="1000">{{ $ofertas->excluyentes }}</textarea>

                                @error('excluyentes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deseables" class="col-md-4 col-form-label text-md-right">{{ __('Requisitos Deseables') }}</label>

                            <div class="col-md-8">
                                <textarea id="deseables" class="form-control @error('deseables') is-invalid @enderror" name="deseables" required autocomplete="deseables" rows="4" maxlength="1000">{{ $ofertas->deseables }}</textarea>

                                @error('deseables')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="otros" class="col-md-4 col-form-label text-md-right">{{ __('Otros') }}</label>

                            <div class="col-md-8">
                                <input id="otros" type="text" class="form-control @error('otros') is-invalid @enderror" name="otros" value="{{ $ofertas->otros }}" required autocomplete="otros" maxlength="1000">

                                @error('otros')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renta_fija" class="col-md-4 col-form-label text-md-right">{{ __('Renta Fija (líquido)') }}</label>

                            <div class="col-md-8">
                                <!--input id="renta_fija" type="text" min="0" class="form-control renta @error('renta_fija') is-invalid @enderror" name="renta_fija" value="{{ old('renta_fija') }}" required autocomplete="renta_fija"-->
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta_fija" type="text" min="0" class="form-control renta @error('renta_fija') is-invalid @enderror" name="renta_fija" value="{{ $ofertas->renta_fija }}" required autocomplete="renta_fija" maxlength="255" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                @error('renta_fija')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renta_variable" class="col-md-4 col-form-label text-md-right">{{ __('Renta Variable (líquido)') }}</label>

                            <div class="col-md-8">
                                <!--input id="renta_variable" type="text" min="0" class="form-control renta @error('renta_variable') is-invalid @enderror" name="renta_variable" value="{{ old('renta_variable') }}" required autocomplete="renta_variable"-->
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta_variable" type="text" min="0" class="form-control renta @error('renta_variable') is-invalid @enderror" name="renta_variable" value="{{ $ofertas->renta_variable }}" required autocomplete="renta_variable" maxlength="255" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                @error('renta_variable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bonos" class="col-md-4 col-form-label text-md-right">{{ __('Bonos (meses)') }}</label>

                            <div class="col-md-8">
                                <input id="bonos" type="text" class="form-control @error('bonos') is-invalid @enderror" name="bonos" value="{{ $ofertas->bonos }}" required autocomplete="bonos" maxlength="255">

                                @error('bonos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">Enviar</button>
                                <input type="hidden" name="tipo_perfil" value="2">
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
<script>
$('.renta').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});

/*$('form').hide();
$('#cualperfil').change(function(){
    $('form').hide();
    if($(this).val() == 1) $('#ppro').fadeIn();
    if($(this).val() == 2) $('#pope').fadeIn();
})*/
</script>
@endsection
