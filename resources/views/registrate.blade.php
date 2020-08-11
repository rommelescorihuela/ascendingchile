@extends('layouts.app')

@section('content')
{{--
<div class="hero-slider">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url({{ asset('img/home-portada.jpg') }}); align-items: flex-end; padding-bottom: 2em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-left">
                        <h3 style="color:#FFF;">REGISTRATE GRATIS</h3>
                        <br>
                        <p class="tag-text">Vive y benefíciate de la cultura Ascending.
                        <br>
                        Como persona u empresa serás parte de una gran comunidad.</p>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>REGISTRATE GRATIS</h3>
                  </div>
              </div>
                <div class="col-md-2">
                    {{--<p style="margin-top: 100px;">Vive y benefíciate de la cultura Ascending.
                        <br>
                        Como persona u empresa serás parte de una gran comunidad.</p>--}}
                </div>
                <div class="col-md-4">
                    <!-- Slide Content Start -->
                    <div class="content style text-left registro-fondo" style="background:url({{ asset('img/servicios-a-personas.jpg') }}) no-repeat center center;background-size: cover;">
                        <h3 style="background: #FFF; padding-bottom: 10px;">Personas</h3>
                        <h4 class="text-white text-bold mb-2 text-center caluga-registrate"></h4>
                        <div class="text-center" style="margin-top: 10px;"><a href="{{ route('register') }}" class="btn btn-style-one text-center">Registrarse</a></div>
                    </div>
                    
                    <!-- Slide Content End -->
                </div>
                <div class="col-md-4">
                    <!-- Slide Content Start -->
                    <div class="content style text-left registro-fondo" style="background:url({{ asset('img/servicios-a-empresas.jpg') }}) no-repeat center center;background-size: cover;">
                        <h3 style="background: #FFF; padding-bottom: 10px;">Empresas</h3>
                        <h4 class="text-white text-bold mb-2 text-center caluga-registrate"></h4>
                        <div class="text-center" style="margin-top: 10px;"><a href="{{ route('registro-empresa') }}" class="btn btn-style-one text-center">Registrarse</a></div>

                    </div>

                    <!-- Slide Content End -->
                </div>
    </div>
</section>
@endsection
