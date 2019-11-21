<!DOCTYPE html>
<html>
<head>
	<title>Formulario RUTP-FV-4(M)</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--<link rel="stylesheet" href="../bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
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
</div>
</head>
<body class="cuerpo">


    <<!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--Se incluye el nav-->
    <?php include_once("../partials/navigation.php") ?>

<section class="formulario mb-3">
<br>
<div class="container p-4">
<h2 class="text-center"><span>Formulario de registro de solicitud RUTP-FV-4(M)</span></h2><br><br>
<h3>Apoyo ofrecido por organizadores o patrocinadores del evento:</h3>
<section>
   
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="opt1" value="option" >Inscripción
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="opt2" value="option">Hospedaje
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check3" name="opt3" value="option">Apoyo Económico Parcial
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check4">
        <input type="checkbox" class="form-check-input" id="check4" name="opt4" value="option" >Gastos de viaje
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check5">
        <input type="checkbox" class="form-check-input" id="check5" name="opt5" value="option" >Manutención
      </label>
    </div>
  
</section>

<br><h3>Apoyo solicitado a UTP:</h3>
<section>
   
    <div class="form-check-inline">
      <label class="form-check-label" for="check6">
        <input type="checkbox" class="form-check-input" id="check6" name="opt6" value="option" >Inscripción
        <input type="text" class="form-control" id="montoi" placeholder="Monto" name="mi" required>
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check7">
        <input type="checkbox" class="form-check-input" id="check7" name="opt7" value="option" >Gastos de viaje
        <input type="text" class="form-control" id="montogv" placeholder="Monto" name="mgv" required>
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check8">
        <input type="checkbox" class="form-check-input" id="check8" name="opt8" value="option">Apoyo Económico
        <input type="text" class="form-control" id="montoae" placeholder="Monto" name="mae" required>
      </label>
    </div>
  
</section>
   
<br><h3>Justificación y beneficios de la participación:</h3>
 <section>
 
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="justificacion">Justifique aquí:</label>
                    <textarea class="form-control" rows="5" id="justificacion" name="justif" required></textarea>
                </div>
                
            </div>

 
</section>   

  <div class="adelanteatras">  
        <a href="formulario1.php" class="btn btn-atras float-left">Anterior</a>
        <a href="formulario3.php" class="btn btn-adelante float-right">Siguiente</a>
  </div>
      
</div>
</section>
    <!--Incluye el footer-->
    <?php include_once ("../partials/footer.php"); ?>
</body>
</html>