<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional - Currículum Vitae</div>

                <div class="card-body">
                    <?php if($yo->cv): ?>
                    <p><a href="<?php echo e(Storage::disk('cvs')->url($yo->cv)); ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o" aria-hidden="true" style="margin-right: 5px;"></i> Ver mi CV.</a></p>
                    <?php endif; ?>
                    <br>

                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-right">
                            <?php if($yo->cv): ?>
                                <?php echo e(__('Puedes cambiar tu Currículum Vitae si lo deseas.')); ?>

                            <?php else: ?>
                                <?php echo e(__('Puedes cargar tu Currículum Vitae si lo deseas.')); ?>

                            <?php endif; ?>
                            <br>
                            Formatos permitidos:<br>PDF o Word.
                            </label>

                            <div class="col-md-6">
                                <input id="cv" type="file" class="form-control <?php if ($errors->has('cv')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cv'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cv" value="<?php echo e(old('cv')); ?>">

                                <?php if ($errors->has('cv')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cv'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                <?php if(Session::has('mensaje')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e(Session::get('mensaje')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                (opcional)
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-style-one btn-iniciar-sesion" id="upload">
                                <?php if($yo->cv): ?>
                                    <?php echo e(__('Guardar')); ?>

                                <?php else: ?>
                                    <?php echo e(__('Finalizar Registro')); ?>

                                <?php endif; ?>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/pro/cv.blade.php ENDPATH**/ ?>