<?php
    session_start();
    $titulo="Revisión de solicitudes";
    require_once('../funciones/funciones.php');
    /* ControlAcceso($titulo); */
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
    <?php echo "Que gusto verle,"." ".$_SESSION['nombre']. " " .$_SESSION['apellido'];?>
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
        
        $stmt = $conPDO->prepare("SELECT peticion.idPeticion, peticion.cedulaEncargado, peticion.nombreEvento, peticion.fechaIncio, peticion.fechaFin, peticion.lugarEvento FROM administrativo INNER JOIN peticion ON administrativo.idPeticion = peticion.idPeticion WHERE administrativo.idUser = $idUsuario AND administrativo.fechaFin IS NULL AND administrativo.fechaActivacion IS NOT NULL");
        $stmt->execute();
        for($i=0; $row = $stmt->fetch(); $i++){
        ?>
            <tr>
                <td><?php echo $row['idPeticion']; ?></td>
                <td><?php echo $row['cedulaEncargado']; ?></td>
                <td><?php echo $row['nombreEvento']; ?></td>
                <td><?php echo $row['fechaIncio']; ?></td>
                <td><?php echo $row['fechaFin']; ?></td>
                <td><?php echo $row['lugarEvento']; ?></td>
                <td id="Validacion" class="text-center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['idPeticion'];?>">Validar</button></td>
            </tr>
            <div class="modal" id="myModal<?php echo $row['idPeticion'];?>">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><u>Solicitud de apoyo económico para IBM Think 2020</u></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Nombre encargado</h6>
                            <p>Rafael Pérez</p>
                        </div>
                        <div class="col-sm-2">
                            <h6>Cédula encargado</h6>
                            <p>20-24-3998</p>
                        </div>
                        <div class="col-sm-7">
                            <h6>Unidad Académica</h6>
                            <p>Facultad de Ingeniería de Sistemas Computacionales</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-3">
                            <h6>Nombre del evento</h6>
                            <p>IBM Think 2020</p>
                        </div>
                        <div class="col-sm-2">
                            <h6>Tipo de evento</h6>
                            <p>Cultural</p>
                        </div>
                        <div class="col-sm-7">
                            <h6>Descripción del evento</h6>
                            <p>IBM Think es una conferencia que se centra en soluciones movilidad, cloud computing, seguridad, inteligencia artificial, machine learning e inteligencia artificial. El objetivo de la edición de este año es ayudar a las empresas a construir «compañías  digitales  verdaderamente cognitivas y orientadas al cliente».</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <h6>Alcance del evento</h6>
                            <p>Internacional</p>
                        </div>
                        <div class="col-sm-3">
                            <h6>Lugar del evennto</h6>
                            <p>Estados Unidos</p>
                        </div>
                        <div class="col-sm-3">
                            <h6>Proyección de la Institución a través del evento</h6>
                            <p>Excelente</p>
                        </div>
                        <div class="col-sm-2">
                            <h6>Fecha de inicio del evento</h6>
                            <p>25/02/2020</p>
                        </div>
                        <div class="col-sm-2">
                            <h6>Fecha de finalización del evento</h6>
                            <p>27/02/2020</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-3">
                            <h6>Apoyo ofrecido por organizadores o patrocinadores del evento</h6>
                            <p>Inscripción, Hospedaje, Gastos de Viaje</p>
                        </div>
                        <div class="col-sm-3">
                            <h6>Apoyo solicitado a UTP</h6>
                            <p>Apoyo Económico ($200)</p>
                        </div>
                        <div class="col-sm-4">
                            <h6>Justificación y beneficios de la participación</h6>
                            <p>Es una oportunidad única para la universidad de tener un representante en un congreso de fama mundial</p>
                        </div>
                    </div>
                    <div class="row col-sm-11">
                        <h6>Otros comentarios:</h6>
                        <p>Secretario de Vida Univesitario (Aprobado): Considero que es una gran oportunidad para la universidad y el estudiante, no veo porque tendríamos que rechazarlo</p>
                        <p>Secretario de Vida Univesitario (Aprobado): Es uno de los mayores eventos tecnológicos a nivel mundial y un estudiante nos representará, sin duda es una gran oportunidad.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Relevancia o nivel del evento</h6>
                            <select class="form-control">
                                <option>Alto</option>
                                <option>Medio</option>
                                <option>Bajo</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <h6>Proyección de la institución a través del evento</h6>
                            <select class="form-control">
                                <option>Excelente</option>
                                <option>Buena</option>
                                <option>No tiene</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <h6>Procede</h6>
                            <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class=" form-group shadow-textarea mt-3">
                        <h6><label for="comment">Observaciones y recomendaciones del comité evaluador:</label></h6>
                        <textarea class="form-control z-depth-1" rows="5" id="comment"></textarea>
                    </div>
                </div>
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
            </div>
    
        </div>
        </div>
    </div>
        <?php } ?>
        </tbody>
    </table>

    <!-- The Modal -->
    
    </div></div><?php include_once ("../partials/footer.php"); ?></div>
    <!--Incluye el footer-->
    
    <?php include_once("../partials/tablas.php"); ?>
</body>
</html>