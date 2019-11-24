<?php
    session_start();
    $titulo="tracking";
?>

<?php
    include "../bd/conexion.php";
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

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        $idPeticion = $row1["idPeticion"];
    } else {
        echo "No hay ninguna petición creada hasta ahora";
    }

    
    //Hacemos una consulta para recibir el ultimo formulario de ese id

    // FETCH_ASSOC
        $consulta1 = "SELECT unidadEncargada, DATE_FORMAT(fechaActivacion, '%d/%m/%Y') as fechaActivacion, DATE_FORMAT(fechaFin, '%d/%m/%Y') as fechaFin, estado FROM administrativo WHERE idPeticion=3";
        $consulta = $con->query($consulta1);
    

        if ($consulta->num_rows > 0) {
            echo "
            <table class='table table-bordered table-hover table-responsive-lg table-sm track_tbl'>
            <thead class='thead-dark''>
                <tr>
                    <th>Unidad Encargada</th>
                    <th>Nombre del Encargado</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>Estado</th>
                    <th class='fit'>Detalles</th>
                </tr>
            </thead>
            <tbody>
            ";
            // output data of each row
            while($fila = $consulta->fetch_assoc()) {

                if($fila["fechaActivacion"] === NULL)
                {
                    $fechaActivacion = "Fecha no definida";
                }
                else{
                    $fechaActivacion = $fila["fechaActivacion"];
                }

                if($fila["fechaFin"] === NULL)
                {
                    $fechaFin = "Fecha no definida";
                }
                else{
                    $fechaFin = $fila["fechaFin"];
                }

                if(($fila["estado"] === NULL) and $fila["fechaActivacion"] != NULL)
                {
                    $estado = " id='Estado' class='alert-primary'>Recibido";
                }
                else if($fila["estado"] === "Si"){
                    $estado = " id='Estado' class='alert-success'>Aprobado";
                }
                else if($fila["estado"] === "No")
                {
                    $estado = " id='Estado' class='alert-danger'>Denegado";
                }
                else{
                    $estado = " id='Estado' class='alert-warning'>Pendiente";
                }

                $boton = "proximamente";

                echo "
                <tr>
                <td>".$fila["unidadEncargada"]."</td>
                <td>".$fila["unidadEncargada"]."</td>
                <td>".$fechaActivacion."</td>
                <td>".$fechaFin."</td>
                <td ".$estado."</td>
                <td>".$boton."</td>
                </tr>";
            }
            echo "
            </tbody>
            </table>
            ";
        } else {
            echo "0 results";
        }


    ?>
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