<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script-->
    <script src="<?php echo e(asset('plugins/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
    <!-- FancyBox -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fancybox/jquery.fancybox.min.css')); ?>">

    <!-- Stylesheets -->
    <link href="<?php echo e(asset('css/estilo.css')); ?>" rel="stylesheet">

    <!-- Styles -->
    <!--link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"-->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('assets_adicionales'); ?>
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
                <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('img/ascending-logo.svg')); ?>" alt="<?php echo e(config('app.name', 'Laravel')); ?>" width="130"></a>
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
                <?php if(auth()->guard()->guest()): ?>
                <div class="login">
                      <a href="<?php echo e(route('login')); ?>" class=""><?php echo e(__('Login')); ?></a>
                </div>
                <div class="link-btn">
                      <a href="<?php echo e(route('registrate')); ?>" class="btn-style-one"><?php echo e(__('Register')); ?></a>
                </div>
                <?php else: ?>
                <ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="
                              <?php if(Auth::user()->tipo == 0): ?>
                              <?php echo e(route('dashboard')); ?>

                              <?php elseif(Auth::user()->tipo == 2): ?>
                              <?php echo e(route('perfil-empresa')); ?>

                              <?php else: ?>
                              <?php echo e(route('perfil')); ?>

                              <?php endif; ?>
                              ">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php if(Auth::user()->tipo == 0): ?>
                                <?php echo e(__('Administración')); ?>

                                <?php else: ?>
                                <?php echo e(__('Mi Perfil')); ?>

                                <?php endif; ?>
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a></li>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php echo e((Route::current()->getName() == 'index' ? 'active':'')); ?>">
                          <a href="<?php echo e(route('index')); ?>">Home</a>
                    </li>
                    <li class="<?php echo e((Route::current()->getName() == 'nosotros' ? 'active':'')); ?>">
                          <a href="<?php echo e(route('nosotros')); ?>">Nosotros</a>
                    </li>
                    <li class="<?php echo e((Route::current()->getName() == 'servicios-empresas' || Route::current()->getName() == 'servicios-personas' ? 'active':'')); ?>">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="<?php echo e((Route::current()->getName() == 'servicios-empresas' ? 'active':'')); ?>"><a class="dropdown-item" href="<?php echo e(route('servicios-empresas')); ?>">Servicios Empresas</a></li>
                          <li class="<?php echo e((Route::current()->getName() == 'servicios-personas' ? 'active':'')); ?>"><a class="dropdown-item" href="<?php echo e(route('servicios-personas')); ?>">Servicios Personas</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo e((Route::current()->getName() == 'winwin' || Route::current()->getName() == 'empresas' ? 'active':'')); ?>">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Win Win <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <?php if(auth()->guard()->guest()): ?>
                          <li class="<?php echo e((Route::current()->getName() == 'winwin' ? 'active':'')); ?>"><a class="dropdown-item" href="<?php echo e(route('winwin')); ?>">Registro</a></li>
                          <?php endif; ?>
                          <li class="<?php echo e((Route::current()->getName() == 'empresas' ? 'active':'')); ?>"><a class="dropdown-item" href="<?php echo e(route('empresas')); ?>">Empresas</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo e((Route::current()->getName() == 'contacto' ? 'active':'')); ?>">
                          <a href="<?php echo e(route('contacto')); ?>">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <!--End Main Header -->
</section>
<!--Header Upper-->

<?php echo $__env->yieldContent('content'); ?>

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
        <div class="col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="decoration"><h6>Información</h6></div>
          <ul class="menu-link">
            <li>
              <a href="<?php echo e(asset('pdf/PDFterminosycondiciones.pdf')); ?>" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Términos y Condiciones de Uso</a>
            </li>
            <li>
              <a href="<?php echo e(asset('pdf/PDFtpoliticasdeprivacidad.pdf')); ?>" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Políticas de Privacidad</a>
            </li>
            <li>
              <a href="<?php echo e(asset('pdf/PDFleydeprotecciondedatos.pdf')); ?>" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Ley Protección de Datos Personales</a>
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
                  <a href="<?php echo e(route('index')); ?>">Home</a>
            </li>
            <li>
                  <a href="<?php echo e(route('nosotros')); ?>">Nosotros</a>
            </li>
            <li>
                  <a href="<?php echo e(route('contacto')); ?>">Contacto</a>
            </li>
      </ul>
    </div>
  </div>
</footer>
<!--End footer-main-->

</div>
<!--End pagewrapper-->

<script src="<?php echo e(asset('plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-select.min.js')); ?>"></script>
<!-- FancyBox -->
<script src="<?php echo e(asset('plugins/fancybox/jquery.fancybox.min.js')); ?>"></script>

<?php if(Route::current()->getName() == 'index' || Route::current()->getName() == 'contacto'): ?>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="<?php echo e(asset('plugins/google-map/gmap.js')); ?>"></script>
<?php endif; ?>

<script src="<?php echo e(asset('plugins/validate.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/wow.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/timePicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>
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
    <?php echo $__env->yieldContent('script_adicional'); ?>
</body>
</html>
<?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/layouts/app.blade.php ENDPATH**/ ?>