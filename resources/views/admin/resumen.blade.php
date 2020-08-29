@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('ope.menu1', ['cual' => 2])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST" {{ (isset($yo) ? 'action='.url('admin-area/situacion-op-edit1') : '') }}>
                        @csrf

                        <h3>Situación Laboral Actual</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="situacion" class="col-md-4 col-form-label text-md-right">{{ __('Situación') }}</label>

                            <div class="col-md-8">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('nombre', ($yo->id ?? '')) }}" required autocomplete="id" autofocus>
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
                            <label for="inicio_sit" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de inicio de su situación') }}</label>

                            <div class="col-md-8">
                                <input id="inicio_sit" type="text" class="form-control @error('inicio_sit') is-invalid @enderror" name="inicio_sit" value="{{ old('inicio_sit', ($yo->inicio_sit ?? '')) }}" required autocomplete="off" readonly="">

                                @error('inicio_sit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="campo_salario">
                            <label for="ultimo_salario" class="col-md-4 col-form-label text-md-right">{{ __('Último salario bruto mensual') }}</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="ultimo_salario" type="text" class="form-control @error('ultimo_salario') is-invalid @enderror" name="ultimo_salario" value="{{ old('ultimo_salario', ($yo->ultimo_salario ?? '')) }}" required autocomplete="ultimo_salario" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                @error('ultimo_salario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="campo_cargo">
                            <label for="actividad" class="col-md-4 col-form-label text-md-right">{{ __('Última actividad laboral en la que trabajó') }}</label>

                            <div class="col-md-8">
                                <select id="actividad" class="comunas form-control{{ $errors->has('actividad') ? ' is-invalid' : '' }}" name="actividad" required>
                                    <option value="" selected disabled>Seleccione actividad...</option>
                                    @php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    @endphp
                                    @foreach($industrias as $industria)
                                        <option value="{{ $industria->id }}" {{ (old('actividad') == $industria->id) ? 'selected':'' }}>{{ $industria->industria }}</option>
                                    @endforeach
                                </select>

                                @error('actividad')
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
    @include('ope.modal-perfil')
@endif
<script>
$.datepicker.regional['es'] = 
{
    closeText: 'Cerrar', 
    prevText: 'Previo', 
    nextText: 'Próximo',

    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    monthStatus: 'Ver otro mes',
    yearStatus: 'Ver otro año',
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    dateFormat: 'yy-mm-dd',
    firstDay: 1, 
    initStatus: 'Fecha',
    isRTL: false
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$( "#inicio_sit" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$('#ultimo_salario').css({'z-index': '1'});

$('#situacion').change(function(){
    if($(this).val() == 0) {
        $('#actividad').val("");
        $('#actividad').prop('required', false);
        $('#campo_cargo').hide();
        $('#campo_salario').hide();
        $('#ultimo_salario').val("");
        $('#ultimo_salario').prop('required', false);
    } else {
        $('#campo_cargo').fadeIn();
        $('#actividad').prop('required', true);
        $('#campo_salario').fadeIn();
        $('#ultimo_salario').prop('required', true);
    }
});

$('#ultimo_salario').on('keyup', function(){
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
    $('#actividad option[value={{ $yo->actividad }}]').attr('selected','selected');
    $('#actividad').change();
@endif

</script>
@endsection
