<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('emp.menu', ['cual' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <?php if($exito): ?>
            <div class="alert alert-success" role="alert">
                <strong>¡Gracias!</strong> El formulario se ha enviado con éxito.
            </div>
            <?php endif; ?>

            <div class="card azul">
                <div class="card-header">FORMULARIO UNICO PARA PUBLICACION DE OFERTA LABORAL</div>

                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="industria" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Industria Cliente')); ?></label>

                            <div class="col-md-8">
                                <select id="industria" class="comunas form-control<?php echo e($errors->has('industria') ? ' is-invalid' : ''); ?>" name="industria" required autofocus>
                                    <option value="" selected disabled>Seleccione industria...</option>
                                    <?php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    ?>
                                    <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($industria->id); ?>" <?php echo e((old('industria') == $industria->id) ? 'selected':''); ?>><?php echo e($industria->industria); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('industria')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('industria'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cargo')); ?></label>

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
                            <label for="lugar" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Lugar de Trabajo')); ?></label>

                            <div class="col-md-8">
                                <select id="lugar" class="form-control <?php if ($errors->has('lugar')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lugar'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="lugar" required>
                                    <option value="" selected disabled></option>
                                    <option value="Oficina" <?php echo e((old('lugar') == 'Oficina' ? 'selected':'')); ?>>Oficina</option>
                                    <option value="Terreno" <?php echo e((old('lugar') == 'Terreno' ? 'selected':'')); ?>>Terreno</option>
                                    <option value="Ambas" <?php echo e((old('lugar') == 'Ambas' ? 'selected':'')); ?>>Ambas</option>
                                </select>

                                <?php if ($errors->has('lugar')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lugar'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jornada" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Jornada Laboral')); ?></label>

                            <div class="col-md-8">
                                <select id="jornada" class="form-control <?php if ($errors->has('jornada')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('jornada'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="jornada" required>
                                    <option value="" selected disabled></option>
                                    <option value="Full Time" <?php echo e((old('jornada') == 'Full Time' ? 'selected':'')); ?>>Full Time</option>
                                    <option value="Part Time" <?php echo e((old('jornada') == 'Part Time' ? 'selected':'')); ?>>Part Time</option>
                                    <option value="Temporada" <?php echo e((old('jornada') == 'Temporada' ? 'selected':'')); ?>>Temporada</option>
                                    <option value="Freelance" <?php echo e((old('jornada') == 'Freelance' ? 'selected':'')); ?>>Freelance</option>
                                </select>

                                <?php if ($errors->has('jornada')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('jornada'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Ciudad')); ?></label>

                            <div class="col-md-8">
                                <input id="ciudad" type="text" class="form-control <?php if ($errors->has('ciudad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ciudad'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ciudad" value="<?php echo e(old('ciudad')); ?>" required autocomplete="ciudad" maxlength="255">

                                <?php if ($errors->has('ciudad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ciudad'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Descripción General del Cargo')); ?></label>

                            <div class="col-md-8">
                                <textarea id="descripcion" class="form-control <?php if ($errors->has('descripcion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('descripcion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="descripcion" required autocomplete="descripcion" rows="4" maxlength="1000"><?php echo e(old('descripcion')); ?></textarea>

                                <?php if ($errors->has('descripcion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('descripcion'); ?>
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
                            <label for="renta_fija" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Renta Fija (líquido)')); ?></label>

                            <div class="col-md-8">
                                <!--input id="renta_fija" type="text" min="0" class="form-control renta <?php if ($errors->has('renta_fija')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_fija'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="renta_fija" value="<?php echo e(old('renta_fija')); ?>" required autocomplete="renta_fija"-->
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta_fija" type="text" min="0" class="form-control renta <?php if ($errors->has('renta_fija')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_fija'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="renta_fija" value="<?php echo e(old('renta_fija')); ?>" required autocomplete="renta_fija" maxlength="255" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                <?php if ($errors->has('renta_fija')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_fija'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renta_variable" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Renta Variable (líquido)')); ?></label>

                            <div class="col-md-8">
                                <!--input id="renta_variable" type="text" min="0" class="form-control renta <?php if ($errors->has('renta_variable')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_variable'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="renta_variable" value="<?php echo e(old('renta_variable')); ?>" required autocomplete="renta_variable"-->
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta_variable" type="text" min="0" class="form-control renta <?php if ($errors->has('renta_variable')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_variable'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="renta_variable" value="<?php echo e(old('renta_variable')); ?>" required autocomplete="renta_variable" maxlength="255" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                <?php if ($errors->has('renta_variable')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta_variable'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bonos" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Bonos (meses)')); ?></label>

                            <div class="col-md-8">
                                <input id="bonos" type="text" class="form-control <?php if ($errors->has('bonos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bonos'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="bonos" value="<?php echo e(old('bonos')); ?>" required autocomplete="bonos" maxlength="255">

                                <?php if ($errors->has('bonos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bonos'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="beneficios" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Beneficios')); ?></label>

                            <div class="col-md-8">
                                <input id="beneficios" type="text" class="form-control <?php if ($errors->has('beneficios')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('beneficios'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="beneficios" value="<?php echo e(old('beneficios')); ?>" required autocomplete="beneficios" maxlength="1000">

                                <?php if ($errors->has('beneficios')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('beneficios'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="porque" class="col-md-4 col-form-label text-md-right"><?php echo e(__('¿Por qué deberías postular a esta vacante?')); ?></label>

                            <div class="col-md-8">
                                <textarea id="porque" class="form-control <?php if ($errors->has('porque')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('porque'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="porque" required autocomplete="porque" rows="4" maxlength="1000"><?php echo e(old('porque')); ?></textarea>

                                <?php if ($errors->has('porque')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('porque'); ?>
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

<?php $__env->startSection('script_adicional'); ?>
<script>
$('.renta').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/emp/oferta.blade.php ENDPATH**/ ?>