<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Ofertas Laborales</div>

                <div class="card-body">
                    <?php if(count($pros) >= 1): ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Empresa</th>
                              <th scope="col">Industria</th>
                              <th scope="col">Cargo</th>
                              <th scope="col">Ciudad</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($pro->user->name); ?></td>
                                <td><?php echo e(DB::table('industria')->where('id', $pro->industria)->first()->industria); ?></td>
                                <td><?php echo e($pro->cargo); ?></td>
                                <td><?php echo e($pro->ciudad); ?></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php endif; ?>

                    <?php echo e($pros->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/admin/ofertas.blade.php ENDPATH**/ ?>