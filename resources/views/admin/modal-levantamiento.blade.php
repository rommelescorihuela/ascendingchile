<div class="modal fade" id="modal-levantamiento-{{ $pro->id }}">
    <div class="modal-dialog modal-lg" role="document"">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel{{ $pro->id }}">Levantamiento</h4>
                <a href="{{url('customer/Levantamientoprint-pdf',$pro->id)}}">Print PDF</a>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <th>Cargo</th>
                            <td>{{ $pro->cargo }}</td>
                        </tr>
                        <tr>    
                            <th>Ubicacion de estructura</th>
                            <td>{{ $pro->ubicacion }}</td>
                        </tr>
                        <tr>  
                            <th>Superior</th>
                            <td>{{ $pro->superior }}</td>
                        </tr>
                        <tr>  
                            <th>Supervisa</th>
                            <td>{{ $pro->supervisa }}</td>
                        </tr>
                        <tr>  
                            <th>Proposito</th>
                            <td>{{ $pro->proposito }}</td>
                        </tr>
                        <tr>  
                            <th>Funciones</th>

                            <td>{{ $pro->funciones }}</td>
                        </tr>
                        <tr>  
                            <th>Competencias</th>
                            <td>{{ $pro->competencias }}</td>
                        </tr>
                        <tr>  
                            <th>Comunicacion</th>
                            <td>{{ $pro->comunicacion }}</td>
                        </tr>
                        <tr>  
                            <th>Deseable</th>
                            <td>{{ $pro->deseables }}</td>
                        </tr>
                        <tr>  
                            <th>Excluyente</th>
                            <td>{{ $pro->excluyentes }}</td>
                        </tr>
                        <tr>  

                        </tr>
                    </table>
                </div>    
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>