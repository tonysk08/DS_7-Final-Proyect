<?php

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

    // FETCH_ASSOC
        $consulta = $con->prepare("SELECT cedulaEncargado, descripcion, proyeccion FROM peticion where cedulaEncargado='20-24-3998'");

    // Especificamos el fetch mode antes de llamar a fetch()
        $consulta->setFetchMode(PDO::FETCH_ASSOC);

     // Ejecutamos
        $consulta->execute();
    ?>



    <?php 
    // Mostramos los resultados
        while ($row = $consulta->fetch()){
  ?>  
    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl">
        <thead class="thead-dark">
          <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $row["cedulaEncargado"];?></td>
              <td><?php echo $row["descripcion"]; ?></td>
              <td><?php echo $row["proyeccion"];?></td>
              

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