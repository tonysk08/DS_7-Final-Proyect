<?php
    session_start();
    $titulo="Revisión de solicitudes";

    require_once('../funciones/funciones.php');
    ControlAcceso();
    require('../bd/conexion.php');
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

    <title>Revisión de solicitudes</title>

</head>
<body>

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--Incluye el nav-->
    <?php include_once("../partials/navigationadmin.php"); ?>

        
    
   
    <div class="p-5">
    <?php 
    if (!isset($_SESSION["sw"])){ 
        //header('Location: ../index.php');
        echo "<script>
                                    alert('ERROR: Inicie Sesión');
                                    window.location= '../index.php'
                                </script>";
    }
    
   
                        
    
    echo "Que gusto verle,"." ".$_SESSION['nombre']. " " .$_SESSION['apellido'];?>
    <br>
    <h3>Revisión de solicitudes</h3>
    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl">
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
            <tr>
                <td id="Número de Solicitud">1074</td>
                <td id="CedulaResponsable">20-24-3998</td>
                <td id="NombreEvento">IBM Think</td>
                <td id="FechaSolicitud">21/09/2019</td>
                <td id="FechaLlegada">25/09/2019</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1076</td>
                <td id="CedulaResponsable">8-98-412</td>
                <td id="NombreEvento">Mobile World Congress</td>
                <td id="FechaSolicitud">24/09/2019</td>
                <td id="FechaLlegada">27/09/2019</td>
                <td id="PaisDestino">España</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1077</td>
                <td id="CedulaResponsable">8-961-745</td>
                <td id="NombreEvento">RSA Conference</td>
                <td id="FechaSolicitud">29/09/2019</td>
                <td id="FechaLlegada">02/10/2019</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1078</td>
                <td id="CedulaResponsable">8-1097-845</td>
                <td id="NombreEvento">DataWorks Summit</td>
                <td id="FechaSolicitud">01/10/2019</td>
                <td id="FechaLlegada">10/10/2019</td>
                <td id="PaisDestino">España</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1079</td>
                <td id="CedulaResponsable">3-10-156</td>
                <td id="NombreEvento">Atlassian Summit 2019</td>
                <td id="FechaSolicitud">03/10/2019</td>
                <td id="FechaLlegada">13/10/2019</td>
                <td id="PaisDestino">España</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1083</td>
                <td id="CedulaResponsable">2-1457-35</td>
                <td id="NombreEvento">Google Cloud Next</td>
                <td id="FechaSolicitud">05/10/2019</td>
                <td id="FechaLlegada">17/10/2019</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1085</td>
                <td id="CedulaResponsable">2-1475-12</td>
                <td id="NombreEvento">F8 – Facebook Developer Conference</td>
                <td id="FechaSolicitud">07/10/2019</td>
                <td id="FechaLlegada">21/10/2019</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1086</td>
                <td id="CedulaResponsable">7-89-5412</td>
                <td id="NombreEvento">Google I/O 2019</td>
                <td id="FechaSolicitud">12/10/2019</td>
                <td id="FechaLlegada">24/10/2019</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
            <tr>
                <td id="Número de Solicitud">1094</td>
                <td id="CedulaResponsable">6-98-12</td>
                <td id="NombreEvento">Global Robot Expo 2019</td>
                <td id="FechaSolicitud">15/10/2019</td>
                <td id="FechaLlegada">28/10/2019</td>
                <td id="PaisDestino">España</td>
                <td id="Validacion" class="text-center"><button type="button" class="btn btn-info">Validar</button></td>
            </tr>
        </tbody>
    </table>

    <!-- The Modal -->
    <div class="modal" id="myModal">
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
                        <div class="col-sm-2">
                            <h6>Última vez que participó en un evento en representación de la UTP</h6>
                            <p>14/10/2016</p>
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
    </div>

    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>
</body>
</html>