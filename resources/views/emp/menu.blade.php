<div id="sidebar-wrapper">
  <img src="{{ Storage::disk('logos')->url($yo->foto) }}" class="img-perfil" id="archivo">
@if(isset($yo))
  <form method="POST" enctype="multipart/form-data" action="{{ url('foto-edit-empresa') }}">
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
    var fotoActual = "{{ Storage::disk('logos')->url($yo->foto) }}";
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
            <a class="nav-link" href="{{ route('perfil-empresa') }}">Perfil Empresa</a>
          </li>
          <li class="nav-item {{ ($cual == 2) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('oferta-laboral') }}">Publicar Oferta Laboral</a>
          </li>
          <li class="nav-item {{ ($cual == 4) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('mis-ofertas') }}">Mis Ofertas</a>
          </li>
          <li class="nav-item {{ ($cual == 3) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('levantar-perfil') }}">Levantamiento de Perfil</a>
          </li>
        </ul>

        <ul id="sidebar_menu" class="sidebar-nav">
          <li class="nav-item {{ ($cual == 5) ? 'active':'' }}">
            <a class="nav-link" href="{{ route('perfiles-interes') }}">Ver Perfiles de Interés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('perfiles-profesionales') }}">Buscar Perfiles</a>
          </li>
        </ul>
</div>