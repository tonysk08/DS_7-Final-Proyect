<?php

    $titulo="Solicitudes";
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
    
    <title>Transparencia - Solicitudes del 2019</title>
</head>
<body>
    
    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>
    
    <!--Incluye el nav-->
    <?php include_once("../partials/navigationpublic.php"); ?>



    <div class="p-5 mt-n3">
    <h3 class="mt-5">Transparencia - Solicitudes del 2019</h3>
    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl mt-3">
        <thead class="thead-dark  my-auto">
            <tr>
                <th>No.</th>
                <th>Evento</th>
                <th>Fecha de Resolución</th>
                <th>Cédula del estudiante</th>
                <th>País de destino</th>
                <th>Estado de la resolución</th>
                <th class="fit">Detalles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="NoResolucion">1</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">21/10/2019</td>
                <td id="CedulaEstudiante">20-24-3998</td>
                <td id="PaisDestino">España</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">2</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">22/10/2019</td>
                <td id="CedulaEstudiante">20-14-3698</td>
                <td id="PaisDestino">Brazil</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">3</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">23/11/2019</td>
                <td id="CedulaEstudiante">8-935-1097</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">4</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">23/11/2019</td>
                <td id="CedulaEstudiante">8-935-1097</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">5</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">25/11/2019</td>
                <td id="CedulaEstudiante">2-248-2794</td>
                <td id="PaisDestino">India</td>
                <td id="EstadoResolucion" class="alert-primary">Recibido</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">6</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">25/11/2019</td>
                <td id="CedulaEstudiante">2-248-2794</td>
                <td id="PaisDestino">India</td>
                <td id="EstadoResolucion" class="alert-primary">Recibido</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">7</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">28/12/2019</td>
                <td id="CedulaEstudiante">2-32-987</td>
                <td id="PaisDestino">China</td>
                <td id="EstadoResolucion" class="alert-warning">Pendiente</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">8</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">29/12/2019</td>
                <td id="CedulaEstudiante">7-985-32</td>
                <td id="PaisDestino">Japón</td>
                <td id="EstadoResolucion" class="alert-danger">Denegado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info" href="#demo" data-toggle="collapse">Detalles</button></td>
            </tr>
        </tbody>
    </table>

    <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><u>Solicitud de apoyo económico para IBM Think 2019</u></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nombre del estudiante encargado</h6>
                                <p>Rafael Pérez</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Cédula del estudiante encargado</h6>
                                <p>20-24-3998</p>
                            </div>
                            <div class="col-sm-6">
                                <h6>Unidad Académica</h6>
                                <p>Facultad de Ingeniería de Sistemas Computacionales</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nombre del evento</h6>
                                <p>IBM Think 2019</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Tipo de evento</h6>
                                <p>Cultural</p>
                            </div>
                            <div class="col-sm-6">
                                <h6>Descripción del evento</h6>
                                <p>IBM Think es una conferencia que se centra en soluciones movilidad, cloud computing, seguridad, inteligencia artificial, machine learning e inteligencia artificial. El objetivo de la edición de este año es ayudar a las empresas a construir «compañías  digitales  verdaderamente cognitivas y orientadas al cliente».</p>
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