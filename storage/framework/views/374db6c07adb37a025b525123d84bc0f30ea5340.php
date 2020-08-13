<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil Profesional</div>

                <div class="card-body">
                    <form method="POST">
                        <?php echo csrf_field(); ?>

                        <h3>Experiencia Laboral</h3>
                        <hr>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cargo')); ?></label>

                            <div class="col-md-8">
                                <input id="cargo" type="text" class="form-control <?php if ($errors->has('cargo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cargo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cargo" value="<?php echo e(old('cargo')); ?>" required autocomplete="cargo" autofocus>

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
                            <label for="industria" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Industria')); ?></label>

                            <div class="col-md-8">
                                <select id="industria" class="comunas form-control<?php echo e($errors->has('industria') ? ' is-invalid' : ''); ?>" name="industria" required>
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
                            <label for="responsabilidades" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Principales responsabilidades')); ?></label>

                            <div class="col-md-8">
                                <textarea id="responsabilidades" class="form-control <?php if ($errors->has('responsabilidades')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('responsabilidades'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="responsabilidades" value="<?php echo e(old('responsabilidades')); ?>" required autocomplete="responsabilidades" rows="3" maxlength="1000"></textarea>

                                <?php if ($errors->has('responsabilidades')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('responsabilidades'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logros" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Logros')); ?></label>

                            <div class="col-md-8">
                                <textarea id="logros" class="form-control <?php if ($errors->has('logros')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logros'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="logros" value="<?php echo e(old('logros')); ?>" required autocomplete="logros" rows="3" maxlength="1000"></textarea>

                                <?php if ($errors->has('logros')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logros'); ?>
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
                                <a href="<?php echo e(route('formacion')); ?>" class="btn btn-light" style="color:#FFF;">
                                    <?php echo e(__('Ir a Formación Académica >')); ?>

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
                <div class="card-header">Experiencia</div>

                <div class="card-body">
                    <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <table class="table table-bordered experiencias" id="experiencia-<?php echo e($xp->id); ?>">
                      <thead>
                        <?php if(!empty($xp->cargo)): ?>
                          <tr>
                            <th scope="row">Cargo</th>
                            <td width="100%" class="input-cargo"><?php echo e($xp->cargo); ?></td>
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
                        <?php if(!empty($xp->industria)): ?>
                          <tr>
                            <th scope="row">Industria</th>
                            <td><?php echo e(DB::table('industria')->where('id', $xp->industria)->first()->industria); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta)): ?>
                          <tr>
                            <th scope="row">Periodo</th>
                            <td><?php echo e(\Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y')); ?> a <?php echo e(\Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y')); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->responsabilidades)): ?>
                          <tr>
                            <th scope="row">Responsabilidades</th>
                            <td class="input-responsabilidades"><?php echo e($xp->responsabilidades); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php if(!empty($xp->logros)): ?>
                          <tr>
                            <th scope="row">Logros</th>
                            <td class="input-logros"><?php echo e($xp->logros); ?></td>
                          </tr>
                        <?php endif; ?>
                          <tr>
                            <th scope="row"></th>
                            <td class="text-right">
                                <form action="<?php echo e(route('del-exp')); ?>" method="post" id="exp-<?php echo e($xp->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-primary" onclick="editar(<?php echo e($xp->id); ?>)">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="borrar(<?php echo e($xp->id); ?>)">Borrar</button>
                                <input type="hidden" name="idexp" value="<?php echo e($xp->id); ?>">
                                </form>
                                <input type="hidden" value="<?php echo e($xp->industria); ?>" class="input-industria">
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
    <?php echo $__env->make('pro.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Experiencia</h4>
      </div>
      <div class="modal-body">
            <form method="POST" action="<?php echo e(route('edit-exp')); ?>">
                <?php echo csrf_field(); ?>

                <h3>Experiencia Laboral</h3>
                <hr>

                <div class="form-group row">
                    <label for="cargo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cargo')); ?></label>

                    <div class="col-md-8">
                        <input id="input-cargo" type="text" class="form-control <?php if ($errors->has('cargo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cargo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cargo" value="<?php echo e(old('cargo')); ?>" required autocomplete="cargo" autofocus>

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
                    <label for="empresa" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Empresa')); ?></label>

                    <div class="col-md-8">
                        <input id="input-empresa" type="text" class="form-control <?php if ($errors->has('empresa')) :
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
                    <label for="industria" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Industria')); ?></label>

                    <div class="col-md-8">
                        <select id="input-industria" class="comunas form-control<?php echo e($errors->has('industria') ? ' is-invalid' : ''); ?>" name="industria" required>
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
                    <label for="periodos" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Periodos')); ?></label>

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

                <div class="form-group row">
                    <label for="responsabilidades" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Principales responsabilidades')); ?></label>

                    <div class="col-md-8">
                        <textarea id="input-responsabilidades" class="form-control <?php if ($errors->has('responsabilidades')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('responsabilidades'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="responsabilidades" value="<?php echo e(old('responsabilidades')); ?>" required autocomplete="responsabilidades" rows="3" maxlength="1000"></textarea>

                        <?php if ($errors->has('responsabilidades')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('responsabilidades'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logros" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Logros')); ?></label>

                    <div class="col-md-8">
                        <textarea id="input-logros" class="form-control <?php if ($errors->has('logros')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logros'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="logros" value="<?php echo e(old('logros')); ?>" required autocomplete="logros" rows="3" maxlength="1000"></textarea>

                        <?php if ($errors->has('logros')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logros'); ?>
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
    $('#input-industria', '#modalEditar').val($('.input-industria', '#experiencia-'+id).val());
    //$('#input-periodo_desde', '#modalEditar').val($('.input-desde', '#experiencia-'+id).val());
    //$('#input-periodo_hasta', '#modalEditar').val($('.input-hasta', '#experiencia-'+id).val());
    $('#input-periodo_desde').datepicker('setDate', new Date($('.input-desde', '#experiencia-'+id).val()+' 00:00'));
    $('#input-periodo_hasta').datepicker('setDate', new Date($('.input-hasta', '#experiencia-'+id).val()+' 00:00'));
    $('#input-responsabilidades', '#modalEditar').val($('.input-responsabilidades', '#experiencia-'+id).html());
    $('#input-logros', '#modalEditar').val($('.input-logros', '#experiencia-'+id).html());
    $('#modalEditar').modal();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/pro/experiencia.blade.php ENDPATH**/ ?>