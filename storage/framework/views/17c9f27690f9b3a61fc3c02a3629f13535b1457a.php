<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Levantamientos de perfil</div>
        </div>

                <div class="card-body">
                    <?php if(count($pros) >= 1): ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Empresa</th>
                              <th scope="col">Cargo</th>
                              <th scope="col">Ubicación en Estructura</th>
                              <th scope="col">Superior</th>
                              <th scope="col">Supervisa</th>
                              <th scope="col">Mas Info</th>
                              <th scope="col">Acceso</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id="<?php echo e($pro->id); ?>">
                                <td><?php echo e($pro->user->name); ?></td>
                                <td><?php echo e($pro->cargo); ?></td>
                                <td><?php echo e($pro->ubicacion); ?></td>
                                <td><?php echo e($pro->superior); ?></td>
                                <td><?php echo e($pro->supervisa); ?></td>
                                <td><a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-levantamiento-<?php echo e($pro->id); ?>"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                <td>
                                  <button onclick="permitir(<?php echo e($pro->id); ?>)" class="btn btn-success">Permitir</button>
                                  <button onclick="supender(<?php echo e($pro->id); ?>)" style="margin-top: 5px" class="btn btn-default">Supender</button>
                                  <button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar(<?php echo e($pro); ?>)">Eliminar</button>
                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php endif; ?>

                    <?php echo e($pros->links()); ?>

                </div>
            
        </div>
    </div>
</div>

<script>
    
function eliminar(levantamiento){
  Swal.fire({
    title: '�0�7Est��s seguro?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "<?php echo e(url('/eliminar-levantamiento')); ?>",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        data: {
            id: levantamiento.id,
        },
        success: function (response) {
            $('[data-id=' + levantamiento.id + ']').remove();
        }
      });
    }
  })
},
</script>
<?php $__env->stopSection(); ?>
<?php if(isset($pros) && count($pros) > 0): ?>
  <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('admin.modal-levantamiento',['pro' => $prof], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test_2_1/resources/views/admin/levantamientos.blade.php ENDPATH**/ ?>