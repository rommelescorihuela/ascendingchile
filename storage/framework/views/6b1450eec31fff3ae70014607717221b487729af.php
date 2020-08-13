<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 7], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Postulaciones</div>
            </div>
<br>
            <?php if(count($postu) >= 1): ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            <?php $__currentLoopData = $postu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo e($xp->id); ?>">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($xp->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($xp->id); ?>">+ Info</a>
                    <?php if($xp->estado == 1): ?>
                        <button type="button" class="btn btn-success pull-right" style="margin: 0 5px;" disabled><i class="fa fa-check-square-o" aria-hidden="true"></i> Aceptado</button>
                    <?php elseif($xp->estado == 2): ?>
                        <button type="button" class="btn btn-danger pull-right" style="margin: 0 5px;" disabled><i class="fa fa-ban" aria-hidden="true"></i> Rechazado</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Pendiente</button>
                    <?php endif; ?>
                    <h4 class="panel-title">
                      <?php echo e($xp->oferta->cargo); ?>

                    </h4>
                    <small>Fecha postulación: <?php echo e(\Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y')); ?> | <?php echo e($xp->oferta->ciudad); ?></small>
                </div>
                <div id="collapse<?php echo e($xp->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($xp->id); ?>">
                  <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <td width="30%"><b>Industria:</b></td>
                            <td><?php echo e(DB::table('industria')->where('id', $xp->oferta->industria)->first()->industria); ?></td>
                        </tr><tr>
                            <td><b>Lugar de Trabajo:</b></td>
                            <td><?php echo e($xp->oferta->lugar); ?></td>
                        </tr><tr>
                            <td><b>Jornada:</b></td>
                            <td><?php echo e($xp->oferta->jornada); ?></td>
                        </tr><tr>
                            <td><b>Descripción General:</b></td>
                            <td><?php echo e($xp->oferta->descripcion); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Excluyentes:</b></td>
                            <td><?php echo e($xp->oferta->excluyentes); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Deseables:</b></td>
                            <td><?php echo e($xp->oferta->deseables); ?></td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td><?php echo e($xp->oferta->beneficios); ?></td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td><?php echo e($xp->oferta->porque); ?></td>
                        </tr>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
            <br>
            <?php echo e($postu->links()); ?>

            <?php else: ?>
            No tienes postulaciones activas.
            <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/pro/postulaciones.blade.php ENDPATH**/ ?>