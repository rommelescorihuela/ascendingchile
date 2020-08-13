<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('emp.menu', ['cual' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Ofertas Laborales (operativos)</div>
                <p class="text-right"><a class="btn btn-success" href="<?php echo e(route('mis-ofertas')); ?>" style="margin-left: 10px;">Perfiles Profesionales <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
            </div>
<br>
            <?php if(count($ofertas) >= 1): ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            <?php $__currentLoopData = $ofertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo e($xp->id); ?>">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($xp->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($xp->id); ?>">+ Info</a>
                    <?php if($xp->estado == 1): ?>
                    <button type="button" class="btn btn-default pull-right boton-estado" onclick="activar(<?php echo e($xp->id); ?>,0)" style="margin: 0 5px;">Desactivar</button>
                    <?php else: ?>
                    <button type="button" class="btn btn-default pull-right boton-estado" onclick="activar(<?php echo e($xp->id); ?>,1)" style="margin: 0 5px;">Activar</button>
                    <?php endif; ?>
                    <h4 class="panel-title">
                      <?php echo e($xp->cargo); ?>

                    </h4>
                    <?php if($xp->estado == 1): ?>
                        <span class="label label-success etiqueta">Activa</span>
                    <?php else: ?>
                        <span class="label label-danger etiqueta">Inactiva</span>
                    <?php endif; ?>
                    <small>&nbsp; <?php echo e(\Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y')); ?> | <?php echo e($xp->ciudad); ?></small>
                </div>
                <div id="collapse<?php echo e($xp->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($xp->id); ?>">
                  <div class="panel-body">
                    <div class="text-right" style="margin-bottom: 10px;">
                        <?php
                            $postu = $xp->postulacion->count();
                        ?>
                        <?php if($postu > 0): ?>
                            <?php echo e($postu.($postu == 1 ? ' postulante':' postulantes')); ?> <a class="btn btn-success" href="<?php echo e(route('postulaciones', $xp->id)); ?>" style="margin-left: 10px;">Ver <i class="fa fa-external-link" aria-hidden="true"></i></a>
                        <?php else: ?>
                            Sin postulantes.
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <td width="30%"><b>Industria:</b></td>
                            <td><?php echo e(DB::table('industria')->where('id', $xp->industria)->first()->industria); ?></td>
                        </tr><tr>
                            <td><b>Lugar de Trabajo:</b></td>
                            <td><?php echo e($xp->lugar); ?></td>
                        </tr><tr>
                            <td><b>Jornada:</b></td>
                            <td><?php echo e($xp->jornada); ?></td>
                        </tr><tr>
                            <td><b>Descripción General:</b></td>
                            <td><?php echo e($xp->descripcion); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Excluyentes:</b></td>
                            <td><?php echo e($xp->excluyentes); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Deseables:</b></td>
                            <td><?php echo e($xp->deseables); ?></td>
                        </tr><tr>
                            <td><b>Renta Fija:</b></td>
                            <td><?php echo e($xp->renta_fija); ?></td>
                        </tr><tr>
                            <td><b>Renta Variable:</b></td>
                            <td><?php echo e($xp->renta_variable); ?></td>
                        </tr><tr>
                            <td><b>Bonos:</b></td>
                            <td><?php echo e($xp->bonos); ?></td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td><?php echo e($xp->beneficios); ?></td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td><?php echo e($xp->porque); ?></td>
                        </tr>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
            <br>
            <?php echo e($ofertas->links()); ?>

            <?php else: ?>
            No hay ofertas laborales disponibles.
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
<script>
function activar(id, eo){
    var msg = (eo == 1 ? 'activar':'desactivar');
    var confirma = confirm("¿Está seguro que desea "+msg+" esta oferta?");
    if(confirma){
        $.ajax({
            url: "<?php echo e(url('/estado-oferta')); ?>",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            },
            data: {
                idOf: id,
                estado: eo,
            },
            success: function (response) {
                if(response == 1)
                {
                    //$('#controles-'+id).html('<p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Ocultar</button>');
                    $('.etiqueta', '#heading'+id).removeClass('label-danger').addClass('label-success').html('Activa');
                    $('.boton-estado', '#heading'+id).html('Desactivar').attr('onclick', 'activar('+id+',0)');
                }
                else if(response == 0)
                {
                    //$('#controles-'+id).html('<p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Aprobar</button>');
                    $('.etiqueta', '#heading'+id).removeClass('label-success').addClass('label-danger').html('Inactiva');
                    $('.boton-estado', '#heading'+id).html('Activar').attr('onclick', 'activar('+id+',1)');
                }
                else {
                    alert('No se pudo cambiar el estado de la oferta. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/emp/ofertas-op.blade.php ENDPATH**/ ?>