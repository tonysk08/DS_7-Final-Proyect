<?php
    session_start();
    $titulo="Transparencia";

    include "../bd/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once("../partials/head.php"); ?>

      <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">
    
</head>
<body>

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>


    <!-- Incluye el menú de navegación -->
    <?php include_once("../partials/navigation.php"); ?>

    <div class="col-md-12">
    <h2 class="my-4 dark-grey-text font-weight-bold">Transparencia</h2>
    <div class='card'>
        <div class='card-body table-responsive'>
        <table id='dtMaterialDesignExample' class='table table-bordered table-hover table-responsive-lg table-sm track_tbl' cellspacing='0' width='100%'>
        <thead class='thead-dark'>
        <tr>
            <th>No.</th>
            <th>Evento</th>
            <th>Fecha de Resolución</th>
            <th>Cédula del encargado</th>
            <th>País destino</th>
            <th class="fit">Ver detalles</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        require_once "../bd/conexion_PDO.php";
        $stmt = $conPDO->prepare("
        SELECT peticion.idPeticion, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombreEstudiante, 
        estudiante.unidadAcademica, peticion.cedulaEncargado, peticion.nombreEvento, peticion.fechaIncio, 
        peticion.lugarEvento, peticion.rutaAnexoReporte, peticion.rutaReporte, DATE_FORMAT(peticion.fechaFinSolicitud, '%d/%m/%Y') as fechaFinSolicitud
        FROM peticion 
        INNER JOIN estudiante ON estudiante.idPeticion = peticion.idPeticion
        INNER JOIN usuario ON usuario.idUser = estudiante.idUser
        WHERE fechaFinSolicitud IS NOT NULL AND estado = 'Aprobado' OR estado = 'Aceptado'");
        $stmt->execute();
        for($i=0; $row = $stmt->fetch(); $i++){
        ?>
            <tr>
                <td><?php echo $row['idPeticion']; ?></td>
                <td><?php echo $row['nombreEvento']; ?></td>
                <td><?php echo $row['fechaFinSolicitud']; ?></td>
                <td><?php echo $row['cedulaEncargado']; ?></td>
                <td><?php echo $row['lugarEvento']; ?></td>
                <td id="Validacion" class="text-center">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['idPeticion'];?>">Detalles</button></td>
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
                                <a class="btn btn-warning" href="<?php echo $row['rutaReporte']?>" target="_blank"><i class="fas fa-file-signature mr-1"></i> Ver detalles del reporte de viaje</a>
                                <a class="btn btn-danger" href="<?php echo $row['rutaAnexoReporte'];?>" target="_blank"><i class="fas fa-file-pdf mr-1"></i> Ver documentos anexados al reporte de viaje</a>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cerrar</button>
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