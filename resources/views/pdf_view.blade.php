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
  <div class="titulo-card">
      Datos Personales
  </div>
  <div class="table-responsive">
      <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
          <tr>
          @auth
          @if(Auth::user()->tipo == 0)
              <td><b>Fecha de Nacimiento:</b></td>
              <td>{{ $content->fnac }}</td>
          </tr><tr>
              <td><b>Género:</b></td>
              <td>{{ $content->genero() }}</td>
          </tr><tr>
              <td><b>Nacionalidad:</b></td>
              <td>{{ $content->nacionalidad }}</td>
          </tr><tr>
              <td><b>Dirección:</b></td>
              <td>{{ $content->direccion }}</td>
          </tr><tr>
              <td><b>Comuna:</b></td>
              <td>{{ $content->comuna->comuna }}</td>
          </tr><tr>
              <td><b>Estado Civil:</b></td>
              <td>{{ $content->civil() }}</td>
          </tr><tr>
          @endif
          @endauth
              <td><b>AFP:</b></td>
              <td>{{ \DB::table('afps')->where('id', $content->afp)->first()->afp }}</td>
          </tr><tr>
              <td><b>Salud:</b></td>
              <td>{{ \DB::table('isapres')->where('id', $content->salud)->first()->isapre }}</td>
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
              <td width="70%">{{ $content->situacion() }}</td>
          </tr><tr>
              <td><b>Expectativas de Renta:</b></td>
              <td>CLP ${{ $content->renta }}</td>
          </tr><tr>
          @if($content->situacion != 0)
              <td><b>Cargo que desempeña:</b></td>
              <td>{{ $content->cargo }}</td>
          </tr><tr>
          @endif
              <td><b>¿Por qué te deberían contratar?:</b></td>
              <td>{{ $content->porque }}</td>
          </tr>
      </table>
  </div>
  <br>
  @if($content->situacion != 0 && $content->user->experienciasOp->count() > 0)
  <div class="titulo-card">
      Experiencia
  </div>
  <div class="table-responsive">
      @foreach($content->user->experienciasOp as $xp)
      <table class="table table-bordered">
          @if(!empty($xp->cargo))
            <tr style="background-color:#CCC;color:#000">
              <th scope="row">Cargo</th>
              <td width="70%">{{ $xp->cargo }}</td>
            </tr>
          @endif
          @if(!empty($xp->empresa))
            <tr>
              <th scope="row">Empresa</th>
              <td>{{ $xp->empresa }}</td>
            </tr>
          @endif
          @if(!empty($xp->industria))
            <tr>
              <th scope="row">Industria</th>
              <td>{{ DB::table('industria')->where('id', $xp->industria)->first()->industria }}</td>
            </tr>
          @endif
          @if(!empty($xp->periodo_desde) && !empty($xp->periodo_hasta))
            <tr>
              <th scope="row">Periodo</th>
              <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
            </tr>
          @endif
          @if(!empty($xp->responsabilidades))
            <tr>
              <th scope="row">Responsabilidades</th>
              <td>{{ $xp->responsabilidades }}</td>
            </tr>
          @endif
          @if(!empty($xp->logros))
            <tr>
              <th scope="row">Logros</th>
              <td>{{ $xp->logros }}</td>
            </tr>
          @endif
      </table>
      @endforeach
      <br>
      @endif
    </div>
    <div class="titulo-card">
        Situación Académica Actual
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
            <tr>
                <td><b>Situación:</b></td>
                <td width="70%">{{ $content->nivel_educ() }}</td>
            </tr>
        </table>
    </div>
    <br>
    @if($content->user->formacionOp->count() > 0)
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
            @foreach($content->user->formacionOp as $xp)
              <tr>
                <td>{{ $xp->curso }}</td>
                <td>{{ $xp->casa }}</td>
                <td>{{ $xp->duracion }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <br>
    @endif
  </div>
  </body>
</html>
