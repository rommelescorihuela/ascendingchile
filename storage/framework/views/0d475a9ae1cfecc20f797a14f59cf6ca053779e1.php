<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('ope.menu', ['cual' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Operativo</div>

                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <h3>Agregar Experiencia</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="ocupacion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Ocupacion')); ?></label>

                            <div class="col-md-8">
                                <input id="ocupacion" type="text" class="form-control <?php if ($errors->has('ocupacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ocupacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ocupacion" value="<?php echo e(old('ocupacion')); ?>" required autocomplete="ocupacion" autofocus>

                                <?php if ($errors->has('ocupacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ocupacion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Empresa')); ?></label>

                            <div class="col-md-8">
                                <input id="empresa" type="text" class="form-control <?php if ($errors->has('empresa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('empresa'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="empresa" value="<?php echo e(old('empresa')); ?>" required autocomplete="empresa">

                                <?php if ($errors->has('empresa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('empresa'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodos" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Periodos')); ?></label>

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

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Región')); ?></label>

                            <div class="col-md-8">
                                <input id="region" type="text" class="form-control <?php if ($errors->has('region')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('region'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="region" value="<?php echo e(old('region')); ?>" required autocomplete="region">

                                <?php if ($errors->has('region')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('region'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sueldo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Sueldo bruto mensual')); ?></label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                    <input id="sueldo" type="text" class="form-control <?php if ($errors->has('sueldo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sueldo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="sueldo" value="<?php echo e(old('sueldo', ($yo->sueldo ?? ''))); ?>" required autocomplete="sueldo" step=".01">
                                    <div class="input-group-addon">CLP</div>
                                </div>

                                <?php if ($errors->has('sueldo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sueldo'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Detallar labores que realizaba')); ?></label>

                            <div class="col-md-8">
                                <textarea id="detalle" class="form-control <?php if ($errors->has('detalle')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalle'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detalle" value="<?php echo e(old('detalle')); ?>" required autocomplete="detalle" rows="3" maxlength="1000"></textarea>

                                <?php if ($errors->has('detalle')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalle'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referencia" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Referencias')); ?></label>

                            <div class="col-md-8">
                                <textarea id="referencia" class="form-control <?php if ($errors->has('referencia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('referencia'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="referencia" value="<?php echo e(old('referencia')); ?>" autocomplete="referencia" rows="3" maxlength="1000"></textarea>

                                <?php if ($errors->has('referencia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('referencia'); ?>
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
                                    <?php echo e(__('Agregar')); ?>

                                </button>
                            </div>
                            <?php if(count($exp) >= 1): ?>
                            <div class="col-md-5 text-right">
                                <a href="<?php echo e(route('formacion-op')); ?>" class="btn btn-light" style="color:#FFF;">
                                    <?php echo e(__('Ir a Información Académica >')); ?>

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
                <div class="card-header">Experiencia Laboral</div>

                <div class="card-body">
                    <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <table class="table table-bordered experiencias" id="experiencia-<?php echo e($xp->id); ?>">
                      <thead>
                        <?php if(!empty($xp->ocupacion)): ?>
                          <tr>
                            <th scope="row">Ocupacion</th>
                            <td width="100%" class="input-cargo"><?php echo e($xp->ocupacion); ?></td>
                          </tr>
                        <?php endif; ?>
                      </thead>
                      <tbody>
                        <?php if(!empty($xp->empresa)): ?>
                          <tr>
                            <th scope="row">Empresa</th>
                            <td class="input-empresa"><?php echo e($xp->empresa); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta)): ?>
                          <tr>
                            <th scope="row">Periodo</th>
                            <td><?php echo e(\Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y')); ?> a <?php echo e(\Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y')); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->region)): ?>
                          <tr>
                            <th scope="row">Región</th>
                            <td class="input-region"><?php echo e($xp->region); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->sueldo)): ?>
                          <tr>
                            <th scope="row">Sueldo bruto mensual</th>
                            <td>$ <span class="input-sueldo"><?php echo e($xp->sueldo); ?></span></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->detalle)): ?>
                          <tr>
                            <th scope="row">Labores que realizaba</th>
                            <td class="input-detalle"><?php echo e($xp->detalle); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->referencia)): ?>
                          <tr>
                            <th scope="row">Referencias</th>
                            <td class="input-referencia"><?php echo e($xp->referencia); ?></td>
                          </tr>
                        <?php endif; ?>
                          <tr>
                            <th scope="row"></th>
                            <td class="text-right">
                                <form action="<?php echo e(route('del-exp-op')); ?>" method="post" id="exp-<?php echo e($xp->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-primary" onclick="editar(<?php echo e($xp->id); ?>)">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar(<?php echo e($xp->id); ?>)">Borrar</button>
                                <input type="hidden" name="idexp" value="<?php echo e($xp->id); ?>">
                                </form>
                                <input type="hidden" value="<?php echo e($xp->periodo_desde); ?>" class="input-desde">
                                <input type="hidden" value="<?php echo e($xp->periodo_hasta); ?>" class="input-hasta">
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <h4 class="modal-title">Editar Experiencia</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="<?php echo e(route('edit-exp-op')); ?>">
                <?php echo csrf_field(); ?>

                <h3>Experiencia Laboral</h3>
                <hr>

                <div class="form-group row">
                    <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Ocupación')); ?></label>

                    <div class="col-md-8">
                        <input id="input-cargo" type="text" class="form-control <?php if ($errors->has('ocupacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ocupacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ocupacion" required autocomplete="ocupacion">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="empresa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Empresa')); ?></label>

                    <div class="col-md-8">
                        <input id="input-empresa" type="text" class="form-control <?php if ($errors->has('empresa')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('empresa'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="empresa" required autocomplete="empresa">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="periodos" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Periodos')); ?></label>

                    <div class="col-md-4">
                        <input id="input-periodo_desde" type="text" class="form-control <?php if ($errors->has('periodo_desde')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_desde'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_desde" required autocomplete="off" readonly="">
                    </div>
                    <div class="col-md-4">
                        <input id="input-periodo_hasta" type="text" class="form-control <?php if ($errors->has('periodo_hasta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('periodo_hasta'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="periodo_hasta" required autocomplete="off" readonly="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="region" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Región')); ?></label>

                    <div class="col-md-8">
                        <input id="input-region" type="text" class="form-control <?php if ($errors->has('region')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('region'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="region" required autocomplete="region">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sueldo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Sueldo bruto mensual')); ?></label>

                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input id="input-sueldo" type="text" class="form-control <?php if ($errors->has('sueldo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sueldo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="sueldo" required autocomplete="sueldo" step=".01">
                            <div class="input-group-addon">CLP</div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="detalle" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Detallar labores que realizaba')); ?></label>

                    <div class="col-md-8">
                        <textarea id="input-detalle" class="form-control <?php if ($errors->has('detalle')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalle'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detalle" required autocomplete="detalle" rows="3" maxlength="1000"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="referencia" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Referencias')); ?></label>

                    <div class="col-md-8">
                        <textarea id="input-referencia" class="form-control <?php if ($errors->has('referencia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('referencia'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="referencia" autocomplete="referencia" rows="3" maxlength="1000"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-3 col-md-offset-4">
                        <button type="submit" class="btn-style-one btn-iniciar-sesion">
                            <?php echo e(__('Guardar')); ?>

                        </button>
                        <input type="hidden" name="idexp" id="edit-id">
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

$('#sueldo').css({'z-index': '1'});

$('#sueldo').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});
$('#input-sueldo').on('keyup', function(){
    var monto = $(this).val().replace(/[\.\-]/g, "");
    var formato = "";
    while(monto.length > 3) {
        formato = '.' + monto.substr(monto.length - 3) + formato;
        monto = monto.substring(0, monto.length - 3);
    }
    $(this).val(monto+formato);
});

function borrar(id){
    var confirma = confirm("¿Estas seguro que quieres borrar este registro?");
    if(confirma){
        $('#exp-'+id).submit();
    }
}
function editar(id){
    $('#edit-id', '#modalEditar').val(id);
    $('#input-cargo', '#modalEditar').val($('.input-cargo', '#experiencia-'+id).html());
    $('#input-empresa', '#modalEditar').val($('.input-empresa', '#experiencia-'+id).html());
    $('#input-region', '#modalEditar').val($('.input-region', '#experiencia-'+id).html());
    $('#input-sueldo', '#modalEditar').val($('.input-sueldo', '#experiencia-'+id).html());
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#experiencia-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#experiencia-'+id).val()+' 00:00'));
    $('#input-detalle', '#modalEditar').val($('.input-detalle', '#experiencia-'+id).html());
    $('#input-referencia', '#modalEditar').val($('.input-referencia', '#experiencia-'+id).html());
    $('#modalEditar').modal();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/ope/experiencia.blade.php ENDPATH**/ ?>