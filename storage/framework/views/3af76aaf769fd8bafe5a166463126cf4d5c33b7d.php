<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    
        <div class="col-md-3">
        <?php echo $__env->make('admin.menu', ['cual' => 7], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Operativos</div>
            </div>
<br>
            <?php if(count($pros) >= 1): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Datos Personales</th>
                      <th scope="col">Ocupaciones</th>
                      <th scope="col">Contacto</th>
                      <th scope="col" width="1">Foto</th>
                      <th>Más Info</th>
                      <th>Acceso</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <b>RUT:</b> <span id="nombre-<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></span><br>
                          <?php if(!is_null($pro->operativo)): ?>
                          <b>Nombre:</b> <?php echo e($pro->operativo->nombre); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if(!is_null($pro->operativo)): ?>
                            <?php
                              $ocupaciones = $pro->experienciasOp->map->only(['ocupacion']);
                              $i = 0;
                              foreach($ocupaciones as $unaocup){
                                $i++;
                                echo $unaocup['ocupacion'] . ($i < count($ocupaciones) ? ", ":"");
                              }
                            ?>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if(!is_null($pro->operativo)): ?>
                          <b>Email:</b> <?php echo e($pro->operativo->email); ?><br>
                          <b>Teléfono:</b> <?php echo e($pro->operativo->fono); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!is_null($pro->operativo)): ?>
                            <img src="<?php echo e(Storage::disk('usuarios')->url($pro->operativo->foto)); ?>" class="img-perfil perfil-admin" width="100" height="100">
                            <?php endif; ?>
                        </td>
                        <td>
                          
                          <?php if(!is_null($pro->operativo)): ?>
                            <a class="btn btn-info" data-toggle="modal" data-target="#info-perfil-<?php echo e($pro->operativo->id); ?>"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <?php if(!is_null($pro->operativo->cv)): ?>
                              <br><br>
                              <a class="btn btn-danger" target="_blank" href="<?php echo e(Storage::disk('cvs')->url($pro->operativo->cv)); ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                        <td id="controles-<?php echo e($pro->id); ?>">
                        <?php if($pro->permiso == 1): ?>
                          <p><span class="label label-success">Permitido</span></p><button class="btn btn-default btn-sm" onclick="aprobar(<?php echo e($pro->id); ?>, 0)">Suspender</button>
                        <?php else: ?>
                          <p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info btn-sm" onclick="aprobar(<?php echo e($pro->id); ?>, 1)">Permitir</button>
                        <?php endif; ?>
                        <a href="perfil-op1/<?php echo e($pro->id); ?>" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
            </div>
            <?php echo e($pros->links()); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script_adicional'); ?>
    <?php if(isset($pros) && count($pros) > 0): ?>
        <?php $__currentLoopData = $pros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!is_null($prof->operativo)): ?>
              <?php echo $__env->make('ope.modal-perfil', ['yo' => $prof->operativo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function mostrar(id){
  $('#myModalLabel').html( $('#nombre-'+id).html() );

  $.ajax({
    url: "<?php echo e(url('/info-pros')); ?>",
    method: "POST",
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
    },
    data: {
        idEmp: id,
    },
    success: function (response) {
        if(response.tipo == 1)
        {
            var cuerpo = "";
            if(Object.keys(response.usuario).length == 0){
              cuerpo = "Registro incompleto.";
            } else {
              cuerpo = '<b>Fecha de nacimiento:</b> '+(response.usuario.fnac ?? '---');
            }

            $('.modal-body', '#myModal').html(cuerpo);
            $('#myModal').modal();
        }
        else {
            alert('No se pudo obtener la información. Inténtalo más tarde.');
        }
    }
  });
}

function aprobar(id, eo){
  $.ajax({
    url: "<?php echo e(url('/estado-pros')); ?>",
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
            $('#controles-'+id).html('<p><span class="label label-success">Permitido</span></p><button class="btn btn-default" onclick="aprobar('+id+', 0)">Suspender</button>');
        }
        else if(response == 0)
        {
            $('#controles-'+id).html('<p><span class="label label-danger">Suspendido</span></p><button class="btn btn-info" onclick="aprobar('+id+', 1)">Permitir</button>');
        }
        else {
            alert('No se pudo cambiar el estado de la empresa. Inténtalo más tarde.');
        }
    }
  });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test_2_1/resources/views/admin/operativos.blade.php ENDPATH**/ ?>