<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('ope.menu', ['cual' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST" <?php echo e((isset($yo) ? 'action='.url('situacion-op-edit') : '')); ?>>
                        <?php echo csrf_field(); ?>

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
                            <label for="inicio_sit" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Fecha de inicio de su situación')); ?></label>

                            <div class="col-md-8">
                                <input id="inicio_sit" type="text" class="form-control <?php if ($errors->has('inicio_sit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inicio_sit'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="inicio_sit" value="<?php echo e(old('inicio_sit', ($yo->inicio_sit ?? ''))); ?>" required autocomplete="off" readonly="">

                                <?php if ($errors->has('inicio_sit')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inicio_sit'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row" id="campo_salario">
                            <label for="ultimo_salario" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Último salario bruto mensual')); ?></label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="ultimo_salario" type="text" class="form-control <?php if ($errors->has('ultimo_salario')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ultimo_salario'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ultimo_salario" value="<?php echo e(old('ultimo_salario', ($yo->ultimo_salario ?? ''))); ?>" required autocomplete="ultimo_salario" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                <?php if ($errors->has('ultimo_salario')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ultimo_salario'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row" id="campo_cargo">
                            <label for="actividad" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Última actividad laboral en la que trabajó')); ?></label>

                            <div class="col-md-8">
                                <select id="actividad" class="comunas form-control<?php echo e($errors->has('actividad') ? ' is-invalid' : ''); ?>" name="actividad" required>
                                    <option value="" selected disabled>Seleccione actividad...</option>
                                    <?php
                                        $industrias = DB::table('industria')->get()->sortBy('industria');
                                    ?>
                                    <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($industria->id); ?>" <?php echo e((old('actividad') == $industria->id) ? 'selected':''); ?>><?php echo e($industria->industria); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if ($errors->has('actividad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('actividad'); ?>
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
    <?php echo $__env->make('ope.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
$( "#inicio_sit" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1900:",
});
$('#ultimo_salario').css({'z-index': '1'});

$('#situacion').change(function(){
    if($(this).val() == 0) {
        $('#actividad').val("");
        $('#actividad').prop('required', false);
        $('#campo_cargo').hide();
        $('#campo_salario').hide();
        $('#ultimo_salario').val("");
        $('#ultimo_salario').prop('required', false);
    } else {
        $('#campo_cargo').fadeIn();
        $('#actividad').prop('required', true);
        $('#campo_salario').fadeIn();
        $('#ultimo_salario').prop('required', true);
    }
});

$('#ultimo_salario').on('keyup', function(){
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
    $('#actividad option[value=<?php echo e($yo->actividad); ?>]').attr('selected','selected');
    $('#actividad').change();
<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/ope/resumen.blade.php ENDPATH**/ ?>