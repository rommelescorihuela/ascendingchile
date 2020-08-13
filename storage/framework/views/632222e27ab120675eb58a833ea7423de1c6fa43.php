<?php $__env->startSection('content'); ?>


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

                    <div class="btn-sesion text-center"><a href="<?php echo e(route('oferta-laboral')); ?>" class="btn btn-style-one text-center">Entrar</a></div>
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

                    <div class="btn-sesion text-center"><a href="<?php echo e(route('levantar-perfil')); ?>" class="btn btn-style-one text-center">Entrar</a></div>
                </div>
                <!-- Slide Content End -->
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/emp/sesion-iniciada.blade.php ENDPATH**/ ?>