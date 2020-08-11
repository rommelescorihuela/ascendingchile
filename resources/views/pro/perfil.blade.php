@extends('layouts.app')

@section('assets_adicionales')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>
<script src="{{ asset('plugins/materialize/js/materialize.js') }}" defer></script>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
          yearRange: [1950,2020]
        });
        
    });
</script>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
    @if(session()->has('exito'))
        <div class="col-md-12">
            <div class="alert alert-success text-center" role="alert">
                <strong>¡Felicidades!</strong> Has completado tu perfil.
            </div>
        </div>
    @endif
    </div>

    <div class="row justify-content-center">
    @if(isset($yo))
        <div class="col-md-4">
        @include('pro.menu', ['cual' => 1])
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional - Datos Personales</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" {{ (isset($yo) ? 'action='.url('perfil-edit') : '') }}>
                        @csrf
@if(!isset($yo))
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto Perfil') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required onchange="readURL(this)">

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('img/sin-foto.jpg') }}" id="archivo" class="img-responsive">
                            </div>
                        </div>
@endif
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres y Apellidos') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', ($yo->nombre ?? '')) }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título Profesional') }}</label>

                            <div class="col-md-8">
                                <!--input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', ($yo->titulo ?? '')) }}" required autocomplete="titulo"-->
                                <select id="titulo" class="comunas select2 form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" required>
                                    <option value="" selected disabled>Seleccione título...</option>
                                    @php
                                        $profes = DB::table('profesiones')->get()->sortBy('profesion');
                                    @endphp
                                    @foreach($profes as $profe)
                                        <option value="{{ $profe->id }}" {{ (old('titulo', (isset($yo) ? $yo->titulo : '')) == $profe->id) ? 'selected':'' }}>{{ $profe->profesion }}</option>
                                    @endforeach
                                </select>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', ($yo->email ?? '')) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fnac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-8">
                                <input id="fnac" type="text" class="datepicker form-control @error('fnac') is-invalid @enderror" name="fnac" value="{{ old('fnac', ($yo->fnac ?? '')) }}" required autocomplete="off" readonly="">

                                @error('fnac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class="col-md-8">
                                <select id="genero" class="form-control @error('genero') is-invalid @enderror" name="genero" required>
                                    <option value="" selected disabled></option>
                                    <option value="1" {{ (old('genero', (isset($yo) ? $yo->genero : '')) == '1' ? 'selected':'') }}>Femenino</option>
                                    <option value="0" {{ (old('genero', (isset($yo) ? $yo->genero : '')) == '0' ? 'selected':'') }}>Masculino</option>
                                    <option value="2" {{ (old('genero', (isset($yo) ? $yo->genero : '')) == '2' ? 'selected':'') }}>Otro</option>
                                </select>

                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-8">
                                <input id="fono" type="text" class="form-control @error('fono') is-invalid @enderror" name="fono" value="{{ old('fono', ($yo->fono ?? '')) }}" required autocomplete="fono">

                                @error('fono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-8">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion', ($yo->direccion ?? '')) }}" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comuna_id" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>

                            <div class="col-md-8">
                                <select id="comuna_id" class="comunas select2 form-control{{ $errors->has('comuna_id') ? ' is-invalid' : '' }}" name="comuna_id" required>
                                    <option value="" selected disabled>Seleccione comuna...</option>
                                    @php
                                        $comunas = DB::table('comuna')->get()->sortBy('comuna');
                                    @endphp
                                    @foreach($comunas as $comuna)
                                        <option value="{{ $comuna->id }}" {{ (old('comuna_id', (isset($yo) ? $yo->comuna_id : '')) == $comuna->id) ? 'selected':'' }}>{{ $comuna->comuna }}</option>
                                    @endforeach
                                </select>

                                @error('comuna_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="civil" class="col-md-4 col-form-label text-md-right">{{ __('Estado Civil') }}</label>

                            <div class="col-md-8">
                                <select id="civil" class="form-control @error('civil') is-invalid @enderror" name="civil" required>
                                    <option value="" selected disabled></option>
                                    <option value="0" {{ (old('civil', (isset($yo) ? $yo->civil : '')) == '0' ? 'selected':'') }}>Soltero/a</option>
                                    <option value="1" {{ (old('civil', (isset($yo) ? $yo->civil : '')) == '1' ? 'selected':'') }}>Casado/a</option>
                                    <option value="2" {{ (old('civil', (isset($yo) ? $yo->civil : '')) == '2' ? 'selected':'') }}>Divorciado/a</option>
                                </select>

                                @error('civil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hijos" class="col-md-4 col-form-label text-md-right">{{ __('Número de Hijos') }}</label>

                            <div class="col-md-8">
                                <input id="hijos" type="number" min="0" class="form-control @error('hijos') is-invalid @enderror" name="hijos" value="{{ old('hijos', ($yo->hijos ?? '')) }}" required autocomplete="hijos">

                                @error('hijos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="afp" class="col-md-4 col-form-label text-md-right">{{ __('AFP') }}</label>

                            <div class="col-md-8">
                                <select id="afp" class="comunas form-control{{ $errors->has('afp') ? ' is-invalid' : '' }}" name="afp" required>
                                    <option value="" selected disabled>Seleccione su AFP...</option>
                                    @php
                                        $afps = DB::table('afps')->get()->sortBy('afp');
                                    @endphp
                                    @foreach($afps as $afp)
                                        <option value="{{ $afp->id }}" {{ (old('afp', (isset($yo) ? $yo->afp : '')) == $afp->id) ? 'selected':'' }}>{{ $afp->afp }}</option>
                                    @endforeach
                                </select>

                                @error('afp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salud" class="col-md-4 col-form-label text-md-right">{{ __('Isapre o Fonasa') }}</label>

                            <div class="col-md-8">
                                <select id="salud" class="comunas form-control{{ $errors->has('salud') ? ' is-invalid' : '' }}" name="salud" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    @php
                                        $isapres = DB::table('isapres')->get()->sortBy('isapre');
                                    @endphp
                                    @foreach($isapres as $isapre)
                                        <option value="{{ $isapre->id }}" {{ (old('salud', (isset($yo) ? $yo->salud : '')) == $isapre->id) ? 'selected':'' }}>{{ $isapre->isapre }}</option>
                                    @endforeach
                                </select>

                                @error('salud')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion" id="upload">
                                    @if(isset($yo))
                                    {{ __('Guardar cambios') }}
                                    @else
                                    {{ __('Guardar y continuar') }}
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
// $.datepicker.setDefaults($.datepicker.regional['es']);
// $( "#fnac" ).datepicker({
//     dateFormat: "dd-mm-yy",
//     changeYear: true,
//     changeMonth: true,
//     yearRange: "1900:",
// });

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#archivo').attr('src', e.target.result);
            $('#upload').prop('disabled', false);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#archivo').attr('src', "{{ asset('img/sin-foto.jpg') }}");
        $('#upload').prop('disabled', true);
    }
}

$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
