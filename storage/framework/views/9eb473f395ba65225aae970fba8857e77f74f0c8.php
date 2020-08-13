<?php $__env->startSection('content'); ?>
<div class="hero-slider">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url(<?php echo e(asset('img/home-portada.jpg')); ?>); align-items: flex-end; padding-bottom: 2em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-left">
                        <h3 style="color:#FFF;">CONTACTO</h3>
                        <br>
                        <p class="tag-text">Para responder a tus dudas y/o consultas, escríbenos a contacto@ascendingchile.cl</p>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>


<!--==================================
=            Contact Form            =
===================================-->
<section class="contact" id="alerta" style="padding: 60px 0;">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 titulo-mobile">
                  <div class="section-title text-center">
                      <h3>CONTACTO</h3><br>
                        <p class="tag-text">Para responder a tus dudas y/o consultas, escríbenos a contacto@ascendingchile.cl</p>
                        <br>
                  </div>
              </div>
<?php if($exito): ?>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <strong>¡Gracias!</strong> Tu mensaje se ha enviado con éxito.
                </div>
            </div>
<?php endif; ?>
            
            <div class="col-md-12">
                <div class="contact-form">
                    <!-- contact form start -->
                    <form action="<?php echo e(route('contacto')); ?>" method="post" class="row">
                        <?php echo csrf_field(); ?>
                        <!-- nombre -->
                        <div class="col-md-6">
                            <input type="text" name="nombre" class="form-control main" placeholder="Nombre" required>
                        </div>
                        <!-- telefono -->
                        <div class="col-md-6">
                            <input type="text" name="fono" class="form-control main" placeholder="Teléfono" required>
                        </div>
                         <!-- email -->
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control main" placeholder="Email" required>
                        </div>
                        <!-- asunto -->
                        <div class="col-md-6">
                            <input type="text" name="asunto" class="form-control main" placeholder="Asunto" maxlength="255" required>
                        </div>
                        <!-- mensaje -->
                        <div class="col-md-12">
                            <textarea name="mensaje" rows="15" class="form-control main" placeholder="Mensaje" maxlength="500"></textarea>
                        </div>
                        <!-- submit button -->
                        <div class="col-md-12 text-center">
                            <button class="btn btn-style-one" type="submit">Enviar</button>
                        </div>
                    </form>
                    <!-- contact form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
<!--====  End of Contact Form  ====-->

<!--================================
=            Google Map            =
=================================-->
<section class="map">
    <!-- Google Map -->
    <div id="map"></div>
</section>
<!--====  End of Google Map  ====-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
<script>
<?php if($exito): ?>
    $('html, body').animate({
        scrollTop: ($('#alerta').offset().top)
    },500);
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/contacto.blade.php ENDPATH**/ ?>