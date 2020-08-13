<!-- Modal -->
<div class="modal fade" id="info-perfil-{{ $yo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $yo->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel{{ $yo->id }}">Perfil Operativo</h4><a href="{{url('customer/print-pdf',$yo->id)}}">Print PDF</a>
      </div>
      <div class="modal-body">
        <div class="titulo-card">
            Datos Personales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                @auth
                @if(Auth::user()->tipo == 0)
                    <td><b>Fecha de Nacimiento:</b></td>
                    <td>{{ $yo->fnac }}</td>
                </tr><tr>
                    <td><b>Género:</b></td>
                    <td>{{ $yo->genero() }}</td>
                </tr><tr>
                    <td><b>Nacionalidad:</b></td>
                    <td>{{ $yo->nacionalidad }}</td>
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
            Situación Actual
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
        @if($yo->situacion != 0 && $yo->user->experienciasOp->count() > 0)
        <div class="titulo-card">
            Experiencia
        </div>
        <div class="table-responsive">
            @foreach($yo->user->experienciasOp as $xp)
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
                    <td width="70%">{{ $yo->nivel_educ() }}</td>
                </tr>
            </table>
        </div>
        <br>
        @if($yo->user->formacionOp->count() > 0)
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
                @foreach($yo->user->formacionOp as $xp)
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px;" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
