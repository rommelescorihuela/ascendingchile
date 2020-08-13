<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('emp.menu', ['cual' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <?php if($exito): ?>
            <div class="alert alert-success" role="alert">
                <strong>¡Gracias!</strong> El formulario se ha enviado con éxito.
            </div>
            <?php endif; ?>

            <div class="card azul">
                <div class="card-header" style="padding-bottom: 0px;">FORMULARIO PARA LEVANTAMIENTO DE PERFIL</div>
                <p style="color: #fff;">Realiza Levantamiento de perfil online y agiliza tu requerimiento de reclutamiento y/o selección o publicación de tu oferta laboral.</p>
                <br>
                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre del Cargo')); ?></label>

                            <div class="col-md-8">
                                <input id="cargo" type="text" class="form-control <?php if ($errors->has('cargo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cargo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cargo" value="<?php echo e(old('cargo')); ?>" required autocomplete="cargo" maxlength="255">

                                <?php if ($errors->has('cargo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cargo'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Ubicación del cargo en la estructura organizacional')); ?></label>

                            <div class="col-md-8">
                                <input id="ubicacion" type="text" class="form-control <?php if ($errors->has('ubicacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ubicacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ubicacion" value="<?php echo e(old('ubicacion')); ?>" required autocomplete="ubicacion" maxlength="255">

                                <?php if ($errors->has('ubicacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ubicacion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="superior" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cargo superior al que reporta')); ?></label>

                            <div class="col-md-8">
                                <input id="superior" type="text" class="form-control <?php if ($errors->has('superior')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('superior'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="superior" value="<?php echo e(old('superior')); ?>" required autocomplete="superior" maxlength="255">

                                <?php if ($errors->has('superior')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('superior'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="supervisa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cargos que supervisa')); ?></label>

                            <div class="col-md-8">
                                <textarea id="supervisa" class="form-control <?php if ($errors->has('supervisa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('supervisa'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="supervisa" required autocomplete="supervisa" rows="4" maxlength="255"><?php echo e(old('supervisa')); ?></textarea>

                                <?php if ($errors->has('supervisa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('supervisa'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proposito" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Propósito del Cargo')); ?></label>

                            <div class="col-md-8">
                                <textarea id="proposito" class="form-control <?php if ($errors->has('proposito')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('proposito'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="proposito" required autocomplete="proposito" rows="4" maxlength="1000"><?php echo e(old('proposito')); ?></textarea>

                                <?php if ($errors->has('proposito')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('proposito'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="funciones" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Funciones del Cargo')); ?></label>

                            <div class="col-md-8">
                                <textarea id="funciones" class="form-control <?php if ($errors->has('funciones')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('funciones'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="funciones" required autocomplete="funciones" rows="4" maxlength="1000"><?php echo e(old('funciones')); ?></textarea>

                                <?php if ($errors->has('funciones')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('funciones'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="competencias" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Competencias del Cargo')); ?></label>

                            <div class="col-md-8">
                                <input id="competencias" type="text" class="form-control <?php if ($errors->has('competencias')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('competencias'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="competencias" value="<?php echo e(old('competencias')); ?>" required autocomplete="competencias" maxlength="255">

                                <?php if ($errors->has('competencias')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('competencias'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comunicacion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Líneas de comunicación internas y externas')); ?></label>

                            <div class="col-md-8">
                                <input id="comunicacion" type="text" class="form-control <?php if ($errors->has('comunicacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comunicacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="comunicacion" value="<?php echo e(old('comunicacion')); ?>" required autocomplete="comunicacion" maxlength="255">

                                <?php if ($errors->has('comunicacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comunicacion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deseables" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Requisitos Deseables')); ?></label>

                            <div class="col-md-8">
                                <textarea id="deseables" class="form-control <?php if ($errors->has('deseables')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('deseables'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="deseables" required autocomplete="deseables" rows="4" maxlength="1000"><?php echo e(old('deseables')); ?></textarea>

                                <?php if ($errors->has('deseables')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('deseables'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="excluyentes" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Requisitos Excluyentes')); ?></label>

                            <div class="col-md-8">
                                <textarea id="excluyentes" class="form-control <?php if ($errors->has('excluyentes')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('excluyentes'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="excluyentes" required autocomplete="excluyentes" rows="4" maxlength="1000"><?php echo e(old('excluyentes')); ?></textarea>

                                <?php if ($errors->has('excluyentes')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('excluyentes'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/emp/levantamiento.blade.php ENDPATH**/ ?>