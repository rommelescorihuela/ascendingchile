<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
    <?php if(isset($yo)): ?>
        <div class="col-md-4">
        <?php echo $__env->make('pro.menu', ['cual' => 6], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ofertas Laborales</div>
            </div>
            <br>
            <form method="get">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Industria</label>
                        <select name="industria" class="form-control select2">
                            <option></option>
                            <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ind->industria); ?>" <?php echo e(($ind->industria == request('industria') ? 'selected':'')); ?>><?php echo e($ind->nombreIndustria($ind->industria)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ciudad</label>
                        <select name="ciudad" class="form-control select2">
                            <option></option>
                            <?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->ciudad); ?>" <?php echo e(($city->ciudad == request('ciudad') ? 'selected':'')); ?>><?php echo e($city->ciudad); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo de Jornada</label>
                        <select name="jornada" class="form-control select2">
                            <option value="" selected disabled></option>
                            <option value="Full Time" <?php echo e((request('jornada') == 'Full Time' ? 'selected':'')); ?>>Full Time</option>
                            <option value="Part Time" <?php echo e((request('jornada') == 'Part Time' ? 'selected':'')); ?>>Part Time</option>
                            <option value="Temporada" <?php echo e((request('jornada') == 'Temporada' ? 'selected':'')); ?>>Temporada</option>
                            <option value="Freelance" <?php echo e((request('jornada') == 'Freelance' ? 'selected':'')); ?>>Freelance</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary pull-right">Aplicar filtros</button>
                </div>
            </div>
            </form>
            <?php if(count($ofertas) >= 1): ?>
            <br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            <?php $__currentLoopData = $ofertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo e($xp->id); ?>">
                    <a class="btn btn-info pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($xp->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($xp->id); ?>">+ Info</a>
                    <?php if($xp->postulacion->where('profesional', Auth::user()->profesional->id)->count() > 0): ?>
                        <?php if($xp->postulacion->where('profesional', Auth::user()->profesional->id)->first()->estado == 1): ?>
                        <button type="button" class="btn btn-success pull-right" style="margin: 0 5px;" disabled><i class="fa fa-check-square-o" aria-hidden="true"></i> Aceptado</button>
                        <?php elseif($xp->postulacion->where('profesional', Auth::user()->profesional->id)->first()->estado == 2): ?>
                        <button type="button" class="btn btn-danger pull-right" style="margin: 0 5px;" disabled><i class="fa fa-ban" aria-hidden="true"></i> Rechazado</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Postulando</button>
                        <?php endif; ?>
                    <?php else: ?>
                    <span id="oferta-<?php echo e($xp->id); ?>" class="pull-right"><button type="button" class="btn btn-default" onclick="postular(<?php echo e($xp->id); ?>)" style="margin: 0 5px;">Postular</button></span>
                    <?php endif; ?>
                    <h4 class="panel-title">
                      <?php echo e($xp->cargo); ?>

                    </h4>
                    <small><?php echo e(\Carbon\Carbon::parse($xp->created_at)->isoFormat('D MMM Y')); ?> | <?php echo e($xp->ciudad); ?></small>
                </div>
                <div id="collapse<?php echo e($xp->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($xp->id); ?>">
                  <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <td width="30%"><b>Industria:</b></td>
                            <td><?php echo e(DB::table('industria')->where('id', $xp->industria)->first()->industria); ?></td>
                        </tr><tr>
                            <td><b>Lugar de Trabajo:</b></td>
                            <td><?php echo e($xp->lugar); ?></td>
                        </tr><tr>
                            <td><b>Jornada:</b></td>
                            <td><?php echo e($xp->jornada); ?></td>
                        </tr><tr>
                            <td><b>Descripción General:</b></td>
                            <td><?php echo e($xp->descripcion); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Excluyentes:</b></td>
                            <td><?php echo e($xp->excluyentes); ?></td>
                        </tr><tr>
                            <td><b>Requisitos Deseables:</b></td>
                            <td><?php echo e($xp->deseables); ?></td>
                        </tr><tr>
                            <td><b>Beneficios:</b></td>
                            <td><?php echo e($xp->beneficios); ?></td>
                        </tr><tr>
                            <td><b>¿Por qué deberías postular a esta vacante?</b></td>
                            <td><?php echo e($xp->porque); ?></td>
                        </tr>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
            <br>
            <?php echo e($ofertas->links()); ?>

            <?php else: ?>
            No hay ofertas laborales disponibles.
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
$(document).ready(function() {
    $('.select2').select2();
});

function postular(idOf){
    var confirma = confirm("Vas a postular a esta oferta laboral.");
    if(confirma){
        $.ajax({
            url: "<?php echo e(url('/postular')); ?>",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            },
            data: {
                idOf: idOf,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('#oferta-'+idOf).html('<button type="button" class="btn btn-link pull-right" style="margin: 0 5px;" disabled><i class="fa fa-user" aria-hidden="true"></i> Postulando</button>');
                }
                else {
                    alert('No se pudo realizar la postulación. Inténtalo más tarde.');
                }
            }
          });
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/pro/ofertas.blade.php ENDPATH**/ ?>