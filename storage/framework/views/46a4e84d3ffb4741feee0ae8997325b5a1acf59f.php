<?php $__env->startSection('content'); ?>
<section class="section" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="section-title text-center">
                        <h3>WIN WIN<br>
                          <small>EMPRESAS REGISTRADAS</small></h3>
                          <br>
                    </div>

                    <!--div class="service-box text">
                      <p>Estas son las empresas que trabajan con nosotros.</p>
                    </div-->
                </div>
            </div>
            <?php if(count($empresas) >= 1): ?>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <form method="get" class="form-inline">
				<div class="form-group">
                    <label>Industria</label>
					<select name="industria" class="form-control select2">
                        <option></option>
                        <?php $__currentLoopData = $industrias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($emp->industria); ?>" <?php echo e(($emp->industria == request('industria') ? 'selected':'')); ?>><?php echo e($emp->nombreIndustria($emp->industria)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
					<button class="btn btn-default">Filtrar</button>
				</div>
                </form>
            </div>
            <div class="col-md-12"><br></div>

                <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-4 text-center" style="margin-bottom: 20px;">
                        <a href="https://<?php echo e($logo->web); ?>" target="_blank" class="logo-web"><img src="<?php echo e(Storage::disk('public')->url('logos/'.$logo->logo)); ?>" class="img-responsive" style="margin-bottom: 5px;"></a>
                        <a href="mailto:<?php echo e($logo->email); ?>"><?php echo e($logo->email); ?></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ascendin/public_html/resources/views/empresas.blade.php ENDPATH**/ ?>