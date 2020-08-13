<!-- Modal -->
<div class="modal fade" id="info-perfil-<?php echo e($yo->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($yo->id); ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo e($yo->id); ?>">Perfil Operativo</h4><a href="<?php echo e(url('customer/print-pdf',$yo->id)); ?>">Print PDF</a>
      </div>
      <div class="modal-body">
        <div class="titulo-card">
            Datos Personales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->tipo == 0): ?>
                    <td><b>Fecha de Nacimiento:</b></td>
                    <td><?php echo e($yo->fnac); ?></td>
                </tr><tr>
                    <td><b>Género:</b></td>
                    <td><?php echo e($yo->genero()); ?></td>
                </tr><tr>
                    <td><b>Nacionalidad:</b></td>
                    <td><?php echo e($yo->nacionalidad); ?></td>
                </tr><tr>
                    <td><b>Dirección:</b></td>
                    <td><?php echo e($yo->direccion); ?></td>
                </tr><tr>
                    <td><b>Comuna:</b></td>
                    <td><?php echo e($yo->comuna->comuna); ?></td>
                </tr><tr>
                    <td><b>Estado Civil:</b></td>
                    <td><?php echo e($yo->civil()); ?></td>
                </tr><tr>
                <?php endif; ?>
                <?php endif; ?>
                    <td><b>AFP:</b></td>
                    <td><?php echo e(\DB::table('afps')->where('id', $yo->afp)->first()->afp); ?></td>
                </tr><tr>
                    <td><b>Salud:</b></td>
                    <td><?php echo e(\DB::table('isapres')->where('id', $yo->salud)->first()->isapre); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="titulo-card">
            Situación Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%"><?php echo e($yo->situacion()); ?></td>
                </tr><tr>
                    <td><b>Expectativas de Renta:</b></td>
                    <td>CLP $<?php echo e($yo->renta); ?></td>
                </tr><tr>
                <?php if($yo->situacion != 0): ?>
                    <td><b>Cargo que desempeña:</b></td>
                    <td><?php echo e($yo->cargo); ?></td>
                </tr><tr>
                <?php endif; ?>
                    <td><b>¿Por qué te deberían contratar?:</b></td>
                    <td><?php echo e($yo->porque); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <?php if($yo->situacion != 0 && $yo->user->experienciasOp->count() > 0): ?>
        <div class="titulo-card">
            Experiencia
        </div>
        <div class="table-responsive">
            <?php $__currentLoopData = $yo->user->experienciasOp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <table class="table table-bordered">
                <?php if(!empty($xp->cargo)): ?>
                  <tr style="background-color:#CCC;color:#000">
                    <th scope="row">Cargo</th>
                    <td width="70%"><?php echo e($xp->cargo); ?></td>
                  </tr>
                <?php endif; ?>
                <?php if(!empty($xp->empresa)): ?>
                  <tr>
                    <th scope="row">Empresa</th>
                    <td><?php echo e($xp->empresa); ?></td>
                  </tr>
                <?php endif; ?>
                <?php if(!empty($xp->industria)): ?>
                  <tr>
                    <th scope="row">Industria</th>
                    <td><?php echo e(DB::table('industria')->where('id', $xp->industria)->first()->industria); ?></td>
                  </tr>
                <?php endif; ?>
                <?php if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta)): ?>
                  <tr>
                    <th scope="row">Periodo</th>
                    <td><?php echo e(\Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y')); ?> a <?php echo e(\Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y')); ?></td>
                  </tr>
                <?php endif; ?>
                <?php if(!empty($xp->responsabilidades)): ?>
                  <tr>
                    <th scope="row">Responsabilidades</th>
                    <td><?php echo e($xp->responsabilidades); ?></td>
                  </tr>
                <?php endif; ?>
                <?php if(!empty($xp->logros)): ?>
                  <tr>
                    <th scope="row">Logros</th>
                    <td><?php echo e($xp->logros); ?></td>
                  </tr>
                <?php endif; ?>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <br>
        <?php endif; ?>
        <div class="titulo-card">
            Situación Académica Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%"><?php echo e($yo->nivel_educ()); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <?php if($yo->user->formacionOp->count() > 0): ?>
        <div class="titulo-card">
            Capacitaciones y otros cursos
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Curso</th>
                  <th scope="col">Casa de Estudios</th>
                  <th scope="col">Duracion</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $yo->user->formacionOp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($xp->curso); ?></td>
                    <td><?php echo e($xp->casa); ?></td>
                    <td><?php echo e($xp->duracion); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
        </div>
        <br>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px;" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/html/test_2/resources/views/ope/modal-perfil.blade.php ENDPATH**/ ?>