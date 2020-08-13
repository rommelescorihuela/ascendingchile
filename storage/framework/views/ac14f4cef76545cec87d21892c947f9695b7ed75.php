<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>

                <div class="card-body">
                    <form method="POST" <?php echo e((isset($yo) ? 'action='.url('resumen-edit') : '')); ?>>
                        <?php echo csrf_field(); ?>

                        <h3>Resumen Ejecutivo</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="resumen" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Escribe un resumen de tu perfil profesional')); ?></label>

                            <div class="col-md-8">
                                <textarea id="resumen" class="form-control <?php if ($errors->has('resumen')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('resumen'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="resumen" required autocomplete="resumen" autofocus rows="5" maxlength="1000"><?php echo e(old('resumen', ($yo->resumen ?? ''))); ?></textarea>

                                <?php if ($errors->has('resumen')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('resumen'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <h3>Situación Laboral Actual</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="situacion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Situación')); ?></label>

                            <div class="col-md-8">
                                <select id="situacion" class="form-control <?php if ($errors->has('situacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('situacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="situacion" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">Primer Empleo</option>
                                    <option value="1">Nuevas Oportunidades</option>
                                    <option value="2">Desempleado</option>
                                </select>

                                <?php if ($errors->has('situacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('situacion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renta" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Expectativas de Renta')); ?></label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="renta" type="text" class="form-control <?php if ($errors->has('renta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="renta" value="<?php echo e(old('renta', ($yo->renta ?? ''))); ?>" required autocomplete="renta" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                <?php if ($errors->has('renta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('renta'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row" id="campo_cargo">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Según situación actual menciona el cargo que desempeñas o desempeñabas')); ?></label>

                            <div class="col-md-8">
                                <textarea id="cargo" class="form-control <?php if ($errors->has('cargo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cargo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cargo" required autocomplete="cargo" rows="3" maxlength="400"><?php echo e(old('cargo', ($yo->cargo ?? ''))); ?></textarea>

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
                            <label for="porque" class="col-md-4 col-form-label text-md-right"><?php echo e(__('¿Por qué te deberían contratar?')); ?></label>

                            <div class="col-md-8">
                                <textarea id="porque" class="form-control <?php if ($errors->has('porque')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('porque'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="porque" required autocomplete="porque" rows="3" maxlength="400"><?php echo e(old('porque', ($yo->porque ?? ''))); ?></textarea>

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
                                <button type="submit" class="btn-style-one btn-iniciar-sesion">
                                    <?php echo e(__('Guardar')); ?>

                                </button>
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
<?php if(isset($yo)): ?>
    <?php echo $__env->make('pro.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<script>
$('#situacion').change(function(){
    if($(this).val() == 0) {
        $('#campo_cargo').hide();
        $('#cargo').val("");
        $('#cargo').prop('required', false);
    } else {
        $('#campo_cargo').fadeIn();
        $('#cargo').prop('required', true);
    }
});

$('#renta').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});

<?php if(isset($yo)): ?>
    $('#situacion option[value=<?php echo e($yo->situacion); ?>]').attr('selected','selected');
    $('#situacion').change();
<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/pro/resumen.blade.php ENDPATH**/ ?>