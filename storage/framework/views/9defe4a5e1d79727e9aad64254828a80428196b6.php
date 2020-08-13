<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/slick/slick.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/slick/slick-theme.css')); ?>"/>
<script src="<?php echo e(asset('plugins/slick/slick.js')); ?>" defer></script>
<style>
    .hero-slider .slider-item:before {
        position: absolute;
        background: rgba(0, 0, 0, 0.0) !important;
        content: '';
        top: 0;
        height: 0;
        width: 0;
    }
    .m-auto{
        margin: auto;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--=================================
=            Page Slider            =
==================================-->
<div class="hero-slider index">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url(<?php echo e(asset('img/home-portada-2.jpg')); ?>); align-items: flex-end; padding-bottom: 2em;">
        <div style="width: 90%;">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <a href="<?php echo e(route('registrate')); ?>" class="btn btn-default btn-lg">Regístrate</a>
                    <!--a href="http://test.ascendingchile.cl/registro-empresa" class="btn btn-default btn-lg">Publica tus ofertas</a-->
                    
                    <!-- Slide Content Start -->
                    <!--a href="<?php echo e(route('nosotros')); ?>"><div class="content style text-left conocenos">
                        <h2 class="text-white text-bold mb-2">NUESTRO VALOR</h2>
                        <p class="tag-text mb-5">Siempre estaremos enfocados hacia las personas y nuestros clientes</p>
                        <a href="<?php echo e(route('nosotros')); ?>" class="btn btn-main btn-white">CONÓCENOS</a-->
                        <!--<h1 style="color: #FFF;">CONÓCENOS</h1>
                        <br>
                        <p class="tag-text">Vive y benefíciate de la cultura Ascending.
                        <br>
                        Como persona o empresa serás parte de una gran comunidad.</p>
                    </div></a-->
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--====  End of Page Slider  ====-->

<section class="cta" id="cta">
    <div class="container">
        <div class="row" style="margin: 40px auto;">
            <div class="col-md-12">
                <div class="cta-block">
                    <div class="bloque item info-bloque flexible">
                        <h2>Servicios a Personas</h2>
                        <a href="<?php echo e(route('servicios-personas')); ?>" class="desktop"><img src="<?php echo e(asset('img/servicios-a-personas.jpg')); ?>" class="img-responsive"></a>

                        <iframe class="mobile" width="100%" height="200" src="https://www.youtube.com/embed/stbiMJZPAVY?controls=0&modestbranding=1&rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                        <p>Somos una alternativa ONLINE de colaboración en la búsqueda de un nuevo empleo, si has dejado de trabajar, si deseas cambiar de trabajo o si estás buscando por primera vez.</p>
                        <a href="<?php echo e(route('servicios-personas')); ?>" class="btn-style-one">Más información</a>
                    </div>
                    <div class="bloque item info-bloque flexible">
                        <h2>Servicios a Empresas</h2>
                        <a href="<?php echo e(route('servicios-empresas')); ?>" class="desktop"><img src="<?php echo e(asset('img/servicios-a-empresas.jpg')); ?>" class="img-responsive"></a>

                        <iframe class="mobile" width="100%" height="200" src="https://www.youtube.com/embed/lPTRm9YMAV4?controls=0&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                        <p>Para las empresas somos un socio estratégico en la búsqueda de soluciones a los requerimientos de recursos humanos, asesorías comerciales y de reestructuración.</p>
                        <a href="<?php echo e(route('servicios-empresas')); ?>" class="btn-style-one">Más información</a>
                    </div>
                    <div class="bloque item info-bloque flexible">
                        <h2>Asesoría Comercial</h2>
                        <a href="<?php echo e(route('contacto')); ?>"><img src="<?php echo e(asset('img/asesorias-comerciales.jpg')); ?>" class="img-responsive"></a>
                        
                        <p>Asesorías Comerciales en proyectos de Tecnología de la Información y Telecomunicaciones. Búsqueda de soluciones, gestión de proveedores, apoyo en los cierres de negocio y liderazgo en los procesos de implementación.</p>
                        <a href="<?php echo e(route('contacto')); ?>" class="btn-style-one">Más información</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--about section-->
<section class="feature-section section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <!--<div class="image-content">
                    <div class="section-title text-center">
                        <h3>Best Features
                            <span>of Our Hospital</span>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam magni in at debitis <br>
                            nam error officia vero tempora alias? Sunt?</p>
                    </div>
                </div>-->

                <div class="tab-content">
                    <div class="service-box tab-pane fade in active row" >
                        <div class="col-md-6">
                            <!--img class="img-responsive" src="<?php echo e(asset('img/home-nosotros.jpg')); ?>" alt="service-image"-->
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/TEXiNZeDiXA?controls=0&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="contents">
                                <div class="section-title">
                                    <h3>SOMOS <span style="color:#008000!important; font-weight: 700;">ASCENDING CHILE</span></h3>
                                </div>
                                <div class="col-md-12 text">
                                    <p>Una nueva alternativa digital cuyo objetivo es brindar soluciones de Recursos Humanos.
                                    <br>Expertos en procesos de reclutamiento y selección, hacemos de la tecnología una herramienta de gestión que te permite mejorar procesos, disminuir los tiempos de búsqueda, aumentar el índice de respuestas a tus convocatorias (si eres empresa) , disminuir costos en traslados y /o perdida de otras posibles oportunidades laborales en el caso de nuestros perfiles profesionales.
                                    <br>Como empresa o candidato tendrás la alternativa de realizar entrevistas online, dependiendo del cargo.</p>
                                    <!--p>Somos una empresa dedicada a brindar soluciones en el área de Recursos Humanos (RRHH). Expertos en procesos de reclutamiento, selección de personas y asesorías comerciales dirigidas a empresas.</p>
                                </div>
                                <div class="col-md-12 text">
                                    <p>Una empresa con una nueva visión de negocio, que tiene el foco puesto en las personas como un todo, más allá de un recurso disponible para brindar soluciones. Muy preocupados de la protección al medio ambiente y el desarrollo social.</p-->
                                </div>
                                <!--div class="col-md-12 text-center">
                                    <p><b>Queremos cambiar y contribuir al mundo haciendo mejores personas.</b></p>
                                </div>
                                <div class="col-md-4 text">
                                  <p><b>Por qué elegirnos</b></p>
                                    <p>The implant fixture is first placed, so that it ilikely to osseointegrate, then a dental prosthetic is added.</p>
                                </div>
                                <div class="col-md-4 text">
                                    <p><b>Por qué elegirnos</b></p>
                                    <p>The implant fixture is first placed, so that it ilikely to osseointegrate, then a dental prosthetic is added.</p>
                                </div>
                                <div class="col-md-4 text">
                                    <p>The implant fixture is first placed, so that it ilikely to osseointegrate, then a dental prosthetic is added.</p>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End about section-->


<?php if(count($wws) >= 1): ?>
<section class="cta" id="cta">
    <div class="container">
        <div class="row" style="margin: 40px auto;">
            <div class="col-md-12">
                <div class="carrusel">
                <?php $__currentLoopData = $wws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><a href="https://<?php echo e($logo->web); ?>" target="_blank" class="logo-web-home"><img src="<?php echo e(Storage::disk('public')->url('logos/'.$logo->logo)); ?>" class="img-perfil img-perfil-2 img-slider"></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script_adicional'); ?>
<script>
    $(window).on("load", function() {
        $('.carrusel').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            pauseOnHover: false,
            //variableWidth: true,
        });

        $('.img-perfil', '.carrusel').each(function(){
            $(this).height($(this).width());
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test_2/resources/views/index.blade.php ENDPATH**/ ?>