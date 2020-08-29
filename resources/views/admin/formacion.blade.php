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
        @include('ope.menu1', ['cual' => 4])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin-area/guarda-acad-op1') }}">
                        @csrf

                        <h3>Información Académica</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="nivel_educ" class="col-md-4 col-form-label text-md-right">{{ __('Nivel educacional') }}</label>

                            <div class="col-md-8">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('nombre', ($yo->id ?? '')) }}" required autocomplete="id" autofocus>
                                <select id="nivel_educ" class="form-control @error('nivel_educ') is-invalid @enderror" name="nivel_educ" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">Estudiante de Educación Superior</option>
                                    <option value="1">Egresado/a</option>
                                    <option value="2">Titulado/a</option>
                                    <option value="3">Diplomado/a</option>
                                    <option value="4">Magister</option>
                                    <option value="5">Carrera Congelada</option>
                                </select>

                                @error('nivel_educ')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="licencia" class="col-md-4 col-form-label text-md-right">{{ __('Licencia de conducir') }}</label>

                            <div class="col-md-8">
                                <select id="licencia" class="form-control @error('licencia') is-invalid @enderror" name="licencia" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">No poseo</option>
                                    <option value="1">Clase A1</option>
                                    <option value="2">Clase A2</option>
                                    <option value="3">Clase A3</option>
                                    <option value="4">Clase A4</option>
                                    <option value="5">Clase A5</option>
                                    <option value="6">Clase B</option>
                                    <option value="7">Clase C</option>
                                    <option value="8">Clase D</option>
                                    <option value="9">Clase E</option>
                                    <option value="10">Clase F</option>
                                </select>

                                @error('licencia')
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
                                @if(!isset($yo->nivel_educ))
                                <input type="hidden" name="primeravez" value="true">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 10px;">
                <h3>Agregar Capacitaciones y Otros Cursos</h3>
                <hr>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="curso" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del curso o capacitación') }}</label>

                            <div class="col-md-8">
                                <input id="curso" type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso') }}" required autocomplete="curso">

                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="casa" class="col-md-4 col-form-label text-md-right">{{ __('Institución donde lo realizó') }}</label>

                            <div class="col-md-8">
                                <input id="casa" type="text" class="form-control @error('casa') is-invalid @enderror" name="casa" value="{{ old('casa') }}" required autocomplete="casa">

                                @error('casa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duración (en horas)') }}</label>

                            <div class="col-md-8">
                                <input id="duracion" type="number" class="form-control @error('duracion') is-invalid @enderror" name="duracion" value="{{ old('duracion') }}" required autocomplete="duracion">

                                @error('duracion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--
                        <div class="form-group row">
                            <label for="diploma" class="col-md-4 col-form-label text-md-right">{{ __('Adjuntar diploma.') }}
                            <br>
                            Formatos permitidos:<br>PDF o Word.
                            </label>

                            <div class="col-md-6">
                                <input id="diploma" type="file" class="form-control @error('diploma') is-invalid @enderror" name="diploma" value="{{ old('diploma') }}">

                                @error('diploma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                (opcional)
                            </div>
                        </div>
--}}
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
                <div class="card-header">Capacitaciones y Otros Cursos</div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered formaciones">
                      <thead>
                        <tr>
                          <th scope="col">Curso o capacitación</th>
                          <th scope="col">Institución donde lo realizó</th>
                          <th scope="col">Duración (en horas)</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($exp as $xp)
                          <tr id="formacion-{{ $xp->id }}">
                            <td class="input-curso">{{ $xp->curso }}</td>
                            <td class="input-casa">{{ $xp->casa }}</td>
                            <td class="input-duracion">{{ $xp->duracion }}</td>
                            <td class="text-right">
                                <form action="{{ route('del-form-op1') }}" method="post" id="form-{{ $xp->id }}">
                                @csrf
                                <button type="button" class="btn btn-primary" onclick="editar({{ $xp->id }})" style="margin-bottom: 5px;">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar({{ $xp->id }})" style="margin-bottom: 5px;">Borrar</button>
                                <input type="hidden" name="idform" value="{{ $xp->id }}">
                                </form>
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
    @include('ope.modal-perfil')
@endif

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Curso o Capacitación</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('edit-form-op') }}">
                @csrf

                <div class="form-group row">
                    <label for="curso" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Curso o Capacitación') }}</label>

                    <div class="col-md-8">
                        <input id="input-curso" type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" required autocomplete="curso">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="casa" class="col-md-4 col-form-label text-md-right">{{ __('Institución donde lo realizó') }}</label>

                    <div class="col-md-8">
                        <input id="input-casa" type="text" class="form-control @error('casa') is-invalid @enderror" name="casa" required autocomplete="casa">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duración (en horas)') }}</label>

                    <div class="col-md-8">
                        <input id="input-duracion" type="text" class="form-control @error('duracion') is-invalid @enderror" name="duracion" required autocomplete="duracion">
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
    $('#nivel_educ option[value={{ $sit }}]').attr('selected','selected');
    $('#licencia option[value={{ $yo->licencia }}]').attr('selected','selected');
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
    $('#input-curso', '#modalEditar').val($('.input-curso', '#formacion-'+id).html());
    $('#input-casa', '#modalEditar').val($('.input-casa', '#formacion-'+id).html());
    $('#input-duracion', '#modalEditar').val($('.input-duracion', '#formacion-'+id).html());
    $('#modalEditar').modal();
}
</script>
@endsection
