<div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item <?php echo e(($cual == 1) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Profesionales</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 2) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('empresas-admin')); ?>">Empresas</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 3) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('ofertas-admin')); ?>">Ofertas Laborales</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 4) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('levantamientos-admin')); ?>">Levantamientos</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 5) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('winwin-admin')); ?>">Win Win</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 6) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('contacto-admin')); ?>">Contactos</a>
          </li>
          <li class="nav-item <?php echo e(($cual == 7) ? 'active':''); ?>">
            <a class="nav-link" href="<?php echo e(route('operativos-admin')); ?>">Operativos</a>
          </li>
        </ul>
</div><?php /**PATH /home/ascendin/public_html/resources/views/admin/menu.blade.php ENDPATH**/ ?>