<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Ofertas Laborales</div>
            </div>
            
                <div class="card-body">
                    <?php if(count($pros) >= 1): ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Empresa</th>
                              <th scope="col">Industria</th>
                              <th scope="col">Cargo</th>
                              <th scope="col">Ciudad</th>
                              <th scope="col">Más info</th>
                              <th scope="col">Acceso</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id="<?php echo e($pro->id); ?>">
                                <td><?php echo e($pro->user->name); ?></td>
                                <td><?php echo e(DB::table('industria')->where('id', $pro->industria)->first()->industria); ?></td>
                                <td><?php echo e($pro->cargo); ?></td>
                                <td><?php echo e($pro->ciudad); ?></td>
                                <td>
                                  <a class="btn btn-info" data-toggle="modal" data-target="#perfil-oferta-<?php echo e($pro->id); ?>"><i class="fa fa-info" aria-hidden="true"></i></a>
                                </td>
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


<?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php echo $__env->make('admin/ofertas-modal', ['pro' => $pro], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    
function eliminar(oferta){
  Swal.fire({
    title: '¿Estás seguro?',
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
        url: "<?php echo e(url('/eliminar-oferta')); ?>",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        data: {
            id: oferta.id,
        },
        success: function (response) {
            $('[data-id=' + oferta.id + ']').remove();
        }
      });
    }
  })
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test_2/resources/views/admin/ofertas.blade.php ENDPATH**/ ?>