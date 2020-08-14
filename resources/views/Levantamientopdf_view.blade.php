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
  <h4 class="modal-title" id="myModalLabel{{ $content->id }}">Levantamiento de perfil</h4>
</div>
<div class="modal-body">
  <div class="titulo-card">
      Datos de levantamiento
  </div>
  <div class="table-responsive">
      <table class="table table-condensed table-hover" style="margin-bottom: 0px;">
                        <tr>
                            <th>Cargo</th>
                            <td>{{ $content->cargo }}</td>
                        </tr>
                        <tr>    
                            <th>Ubicacion de estructura</th>
                            <td>{{ $content->ubicacion }}</td>
                        </tr>
                        <tr>  
                            <th>Superior</th>
                            <td>{{ $content->superior }}</td>
                        </tr>
                        <tr>  
                            <th>Supervisa</th>
                            <td>{{ $content->supervisa }}</td>
                        </tr>
                        <tr>  
                            <th>Proposito</th>
                            <td>{{ $content->proposito }}</td>
                        </tr>
                        <tr>  
                            <th>Funciones</th>

                            <td>{{ $content->funciones }}</td>
                        </tr>
                        <tr>  
                            <th>Competencias</th>
                            <td>{{ $content->competencias }}</td>
                        </tr>
                        <tr>  
                            <th>Comunicacion</th>
                            <td>{{ $content->comunicacion }}</td>
                        </tr>
                        <tr>  
                            <th>Deseable</th>
                            <td>{{ $content->deseables }}</td>
                        </tr>
                        <tr>  
                            <th>Excluyente</th>
                            <td>{{ $content->excluyentes }}</td>
                        </tr>
                        <tr>  

                        </tr>
                    </table>
  </div>


  <br>


  <br>
</div>
</div>
</div>
</div>

  </body>
</html>
