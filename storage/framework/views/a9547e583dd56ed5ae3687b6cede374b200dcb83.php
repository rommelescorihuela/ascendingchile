<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('emp.menu', ['cual' => 5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfiles Profesionales de Interés</div>
            </div>
<br>
            <?php if(count($perfiles) >= 1): ?>
              <?php $__currentLoopData = $perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="clearfix" style="margin-bottom: 10px;">
                    <h4 class="pull-left"><?php echo e($pro->titulos->profesion); ?><br><small><i>Registrado el <?php echo e(\Carbon\Carbon::parse($pro->created_at)->format('d-m-Y')); ?></i></small></h4>

                    <a class="btn btn-info pull-right" data-toggle="modal" data-target="#info-perfil-<?php echo e($pro->id); ?>">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>
                </div>
                <hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="text-center"><?php echo e($perfiles->links()); ?></p>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/emp/perfiles.blade.php ENDPATH**/ ?>