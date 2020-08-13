<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('ope.menu', ['cual' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('guarda-acad-op')); ?>">
                        <?php echo csrf_field(); ?>

                        <h3>Información Académica</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="nivel_educ" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nivel educacional')); ?></label>

                            <div class="col-md-8">
                                <select id="nivel_educ" class="form-control <?php if ($errors->has('nivel_educ')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nivel_educ'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nivel_educ" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">Estudiante de Educación Superior</option>
                                    <option value="1">Egresado/a</option>
                                    <option value="2">Titulado/a</option>
                                    <option value="3">Diplomado/a</option>
                                    <option value="4">Magister</option>
                                    <option value="5">Carrera Congelada</option>
                                </select>

                                <?php if ($errors->has('nivel_educ')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nivel_educ'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="licencia" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Licencia de conducir')); ?></label>

                            <div class="col-md-8">
                                <select id="licencia" class="form-control <?php if ($errors->has('licencia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('licencia'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="licencia" required autofocus>
                                    <option value="" selected disabled></option>
                                    <option value="0">No poseo</option>
                                    <option value="1">Clase A1</option>
                                    <option value="2">Clase A2</option>
                                    <option value="3">Clase A3</option>
                                    <option value="4">Clase A4</option>
                                    <option value="5">Clase A5</option>
                                    <option value="6">Clase B</option>
                                    <option value="7">Clase C</option>
                                    <option value="8">Clase D</option>
                                    <option value="9">Clase E</option>
                                    <option value="10">Clase F</option>
                                </select>

                                <?php if ($errors->has('licencia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('licencia'); ?>
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
                                <?php if(!isset($yo->nivel_educ)): ?>
                                <input type="hidden" name="primeravez" value="true">
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 10px;">
                <h3>Agregar Capacitaciones y Otros Cursos</h3>
                <hr>

                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="curso" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre del curso o capacitación')); ?></label>

                            <div class="col-md-8">
                                <input id="curso" type="text" class="form-control <?php if ($errors->has('curso')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('curso'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="curso" value="<?php echo e(old('curso')); ?>" required autocomplete="curso">

                                <?php if ($errors->has('curso')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('curso'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="casa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Institución donde lo realizó')); ?></label>

                            <div class="col-md-8">
                                <input id="casa" type="text" class="form-control <?php if ($errors->has('casa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('casa'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="casa" value="<?php echo e(old('casa')); ?>" required autocomplete="casa">

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
                            <label for="duracion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Duración (en horas)')); ?></label>

                            <div class="col-md-8">
                                <input id="duracion" type="number" class="form-control <?php if ($errors->has('duracion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duracion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duracion" value="<?php echo e(old('duracion')); ?>" required autocomplete="duracion">

                                <?php if ($errors->has('duracion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duracion'); ?>
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
                <div class="card-header">Capacitaciones y Otros Cursos</div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered formaciones">
                      <thead>
                        <tr>
                          <th scope="col">Curso o capacitación</th>
                          <th scope="col">Institución donde lo realizó</th>
                          <th scope="col">Duración (en horas)</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr id="formacion-<?php echo e($xp->id); ?>">
                            <td class="input-curso"><?php echo e($xp->curso); ?></td>
                            <td class="input-casa"><?php echo e($xp->casa); ?></td>
                            <td class="input-duracion"><?php echo e($xp->duracion); ?></td>
                            <td class="text-right">
                                <form action="<?php echo e(route('del-form-op')); ?>" method="post" id="form-<?php echo e($xp->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-primary" onclick="editar(<?php echo e($xp->id); ?>)" style="margin-bottom: 5px;">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar(<?php echo e($xp->id); ?>)" style="margin-bottom: 5px;">Borrar</button>
                                <input type="hidden" name="idform" value="<?php echo e($xp->id); ?>">
                                </form>
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
    <?php echo $__env->make('ope.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Curso o Capacitación</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="<?php echo e(route('edit-form-op')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="curso" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre del Curso o Capacitación')); ?></label>

                    <div class="col-md-8">
                        <input id="input-curso" type="text" class="form-control <?php if ($errors->has('curso')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('curso'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="curso" required autocomplete="curso">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="casa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Institución donde lo realizó')); ?></label>

                    <div class="col-md-8">
                        <input id="input-casa" type="text" class="form-control <?php if ($errors->has('casa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('casa'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="casa" required autocomplete="casa">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duracion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Duración (en horas)')); ?></label>

                    <div class="col-md-8">
                        <input id="input-duracion" type="text" class="form-control <?php if ($errors->has('duracion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duracion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duracion" required autocomplete="duracion">
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
    $('#nivel_educ option[value=<?php echo e($sit); ?>]').attr('selected','selected');
    $('#licencia option[value=<?php echo e($yo->licencia); ?>]').attr('selected','selected');
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
    $('#input-curso', '#modalEditar').val($('.input-curso', '#formacion-'+id).html());
    $('#input-casa', '#modalEditar').val($('.input-casa', '#formacion-'+id).html());
    $('#input-duracion', '#modalEditar').val($('.input-duracion', '#formacion-'+id).html());
    $('#modalEditar').modal();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/ope/formacion.blade.php ENDPATH**/ ?>