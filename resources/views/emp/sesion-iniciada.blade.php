@extends('layouts.app')

@section('content')
{{--
<!--Page Title-->
<section class="page-title text-center" style="background-image:url({{ asset('img/home-portada.jpg') }}); background-size: cover;" id="contacto">
    <div class="container">
        <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-left">
                        <h4 class="text-white text-bold mb-2">SESION INICIADA</h4>
                        <p class="tag-text mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
    </div>
</section>
<!--End Page Title-->
--}}

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>SESION INICIADA</h3>
                  </div>
            </div>
            <div class="col-md-6">
                <!-- Slide Content Start -->
                <div class="content style text-left sesion-fondo">
                  <div class="caluga-sesion">
                  <i class="fa fa-map-o ico-sesion"></i>
                    <h4 class="text-white text-bold mb-2 text-center text-sesion">FORMULARIO UNICO PARA PUBLICACION DE OFERTA LABORAL</h4>
                  </div>

                    <div class="btn-sesion text-center"><a href="{{ route('oferta-laboral') }}" class="btn btn-style-one text-center">Entrar</a></div>
                </div>
                <!-- Slide Content End -->
            </div>
            <div class="col-md-6">
                <!-- Slide Content Start -->
                <div class="content style text-left sesion-fondo">
                  <div class="caluga-sesion">
                  <i class="fa fa-map-o ico-sesion"></i>
                    <h4 class="text-white text-bold mb-2 text-center text-sesion">FORMULARIO PARA LEVANTAMIENTO DE PERFIL DE CARGO LABORAL</h4>
                  </div>

                    <div class="btn-sesion text-center"><a href="{{ route('levantar-perfil') }}" class="btn btn-style-one text-center">Entrar</a></div>
                </div>
                <!-- Slide Content End -->
            </div>
        </div>
    </div>
</section>
@endsection
