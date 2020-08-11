<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script-->
    <script src="{{ asset('plugins/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
    <!-- FancyBox -->
    <link rel="stylesheet" href="{{ asset('plugins/fancybox/jquery.fancybox.min.css') }}">

    <!-- Stylesheets -->
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://tareas.nisadelgado.com/node_modules/sweetalert2/dist/sweetalert2.css">

    @yield('assets_adicionales')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170808909-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-170808909-1');
</script>

</head>
<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->

<!--Header Upper-->
<section class="header-uper">
    <!--Main Header-->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="logo-nuevo">
                <a href="{{ route('index') }}"><img src="{{ asset('img/ascending-logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="130"></a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                      aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                </button>
            </div>
            <div class="right-side">
                @guest
                <div class="login">
                      <a href="{{ route('login') }}" class="">{{ __('Login') }}</a>
                </div>
                <div class="link-btn">
                      <a href="{{ route('registrate') }}" class="btn-style-one">{{ __('Register') }}</a>
                </div>
                @else
                <ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="
                              @if(Auth::user()->tipo == 0)
                              {{ route('dashboard') }}
                              @elseif(Auth::user()->tipo == 2)
                              {{ route('perfil-empresa') }}
                              @elseif(Auth::user()->tipo == 3)
                              {{ route('perfil-op') }}
                              @else
                              {{ route('perfil') }}
                              @endif
                              ">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                @if(Auth::user()->tipo == 0)
                                {{ __('Administración') }}
                                @else
                                {{ __('Mi Perfil') }}
                                @endif
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                @endguest
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ (Route::current()->getName() == 'index' ? 'active':'') }}">
                          <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="{{ (Route::current()->getName() == 'nosotros' ? 'active':'') }}">
                          <a href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="{{ (Route::current()->getName() == 'servicios-empresas' || Route::current()->getName() == 'servicios-personas' ? 'active':'') }}">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="{{ (Route::current()->getName() == 'servicios-empresas' ? 'active':'') }}"><a class="dropdown-item" href="{{ route('servicios-empresas') }}">Servicios Empresas</a></li>
                          <li class="{{ (Route::current()->getName() == 'servicios-personas' ? 'active':'') }}"><a class="dropdown-item" href="{{ route('servicios-personas') }}">Servicios Personas</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Route::current()->getName() == 'winwin' || Route::current()->getName() == 'empresas' ? 'active':'') }}">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Win Win <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          @guest
                          <li class="{{ (Route::current()->getName() == 'winwin' ? 'active':'') }}"><a class="dropdown-item" href="{{ route('winwin') }}">Registro</a></li>
                          @endguest
                          <li class="{{ (Route::current()->getName() == 'empresas' ? 'active':'') }}"><a class="dropdown-item" href="{{ route('empresas') }}">Empresas</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Route::current()->getName() == 'contacto' ? 'active':'') }}">
                          <a href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <!--End Main Header -->
</section>
<!--Header Upper-->

@yield('content')

<!--footer-main-->
<footer class="footer-main">
  <div class="footer-top">
    <div class="container">
      <div class="row">

           <!--BLOQUE 3 -->


        <!--<div class="col-md-4 col-sm-6 col-xs-12">
          <div class="decoration"><h6>Nosotros</h6></div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, temporibus?</p>
         
        </div>-->


        <!-- BLOQUE 1-->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="about-widget">
            <div class="decoration"><h6>Dirección</h6></div>
            <!--<div class="footer-logo">
              <figure>
                <a href="index.html">
                  <img src="images/logo-2.png" alt="">
                </a>
              </figure>
            </div>-->
            <ul class="location-link">
              <li class="item">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                <p>Whatsapp: +56 9 7377 8493</p>
              </li>
              <li class="item">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <a href="#">
                  <p>contacto@ascendingchile.cl</p>
                </a>
              </li>
              <li class="item">
                <i class="fa fa-map-marker"></i>
                <p>Evaristo Lillo 96, Las Condes. Santiago - RM</p>
              </li>
            </ul>
            <!--ul class="list-inline social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul-->
          </div>
        </div>

<!-- BLOQUE 2-->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="decoration"><h6>Información</h6></div>
          <ul class="menu-link">
            <li>
              <a href="{{ asset('pdf/PDFterminosycondiciones.pdf') }}" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Términos y Condiciones de Uso</a>
            </li>
            <li>
              <a href="{{ asset('pdf/PDFtpoliticasdeprivacidad.pdf') }}" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Políticas de Privacidad</a>
            </li>
            <li>
              <a href="{{ asset('pdf/PDFleydeprotecciondedatos.pdf') }}" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Ley Protección de Datos Personales</a>
            </li>
          </ul>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="decoration"><h6>Redes Sociales</h6></div>
          <ul class="menu-link sociales-footer">
            <li>
              <a href="#" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="https://instagram.com/ascendingchile/" target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" target="_blank">
                <i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div> 


      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container clearfix">
      <div class="copyright-text">
        <p>&copy; 2019. Ascending Consulting. Todos los derechos reservados.
        </p>
      </div>
      <ul class="footer-bottom-link">
            <li>
                  <a href="{{ route('index') }}">Home</a>
            </li>
            <li>
                  <a href="{{ route('nosotros') }}">Nosotros</a>
            </li>
            <li>
                  <a href="{{ route('contacto') }}">Contacto</a>
            </li>
      </ul>
    </div>
  </div>
</footer>
<!--End footer-main-->

</div>
<!--End pagewrapper-->

<script src="{{ asset('plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select.min.js') }}"></script>
<!-- FancyBox -->
<script src="{{ asset('plugins/fancybox/jquery.fancybox.min.js') }}"></script>

@if(Route::current()->getName() == 'index' || Route::current()->getName() == 'contacto')
<!-- Google Map -->
<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{ asset('plugins/google-map/gmap.js') }}"></script-->
@endif

<script src="{{ asset('plugins/validate.js') }}"></script>
<script src="{{ asset('plugins/wow.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('plugins/timePicker.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  redimension();
  $( window ).on('resize', function() {
    redimension();
  });
  function redimension() {
    if($( window ).width() >= 768) {
      //$('.hero-slider').css('padding-top', $('.header-uper').innerHeight());
      $('.section').css('padding-top', $('.header-uper').innerHeight());
    }
  }
</script>
    @yield('script_adicional')
</body>
</html>
