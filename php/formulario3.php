<!DOCTYPE html>
<html>
<head>
	<title>Formulario RUTP-FV-4(M)</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="../css/estilo.css" rel="stylesheet">

    
    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">

    <script src="../ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/gijgo.min.js" type="text/javascript"></script>
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
<h3>Última vez que participó en un evento en representación de la UTP:</h3>
 <section>
  
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input id="datepicker3" width="270" placeholder="Seleccione la fecha solicitada" required />
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <h4>Anexe el archivo PDF con todos los documentos solicitados</h4>
                    <input class="form-control" type="file" id="document" placeholder="Sleccione su archivo" required />
                </div>
            </div>
          
</section>

      <script>
           
        $('#datepicker3').datepicker({
            uiLibrary: 'bootstrap'
        });
      </script> 

  <div class="adelanteatras">          
      <a href="formulario2.php" class="btn btn-atras float-left">Anterior</a>
  </div>
      
</div>
 
</section>
    <?php include "include/footer.php"; ?>
</body>
</html>