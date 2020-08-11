@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu', ['cual' => 2])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>

                <div class="card-body">
                    <form method="POST" {{ (isset($yo) ? 'action='.url('resumen-edit') : '') }}>
                        @csrf

                        <h3>Resumen Ejecutivo</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="resumen" class="col-md-4 col-form-label text-md-right">{{ __('Escribe un resumen de tu perfil profesional') }}</label>

                            <div class="col-md-8">
                                <textarea id="resumen" class="form-control @error('resumen') is-invalid @enderror" name="resumen" required autocomplete="resumen" autofocus rows="5" maxlength="1000">{{ old('resumen', ($yo->resumen ?? '')) }}</textarea>

                                @error('resumen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h3>Situación Laboral Actual</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="situacion" class="col-md-4 col-form-label text-md-right">{{ __('Situación') }}</label>

                            <div class="col-md-8">
                                <select id="situacion" class="form-control @error('situacion') is-invalid @enderror" name="situacion" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">Primer Empleo</option>
                                    <option value="1">Nuevas Oportunidades</option>
                                    <option value="2">Desempleado</option>
                                </select>

                                @error('situacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renta" class="col-md-4 col-form-label text-md-right">{{ __('Expectativas de Renta') }}</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta" type="text" class="form-control @error('renta') is-invalid @enderror" name="renta" value="{{ old('renta', ($yo->renta ?? '')) }}" required autocomplete="renta" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                @error('renta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="campo_cargo">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Según situación actual menciona el cargo que desempeñas o desempeñabas') }}</label>

                            <div class="col-md-8">
                                <textarea id="cargo" class="form-control @error('cargo') is-invalid @enderror" name="cargo" required autocomplete="cargo" rows="3" maxlength="400">{{ old('cargo', ($yo->cargo ?? '')) }}</textarea>

                                @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="porque" class="col-md-4 col-form-label text-md-right">{{ __('¿Por qué te deberían contratar?') }}</label>

                            <div class="col-md-8">
                                <textarea id="porque" class="form-control @error('porque') is-invalid @enderror" name="porque" required autocomplete="porque" rows="3" maxlength="400">{{ old('porque', ($yo->porque ?? '')) }}</textarea>

                                @error('porque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">
                                    {{ __('Guardar') }}
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
$('#situacion').change(function(){
    if($(this).val() == 0) {
        $('#campo_cargo').hide();
        $('#cargo').val("");
        $('#cargo').prop('required', false);
    } else {
        $('#campo_cargo').fadeIn();
        $('#cargo').prop('required', true);
    }
});

$('#renta').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});

@if(isset($yo))
    $('#situacion option[value={{ $yo->situacion }}]').attr('selected','selected');
    $('#situacion').change();
@endif

</script>
@endsection
