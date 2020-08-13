<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="sidebar-wrapper">
                <img src="<?php echo e(Storage::disk('logos')->url($yo->foto)); ?>" class="img-perfil" id="archivo">
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                PERFIL EMPRESA
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" <?php echo e((isset($yo) ? 'action='.url('perfil-empresa-edit') : '')); ?>>
                        <?php echo csrf_field(); ?>
<?php if(!isset($yo)): ?>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Logo')); ?></label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control <?php if ($errors->has('foto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('foto'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="foto" value="<?php echo e(old('foto')); ?>" required onchange="readURL(this)">

                                <?php if ($errors->has('foto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('foto'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-2">
                                <img src="<?php echo e(asset('img/sin-foto.jpg')); ?>" id="archivo" class="img-responsive">
                            </div>
                        </div>
<?php endif; ?>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre Empresa')); ?></label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nombre" value="<?php echo e(old('nombre', ($yo->nombre ?? ''))); ?>" required autocomplete="nombre" autofocus disabled>

                                <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="industria" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Industria')); ?></label>

                            <div class="col-md-8">
                                <select disabled id="industria" class="comunas form-control<?php echo e($errors->has('industria') ? ' is-invalid' : ''); ?>" name="industria" required>
                                    <option value="" selected disabled>Seleccione industria...</option>
                                    <?php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    ?>
                                    <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($industria->id); ?>" <?php echo e((old('industria', ($yo->industria ?? '')) == $industria->id) ? 'selected':''); ?>><?php echo e($industria->industria); ?></option>
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
                            <label for="gerente" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gerente de Recursos Humanos')); ?></label>

                            <div class="col-md-8">
                                <input id="gerente" disabled type="text" class="form-control <?php if ($errors->has('gerente')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gerente'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="gerente" value="<?php echo e(old('gerente', ($yo->gerente ?? ''))); ?>" required autocomplete="gerente">

                                <?php if ($errors->has('gerente')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gerente'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contacto" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre del Contacto')); ?></label>

                            <div class="col-md-8">
                                <input id="contacto" disabled type="text" class="form-control <?php if ($errors->has('contacto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contacto'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contacto" value="<?php echo e(old('contacto', ($yo->contacto ?? ''))); ?>" required autocomplete="contacto">

                                <?php if ($errors->has('contacto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contacto'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fono" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Teléfono')); ?></label>

                            <div class="col-md-8">
                                <input id="fono" disabled type="text" class="form-control <?php if ($errors->has('fono')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fono'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="fono" value="<?php echo e(old('fono', ($yo->fono ?? ''))); ?>" required autocomplete="fono">

                                <?php if ($errors->has('fono')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fono'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Dirección')); ?></label>

                            <div class="col-md-8">
                                <input id="direccion" disabled type="text" class="form-control <?php if ($errors->has('direccion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direccion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="direccion" value="<?php echo e(old('direccion', ($yo->direccion ?? ''))); ?>" required autocomplete="direccion">

                                <?php if ($errors->has('direccion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direccion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comuna_id" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Comuna')); ?></label>

                            <div class="col-md-8">
                                <select id="comuna_id" disabled class="comunas select2 form-control<?php echo e($errors->has('comuna_id') ? ' is-invalid' : ''); ?>" name="comuna_id" required>
                                    <option value="" selected disabled>Seleccione comuna...</option>
                                    <?php
                                        $comunas = DB::table('comuna')->get()->sortBy('comuna');
                                    ?>
                                    <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comuna->id); ?>" <?php echo e((old('comuna_id', (isset($yo) ? $yo->comuna_id : '')) == $comuna->id) ? 'selected':''); ?>><?php echo e($comuna->comuna); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('comuna_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comuna_id'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-8">
                                <input id="email" disabled type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email', ($yo->email ?? ''))); ?>" required autocomplete="email">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="web" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Sitio Web')); ?></label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">https://</div>
                                    <input disabled id="web" type="text" class="form-control <?php if ($errors->has('web')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('web'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="web" value="<?php echo e(old('web', ($yo->web ?? ''))); ?>" required autocomplete="web">
                                </div>

                                <?php if ($errors->has('web')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('web'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colaboradores" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Número de Colaboradores')); ?></label>

                            <div class="col-md-8">
                                <input disabled id="colaboradores" type="number" min="0" class="form-control <?php if ($errors->has('colaboradores')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('colaboradores'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="colaboradores" value="<?php echo e(old('colaboradores', ($yo->colaboradores ?? ''))); ?>" required autocomplete="colaboradores">

                                <?php if ($errors->has('colaboradores')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('colaboradores'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
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
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#archivo').attr('src', e.target.result);
            $('#upload').prop('disabled', false);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#archivo').attr('src', "<?php echo e(asset('img/sin-foto.jpg')); ?>");
        $('#upload').prop('disabled', true);
    }
}

$(document).ready(function() {
    $('.select2').select2();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/emp/perfil-publico.blade.php ENDPATH**/ ?>