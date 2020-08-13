

<?php $__env->startSection('assets_adicionales'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5 perfiles">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center" id="service">
                <h3>Perfiles Profesionales</h3>
                <br><br>
            </div>
        </div>

        <?php if(auth()->guard()->check()): ?>
        <div class="col-md-4" style="padding-right: 5%;">
            <h4>Filtrar por:</h4>
            <?php if(!is_null( request('industria') )): ?>
            <span class="badge badge-pill badge-info"><?php echo e(DB::table('industria')->where('id', request('industria'))->first()->industria); ?></span>
            <?php endif; ?>
            <?php if(!is_null( request('titulo') )): ?>
            <span class="badge badge-pill badge-info"><?php echo e(\App\Titulo::find(request('titulo'))->profesion); ?></span>
            <?php endif; ?>
            <?php if(!is_null( request('experiencia') )): ?>
            <span class="badge badge-pill badge-info">
                <?php switch(request('experiencia')):
                    case (2): ?>
                        Menos de 2 años
                        <?php break; ?>
                    <?php case (3): ?>
                        Entre 3 y 5 años
                        <?php break; ?>
                    <?php case (4): ?>
                        Entre 6 y 10 años
                        <?php break; ?>
                    <?php case (5): ?>
                        Mayor a 11 años
                        <?php break; ?>
                    <?php default: ?>
                        Sin experiencia
                <?php endswitch; ?>
            </span>
            <?php endif; ?>
            <?php if(!is_null( request('comuna') )): ?>
            <span class="badge badge-pill badge-info"><?php echo e(\App\Comuna::find(request('comuna'))->comuna); ?></span>
            <?php endif; ?>
            <?php if(!is_null( request('genero') )): ?>
            <span class="badge badge-pill badge-info">
                <?php switch(request('genero')):
                    case (1): ?>
                        Femenino
                        <?php break; ?>
                    <?php case (2): ?>
                        Otro
                        <?php break; ?>
                    <?php default: ?>
                        Masculino
                <?php endswitch; ?>
            </span>
            <?php endif; ?>

            <?php if(count($_GET) >= 1): ?>
            <br>
            <?php endif; ?>
            <br>
            <form method="get">
                <p>Industria <br><select name="industria" class="form-control select2">
                    <option></option>
                    <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ind->industria); ?>" <?php echo e(($ind->industria == request('industria') ? 'selected':'')); ?>><?php echo e($ind->nombreIndustria($ind->industria)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></p>
                <p>Profesión <br><select name="titulo" class="form-control select2">
                    <option></option>
                    <?php $__currentLoopData = $titulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tit->titulo); ?>" <?php echo e(($tit->titulo == request('titulo') ? 'selected':'')); ?>><?php echo e($tit->profesion); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></p>
                <p>Experiencia <br><select name="experiencia" class="form-control select2">
                    <option></option>
                    <option value="1" <?php echo e((request('experiencia') == '1' ? 'selected':'')); ?>>Sin experiencia</option>
                    <option value="2" <?php echo e((request('experiencia') == '2' ? 'selected':'')); ?>>Menos de 2 años</option>
                    <option value="3" <?php echo e((request('experiencia') == '3' ? 'selected':'')); ?>>Entre 3 y 5 años</option>
                    <option value="4" <?php echo e((request('experiencia') == '4' ? 'selected':'')); ?>>Entre 6 y 10 años</option>
                    <option value="5" <?php echo e((request('experiencia') == '5' ? 'selected':'')); ?>>Mayor a 11 años</option>
                </select></p>
                <p>Comuna <br><select name="comuna" class="form-control select2">
                    <option></option>
                    <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($com->comuna_id); ?>" <?php echo e(($com->comuna_id == request('comuna') ? 'selected':'')); ?>><?php echo e($com->comuna); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></p>
                <!--p>Género <br><select name="genero" class="form-control select2">
                    <option></option>
                    <option value="1" <?php echo e((request('genero') == '1' ? 'selected':'')); ?>>Femenino</option>
                    <option value="0" <?php echo e((request('genero') == '0' ? 'selected':'')); ?>>Masculino</option>
                    <option value="2" <?php echo e((request('genero') == '2' ? 'selected':'')); ?>>Otro</option>
                </select></p-->
                <br>
                <p><button class="btn btn-primary">Aplicar filtros</button></p>
            </form>
            <?php if(count($_GET) >= 1): ?>
            <p style="margin-top: 10px;"><form><button class="btn btn-link">Limpiar filtros</button></form></p>
            <?php endif; ?>
            <br>
        </div>
        <?php endif; ?>

        <?php if(isset($profesionales) && count($profesionales) > 0): ?>
        <div class="col-md-8 <?php echo e((Auth::check() ? '':'col-md-offset-2')); ?>">
            <?php $__currentLoopData = $profesionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="clearfix" style="margin-bottom: 10px;">
                <h4 class="pull-left"><br><small><i>Registrado el <?php echo e(\Carbon\Carbon::parse($pro->created_at)->format('d-m-Y')); ?></i></small></h4>

                <a class="btn btn-info pull-right" style="margin-left: 5px;" data-toggle="modal" data-target="#info-perfil-<?php echo e($pro->id); ?>">Ver perfil &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->tipo == 2): ?>
                        <?php if(Auth::user()->empresa->interesado($pro->id)): ?>
                        <!--span class="label label-success pull-right">Interesado <i class="fa fa-star" aria-hidden="true"></i></span-->
                        <button class="btn btn-link pull-right" disabled>Interesado <i class="fa fa-star" aria-hidden="true"></i></button>
                        <?php else: ?>
                        <span class="pull-right interes-<?php echo e($pro->id); ?>"><button class="btn btn-primary" onclick="interes(<?php echo e($pro->id); ?>)">Me interesa &nbsp; <i class="fa fa-thumb-tack" aria-hidden="true"></i></button></span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
            <?php if(auth()->guard()->check()): ?>
            <div class="col-md-8">
                <?php if(count($_GET) >= 1): ?>
                <h4>Ningún perfil coincide con los criterios de búsqueda seleccionados.</h4>
                <?php else: ?>
                <h3>Por el momento, no hay profesionales disponibles.</h3>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="col-md-12 text-center">
                <h3>Por el momento, no hay profesionales disponibles.</h3>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
        <div class="col-md-12 text-center">
            <br>
            <h3>Para ver todos los perfiles</h3>
            <br>
            <a href="<?php echo e(route('registro-empresa')); ?>" class="btn btn-style-one text-center">Regístrate aquí</a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_adicional'); ?>
    <?php if(isset($profesionales) && count($profesionales) > 0): ?>
        <?php $__currentLoopData = $profesionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('ope.modal-perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<script>
function interes(p){
    var confirma = confirm("¿Te interesa este perfil?");
    if(confirma){
        $.ajax({
            url: "<?php echo e(url('/me-interesa')); ?>",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            },
            data: {
                idP: p,
            },
            success: function (response) {
                if(response == 1)
                {
                    $('.interes-'+p).html('<button class="btn btn-link pull-right" disabled>Interesado <i class="fa fa-star" aria-hidden="true"></i></button>');
                }
                else {
                    alert('No se pudo registrar su interés por el perfil seleccionado. Inténtalo más tarde.');
                }
            }
          });
    }
}

$(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Seleccione...',
      allowClear: true,
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/test/resources/views/perfiles-op.blade.php ENDPATH**/ ?>