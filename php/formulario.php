<!DOCTYPE html>
<html>

<head>
	
	  <!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>
    <title><?php echo $titulo ?? "SAEE"?></title>
    <link href="../css/estilo.css" rel="stylesheet">
    
    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">

    <title>Formulario RUTP-FV-4(M)</title>
</head>

<body class="cuerpo">

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--Se incluye el nav-->
    <?php include_once("../partials/navigation.php") ?>

<section class="formulario mb-3">
          <br>
          <div class="container p-4">
          <h2 class="text-center"><span>Formulario de registro de solicitud RUTP-FV-4(M)</span></h2><br><br>
          <h3>Información de los estudiantes:</h3>
           <section>
           
            
            	<div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="nomu">Nombre:</label>
                    <input type="text" class="form-control" id="nomu" placeholder="Ingrese el Nombre" name="nomus" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="apell">Apellido:</label>
                    <input type="text" class="form-control" id="apell" placeholder="Ingrese el Apellido" name="apellu" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="ced">Cédula:</label>
                    <input type="text" class="form-control" id="ced" placeholder="Ingrese la Cédula" name="cedu" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="unac">Unidad académica:</label>
                    <input type="text" class="form-control" id="unac" placeholder="Ingrese la Unidad académica" name="ua" required>
                  </div>
              
              </div>
            </section>
          
          <br><h3>Evento en el que desea participar:</h3>
           <section>
           
                    	<div class="form-row">
                          <div class="col-md-8 mb-3">
                              <label for="comment">Describa el evento:</label>
                              <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                          </div>
                      </div>
           
          </section>
          
              <div class="adelanteatras">
               <a href="formulario1.php" class="btn btn-success float-right" style="background-color: #237c2c;">Siguiente</a>
              </div>
          
          </div>
</section>

<!--Incluye el footer-->
<?php include_once ("../partials/footer.php"); ?>
</body>
</html>