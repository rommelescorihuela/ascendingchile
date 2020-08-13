<?php $__env->startSection('content'); ?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>REGISTRATE GRATIS</h3>
                  </div>
              </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-4">
                    <!-- Slide Content Start -->
                    <div class="content style text-left registro-fondo" style="background:url(<?php echo e(asset('img/servicios-a-personas.jpg')); ?>) no-repeat center center;background-size: cover;">
                        <h3 style="background: #FFF; padding-bottom: 10px;">Personas</h3>
                        <h4 class="text-white text-bold mb-2 text-center caluga-registrate"></h4>
                        <div class="text-center" style="margin-top: 10px;"><a href="<?php echo e(route('register')); ?>" class="btn btn-style-one text-center">Registrarse</a></div>
                    </div>
                    
                    <!-- Slide Content End -->
                </div>
                <div class="col-md-4">
                    <!-- Slide Content Start -->
                    <div class="content style text-left registro-fondo" style="background:url(<?php echo e(asset('img/servicios-a-empresas.jpg')); ?>) no-repeat center center;background-size: cover;">
                        <h3 style="background: #FFF; padding-bottom: 10px;">Empresas</h3>
                        <h4 class="text-white text-bold mb-2 text-center caluga-registrate"></h4>
                        <div class="text-center" style="margin-top: 10px;"><a href="<?php echo e(route('registro-empresa')); ?>" class="btn btn-style-one text-center">Registrarse</a></div>

                    </div>

                    <!-- Slide Content End -->
                </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/registrate.blade.php ENDPATH**/ ?>