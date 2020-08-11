<div id="sidebar-wrapper">
  <img src="{{ Storage::disk('usuarios')->url($yo->foto) }}" class="img-perfil" id="archivo">
@if(isset($yo))
  <form method="POST" enctype="multipart/form-data" action="{{ url('foto-op-edit') }}">
    @csrf
    <input type="file" name="foto" id="fotoperfil" required onchange="cambiaFoto(this)">
    <label for="fotoperfil" class="btn btn-info">Cambiar foto</label>
    @error('foto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        <br>
    @enderror
    <button class="btn btn-success guardaFoto" style="display: none;">Guardar</button>
    <button type="button" class="btn btn-warning guardaFoto" style="display: none;" onclick="cancelaFoto()">Cancelar</button>
  </form>
  <script>
    var fotoActual = "{{ Storage::disk('usuarios')->url($yo->foto) }}";
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
@endif
<br>
        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item {{ ($cual == 1) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('perfil-op') }}">Mi Perfil</a>
          </li>
          <li class="nav-item {{ ($cual == 2) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('situacion-op') }}">Situación Actual</a>
          </li>
          <li class="nav-item {{ ($cual == 3) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('experiencia-op') }}">Experiencia</a>
          </li>
          <li class="nav-item {{ ($cual == 4) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('formacion-op') }}">Formación</a>
          </li>
          <li class="nav-item {{ ($cual == 5) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('cv-op') }}">{{ ($yo->cv ? 'Ver CV' : 'Adjuntar CV') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#info-perfil-{{ $yo->id }}">Ver perfil completo</a>
          </li>
        </ul>

@if($yo->cv)
        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item {{ ($cual == 6) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('ofertas-laborales-op') }}">Ver Ofertas Laborales</a>
          </li>
          <li class="nav-item {{ ($cual == 7) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('mis-postulaciones-op') }}">Mis Postulaciones</a>
          </li>
        </ul>
@endif
</div>