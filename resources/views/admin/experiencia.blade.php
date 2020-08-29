@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('ope.menu1', ['cual' => 3])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <h3>Agregar Experiencia</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="ocupacion" class="col-md-4 col-form-label text-md-right">{{ __('Ocupacion') }}</label>

                            <div class="col-md-8">
                                <input id="ocupacion" type="text" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion" value="{{ old('ocupacion') }}" required autocomplete="ocupacion" autofocus>

                                @error('ocupacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                            <div class="col-md-8">
                                <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="empresa">

                                @error('empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodos" class="col-md-4 col-form-label text-md-right">{{ __('Periodos') }}</label>

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

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Región') }}</label>

                            <div class="col-md-8">
                                <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region">

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sueldo" class="col-md-4 col-form-label text-md-right">{{ __('Sueldo bruto mensual') }}</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="sueldo" type="text" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" value="{{ old('sueldo', ($yo->sueldo ?? '')) }}" required autocomplete="sueldo" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                @error('sueldo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detallar labores que realizaba') }}</label>

                            <div class="col-md-8">
                                <textarea id="detalle" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{ old('detalle') }}" required autocomplete="detalle" rows="3" maxlength="1000"></textarea>

                                @error('detalle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referencia" class="col-md-4 col-form-label text-md-right">{{ __('Referencias') }}</label>

                            <div class="col-md-8">
                                <textarea id="referencia" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ old('referencia') }}" autocomplete="referencia" rows="3" maxlength="1000"></textarea>

                                @error('referencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                            @if(count($exp) >= 1)
                            <div class="col-md-5 text-right">
                                <a href="{{ route('formacion-op') }}" class="btn btn-light" style="color:#FFF;">
                                    {{ __('Ir a Información Académica >') }}
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
                <div class="card-header">Experiencia Laboral</div>

                <div class="card-body">
                    @foreach($exp as $xp)
                    <table class="table table-bordered experiencias" id="experiencia-{{ $xp->id }}">
                      <thead>
                        @if(!empty($xp->ocupacion))
                          <tr>
                            <th scope="row">Ocupacion</th>
                            <td width="100%" class="input-cargo">{{ $xp->ocupacion }}</td>
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
                        @if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta))
                          <tr>
                            <th scope="row">Periodo</th>
                            <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->region))
                          <tr>
                            <th scope="row">Región</th>
                            <td class="input-region">{{ $xp->region }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->sueldo))
                          <tr>
                            <th scope="row">Sueldo bruto mensual</th>
                            <td>$ <span class="input-sueldo">{{ $xp->sueldo }}</span></td>
                          </tr>
                        @endif
                        @if(!empty($xp->detalle))
                          <tr>
                            <th scope="row">Labores que realizaba</th>
                            <td class="input-detalle">{{ $xp->detalle }}</td>
                          </tr>
                        @endif
                        @if(!empty($xp->referencia))
                          <tr>
                            <th scope="row">Referencias</th>
                            <td class="input-referencia">{{ $xp->referencia }}</td>
                          </tr>
                        @endif
                          <tr>
                            <th scope="row"></th>
                            <td class="text-right">
                                <form action="{{ route('del-exp-op1') }}" method="post" id="exp-{{ $xp->id }}">
                                @csrf
                                <button type="button" class="btn btn-primary" onclick="editar({{ $xp->id }})">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar({{ $xp->id }})">Borrar</button>
                                <input type="hidden" name="idexp" value="{{ $xp->id }}">
                                </form>
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
    @include('ope.modal-perfil')
@endif

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Experiencia</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('edit-exp-op') }}">
                @csrf

                <h3>Experiencia Laboral</h3>
                <hr>

                <div class="form-group row">
                    <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Ocupación') }}</label>

                    <div class="col-md-8">
                        <input id="input-cargo" type="text" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion" required autocomplete="ocupacion">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                    <div class="col-md-8">
                        <input id="input-empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" required autocomplete="empresa">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="periodos" class="col-md-4 col-form-label text-md-right">{{ __('Periodos') }}</label>

                    <div class="col-md-4">
                        <input id="input-periodo_desde" type="text" class="form-control @error('periodo_desde') is-invalid @enderror" name="periodo_desde" required autocomplete="off" readonly="">
                    </div>
                    <div class="col-md-4">
                        <input id="input-periodo_hasta" type="text" class="form-control @error('periodo_hasta') is-invalid @enderror" name="periodo_hasta" required autocomplete="off" readonly="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Región') }}</label>

                    <div class="col-md-8">
                        <input id="input-region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" required autocomplete="region">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sueldo" class="col-md-4 col-form-label text-md-right">{{ __('Sueldo bruto mensual') }}</label>

                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input id="input-sueldo" type="text" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" required autocomplete="sueldo" step=".01">
                            <div class="input-group-addon">CLP</div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detallar labores que realizaba') }}</label>

                    <div class="col-md-8">
                        <textarea id="input-detalle" class="form-control @error('detalle') is-invalid @enderror" name="detalle" required autocomplete="detalle" rows="3" maxlength="1000"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="referencia" class="col-md-4 col-form-label text-md-right">{{ __('Referencias') }}</label>

                    <div class="col-md-8">
                        <textarea id="input-referencia" class="form-control @error('referencia') is-invalid @enderror" name="referencia" autocomplete="referencia" rows="3" maxlength="1000"></textarea>
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

$('#sueldo').css({'z-index': '1'});

$('#sueldo').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});
$('#input-sueldo').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
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
    $('#input-region', '#modalEditar').val($('.input-region', '#experiencia-'+id).html());
    $('#input-sueldo', '#modalEditar').val($('.input-sueldo', '#experiencia-'+id).html());
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#experiencia-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#experiencia-'+id).val()+' 00:00'));
    $('#input-detalle', '#modalEditar').val($('.input-detalle', '#experiencia-'+id).html());
    $('#input-referencia', '#modalEditar').val($('.input-referencia', '#experiencia-'+id).html());
    $('#modalEditar').modal();
}
</script>
@endsection