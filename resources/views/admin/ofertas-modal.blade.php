<!-- Modal -->
<div class="modal fade" id="perfil-oferta-{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $pro->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel{{ $pro->id }}">Perfil Profesional</h4><a href="{{url('customer/Ofertaprint-pdf',$pro->id)}}">Print PDF</a>
      </div>
      <div class="modal-body">
        <div class="titulo-card">
            Datos Generales
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                <tr>
                    <td><b>Cargo:</b></td>
                    <td width="70%">{{ $pro->cargo }}</td>
                </tr>
                <tr>
                    <td><b>Industria:</b></td>
                    <td width="70%">{{ $pro->industria }}</td>
                </tr>
                <tr>
                    <td><b>Lugar:</b></td>
                    <td width="70%">{{ $pro->lugar }}</td>
                </tr>
                <tr>
                    <td><b>Jornada:</b></td>
                    <td width="70%">{{ $pro->jornada }}</td>
                </tr>
                <tr>
                    <td><b>Renta fija:</b></td>
                    <td width="70%">{{ $pro->renta_fija }}</td>
                </tr>
                <tr>
                    <td><b>Renta variable:</b></td>
                    <td width="70%">{{ $pro->renta_variable }}</td>
                </tr>
                <tr>
                    <td><b>Bonos:</b></td>
                    <td width="70%">{{ $pro->bonos }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="titulo-card">
            Descripción
        </div>
        <p>{{ $pro->descripcion }}</p>
        <br>
        <div class="titulo-card">
            Excluyentes
        </div>
        <p>{{ $pro->excluyentes }}</p>
        <br>
        <div class="titulo-card">
            Deseables
        </div>
        <p>{{ $pro->deseables }}</p>
        <br>
        <div class="titulo-card">
            Beneficios
        </div>
        <p>{{ $pro->deseables }}</p>
        <br>
        <div class="titulo-card">
            Por qué
        </div>
        <p>{{ $pro->deseables }}</p>
        <br>
    </div>
  </div>
</div>
</div>
