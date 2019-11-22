<?php
    session_start();
    $titulo="tracking";
?>

<?php
    include "../bd/conexion_PDO.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>

    <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">
    

    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">

    <title>Seguimiento de la solicitud</title>
</head>
<body>

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--Se incluye el nav-->
    <?php include_once("../partials/navigation.php") ?>
        
    <div class="p-5">
    <h3>Seguimiento de la solicitud</h3>

    <?php

    //Asignamos el idUser guardado en la sesión a una variable
     $idUser = $_SESSION['idUser'];


    $sql = "SELECT idPeticion from estudiante where idUser=$idUser";


    $consulta2 = $con->query($sql);
        // output data of each row
        while($row = $consulta2->fetch_assoc()) {
            $idPeticion = $row["idPeticion"];
        }
    $con->close();
    
    //Hacemos una consulta para recibir el ultimo formulario de ese id

    // FETCH_ASSOC
        $consulta = $con->prepare("SELECT unidadEncargada, fechaActivacion, fechaFin, estado FROM administrativo WHERE idUser=9 AND idPeticion=3");
        //AMM.. NO SEAS PENDEJO MAÑANA Y RECUERDA QUE TIENES QUE HACER INNER JOIN TRIPLE PARA RELLENAR BIEN ESTA TABLA

    // Especificamos el fetch mode antes de llamar a fetch()
        $consulta->setFetchMode(PDO::FETCH_ASSOC);

     // Ejecutamos
        $consulta->execute();
    ?>

    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl">
        <thead class="thead-dark">
            <tr>
                <th>Unidad Encargada</th> <!--Las opciones son Rectoria, Vida Universitaria y la Comisión-->
                <th>Nombre del Encargado</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                <th class="fit">Detalles</th>
            </tr>
        </thead>
        <tbody>

    <?php 
    // Mostramos los resultados
        while ($row = $consulta->fetch()){
  ?>  
          <tr>
            <td><?php echo $row["unidadEncargada"];?></td>
            <td><?php echo "asdasd"; ?></td>
            <td><?php echo $row["fechaActivacion"];?></td>
            <td><?php echo $row["fechaFin"];?></td>
            <td><?php echo $row["estado"];?></td>
          </tr>
          <?php       }  ?>
        </tbody>
      </table>
</div>

    <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><u>Solicitud de apoyo económico para el congreso mundial de Python 2019    </u></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Cargo del encargado</h6>
                                <p>Secretario de Vida Universitario</p>
                            </div>
                            <div class="col-sm-4">
                                <h6>Nombre del encargado</h6>
                                <p>Raúl Pérez Cabrera</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Fecha</h6>
                                <p>21/10/2019</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Estado</h6>
                                <p>Aprobado</p>
                            </div>
                        </div>
                        <div  class=" form-group shadow-textarea">
                            <h6><label for="comment">Comentario:</label></h6>
                            <textarea class="form-control z-depth-1" rows="5" id="comment">Considero que el estudiante cumple con todos los requisitos pertinentes. Por tanto, apruebo esta solicitud.</textarea>
                        </div>
                    </div>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
        
            </div>
            </div>
        </div>
    </div>
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>
</body>
</html>