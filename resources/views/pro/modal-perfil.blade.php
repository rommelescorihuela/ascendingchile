<!-- Modal -->
<div class="modal fade" id="info-perfil-{{ $yo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $yo->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel{{ $yo->id }}">Perfil Profesional</h4>
      </div>
      <div class="modal-body">
        <div class="titulo-card">
            Datos Personales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Título profesional:</b></td>
                    <td width="70%">{{ $yo->titulos->profesion }}</td>
                </tr><tr>
                @auth
                @if(Auth::user()->tipo == 0)
                    <td><b>Fecha de Nacimiento:</b></td>
                    <td>{{ $yo->fnac }}</td>
                </tr><tr>
                    <td><b>Género:</b></td>
                    <td>{{ $yo->genero() }}</td>
                </tr><tr>
                    <td><b>Dirección:</b></td>
                    <td>{{ $yo->direccion }}</td>
                </tr><tr>
                    <td><b>Comuna:</b></td>
                    <td>{{ $yo->comuna->comuna }}</td>
                </tr><tr>
                    <td><b>Estado Civil:</b></td>
                    <td>{{ $yo->civil() }}</td>
                </tr><tr>
                    <td><b>Número de Hijos:</b></td>
                    <td>{{ $yo->hijos }}</td>
                </tr><tr>
                @endif
                @endauth
                    <td><b>AFP:</b></td>
                    <td>{{ \DB::table('afps')->where('id', $yo->afp)->first()->afp }}</td>
                </tr><tr>
                    <td><b>Salud:</b></td>
                    <td>{{ \DB::table('isapres')->where('id', $yo->salud)->first()->isapre }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="titulo-card">
            Resumen Ejecutivo
        </div>
        <p>{{ $yo->resumen }}</p>
        <br>
        <div class="titulo-card">
            Situación Laboral Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%">{{ $yo->situacion() }}</td>
                </tr><tr>
                    <td><b>Expectativas de Renta:</b></td>
                    <td>CLP ${{ $yo->renta }}</td>
                </tr><tr>
                @if($yo->situacion != 0)
                    <td><b>Cargo que desempeña:</b></td>
                    <td>{{ $yo->cargo }}</td>
                </tr><tr>
                @endif
                    <td><b>¿Por qué te deberían contratar?:</b></td>
                    <td>{{ $yo->porque }}</td>
                </tr>
            </table>
        </div>
        <br>
        @if($yo->situacion != 0 && $yo->user->experiencias->count() > 0)
        <div class="titulo-card">
            Experiencia
        </div>
        <div class="table-responsive">
            @foreach($yo->user->experiencias as $xp)
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
        </div>
        <br>
        @endif
        <div class="titulo-card">
            Situación Académica Actual
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Situación:</b></td>
                    <td width="70%">{{ $yo->situacion_acad() }}</td>
                </tr><tr>
                    <td><b>Dominio de inglés:</b></td>
                    <td>{{ $yo->ingles() }}</td>
                </tr>
            </table>
        </div>
        <br>
        @if($yo->user->formacion->count() > 0)
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
                @foreach($yo->user->formacion as $xp)
                  <tr>
                    <td>{{ $xp->profesion }}</td>
                    <td>{{ DB::table('casas')->where('id', $xp->casa)->first()->casa }}</td>
                    <td>{{ \Carbon\Carbon::parse($xp->periodo_desde)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($xp->periodo_hasta)->format('d-m-Y') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <br>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px;" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
