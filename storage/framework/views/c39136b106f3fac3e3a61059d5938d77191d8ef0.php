<div id="sidebar-wrapper">
  <img src="<?php echo e(Storage::disk('usuarios')->url($yo->foto)); ?>" class="img-perfil" id="archivo">
<?php if(isset($yo)): ?>
  <form method="POST" enctype="multipart/form-data" action="<?php echo e(url('foto-edit')); ?>">
    <?php echo csrf_field(); ?>
    <input type="file" name="foto" id="fotoperfil" required onchange="cambiaFoto(this)">
    <label for="fotoperfil" class="btn btn-info">Cambiar foto</label>
    <?php if ($errors->has('foto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('foto'); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <br>
    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    <button class="btn btn-success guardaFoto" style="display: none;">Guardar</button>
    <button type="button" class="btn btn-warning guardaFoto" style="display: none;" onclick="cancelaFoto()">Cancelar</button>
  </form>
  <script>
    var fotoActual = "<?php echo e(Storage::disk('usuarios')->url($yo->foto)); ?>";
    function cambiaFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            if(input.files[0].type == "image/jpeg" || input.files[0].type == "image/png") {
              reader.onload = function (e) {
                  $('#archivo').attr('src', e.target.result);
                  $('.guardaFoto').show();
              }

              reader.readAsDataURL(input.files[0]);
            } else {
                $('#archivo').attr('src', fotoActual);
                $('.guardaFoto').hide();
                $('input[name=foto]').val("");
                alert("Sólo se permiten imágenes JPG y PNG.");
            }
        } else {
            $('#archivo').attr('src', fotoActual);
            $('.guardaFoto').hide();
            $('input[name=foto]').val("");
        }
    }
    function cancelaFoto() 
    {
      $('input[name=foto]').val("");
      $('input[name=foto]').change();
    }
  </script>
<?php endif; ?>
<br>
        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item <?php echo e(($cual == 1) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('perfil')); ?>">Mi Perfil</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 2) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('resumen')); ?>">Resumen</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 3) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('experiencia')); ?>">Experiencia</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 4) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('formacion')); ?>">Formación</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 5) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('cv')); ?>"><?php echo e(($yo->cv ? 'Ver CV' : 'Adjuntar CV')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#info-perfil-<?php echo e($yo->id); ?>">Ver perfil completo</a>
          </li>
        </ul>

<?php if($yo->cv): ?>
        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item <?php echo e(($cual == 6) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('ofertas-laborales')); ?>">Ver Ofertas Laborales</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 7) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('mis-postulaciones')); ?>">Mis Postulaciones</a>
          </li>
        </ul>
<?php endif; ?>
</div><?php /**PATH D:\Real_Wrok\Camtravel\Ascending\www\resources\views/pro/menu.blade.php ENDPATH**/ ?>