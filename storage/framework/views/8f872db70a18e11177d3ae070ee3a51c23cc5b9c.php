<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 6], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Contactos</div>
            </div>
            <br>
            <?php if(count($pros) >= 1): ?>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Fono</th>
                      <th scope="col">Email</th>
                      <th scope="col">Asunto</th>
                      <th scope="col">Mensaje</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($pro->nombre); ?></td>
                        <td><?php echo e($pro->fono); ?></td>
                        <td><?php echo e($pro->email); ?></td>
                        <td><?php echo e($pro->asunto); ?></td>
                        <td>
                            <?php if(!is_null($pro->mensaje)): ?>
                            <?php echo e($pro->mensaje); ?>

                            <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>

            <?php echo e($pros->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/admin/contactos.blade.php ENDPATH**/ ?>