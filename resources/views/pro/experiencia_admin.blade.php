@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu_admin', ['cual' => 3])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>
            </div>

            @if(count($exp) >= 1)
            <br>

            <div class="card">
                <div class="card-header">Experiencia</div>

                <div class="card-body">
                    @foreach($exp as $xp)
                    <table class="table table-bordered experiencias" id="experiencia-{{ $xp->id }}">
                      <thead>
                        @if(!empty($xp->cargo))
                          <tr>
                            <th scope="row">Cargo</th>
                            <td width="100%" class="input-cargo">{{ $xp->cargo }}</td>
                          </tr>
                        @endif
                      </thead>
                      <tbody>
                        @if(!empty($xp->empresa))
                          <tr>
                            <th scope="row">Empresa</th>
                            <td class="input-empresa">{{ $xp->empresa }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->industria))
                          <tr>
                            <th scope="row">Industria</th>
                            <td>{{ DB::table('industria')->where('id', $xp->industria)->first()->industria }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta))
                          <tr>
                            <th scope="row">Periodo</th>
                            <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->responsabilidades))
                          <tr>
                            <th scope="row">Responsabilidades</th>
                            <td class="input-responsabilidades">{{ $xp->responsabilidades }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->logros))
                          <tr>
                            <th scope="row">Logros</th>
                            <td class="input-logros">{{ $xp->logros }}</td>
                          </tr>
                        @endif
                          <tr>
                            <th scope="row"></th>
                            <td class="text-right">
                                <form action="{{ route('del-exp') }}" method="post" id="exp-{{ $xp->id }}">
                                @csrf
                                <button type="button" class="btn btn-primary" onclick="editar({{ $xp->id }})">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar({{ $xp->id }})">Borrar</button>
                                <input type="hidden" name="idexp" value="{{ $xp->id }}">
                                </form>
                                <input type="hidden" value="{{ $xp->industria }}" class="input-industria">
                                <input type="hidden" value="{{ $xp->periodo_desde }}" class="input-desde">
                                <input type="hidden" value="{{ $xp->periodo_hasta }}" class="input-hasta">
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    @endforeach
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
        <h4 class="modal-title">Editar Experiencia</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ url('edit-exp') }}">
                @csrf

                <h3>Experiencia Laboral</h3>
                <hr>

                <div class="form-group row">
                    <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                    <div class="col-md-8">
                        <input id="input-cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ old('cargo') }}" required autocomplete="cargo" autofocus>

                        @error('cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                    <div class="col-md-8">
                        <input id="input-empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="empresa">

                        @error('empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="industria" class="col-md-4 col-form-label text-md-right">{{ __('Industria') }}</label>

                    <div class="col-md-8">
                        <select id="input-industria" class="comunas form-control{{ $errors->has('industria') ? ' is-invalid' : '' }}" name="industria" required>
                            <option value="" selected disabled>Seleccione industria...</option>
                            @php
                                $industrias = DB::table('industria')->get()->sortBy('industria');
                            @endphp
                            @foreach($industrias as $industria)
                                <option value="{{ $industria->id }}" {{ (old('industria') == $industria->id) ? 'selected':'' }}>{{ $industria->industria }}</option>
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
                    <label for="periodos" class="col-md-4 col-form-label text-md-right">{{ __('Periodos') }}</label>

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

                <div class="form-group row">
                    <label for="responsabilidades" class="col-md-4 col-form-label text-md-right">{{ __('Principales responsabilidades') }}</label>

                    <div class="col-md-8">
                        <textarea id="input-responsabilidades" class="form-control @error('responsabilidades') is-invalid @enderror" name="responsabilidades" value="{{ old('responsabilidades') }}" required autocomplete="responsabilidades" rows="3" maxlength="1000"></textarea>

                        @error('responsabilidades')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logros" class="col-md-4 col-form-label text-md-right">{{ __('Logros') }}</label>

                    <div class="col-md-8">
                        <textarea id="input-logros" class="form-control @error('logros') is-invalid @enderror" name="logros" value="{{ old('logros') }}" required autocomplete="logros" rows="3" maxlength="1000"></textarea>

                        @error('logros')
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
                        <input type="hidden" name="idexp" id="edit-id">
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

function borrar(id){
    var confirma = confirm("¿Estas seguro que quieres borrar este registro?");
    if(confirma){
        $('#exp-'+id).submit();
    }
}
function editar(id){
    $('#edit-id', '#modalEditar').val(id);
    $('#input-cargo', '#modalEditar').val($('.input-cargo', '#experiencia-'+id).html());
    $('#input-empresa', '#modalEditar').val($('.input-empresa', '#experiencia-'+id).html());
    $('#input-industria', '#modalEditar').val($('.input-industria', '#experiencia-'+id).val());
    //$('#input-periodo_desde', '#modalEditar').val($('.input-desde', '#experiencia-'+id).val());
    //$('#input-periodo_hasta', '#modalEditar').val($('.input-hasta', '#experiencia-'+id).val());
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#experiencia-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#experiencia-'+id).val()+' 00:00'));
    $('#input-responsabilidades', '#modalEditar').val($('.input-responsabilidades', '#experiencia-'+id).html());
    $('#input-logros', '#modalEditar').val($('.input-logros', '#experiencia-'+id).html());
    $('#modalEditar').modal();
}
</script>
@endsection