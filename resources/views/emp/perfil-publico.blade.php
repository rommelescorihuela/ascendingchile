@extends('layouts.app')

@section('assets_adicionales')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="sidebar-wrapper">
                <img src="{{ Storage::disk('logos')->url($yo->foto) }}" class="img-perfil" id="archivo">
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                PERFIL EMPRESA
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" {{ (isset($yo) ? 'action='.url('perfil-empresa-edit') : '') }}>
                        @csrf
@if(!isset($yo))
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', ($yo->nombre ?? '')) }}" required autocomplete="nombre" autofocus disabled>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="industria" class="col-md-4 col-form-label text-md-right">{{ __('Industria') }}</label>

                            <div class="col-md-8">
                                <select disabled id="industria" class="comunas form-control{{ $errors->has('industria') ? ' is-invalid' : '' }}" name="industria" required>
                                    <option value="" selected disabled>Seleccione industria...</option>
                                    @php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    @endphp
                                    @foreach($industrias as $industria)
                                        <option value="{{ $industria->id }}" {{ (old('industria', ($yo->industria ?? '')) == $industria->id) ? 'selected':'' }}>{{ $industria->industria }}</option>
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
                            <label for="gerente" class="col-md-4 col-form-label text-md-right">{{ __('Gerente de Recursos Humanos') }}</label>

                            <div class="col-md-8">
                                <input id="gerente" disabled type="text" class="form-control @error('gerente') is-invalid @enderror" name="gerente" value="{{ old('gerente', ($yo->gerente ?? '')) }}" required autocomplete="gerente">

                                @error('gerente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contacto" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Contacto') }}</label>

                            <div class="col-md-8">
                                <input id="contacto" disabled type="text" class="form-control @error('contacto') is-invalid @enderror" name="contacto" value="{{ old('contacto', ($yo->contacto ?? '')) }}" required autocomplete="contacto">

                                @error('contacto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-8">
                                <input id="fono" disabled type="text" class="form-control @error('fono') is-invalid @enderror" name="fono" value="{{ old('fono', ($yo->fono ?? '')) }}" required autocomplete="fono">

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
                                <input id="direccion" disabled type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion', ($yo->direccion ?? '')) }}" required autocomplete="direccion">

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
                                <select id="comuna_id" disabled class="comunas select2 form-control{{ $errors->has('comuna_id') ? ' is-invalid' : '' }}" name="comuna_id" required>
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', ($yo->email ?? '')) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="web" class="col-md-4 col-form-label text-md-right">{{ __('Sitio Web') }}</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">https://</div>
                                    <input disabled id="web" type="text" class="form-control @error('web') is-invalid @enderror" name="web" value="{{ old('web', ($yo->web ?? '')) }}" required autocomplete="web">
                                </div>

                                @error('web')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colaboradores" class="col-md-4 col-form-label text-md-right">{{ __('Número de Colaboradores') }}</label>

                            <div class="col-md-8">
                                <input disabled id="colaboradores" type="number" min="0" class="form-control @error('colaboradores') is-invalid @enderror" name="colaboradores" value="{{ old('colaboradores', ($yo->colaboradores ?? '')) }}" required autocomplete="colaboradores">

                                @error('colaboradores')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="height: 5%"></div>
    <div class="col-md-4"></div>
<div class="col-md-4"><a href="{{url('customer/Empresaprint-pdf',$yo->id)}}" class="btn btn-primary">Print PDF</a></div>
</div>
@endsection


@section('script_adicional')
<script>
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