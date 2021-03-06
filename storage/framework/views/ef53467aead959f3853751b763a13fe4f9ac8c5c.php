<?php $__env->startSection('content'); ?>


<section class="section" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
          <div class="tab-content">
            <div class="section-title text-center">
            <h3>WIN WIN<br>
              <small>VIVE Y BENEFICIATE DE LA FILOSOFÍA ASCENDING</small></h3>
            </div>

            <div class="subtitulo"></div>

            <div class="service-box text">
              <p>Como persona o empresa serás parte de una gran comunidad.</p>
              <p>Si piensas en ayudar por encima de ganar dinero, este acaba llegando seguro.</p>
              <p>En Ascending Chile queremos que vivas la experiencia de esta filosofía y para ello utilizaremos la tecnología como una fuerza, que nos ayude a empujar nuestro negocio y también el de nuestros clientes.</p>
              <p>Hemos creado esta sección tanto para nuestros clientes que mantienen contratos de servicios con Ascending Chile y también para aquellas empresas que sólo deseen promover sus servicios a través de nuestra gran comunidad Ascending.</p>
            </div>
            <div class="service-box boxes text">
              <div class="row">
                <div class="col-md-8">
                    <div class="section-title">
                        <h4>Beneficios del Networking en redes</h4>
                    </div>
                    <ul>
                        <li>Afianzar la relación con nuestros clientes actuales conociéndolos mejor.</li>
                        <li>Dar a conocer nuestra empresa, sus productos y servicios.</li>
                        <li>Encontrar nuevos clientes o socios comerciales.</li>
                        <li>Conseguir oportunidades de negocio.</li>
                        <li>Trabajar en equipo y formar alianzas.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <br>
                    <a href="#formulario" class="btn btn-style-one text-center">Regístrate</a>
                </div>
              </div>
            </div>

          
          <div class="section-title" id="formulario">
            <p>Para tener acceso a este espacio publicitario debes registrarte como usuario, si sólo desear promover tus servicios debes rellenar el formulario que se encuentra a continuación.</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php if($exito): ?>
<section id="alerta" style="padding-top: 20px;">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <strong>¡Gracias!</strong> Tus datos se han enviado con éxito.
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="" style="padding-bottom: 60px;">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <form name="contact_form" class="default-form contact-form" action="<?php echo e(route('winwin')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row form-winwin">
                            <div class="col-md-12">
                                <h4 style="text-transform: uppercase;">Datos para crear perfil o registro empresa</h4>
                                <br>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Adjuntar logotipo</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="file" name="logo" required="" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Sitio web</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">https://</div>
                                    <input type="text" class="form-control" name="web" required>
                                </div>
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Descripción de servicios</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <textarea name="servicios" required="" class="form-control" maxlength="255"></textarea>
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Industria</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                <select id="industria" class="comunas form-control<?php echo e($errors->has('industria') ? ' is-invalid' : ''); ?>" name="industria" required>
                                    <option value="" selected disabled>Seleccione industria...</option>
                                    <?php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    ?>
                                    <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($industria->id); ?>" <?php echo e((old('industria') == $industria->id) ? 'selected':''); ?>><?php echo e($industria->industria); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Email</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="email" name="email" required="" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Twitter</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="text" name="twitter" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Instagram</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="text" name="instagram" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Facebook</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="text" name="facebook" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>
                            <div class="col-sm-4 col-xs-12">
                                <h4>Teléfono</h4>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                 <input type="text" name="fono" class="form-control">
                            </div>
                            <div class="col-xs-12"><br></div>

                            <div class="col-sm-5 col-xs-12 col-sm-offset-4">
                              <div class="form-group text-center">
                                    <button type="submit" class="btn-style-one btn-iniciar-sesion">Registrarse</button>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
          </div>  
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
<script>
<?php if($exito): ?>
    $('html, body').animate({
        scrollTop: ($('#alerta').offset().top -100)
    },500);
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/winwin.blade.php ENDPATH**/ ?>