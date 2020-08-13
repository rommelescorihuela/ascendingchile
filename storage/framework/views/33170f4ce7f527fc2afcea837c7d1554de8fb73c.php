<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Empresas</div>
            </div>

                <div class="card-body">
                    <?php if(count($pros) >= 1): ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">RUT</th>
                              <th scope="col">Nombre</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr  data-id="<?php echo e($pro->id); ?>">
                                <td><?php echo e($pro->name); ?></td>
                                <td>
                                    <?php if(!is_null($pro->empresa)): ?>
                                    <?php echo e($pro->empresa->nombre); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                  <a target="_blank" href="<?php echo e(route('perfil-publico', $pro->id)); ?> " class="btn btn-default btn-sm">Ver perfil</a>
                                    <p><button class="btn btn-danger" style="margin-top: 10px" onclick="eliminar(<?php echo e($pro); ?>)">Eliminar</button></p>
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
    function eliminar(profesional){
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
        console.info(profesional)
        
      $.ajax({
        url: "<?php echo e(url('/eliminar-empresa')); ?>",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        },
        data: {
            id: profesional.empresa.id,
        },
        success: function (response) {
            $('[data-id=' + profesional.id + ']').remove();
        }
      });
    }
  })
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/admin/empresas.blade.php ENDPATH**/ ?>