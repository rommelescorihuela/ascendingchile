@extends('layouts.app')

@section('content')
<!--about section-->
<section class="section">
	<div class="container" style="padding-top: 20px;">
		<div class="row">
      <div class="col-sm-6 col-sm-push-6 col-xs-12" style="margin-bottom: 20px;">
          <div class="tab-content">
            <div class="section-title" id="service">
            <h3>SERVICIOS A EMPRESAS</h3>
            </div>

            <div class="subtitulo"></div>

            <div class="service-box text">
              <p>Para las empresas somos un socio estratégico en la búsqueda de soluciones a los requerimientos de recursos humanos, tecnología y asesorías comerciales y de reestructuración. Nos adaptamos a las posibilidades y necesidades de cada organización. Operamos con metas, mediciones y parámetros objetivos alineados a la estrategia de cada organización.</p>
            </div>
          </div>
      </div>
      <div class="col-sm-6 col-sm-pull-6 col-xs-12">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/lPTRm9YMAV4?controls=0&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

      <div class="col-sm-12 col-xs-12">
          <div class="tab-content">
            <div class="service-box boxes text">
              <div class="row">
                <div class="col-md-8">
                  <div class="section-title">
                  <h4>Búsqueda de talentos</h4>
                  </div>
                  <ul>
                    <li>Registro de empresa y publicación de ofertas laborales (gratuitas)</li>
                    <li>Disponibilidad de Perfiles profesionales, que podrás seleccionar en línea</li>
                    <li>Levantamiento de Perfil de Cargo</li>
                    <li>Reclutamiento de Recursos humanos </li>
                    <li>Selección de Personal</li>
                    <li>Evaluaciones Psicolaborales</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <br>
                  <a href="{{ route('perfiles-profesionales') }}" class="btn btn-style-one text-center">Buscar Perfiles</a>
                </div>
              </div>
            </div>

            <div class="service-box boxes text">
              <div class="section-title">
              <h4>Formación</h4>
              </div>
              <ul>
                <li>Proceso de Inducciones corporativas</li>
                <li>Capacitación y Entrenamiento</li>
                <li>Asesoría de imagen para colaboradores</li>
                <li>Gestión del cambio aplicando la neurociencia </li>
              </ul>
              </div>

              <div class="service-box boxes text">
                <div class="section-title">
                <h4>Proyectos y Estudios</h4>
                </div>
                <p>Asesorías especializadas, diagnóstico y propuestas de intervención que fomentan el alineamiento entre la estrategia organizacional y las prácticas de gestión de personas.</p>
                <ul>
                  <li>Desarrollo Organizacional</li>
                  <li>Asesoría en procesos de reestructuración </li>
                  <li>Asesorías comerciales en proyectos tecnológicos </li>
                  <li>Servicios partner o  networking </li>
                  </ul>
              </div>

          </div>


          <div class="section-title text-center">
            <h3>DESCRIPCION DE LOS SERVICIOS</h3>
          </div>

          <!--div class="subtitulo"></div-->

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Registro de Empresa y publicación de ofertas laborales (gratuitas):</p>
          </div>
          <div class="service-box text-left">
            <p>Registro gratuito que te permitirá acceder a los diferentes servicios de asesoría y consultoría.</p>
          </div>


          <div class="titulo-texto text-left">
            <p class="margen-arriba">Disponibilidad de Perfiles profesionales: </p>
          </div>
          <div class="service-box text-left">
            <p>Servicio disponible solo para quienes hayan registrado su perfil empresa, quienes podrán acceder a nuestra base de perfiles profesionales, seleccionar en línea aquel de tu interés</p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Levantamiento de perfil de cargo: </p>
          </div>
          <div class="service-box text-left">
            <p>Determinación de características del cargo, propósito, funciones principales, requisitos, habilidades y competencias necesarias para un desempeño exitoso en el cargo. </p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Publicación de oferta laboral: </p>
          </div>
          <div class="service-box text-left">
            <p>Servicio gratuito, disponible para nuestros clientes empresas a fin de facilitar y agilizar la búsqueda de un candidato. </p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Head Hunting: </p>
          </div>
          <div class="service-box text-left">
            <p>Búsqueda dirigida, que implica reclutamiento dentro de empresas del mismo rubro del cliente e industrias asociadas, evaluando candidatos de nivel ejecutivo, de primera y segunda línea y/o roles técnicos con un alto nivel de especialización.</p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Proceso de selección: </p>
          </div>
          <div class="service-box text-left">
            <p>Búsqueda tradicional, que implica reclutamiento y selección y evaluación psico laboral , evaluando perfiles profesionales del mercado general, dado que las competencias requeridas están asociadas al rol y experiencia, más que a una especialidad.</p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Selección curricular (Solo reclutamiento): </p>
          </div>
          <div class="service-box text-left">
            <p>Atracción y búsqueda selectiva de perfiles profesionales (potenciales), cuyos currículums coinciden con los requisitos del cargo.</p>
          </div>

          <div class="titulo-texto text-left">
            <p class="margen-arriba">Evaluaciones psico laborales: </p>
          </div>
          <div class="service-box text-left">
            <p>Evaluación de perfiles profesionales, sean estos enviados por nuestros clientes empresas o solicitudes realizadas por perfiles profesionales quienes serán evaluados a través de entrevista por competencias, pruebas proyectivas y/o psicométricas acorde al perfil.</p>
          </div>

          <!--<div class="section-title parrafo-final">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>-->
@guest
          <div class="text-center" style="margin-top:3em;">
          <a href="{{ route('registro-empresa') }}" class="btn btn-style-one text-center">Regístrate aquí</a>
          </div>
@endguest
        </div>
      </div>
    </div>
  </div>
</section>
<!--End about section-->
@endsection
