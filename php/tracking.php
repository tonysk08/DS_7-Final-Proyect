<?php
    session_start();
    $titulo="Seguimiento de la Solicitud";
    require_once('../funciones/funciones.php');
    /* ControlAcceso($titulo); */   
    $idUser = $_SESSION['idUser'];
    require_once("../bd/conexion_PDO.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once("../partials/head.php"); ?>

      <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">
    

    <!--CSS del menú-->
    <link href="../css/general.css" rel="stylesheet">
</head>
<body>
    <!-- Incluye el header -->
    <?php include_once("../partials/header.php"); ?>

    <!-- Incluye el menú de navegación -->
    <?php include_once("../partials/navigation.php"); ?>

    <div class="col-md-12">

    <h2 class="my-4 dark-grey-text font-weight-bold">Seguimiento de la Solicitud</h2>
    <div class='card'>
    <div class='card-body table-responsive'>
    <table id='dtMaterialDesignExample' class='table table-bordered table-hover table-responsive-lg table-sm track_tbl' cellspacing='0' width='100%'>
        <thead class='thead-dark'>
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
    <?php 
    require_once "../bd/conexion_PDO.php";

    //ESTA
    $sql0 = $conPDO->prepare("SELECT estudiante.idPeticion, peticion.nombreEvento FROM estudiante INNER JOIN peticion ON estudiante.idPeticion = peticion.idPeticion WHERE estudiante.idUser = $idUser ORDER BY estudiante.idPeticion desc LIMIT 1");
    $sql0->execute();
    $fila = $sql0->fetch();
    $idPeticion = $fila['idPeticion'];
    $nombreEvento = $fila["nombreEvento"];

    //ESTA NO
    $stmt = $conPDO->prepare("SELECT administrativo.idUser, administrativo.unidadEncargada, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombreAdministrativo, DATE_FORMAT(administrativo.fechaActivacion, '%d/%m/%Y') as fechaActivacion, DATE_FORMAT(administrativo.fechaFin, '%d/%m/%Y') as fechaFin, administrativo.estado AS estado, administrativo.comentario FROM administrativo INNER JOIN usuario ON administrativo.idUser = usuario.idUser WHERE administrativo.idPeticion = $idPeticion");
    $stmt->execute();
    for($i=0; $row = $stmt->fetch(); $i++){
        if($row["fechaActivacion"] === NULL)
            {$fechaActivacion = "Aún no recibe el documento";}
            else{$fechaActivacion = $row["fechaActivacion"];}

            if($row["fechaFin"] === NULL)
            {$fechaFin = "Aún no finaliza su decisión";}
            else{$fechaFin = $row["fechaFin"];}

            if(($row["estado"] === NULL) and $row["fechaActivacion"] != NULL)
            {$estado = "<td id='Estado' class='alert-primary pl-2'>Recibido";
             $estadoTexto = "Recibido";}
            else if($row["estado"] === "Si")
            {$estado = "<td id='Estado' class='alert-success pl-2'>Aprobado";
             $estadoTexto = "Aprobado";}
            else if($row["estado"] === "No")
            {$estado = "<td id='Estado' class='alert-danger pl-2'>Denegado";
             $estadoTexto = "Denegado";}
            else{$estado = "<td id='Estado' class='alert-warning pl-2'>Pendiente";
             $estadoTexto = "Pendiente";}

            if($row["nombreAdministrativo"] === NULL)
            {$nombreAdministrativo = "- - - - - - - - - - - - - -";}
            else{$nombreAdministrativo = $row["nombreAdministrativo"];}

            if($row["comentario"] === NULL)
            {$comentario = "Sin comentarios de momento";}
            else{$comentario = $row["comentario"];}

            /* Hasta aqui vamos bien */
    ?>

        <tr>
            <td class='pl-2'><?php echo $row['unidadEncargada']; ?></td>
            <td class='pl-2'><?php echo $nombreAdministrativo; ?></td>
            <td class='pl-2'><?php echo $fechaActivacion; ?></td>
            <td class='pl-2'><?php echo $fechaFin; ?></td>
            <?php echo $estado; ?></td>
            <td id='MasDetalles' class='text-center'><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal<?php echo $row['idUser']; ?>'>Detalles</button></td>
        </tr>

        <div class="modal" id="myModal<?php echo $row['idUser']; ?>">
        <div class='modal-dialog modal-dialog-centered modal-xl'>
            <div class='modal-content'>
                <!-- Modal Header -->
                <div class='modal-header'>
                    <h4 class='modal-title'>Solicitud de apoyo económico para <?php echo $nombreEvento; ?>.</h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>
                <!-- Modal body -->
                <div class='modal-body'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <h6>Unidad Encagada</h6>
                                <p><?php echo $row['unidadEncargada']; ?></p>
                            </div>
                            <div class='col-sm-4'>
                                <h6>Nombre del encargado</h6>
                                <p><?php echo $nombreAdministrativo; ?></p>
                            </div>
                            <div class='col-sm-2'>
                                <h6>Fecha de Resolución</h6>
                                <p><?php echo $fechaFin; ?></p>
                            </div>
                            <div class='col-sm-2'>
                                <h6>Estado</h6>
                                <p><?php echo $estadoTexto; ?></p>
                            </div>
                        </div>
                        <div  class=' form-group shadow-textarea'>
                            <h6><label for='comment'>Comentario:</label></h6>
                            <p><?php echo $comentario; ?></p>
                        </div>
                    </div>
                </div>
        
                <!-- Modal footer -->
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                </div>
        
            </div>
                    </div>
                </div>
    </div>
    <?php } ?>
    </tbody>
    </table>

    <!-- The Modal -->
    
    </div>
    <!--Incluye el footer-->
    <?php include_once("../partials/footer.php"); ?>
    </div>
    </div>

    <?php include_once("../partials/tablas.php"); ?>
      
</body>
</html>