<!DOCTYPE html>
<html>
<head>
	
	<!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>
    
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
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>
</body>
</html>