<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('emp.menu', ['cual' =>4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <?php if($oferta->estado == 0): ?>
                <span class="label label-danger pull-left">Inactiva</span><br>
                <?php endif; ?>
                <div class="card-header">
                    <small>Perfiles Postulando al Cargo</small><br>
                    "<?php echo e($oferta->cargo); ?>"
                </div>
            </div>
<br>
            <?php if(count($perfiles) >= 1): ?>
              <?php $__currentLoopData = $perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="clearfix" id="postula-<?php echo e($pro->id); ?>" style="margin-bottom: 10px;">
                    <h4 class="pull-left"><?php echo e($pro->titulos->profesion); ?><br><small><i>Registrado el <?php echo e(\Carbon\Carbon::parse($pro->created_at)->format('d-m-Y')); ?></i></small></h4>

                    <a class="btn btn-info pull-right" style="margin-left: 5px;" data-toggle="modal" data-target="#info-perfil-<?php echo e($pro->id); ?>">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>

                    <?php
                    $estado = $pro->estadoPostulacion($oferta->id);
                    ?>
                    <?php if($estado == 1): ?>
                    <span class="label label-success pull-right">Aceptado</span>
                    <?php elseif($estado == 2): ?>
                    <span class="label label-danger pull-right">Rechazado</span>
                    <?php else: ?>
                        <?php if($oferta->estado == 1): ?>
                        <a class="btn btn-danger pull-right botones-estado" style="margin-left: 5px;" onclick="estado(<?php echo e($pro->id); ?>,2)">Rechazar</a>

                        <a class="btn btn-success pull-right botones-estado" style="margin-left: 5px;" onclick="estado(<?php echo e($pro->id); ?>,1)">Aceptar</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <p class=""><?php echo e($perfiles->links()); ?></p>
            <?php else: ?>
            No ha seleccionado perfiles de su interés.
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
    <?php if(isset($perfiles) && count($perfiles) > 0): ?>
        <?php $__currentLoopData = $perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('modal-perfil', ['desde' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<script>
function estado(id, eo){
    var msg = (eo == 1 ? 'aceptar':'rechazar');
    var confirma = confirm("¿Está seguro que desea "+msg+" este postulante?");
    if(confirma){
        $.ajax({
            url: "<?php echo e(url('/estado-postulacion')); ?>",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            },
            data: {
                idOf: <?php echo e($oferta->id); ?>,
                idPos: id,
                estado: eo,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('.botones-estado', '#postula-'+id).remove();
                    $('#postula-'+id).append('<span class="label label-success pull-right">Aceptado</span>');
                }
                else if(response == 2)
                {
                    $('.botones-estado', '#postula-'+id).remove();
                    $('#postula-'+id).append('<span class="label label-danger pull-right">Rechazado</span>');
                }
                else {
                    alert('No se pudo cambiar el estado de la postulación. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/emp/postulaciones.blade.php ENDPATH**/ ?>