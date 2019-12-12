<?php
    session_start();
    $titulo="Revisión de solicitudes";
    require_once('../funciones/funciones.php');
    ControlAcceso($titulo);
    if(isset($_SESSION['idUser'])){
        $idUsuario = $_SESSION['idUser'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>

    <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">

    <link href="../css/general.css" rel="stylesheet">

    <link href="../css/modal.css" rel="stylesheet">

    <title>Revisión de solicitudes</title>
</head>
<body>

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!-- Incluye el menú de navegación -->
    <?php include_once("../partials/navigation.php"); ?>
   
    <div class="col-md-12">
    <!-- Bienvenida del administrativo/a -->
    <?php 
        
        if($_SESSION['idUser'] === 6){
            $nombre = "Vida Universitaria";
        }
        elseif($_SESSION['idUser'] === 10){
            $nombre = "Rectoria";
        }
        else{
            $nombre = $_SESSION['nombre']. " " .$_SESSION['apellido'];
        }

    ?>
    <?php echo "<div class='alert alert-info mt-2' role='alert'>
                    <h4 class='h4-responsive text-center'>Que gusto verle, $nombre</h4>
                </div>"
    ;?>
    <h3>Revisión de solicitudes</h3>
    <div class='card'>
        <div class='card-body table-responsive'>
    <table id='dtMaterialDesignExample' class='table table-bordered table-hover table-responsive-lg table-sm track_tbl' cellspacing='0' width='100%'>
        <thead class="thead-dark  my-auto">
            <tr>
                <th>Número de solicitud</th>
                <th>Cédula del responsable</th>
                <th>Evento</th>
                <th>Fecha de solicitud</th>
                <th>Fecha activación de revisión</th>
                <th>País destino</th>
                <th class="fit">Validación</th>
            </tr>
        </thead>
        <tbody> 
        <?php 
        require_once("../bd/conexion_PDO.php");
        $stmt = $dbh->prepare("SELECT peticion.idPeticion, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombreEstudiante, DATE_FORMAT(administrativo.fechaActivacion, '%d/%m/%Y') as fechaActivacion,
        estudiante.unidadAcademica, peticion.cedulaEncargado, peticion.nombreEvento, peticion.fechaIncio, peticion.lugarEvento, peticion.rutaFormulario, peticion.rutaPDF
        FROM administrativo 
        INNER JOIN peticion ON administrativo.idPeticion = peticion.idPeticion
        INNER JOIN estudiante ON estudiante.idPeticion = peticion.idPeticion
        INNER JOIN usuario ON usuario.idUser = estudiante.idUser
        WHERE administrativo.idUser = $idUsuario
        AND administrativo.fechaFin IS NULL 
        AND administrativo.fechaActivacion IS NOT NULL");
        $stmt->execute();
        for($i=0; $row = $stmt->fetch(); $i++){
        ?>
            <tr>
                <td><?php echo $row['idPeticion']; ?></td>
                <td><?php echo $row['cedulaEncargado']; ?></td>
                <td><?php echo $row['nombreEvento']; ?></td>
                <td><?php echo $row['fechaIncio']; ?></td>
                <td><?php echo $row['fechaActivacion']; ?></td>
                <td><?php echo $row['lugarEvento']; ?></td>
                <td id="Validacion" class="text-center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['idPeticion'];?>">Validar</button></td>
            </tr>
        <div class="modal fade modalAbierto" id="myModal<?php echo $row['idPeticion'];?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-notify modal-info">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="heading lead font-weight-bold">Solicitud de apoyo económico para <?php echo $row['nombreEvento']; ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body container">
                        <form method="POST" class="md-form container" id="modalForm">
                            <h3 class="h3-responsive blue-text">Datos del estudiante</h3>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5 class="h5-responsive teal-text">Nombre del estudiante: <span class="black-text"><?php echo $row['nombreEstudiante']; ?></span></h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="h5-responsive teal-text">Cédula del estudiante: <span class="black-text"><?php echo $row['cedulaEncargado']; ?></span> </h5>
                                </div>
                                <div class="col-sm-1">
                                    <input type="hidden" id="idPeticion" name="idPeticion" value="<?php echo $row['idPeticion']; ?>"></input>
                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario; ?>"></input>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-12">
                                    <h5 class="h5-responsive teal-text">Unidad Académica: <span class="black-text"><?php echo $row['unidadAcademica']; ?></span></h5>
                                </div>
                            </div>
                            <hr>
                            <h3 class="h3-responsive blue-text">Documentos PDF</h3>
                            <div class="row justify-content-center">
                                <a class="btn btn-warning" href="<?php echo $row['rutaFormulario']?>" target="_blank"><i class="fas fa-file-signature mr-1"></i> Ver detalles de la solicitud</a>
                                <a class="btn btn-danger" href="<?php echo $row['rutaPDF'];?>" target="_blank"><i class="fas fa-file-pdf mr-1"></i> Ver documentos anexados a la solicitud</a>
                            </div>
                            <hr>
                            <h3 class="h3-responsive blue-text">Respuesta a la petición del estudiante</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="mdb-select modalSelect md-form md-outline colorful-select dropdown-primary" onchange="document.getElementById('selectRelevancia').value = this.value;">
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <label>Relevancia o nivel del evento</label>
                                    <input type="text" id="selectRelevancia" name="selectRelevancia"></input>
                                </div>
                                <div class="col-sm-5">
                                    <div class="select-outline">
                                        <select class="mdb-select modalSelect md-form md-outline colorful-select dropdown-primary" onchange="document.getElementById('selectProyeccion').value = this.value;">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="Excelente">Excelente</option>
                                            <option value="Buena">Buena</option>
                                            <option value="No tiene">No tiene</option>
                                        </select>
                                        <label>Proyección de la institución a través del evento</label>
                                        <input type="text" id="selectProyeccion" name="selectProyeccion"></input>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <select class="mdb-select modalSelect md-form md-outline colorful-select dropdown-primary" onchange="document.getElementById('selectEstado').value = this.value;">
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                    <label>¿Procede?</label>
                                    <input type="text" id="selectEstado" name="selectEstado"></input>
                                </div>
                            </div>
                            <div class="md-form md-outline mt-2">
                                <textarea id="comentarioAdministrador" class="md-textarea form-control noresize" rows="4" name="comentarioAdministrador"></textarea>
                                <label for="comentarioAdministrador">Justificación y beneficios de la participación</label>
                            </div>
                                    <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info waves-effect" id="submitModal">Enviar <i class="fas fa-check"></i></button>
                            </div>
                            </form>
                    </div>
        
                    
                    
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
        </tbody>
    </table>

    <!-- The Modal -->
    
    </div></div></div>
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>

    <?php include_once("../partials/tablas.php"); ?>
    
<script>
$(document).ready(function() {
$('.modalSelect').materialSelect();
});

function cambioRelevancia(e) {
    document.getElementById("selectRelevancia").value = e.target.value
}

function cambioProyeccion(e) {
    document.getElementById("selectProyeccion").value = e.target.value
}

function cambioEstado(e) {
    document.getElementById("selectEstado").value = e.target.value
}

$(document).ready(function(){
 $('#modalForm').on("submit", function(event){  
  event.preventDefault();  
  if($('#selectRelevancia').val() == "")  
  {  
   alert("Selecciona una opción de Relevancia");  
  }  
  else if($('#selectProyeccion').val() == '')  
  {  
   alert("Selecciona una opción de Proyección");  
  }  
  else if($('#selectEstado').val() == '')
  {  
   alert("Selecciona un Estado");  
  }
  else if($('#comentarioAdministrador').val() == '')
  {  
   alert("Escriba un comentario");  
  }
   
  else  
  {  
   $.ajax({  
    url:"respuestaAdmin.php",  
    method:"POST",  
    data:$('#modalForm').serialize(),  
    success:function(data){  
     $('.modalAbierto .close').click();
     location.reload();
    }  
   });  
  }  
 });

});
</script>

</body>
</html>