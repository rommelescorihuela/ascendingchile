@extends('layouts.app')

@section('assets_adicionales')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu', ['cual' => 4])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('guarda-acad') }}">
                        @csrf

                        <h3>Situación Académica Actual</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="situacion_acad" class="col-md-4 col-form-label text-md-right">{{ __('Situación') }}</label>

                            <div class="col-md-8">
                                <select id="situacion_acad" class="form-control @error('situacion_acad') is-invalid @enderror" name="situacion_acad" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">Estudiante de Educación Superior</option>
                                    <option value="1">Egresado/a</option>
                                    <option value="2">Titulado/a</option>
                                    <option value="3">Diplomado/a</option>
                                    <option value="4">Magister</option>
                                    <option value="5">Carrera Congelada</option>
                                </select>

                                @error('situacion_acad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ingles" class="col-md-4 col-form-label text-md-right">{{ __('Dominio de inglés') }}</label>

                            <div class="col-md-8">
                                <select id="ingles" class="form-control @error('ingles') is-invalid @enderror" name="ingles" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">Nulo</option>
                                    <option value="1">Bajo</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Avanzado</option>
                                    <option value="4">Nativo</option>
                                </select>

                                @error('ingles')
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
                                @if(!isset($yo->situacion_acad))
                                <input type="hidden" name="primeravez" value="true">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 10px;">
                <div class="card-header">Agregar</div>
                <hr>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="profesion" class="col-md-4 col-form-label text-md-right">{{ __('Profesión, Diplomado o Mágister') }}</label>

                            <div class="col-md-8">
                                <input id="profesion" type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion') }}" required autocomplete="profesion">

                                @error('profesion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="casa" class="col-md-4 col-form-label text-md-right">{{ __('Casa de Estudios') }}</label>

                            <div class="col-md-8">
                                <select id="casa" class="comunas select2 form-control{{ $errors->has('casa') ? ' is-invalid' : '' }}" name="casa" required>
                                    <option value="" selected disabled>Seleccione su casa de estudios...</option>
                                    @php
                                        $casas = DB::table('casas')->get()->sortBy('casa');
                                    @endphp
                                    @foreach($casas as $casa)
                                        <option value="{{ $casa->id }}" {{ (old('casa', (isset($yo) ? $yo->casa : '')) == $casa->id) ? 'selected':'' }}>{{ $casa->casa }}</option>
                                    @endforeach
                                </select>

                                @error('casa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodo_desde" class="col-md-4 col-form-label text-md-right">{{ __('Periodos') }}</label>

                            <div class="col-md-4">
                                <input id="periodo_desde" type="text" class="form-control @error('periodo_desde') is-invalid @enderror" name="periodo_desde" value="{{ old('periodo_desde') }}" required autocomplete="off" readonly="">

                                @error('periodo_desde')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="periodo_hasta" type="text" class="form-control @error('periodo_hasta') is-invalid @enderror" name="periodo_hasta" value="{{ old('periodo_hasta') }}" required autocomplete="off" readonly="">

                                @error('periodo_hasta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                            @if(!isset($yo))
                            <div class="col-md-5 text-right">
                                <a href="{{ route('perfil') }}" class="btn btn-light">
                                    {{ __('Volver al Perfil >') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            @if(count($exp) >= 1)
            <br>

            <div class="card">
                <div class="card-header">Formación</div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered formaciones">
                      <thead>
                        <tr>
                          <th scope="col">Profesión, Diplomado o Mágister</th>
                          <th scope="col">Casa de Estudios</th>
                          <th scope="col">Periodos</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($exp as $xp)
                          <tr id="formacion-{{ $xp->id }}">
                            <td class="input-profesion">{{ $xp->profesion }}</td>
                            <td>{{ DB::table('casas')->where('id', $xp->casa)->first()->casa }}</td>
                            <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                            <td class="text-right">
                                <form action="{{ route('del-form') }}" method="post" id="form-{{ $xp->id }}">
                                @csrf
                                <button type="button" class="btn btn-primary" onclick="editar({{ $xp->id }})" style="margin-bottom: 5px;">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar({{ $xp->id }})" style="margin-bottom: 5px;">Borrar</button>
                                <input type="hidden" name="idform" value="{{ $xp->id }}">
                                </form>
                                <input type="hidden" value="{{ $xp->casa }}" class="input-casa">
                                <input type="hidden" value="{{ $xp->periodo_desde }}" class="input-desde">
                                <input type="hidden" value="{{ $xp->periodo_hasta }}" class="input-hasta">
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script_adicional')
@if(isset($yo))
    @include('pro.modal-perfil')
@endif

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Formación</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('edit-form') }}">
                @csrf

                <div class="form-group row">
                    <label for="profesion" class="col-md-4 col-form-label text-md-right">{{ __('Profesión, Diplomado o Mágister') }}</label>

                    <div class="col-md-8">
                        <input id="input-profesion" type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion') }}" required autocomplete="profesion">

                        @error('profesion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="casa" class="col-md-4 col-form-label text-md-right">{{ __('Casa de Estudios') }}</label>

                    <div class="col-md-8">
                        <select id="input-casa" class="comunas select2 form-control{{ $errors->has('casa') ? ' is-invalid' : '' }}" name="casa" required style="width: 100%;">
                            <option value="" selected disabled>Seleccione su casa de estudios...</option>
                            @php
                                $casas = DB::table('casas')->get()->sortBy('casa');
                            @endphp
                            @foreach($casas as $casa)
                                <option value="{{ $casa->id }}" {{ (old('casa', (isset($yo) ? $yo->casa : '')) == $casa->id) ? 'selected':'' }}>{{ $casa->casa }}</option>
                            @endforeach
                        </select>

                        @error('casa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="periodo_desde" class="col-md-4 col-form-label text-md-right">{{ __('Periodos') }}</label>

                    <div class="col-md-4">
                        <input id="input-periodo_desde" type="text" class="form-control @error('periodo_desde') is-invalid @enderror" name="periodo_desde" value="{{ old('periodo_desde') }}" required autocomplete="off" readonly="">

                        @error('periodo_desde')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <input id="input-periodo_hasta" type="text" class="form-control @error('periodo_hasta') is-invalid @enderror" name="periodo_hasta" value="{{ old('periodo_hasta') }}" required autocomplete="off" readonly="">

                        @error('periodo_hasta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-3 col-md-offset-4">
                        <button type="submit" class="btn-style-one btn-iniciar-sesion">
                            {{ __('Guardar') }}
                        </button>
                        <input type="hidden" name="idform" id="edit-id">
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px;" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
@if(isset($sit))
    $('#situacion_acad option[value={{ $sit }}]').attr('selected','selected');
@endif
@if(isset($yo) && isset($ing))
    $('#ingles option[value={{ $ing }}]').attr('selected','selected');
@endif

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
$( "#periodo_desde" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$( "#periodo_hasta" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});

// para modal editar:
$( "#input-periodo_desde" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$( "#input-periodo_hasta" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});

$(document).ready(function() {
    $('.select2').select2({
        width: 'resolve'
    });
});

function borrar(id){
    var confirma = confirm("¿Estas seguro que quieres borrar este registro?");
    if(confirma){
        $('#form-'+id).submit();
    }
}
function editar(id){
    $('#edit-id', '#modalEditar').val(id);
    $('#input-profesion', '#modalEditar').val($('.input-profesion', '#formacion-'+id).html());
    $('#input-casa', '#modalEditar').val($('.input-casa', '#formacion-'+id).val()).trigger('change');
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#formacion-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#formacion-'+id).val()+' 00:00'));
    $('#modalEditar').modal();
}
</script>
@endsection
