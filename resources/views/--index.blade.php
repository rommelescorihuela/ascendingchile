@extends('layouts.app')

@section('content')
<!--=================================
=            Page Slider            =
==================================-->
<div class="hero-slider">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url({{ asset('img/home-portada.jpg')  }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-left">
                        <h2 class="text-white text-bold mb-2">NUESTRO VALOR</h2>
                        <p class="tag-text mb-5">Siempre estaremos enfocados hacia las personas y nuestros clientes</p>
                        <a href="#" class="btn btn-main btn-white">CONÓCENOS</a>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--====  End of Page Slider  ====-->

<section class="cta" id="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-block">
                    <div class="bloque item">
                        <img src="{{ asset('img/servicios-a-personas.jpg') }}" class="img-responsive">
                        <div class="info-bloque decoration">
                        <h2>Servicios a Personas</h2>
                        <p>Somos una alternativa ONLINE de colaboración en la búsqueda de un nuevo empleo, si has dejado de trabajar, si deseas cambiar de trabajo o si estás buscando por primera vez.<br>
                        Un potencial candidato, no solo tendrá la oportunidad de participar en los procesos de selección sino también contará con una asesoría personalizada  con la finalidad de aumentar sus posibilidades de ser el elegido.</p>
                        <a href="#" class="btn-style-one">Más información</a>
                        </div>
                    </div>
                    <div class="bloque item">
                        <img src="{{ asset('img/servicios-a-personas.jpg') }}" class="img-responsive">
                        <div class="info-bloque decoration">
                        <h2>Servicios a Empresas</h2>
                        <p>Para las empresas somos un socio estratégico en la búsqueda de soluciones a los requerimientos de recursos humanos, asesorías comerciales y de reestructuración.<br>
                        Nos adaptamos a las posibilidades y necesidades de cada organización.<br>
                        Operamos con metas, mediciones y parámetros objetivos alineados a la estrategia de cada organización.</p>
                        <a href="#" class="btn-style-one">Más información</a>
                        </div>
                    </div>
                    <div class="bloque item">
                        <img src="{{ asset('img/asesorias-comerciales.jpg') }}" class="img-responsive">
                        <div class="info-bloque decoration">
                        <h2>Asesoría Comercial</h2>
                        <p>Asesorías Comerciales en proyectos de Tecnología de la Información y Telecomunicaciones,  búsqueda de soluciones, gestión de proveedores, apoyo en los cierres de negocio y liderazgo en los procesos de implementación.</p>
                        <a href="#" class="btn-style-one">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- INFO -->


<!--about section-->
<section class="feature-section section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="image-content">
					<!--<div class="section-title text-center">
						<h3>Best Features
							<span>of Our Hospital</span>
						</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam magni in at debitis <br>
							nam error officia vero tempora alias? Sunt?</p>
					</div>-->

          <div class="tab-content">
                        <div class="service-box tab-pane fade in active row" >
                            <div class="col-md-6">
                                <img class="img-responsive" src="{{ asset('img/home-nosotros.jpg') }}" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>XX años de<br><span style="color:#008000!important; font-weight: 700;">experiencia</span></h3>
                                    </div>
                                    <div class="col-md-6 text">
                                        <p>Somos una organización dedicada a brindar soluciones en el área de Recursos Humanos (RRHH). Expertos en procesos de reclutamiento, selección de personas y asesorías comerciales dirigidas a empresas.</p>
                                    </div>
                                     <div class="col-md-6 text">
                                    <p>Una empresa con una nueva visión de negocio, que tiene el foco puesto en las personas como un todo, más allá de un recurso disponible para brindar soluciones. Muy preocupados de la protección al medio ambiente y el desarrollo social.</p>
                                  </div>
                                  <div class="col-md-12 text-center">
                                    <p><b>Queremos cambiar y contribuir al mundo haciendo mejores personas.</b></p>
                                    </div>
                                    <div class="col-md-4 text">
                                      <p><b>Nuestro Compromiso</b></p>
                                    <p>Nuestro compromiso es contribuir al logro de las organizaciones y personas. Nos adecuamos  a tus necesidades sin importar el tamaño ni procedencia de estas.</p>
                                  </div>
                                  <div class="col-md-4 text">
                                    <p><b>Por qué elegirnos</b></p>
                                    <p>Somos una nueva alternativa digital, una plataforma donde candidatos y empresas podrán interactuar en tiempo real.</p>
                                  </div>
                                  <div class="col-md-4 text">
                                    <p><b>Oferta de Valor</b></p>
                                    <p>Nuestro máximo esfuerzo siempre estará enfocado a las personas y nuestros clientes.</p>
                                  </div>

                                    
                                    <!--<a href="#" class="btn btn-style-one">Read more</a>-->
                                </div>
                            </div>
                        </div>
</section>
<!--End about section-->

				
<section class="map">
    <!-- Google Map -->
    <div id="map"></div>
</section>

@endsection
