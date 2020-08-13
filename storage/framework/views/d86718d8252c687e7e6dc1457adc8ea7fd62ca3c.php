<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('guarda-acad')); ?>">
                        <?php echo csrf_field(); ?>

                        <h3>Situación Académica Actual</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="situacion_acad" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Situación')); ?></label>

                            <div class="col-md-8">
                                <select id="situacion_acad" class="form-control <?php if ($errors->has('situacion_acad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('situacion_acad'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="situacion_acad" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">Estudiante de Educación Superior</option>
                                    <option value="1">Egresado/a</option>
                                    <option value="2">Titulado/a</option>
                                    <option value="3">Diplomado/a</option>
                                    <option value="4">Magister</option>
                                    <option value="5">Carrera Congelada</option>
                                </select>

                                <?php if ($errors->has('situacion_acad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('situacion_acad'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ingles" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Dominio de inglés')); ?></label>

                            <div class="col-md-8">
                                <select id="ingles" class="form-control <?php if ($errors->has('ingles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ingles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ingles" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">Nulo</option>
                                    <option value="1">Bajo</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Avanzado</option>
                                    <option value="4">Nativo</option>
                                </select>

                                <?php if ($errors->has('ingles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ingles'); ?>
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
                                <?php if(!isset($yo->situacion_acad)): ?>
                                <input type="hidden" name="primeravez" value="true">
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 10px;">
                <div class="card-header">Agregar</div>
                <hr>

                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="profesion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Profesión, Diplomado o Mágister')); ?></label>

                            <div class="col-md-8">
                                <input id="profesion" type="text" class="form-control <?php if ($errors->has('profesion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profesion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="profesion" value="<?php echo e(old('profesion')); ?>" required autocomplete="profesion">

                                <?php if ($errors->has('profesion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profesion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="casa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Casa de Estudios')); ?></label>

                            <div class="col-md-8">
                                <select id="casa" class="comunas select2 form-control<?php echo e($errors->has('casa') ? ' is-invalid' : ''); ?>" name="casa" required>
                                    <option value="" selected disabled>Seleccione su casa de estudios...</option>
                                    <?php
                                        $casas = DB::table('casas')->get()->sortBy('casa');
                                    ?>
                                    <?php $__currentLoopData = $casas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($casa->id); ?>" <?php echo e((old('casa', (isset($yo) ? $yo->casa : '')) == $casa->id) ? 'selected':''); ?>><?php echo e($casa->casa); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('casa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('casa'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodo_desde" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Periodos')); ?></label>

                            <div class="col-md-4">
                                <input id="periodo_desde" type="text" class="form-control <?php if ($errors->has('periodo_desde')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_desde'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_desde" value="<?php echo e(old('periodo_desde')); ?>" required autocomplete="off" readonly="">

                                <?php if ($errors->has('periodo_desde')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_desde'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="col-md-4">
                                <input id="periodo_hasta" type="text" class="form-control <?php if ($errors->has('periodo_hasta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_hasta'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_hasta" value="<?php echo e(old('periodo_hasta')); ?>" required autocomplete="off" readonly="">

                                <?php if ($errors->has('periodo_hasta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_hasta'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Agregar')); ?>

                                </button>
                            </div>
                            <?php if(!isset($yo)): ?>
                            <div class="col-md-5 text-right">
                                <a href="<?php echo e(route('perfil')); ?>" class="btn btn-light">
                                    <?php echo e(__('Volver al Perfil >')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(count($exp) >= 1): ?>
            <br>

            <div class="card">
                <div class="card-header">Formación</div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered formaciones">
                      <thead>
                        <tr>
                          <th scope="col">Profesión, Diplomado o Mágister</th>
                          <th scope="col">Casa de Estudios</th>
                          <th scope="col">Periodos</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr id="formacion-<?php echo e($xp->id); ?>">
                            <td class="input-profesion"><?php echo e($xp->profesion); ?></td>
                            <td><?php echo e(DB::table('casas')->where('id', $xp->casa)->first()->casa); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y')); ?> a <?php echo e(\Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y')); ?></td>
                            <td class="text-right">
                                <form action="<?php echo e(route('del-form')); ?>" method="post" id="form-<?php echo e($xp->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-primary" onclick="editar(<?php echo e($xp->id); ?>)" style="margin-bottom: 5px;">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar(<?php echo e($xp->id); ?>)" style="margin-bottom: 5px;">Borrar</button>
                                <input type="hidden" name="idform" value="<?php echo e($xp->id); ?>">
                                </form>
                                <input type="hidden" value="<?php echo e($xp->casa); ?>" class="input-casa">
                                <input type="hidden" value="<?php echo e($xp->periodo_desde); ?>" class="input-desde">
                                <input type="hidden" value="<?php echo e($xp->periodo_hasta); ?>" class="input-hasta">
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
<?php if(isset($yo)): ?>
    <?php echo $__env->make('pro.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Formación</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="<?php echo e(route('edit-form')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="profesion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Profesión, Diplomado o Mágister')); ?></label>

                    <div class="col-md-8">
                        <input id="input-profesion" type="text" class="form-control <?php if ($errors->has('profesion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profesion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="profesion" value="<?php echo e(old('profesion')); ?>" required autocomplete="profesion">

                        <?php if ($errors->has('profesion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profesion'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="casa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Casa de Estudios')); ?></label>

                    <div class="col-md-8">
                        <select id="input-casa" class="comunas select2 form-control<?php echo e($errors->has('casa') ? ' is-invalid' : ''); ?>" name="casa" required style="width: 100%;">
                            <option value="" selected disabled>Seleccione su casa de estudios...</option>
                            <?php
                                $casas = DB::table('casas')->get()->sortBy('casa');
                            ?>
                            <?php $__currentLoopData = $casas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($casa->id); ?>" <?php echo e((old('casa', (isset($yo) ? $yo->casa : '')) == $casa->id) ? 'selected':''); ?>><?php echo e($casa->casa); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if ($errors->has('casa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('casa'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="periodo_desde" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Periodos')); ?></label>

                    <div class="col-md-4">
                        <input id="input-periodo_desde" type="text" class="form-control <?php if ($errors->has('periodo_desde')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_desde'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_desde" value="<?php echo e(old('periodo_desde')); ?>" required autocomplete="off" readonly="">

                        <?php if ($errors->has('periodo_desde')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_desde'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>

                    <div class="col-md-4">
                        <input id="input-periodo_hasta" type="text" class="form-control <?php if ($errors->has('periodo_hasta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_hasta'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_hasta" value="<?php echo e(old('periodo_hasta')); ?>" required autocomplete="off" readonly="">

                        <?php if ($errors->has('periodo_hasta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_hasta'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-3 col-md-offset-4">
                        <button type="submit" class="btn-style-one btn-iniciar-sesion">
                            <?php echo e(__('Guardar')); ?>

                        </button>
                        <input type="hidden" name="idform" id="edit-id">
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px;" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
<?php if(isset($sit)): ?>
    $('#situacion_acad option[value=<?php echo e($sit); ?>]').attr('selected','selected');
<?php endif; ?>
<?php if(isset($yo) && isset($ing)): ?>
    $('#ingles option[value=<?php echo e($ing); ?>]').attr('selected','selected');
<?php endif; ?>

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
$( "#periodo_desde" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$( "#periodo_hasta" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});

// para modal editar:
$( "#input-periodo_desde" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$( "#input-periodo_hasta" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});

$(document).ready(function() {
    $('.select2').select2({
        width: 'resolve'
    });
});

function borrar(id){
    var confirma = confirm("¿Estas seguro que quieres borrar este registro?");
    if(confirma){
        $('#form-'+id).submit();
    }
}
function editar(id){
    $('#edit-id', '#modalEditar').val(id);
    $('#input-profesion', '#modalEditar').val($('.input-profesion', '#formacion-'+id).html());
    $('#input-casa', '#modalEditar').val($('.input-casa', '#formacion-'+id).val()).trigger('change');
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#formacion-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#formacion-'+id).val()+' 00:00'));
    $('#modalEditar').modal();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/pro/formacion.blade.php ENDPATH**/ ?>