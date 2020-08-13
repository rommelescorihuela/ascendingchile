<!-- Modal -->
<div class="modal fade" id="perfil-oferta-<?php echo e($pro->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($pro->id); ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo e($pro->id); ?>">Perfil Profesional</h4>
      </div>
      <div class="modal-body">
        <div class="titulo-card">
            Datos Generales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Cargo:</b></td>
                    <td width="70%"><?php echo e($pro->cargo); ?></td>
                </tr>
                <tr>
                    <td><b>Industria:</b></td>
                    <td width="70%"><?php echo e($pro->industria); ?></td>
                </tr>
                <tr>
                    <td><b>Lugar:</b></td>
                    <td width="70%"><?php echo e($pro->lugar); ?></td>
                </tr>
                <tr>
                    <td><b>Jornada:</b></td>
                    <td width="70%"><?php echo e($pro->jornada); ?></td>
                </tr>
                <tr>
                    <td><b>Renta fija:</b></td>
                    <td width="70%"><?php echo e($pro->renta_fija); ?></td>
                </tr>
                <tr>
                    <td><b>Renta variable:</b></td>
                    <td width="70%"><?php echo e($pro->renta_variable); ?></td>
                </tr>
                <tr>
                    <td><b>Bonos:</b></td>
                    <td width="70%"><?php echo e($pro->bonos); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="titulo-card">
            Descripción
        </div>
        <p><?php echo e($pro->descripcion); ?></p>
        <br>
        <div class="titulo-card">
            Excluyentes
        </div>
        <p><?php echo e($pro->excluyentes); ?></p>
        <br>
        <div class="titulo-card">
            Deseables
        </div>
        <p><?php echo e($pro->deseables); ?></p>
        <br>
        <div class="titulo-card">
            Beneficios
        </div>
        <p><?php echo e($pro->deseables); ?></p>
        <br>
        <div class="titulo-card">
            Por qué
        </div>
        <p><?php echo e($pro->deseables); ?></p>
        <br>
    </div>
  </div>
</div>
</div>

<?php /**PATH /home/ascendin/public_html/test/resources/views/admin/ofertas-modal.blade.php ENDPATH**/ ?>