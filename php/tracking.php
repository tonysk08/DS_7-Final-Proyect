<?php
    session_start();
    $titulo="Seguimiento de la Solicitud";

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


    $sql = "SELECT estudiante.idPeticion, peticion.nombreEvento FROM estudiante INNER JOIN peticion ON estudiante.idPeticion = peticion.idPeticion WHERE estudiante.idUser = $idUser";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        $idPeticion = $row1["idPeticion"];
        $nombreEvento = $row1["nombreEvento"];
    

    
    //Hacemos una consulta para recibir el ultimo formulario de ese id

    // FETCH_ASSOC
        $consulta1 = "SELECT administrativo.idUser, administrativo.unidadEncargada, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombreAdministrativo, DATE_FORMAT(administrativo.fechaActivacion, '%d/%m/%Y') as fechaActivacion, DATE_FORMAT(administrativo.fechaFin, '%d/%m/%Y') as fechaFin, administrativo.estado AS estado, administrativo.comentario FROM administrativo INNER JOIN usuario ON administrativo.idUser = usuario.idUser WHERE administrativo.idPeticion = $idPeticion";
        $consulta = $con->query($consulta1);
    

        if ($consulta->num_rows > 0) {
            echo "
            <table class='table table-bordered table-hover table-responsive-lg table-sm track_tbl'>
            <thead class='thead-dark''>
                <tr>
                    <th class='pl-2'>Unidad Encargada</th>
                    <th class='pl-2'>Nombre del Encargado</th>
                    <th class='pl-2'>Fecha de Recibimiento</th>
                    <th class='pl-2'>Fecha de Resolución</th>
                    <th class='pl-2'>Estado</th>
                    <th class='fit pl-2'>Detalles</th>
                </tr>
            </thead>
            <tbody>
            ";
            // output data of each row
            while($fila = $consulta->fetch_assoc()) {

                if($fila["fechaActivacion"] === NULL)
                {
                    $fechaActivacion = "Aún no recibe el documento";
                }
                else{
                    $fechaActivacion = $fila["fechaActivacion"];
                }

                if($fila["fechaFin"] === NULL)
                {
                    $fechaFin = "Aún no finaliza su decisión";
                }
                else{
                    $fechaFin = $fila["fechaFin"];
                }

                if(($fila["estado"] === NULL) and $fila["fechaActivacion"] != NULL)
                {
                    $estado = " id='Estado' class='alert-primary pl-2'>Recibido";
                    $estadoTexto = "Recibido";
                }
                else if($fila["estado"] === "Si"){
                    $estado = " id='Estado' class='alert-success pl-2'>Aprobado";
                    $estadoTexto = "Aprobado";
                }
                else if($fila["estado"] === "No")
                {
                    $estado = " id='Estado' class='alert-danger pl-2'>Denegado";
                    $estadoTexto = "Denegado";
                }
                else{
                    $estado = " id='Estado' class='alert-warning pl-2'>Pendiente";
                    $estadoTexto = "Pendiente";
                }

                if($fila["nombreAdministrativo"] === NULL){
                    $nombreAdministrativo = "- - - - - - - - - - - - - -";
                }
                else{
                    $nombreAdministrativo = $fila["nombreAdministrativo"];
                }

                if($fila["comentario"] === NULL){
                    $comentario = "Sin comentarios de momento";
                }
                else{
                    $comentario = $fila["comentario"];
                }

                echo "
                <tr>
                <td class='pl-2'>".$fila["unidadEncargada"]."</td>
                <td class='pl-2'>".$nombreAdministrativo."</td>
                <td class='pl-2'>".$fechaActivacion."</td>
                <td class='pl-2'>".$fechaFin."</td>
                <td ".$estado."</td>
                <td id='MasDetalles' class='text-center'><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal".$fila["idUser"]."'>Detalles</button></td>
                </tr>";

                echo "<div class='modal' id='myModal".$fila["idUser"]."'>
                <div class='modal-dialog modal-dialog-centered modal-xl'>
                <div class='modal-content'>
            
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'><u>Solicitud de apoyo económico para ".$nombreEvento."    </u></h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class='modal-body'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-4'>
                                    <h6>Unidad Encagada</h6>
                                    <p>".$fila["unidadEncargada"]."</p>
                                </div>
                                <div class='col-sm-4'>
                                    <h6>Nombre del encargado</h6>
                                    <p>".$nombreAdministrativo."</p>
                                </div>
                                <div class='col-sm-2'>
                                    <h6>Fecha de Resolución</h6>
                                    <p>".$fechaFin."</p>
                                </div>
                                <div class='col-sm-2'>
                                    <h6>Estado</h6>
                                    <p>".$estadoTexto."</p>
                                </div>
    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl">
        <thead class="thead-dark">
            <tr>
                <th>Cargo del Encargado</th>
                <th>Nombre del Encargado</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                <th class="fit">Detalles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="CargoEncargado">Secretario de Vida Universitario</td>
                <td id="NombreEncargado">Raúl Pérez Cabrera</td>
                <td id="FechaInicio">21/10/2019</td>
                <td id="FechaFinalizacion">31/11/2019</td>
                <td id="Estado" class="alert-success">Aprobado</td> 
                <!-- Button to Open the Modal -->
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Detalles</button></td>
            </tr>
            <tr>
                <td id="CargoEncargado">Secretario de Vida Universitario</td>
                <td id="NombreEncargado">Raúl Pérez Cabrera</td>
                <td id="FechaInicio">21/10/2019</td>
                <td id="FechaFinalizacion">31/11/2019</td>
                <td id="Estado" class="alert-danger">Denegado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info btn-sm">Detalles</button></td>
            </tr>
            <tr>
                <td id="CargoEncargado">Secretario de Vida Universitario</td>
                <td id="NombreEncargado">Raúl Pérez Cabrera</td>
                <td id="FechaInicio">21/10/2019</td>
                <td id="FechaFinalizacion">31/11/2019</td>
                <td id="Estado" class="alert-warning">Pendiente</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info btn-sm">Detalles</button></td>
            </tr>
            <tr>
                <td id="CargoEncargado">Rectoría</td>
                <td id="NombreEncargado">Raúl Pérez Cabrera</td>
                <td id="FechaInicio">21/10/2019</td>
                <td id="FechaFinalizacion">31/11/2019</td>
                <td id="Estado" class="alert-primary">Recibido</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info btn-sm">Detalles</button></td>
            </tr>
            <tr>
                <td id="CargoEncargado">Secretario de Vida Universitario</td>
                <td id="NombreEncargado">Raúl Pérez Cabrera</td>
                <td id="FechaInicio">21/10/2019</td>
                <td id="FechaFinalizacion">31/11/2019</td>
                <td id="Estado" class="alert-primary">Recibido</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info btn-sm">Detalles</button></td>
            </tr>
        </tbody>
    </table>


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
                            <div  class=' form-group shadow-textarea'>
                                <h6><label for='comment'>Comentario:</label></h6>
                                <p>".$comentario."</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Modal footer -->
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                    </div>
            
                </div>
                </div>
            </div>";

            }
            echo "
            </tbody>
            </table>
            ";

        } else {
            echo "No hay ninguna petición creada hasta ahora. Error 101.   ";
        }

    }else {
        echo "No hay ninguna petición creada hasta ahora. Error 102.     ";

        $consultaRellenarCampos = "SELECT idPeticion FROM peticion ORDER BY idPeticion DESC LIMIT 1";

        $result = $con->query($consultaRellenarCampos);    
        $row1 = $result->fetch_assoc();
        $idPeticion = $row1["idPeticion"];

        
        $unidadAcademica = $_SESSION['unidadAcademica'];
        $idUser = $_SESSION['idUser'];

        $fechaActivacion = date('Y/m/d');
        
         //Prueba rafa
        $sql3 = 
        "
        INSERT 
        INTO estudiante 
        (idPeticion, idUser, unidadAcademica) 
        VALUES ($idPeticion , $idUser, 'FISC');

        INSERT 
        INTO administrativo 
        (idUser, idPeticion, unidadEncargada) 
        VALUES 
        (6, $idPeticion, 'Vida Universitaria'),
        (7, $idPeticion, 'Comite Evaluador-Vicerrector Academico'),  
        (8, $idPeticion, 'Comite Evaluador-Secretario General'), 
        (9, $idPeticion, 'Comite Evaluador-Coodinador General de los Centros Regionales'), 
        (10, $idPeticion, 'Rectoria');
        
        UPDATE administrativo SET fechaActivacion=CURRENT_TIMESTAMP WHERE idUser=6 AND idPeticion=$idPeticion";
    
        if ($con->multi_query($sql3) === TRUE) {
            echo "Filas creadas y actualizadas correctamente";
            header('Location: tracking.php');
        } else {
        echo "Error: " . $sql3 . "<br>" . $con->error;
        } 
    }


    ?>
</div>

    </div>
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>
</body>
</html>