<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Win Win</div>
            </div>
<br>
            <?php if(count($pros) >= 1): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Industria</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Contacto</th>
                      <th scope="col" width="1">Logo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e(DB::table('industria')->where('id', $pro->industria)->first()->industria); ?></td>
                        <td><?php echo e($pro->servicios); ?></td>
                        <td><b>Sitio web:</b> <?php echo e($pro->web); ?><br>
                          <b>Email:</b> <?php echo e($pro->email); ?><br>
                          <?php if(!is_null($pro->fono)): ?>
                            <b>Teléfono:</b> <?php echo e($pro->fono); ?><br>
                          <?php endif; ?>
                          <?php if(!is_null($pro->twitter) || !is_null($pro->instagram) || !is_null($pro->facebook)): ?>
                            <button class="btn btn-group" title="Redes Sociales" data-toggle="popover" data-placement="top" data-content="
                            <?php echo e((!is_null($pro->twitter) ? '<b>Twitter:</b> '.$pro->twitter.'<br>':'')); ?>

                            <?php echo e((!is_null($pro->instagram) ? '<b>Instagram:</b> '.$pro->instagram.'<br>':'')); ?>

                            <?php echo e((!is_null($pro->facebook) ? '<b>Facebook:</b> '.$pro->facebook.'<br>':'')); ?>

                            " data-html="true"><i class="fa fa-info" aria-hidden="true"></i></button>
                          <?php endif; ?>
                        </td>
                        <td>
                            <img src="<?php echo e(Storage::disk('public')->url('logos/'.$pro->logo)); ?>" class="img-perfil perfil-admin" width="100" height="100">
                        </td>
                        <td id="controles-<?php echo e($pro->id); ?>">
                        <?php if($pro->permiso == 1): ?>
                          <p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar(<?php echo e($pro->id); ?>, 0)">Ocultar</button>
                        <?php else: ?>
                          <p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar(<?php echo e($pro->id); ?>, 1)">Aprobar</button>
                        <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
});

function aprobar(id, eo){
  $.ajax({
    url: "<?php echo e(url('/estado-winwin')); ?>",
    method: "POST",
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
    },
    data: {
        idEmp: id,
        estado: eo,
    },
    success: function (response) {
        if(response == 1)
        {
            $('#controles-'+id).html('<p><span class="label label-success">Aprobada</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Ocultar</button>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Oculta</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Aprobar</button>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. Inténtalo más tarde.');
        }
    }
  });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/admin/winwin.blade.php ENDPATH**/ ?>