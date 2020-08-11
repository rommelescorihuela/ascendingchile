<div id="sidebar-wrapper">

        <ul id="sidebar_menu" class="sidebar-nav">

          <li class="nav-item {{ ($cual == 1) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('dashboard') }}">Profesionales</a>

          </li>

          <li class="nav-item {{ ($cual == 2) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('empresas-admin') }}">Empresas</a>

          </li>

          <li class="nav-item {{ ($cual == 3) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('ofertas-admin') }}">Ofertas Laborales</a>

          </li>

          <li class="nav-item {{ ($cual == 4) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('levantamientos-admin') }}">Levantamientos</a>

          </li>

          <li class="nav-item {{ ($cual == 5) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('winwin-admin') }}">Win Win</a>

          </li>

          <!--<li class="nav-item {{ ($cual == 6) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('contacto-admin') }}">Contactos</a>

          </li>-->

          <li class="nav-item {{ ($cual == 7) ? 'active':'' }}">

            <a class="nav-link" href="{{ route('operativos-admin') }}">Operativos</a>

          </li>

        </ul>

</div>