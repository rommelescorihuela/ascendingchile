<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title></title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAcontentIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <h4 class="modal-title" id="myModalLabel<?php echo e($content->id); ?>">Perfil Profesional</h4><a href="<?php echo e(url('customer/Ofertaprint-pdf',$content->id)); ?>">Print PDF</a>
</div>
<div class="modal-body">
  <div class="titulo-card">
      Datos Personales
  </div>
  <div class="table-responsive">
      <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
          <tr>
              <td><b>Título profesional:</b></td>
              <td width="70%"><?php echo e($content->titulos->profesion); ?></td>
          </tr><tr>
          <?php if(auth()->guard()->check()): ?>
          <?php if(Auth::user()->tipo == 0): ?>
              <td><b>Fecha de Nacimiento:</b></td>
              <td><?php echo e($content->fnac); ?></td>
          </tr><tr>
              <td><b>Género:</b></td>
              <td><?php echo e($content->genero()); ?></td>
          </tr><tr>
              <td><b>Dirección:</b></td>
              <td><?php echo e($content->direccion); ?></td>
          </tr><tr>
              <td><b>Comuna:</b></td>
              <td><?php echo e($content->comuna->comuna); ?></td>
          </tr><tr>
              <td><b>Estado Civil:</b></td>
              <td><?php echo e($content->civil()); ?></td>
          </tr><tr>
              <td><b>Número de Hijos:</b></td>
              <td><?php echo e($content->hijos); ?></td>
          </tr><tr>
              <td><b>AFP:</b></td>
              <td><?php echo e(\DB::table('afps')->where('id', $content->afp)->first()->afp); ?></td>
          </tr><tr>
              <td><b>Salud:</b></td>
              <td><?php echo e(\DB::table('isapres')->where('id', $content->salud)->first()->isapre); ?></td>
          </tr>
          <?php endif; ?>
          <?php endif; ?>
      </table>
  </div>
  <br>
  <div class="titulo-card">
      Resumen Ejecutivo
  </div>
  <p><?php echo e($content->resumen); ?></p>
  <br>
  <div class="titulo-card">
      Situación Laboral Actual
  </div>
  <div class="table-responsive">
      <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
          <tr>
              <td><b>Situación:</b></td>
              <td width="70%"><?php echo e($content->situacion()); ?></td>
          </tr><tr>
              <td><b>Expectativas de Renta:</b></td>
              <td>CLP $<?php echo e($content->renta); ?></td>
          </tr><tr>
          <?php if($content->situacion != 0): ?>
              <td><b>Cargo que desempeña:</b></td>
              <td><?php echo e($content->cargo); ?></td>
          </tr><tr>
          <?php endif; ?>
              <td><b>¿Por qué te deberían contratar?:</b></td>
              <td><?php echo e($content->porque); ?></td>
          </tr>
      </table>
  </div>
  <br>
  <?php if($content->situacion != 0 && $content->user->experiencias->count() > 0): ?>
  <div class="titulo-card">
      Experiencia
  </div>
  <div class="table-responsive">
      <?php $__currentLoopData = $content->user->experiencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
              <td width="70%"><?php echo e($content->situacion_acad()); ?></td>
          </tr><tr>
              <td><b>Dominio de inglés:</b></td>
              <td><?php echo e($content->ingles()); ?></td>
          </tr>
      </table>
  </div>
  <br>
  <?php if($content->user->formacion->count() > 0): ?>
  <div class="titulo-card">
      Formación
  </div>
  <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Profesión, Diplomado o Mágister</th>
            <th scope="col">Casa de Estudios</th>
            <th scope="col">Periodos</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $content->user->formacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($xp->profesion); ?></td>
              <td><?php echo e(DB::table('casas')->where('id', $xp->casa)->first()->casa); ?></td>
              <td><?php echo e(\Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y')); ?> a <?php echo e(\Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y')); ?></td>
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
  <?php if(auth()->guard()->check()): ?>
  <?php if(Auth::user()->tipo == 2 && !isset($desde)): ?>
      <?php if(Auth::user()->empresa->interesado($content->id)): ?>
      <button class="btn btn-link pull-right" disabled>Interesado <i class="fa fa-star" aria-hidden="true"></i></button>
      <?php else: ?>
      <span class="pull-right interes-<?php echo e($content->id); ?>"><button class="btn btn-primary" onclick="interes(<?php echo e($content->id); ?>)">Me interesa &nbsp; <i class="fa fa-thumb-tack" aria-hidden="true"></i></button></span>
      <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>
</div>
</div>
</div>
</div>

  </body>
</html>
<?php /**PATH /var/www/html/test_2/resources/views/Profesionalpdf_view.blade.php ENDPATH**/ ?>