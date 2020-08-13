<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(session()->has('exito')): ?>
        <div class="col-md-12">
            <div class="alert alert-success text-center" role="alert">
                <strong>¡Felicidades!</strong> Has completado tu perfil.
            </div>
        </div>
    <?php endif; ?>
    </div>

    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional - Datos Personales</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" <?php echo e((isset($yo) ? 'action='.url('perfil-edit') : '')); ?>>
                        <?php echo csrf_field(); ?>
<?php if(!isset($yo)): ?>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Foto Perfil')); ?></label>

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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombres y Apellidos')); ?></label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nombre" value="<?php echo e(old('nombre', ($yo->nombre ?? ''))); ?>" required autocomplete="nombre" autofocus>

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
                            <label for="titulo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Título Profesional')); ?></label>

                            <div class="col-md-8">
                                <!--input id="titulo" type="text" class="form-control <?php if ($errors->has('titulo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('titulo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="titulo" value="<?php echo e(old('titulo', ($yo->titulo ?? ''))); ?>" required autocomplete="titulo"-->
                                <select id="titulo" class="comunas select2 form-control<?php echo e($errors->has('titulo') ? ' is-invalid' : ''); ?>" name="titulo" required>
                                    <option value="" selected disabled>Seleccione título...</option>
                                    <?php
                                        $profes = DB::table('profesiones')->get()->sortBy('profesion');
                                    ?>
                                    <?php $__currentLoopData = $profes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($profe->id); ?>" <?php echo e((old('titulo', (isset($yo) ? $yo->titulo : '')) == $profe->id) ? 'selected':''); ?>><?php echo e($profe->profesion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('titulo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('titulo'); ?>
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
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
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
                            <label for="fnac" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Fecha de Nacimiento')); ?></label>

                            <div class="col-md-8">
                                <input id="fnac" type="text" class="form-control <?php if ($errors->has('fnac')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fnac'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="fnac" value="<?php echo e(old('fnac', ($yo->fnac ?? ''))); ?>" required autocomplete="off" readonly="">

                                <?php if ($errors->has('fnac')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fnac'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Género')); ?></label>

                            <div class="col-md-8">
                                <select id="genero" class="form-control <?php if ($errors->has('genero')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('genero'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="genero" required>
                                    <option value="" selected disabled></option>
                                    <option value="1" <?php echo e((old('genero', (isset($yo) ? $yo->genero : '')) == '1' ? 'selected':'')); ?>>Femenino</option>
                                    <option value="0" <?php echo e((old('genero', (isset($yo) ? $yo->genero : '')) == '0' ? 'selected':'')); ?>>Masculino</option>
                                    <option value="2" <?php echo e((old('genero', (isset($yo) ? $yo->genero : '')) == '2' ? 'selected':'')); ?>>Otro</option>
                                </select>

                                <?php if ($errors->has('genero')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('genero'); ?>
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
                                <input id="fono" type="text" class="form-control <?php if ($errors->has('fono')) :
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
                                <input id="direccion" type="text" class="form-control <?php if ($errors->has('direccion')) :
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
                                <select id="comuna_id" class="comunas select2 form-control<?php echo e($errors->has('comuna_id') ? ' is-invalid' : ''); ?>" name="comuna_id" required>
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
                            <label for="civil" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Estado Civil')); ?></label>

                            <div class="col-md-8">
                                <select id="civil" class="form-control <?php if ($errors->has('civil')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('civil'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="civil" required>
                                    <option value="" selected disabled></option>
                                    <option value="0" <?php echo e((old('civil', (isset($yo) ? $yo->civil : '')) == '0' ? 'selected':'')); ?>>Soltero/a</option>
                                    <option value="1" <?php echo e((old('civil', (isset($yo) ? $yo->civil : '')) == '1' ? 'selected':'')); ?>>Casado/a</option>
                                    <option value="2" <?php echo e((old('civil', (isset($yo) ? $yo->civil : '')) == '2' ? 'selected':'')); ?>>Divorciado/a</option>
                                </select>

                                <?php if ($errors->has('civil')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('civil'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hijos" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Número de Hijos')); ?></label>

                            <div class="col-md-8">
                                <input id="hijos" type="number" min="0" class="form-control <?php if ($errors->has('hijos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hijos'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="hijos" value="<?php echo e(old('hijos', ($yo->hijos ?? ''))); ?>" required autocomplete="hijos">

                                <?php if ($errors->has('hijos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hijos'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="afp" class="col-md-4 col-form-label text-md-right"><?php echo e(__('AFP')); ?></label>

                            <div class="col-md-8">
                                <select id="afp" class="comunas form-control<?php echo e($errors->has('afp') ? ' is-invalid' : ''); ?>" name="afp" required>
                                    <option value="" selected disabled>Seleccione su AFP...</option>
                                    <?php
                                        $afps = DB::table('afps')->get()->sortBy('afp');
                                    ?>
                                    <?php $__currentLoopData = $afps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($afp->id); ?>" <?php echo e((old('afp', (isset($yo) ? $yo->afp : '')) == $afp->id) ? 'selected':''); ?>><?php echo e($afp->afp); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('afp')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('afp'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salud" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Isapre o Fonasa')); ?></label>

                            <div class="col-md-8">
                                <select id="salud" class="comunas form-control<?php echo e($errors->has('salud') ? ' is-invalid' : ''); ?>" name="salud" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <?php
                                        $isapres = DB::table('isapres')->get()->sortBy('isapre');
                                    ?>
                                    <?php $__currentLoopData = $isapres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isapre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($isapre->id); ?>" <?php echo e((old('salud', (isset($yo) ? $yo->salud : '')) == $isapre->id) ? 'selected':''); ?>><?php echo e($isapre->isapre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('salud')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('salud'); ?>
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
                                <button type="submit" class="btn-style-one btn-iniciar-sesion" id="upload">
                                    <?php if(isset($yo)): ?>
                                    <?php echo e(__('Guardar cambios')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Guardar y continuar')); ?>

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
$.datepicker.regional['es'] = 
{
    closeText: 'Cerrar', 
    prevText: 'Previo', 
    nextText: 'Próximo',

    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    monthStatus: 'Ver otro mes',
    yearStatus: 'Ver otro año',
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    dateFormat: 'yy-mm-dd',
    firstDay: 1, 
    initStatus: 'Fecha',
    isRTL: false
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$( "#fnac" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/pro/perfil.blade.php ENDPATH**/ ?>