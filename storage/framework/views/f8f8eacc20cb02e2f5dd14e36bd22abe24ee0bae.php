<?php $__env->startSection('content'); ?>
<!--about section-->
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
          <div class="tab-content">
            <div class="section-title text-center">
            <h3>SERVICIOS A PERSONAS</h3>
            </div>

            <div class="subtitulo"></div>

            <div class="service-box text">
              <p>Para las personas somos una alternativa ONLINE de colaboración en la búsqueda de un nuevo empleo, si has dejado de trabajar, si deseas cambiar de trabajo o si estás buscando un empleo por primera vez.</p>
            </div>
            <div class="service-box boxes text">
              <div class="row">
                <div class="col-md-8">
                  <div class="section-title">
                  <h4>Búsqueda de oportunidad laboral</h4>
                  </div>
                  <ul>
                    <li>Registrar tu perfil profesional Online</li>
                    <li>Realizar Postulaciones a las vacantes disponibles </li>
                    <li>Revisar el proceso y conocer en línea el estado de tu participación </li>
                    <li>Redacción y corrección de currículo vitae </li>
                    <li>Asesoría de imagen y presentación personal.</li>
                    <li>Asesoría en leyes sociales</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <br>
                  <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->tipo == 1): ?>
                      <a href="<?php echo e(route('ofertas-laborales')); ?>" class="btn btn-style-one text-center">Buscar Ofertas</a>
                    <?php endif; ?>
                  <?php else: ?>
                  <a href="<?php echo e(route('register')); ?>" class="btn btn-style-one text-center">Buscar Ofertas</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          
          <!--div class="section-title parrafo-final">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div-->

        </div>
      </div>
    </div>
  </div>
</section>
<!--End about section-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/servicios-personas.blade.php ENDPATH**/ ?>