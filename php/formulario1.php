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

    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--Se incluye el nav-->
    <?php include_once("../partials/navigation.php") ?>

<section class="formulario mb-3">
<br>		
<div class="container p-4">
  <h2 class="text-center"><span>Formulario de registro de solicitud RUTP-FV-4(M)</span></h2><br><br>
  <h3>Tipo de evento:</h3>
  <section>
  
      <div class="form-check-inline">
        <label class="form-check-label" for="radio1">
          <input type="radio" class="form-check-input" id="radio1" name="optradio1" value="option1" >Cultural
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label" for="radio2">
          <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="option2">Deportivo
        </label>
      </div>
      
  </section>

<br><h3>Alcance del evento:</h3>
 <section>
   
    <div class="form-check-inline">
      <label class="form-check-label" for="radio3">
        <input type="radio" class="form-check-input" id="radio3" name="optradio2" value="option3" >Nacional
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio4">
        <input type="radio" class="form-check-input" id="radio4" name="optradio2" value="option4">Internacional
      </label>
    </div>
    <div class="form-check-inline">
      <label for="comment">Especifique el lugar:</label>
      <textarea class="form-control" rows="2" id="comment" name="text"></textarea>     
    </div>
   
</section>

<br><h3>Proyección de la Institución a través del evento:</h3>
<section>
   
    <div class="form-check-inline">
      <label class="form-check-label" for="radio5">
        <input type="radio" class="form-check-input" id="radio5" name="optradio3" value="option5" >Excelente
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio6">
        <input type="radio" class="form-check-input" id="radio6" name="optradio3" value="option6">Buena
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio7">
        <input type="radio" class="form-check-input" id="radio7" name="optradio3" value="option7">No tiene
      </label>
    </div>
  
</section>

<br><h3>Fecha de la Participación en el Evento:</h3>
<section>
   
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input id="datepicker" width="270" placeholder="Inicio" />
                </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input id="datepicker1" width="270" placeholder="Fin" />
                </div>
          
</section>


             
        <div class="adelanteatras">
            <a href="formulario.php" class="btn btn-atras float-left">Anterior</a>
            <a href="formulario2.php" class="btn btn-adelante float-right">Siguiente</a>
        </div>
 </div>     

</section>

<!--Incluye el footer-->
<?php include_once ("../partials/footer.php"); ?>

          <script>
                     
              $('#datepicker').datepicker({
                  uiLibrary: 'bootstrap'
              });
            </script> 
          
            <script>
                 
              $('#datepicker1').datepicker({
                  uiLibrary: 'bootstrap'
              });
          </script> 
</body>
</html>