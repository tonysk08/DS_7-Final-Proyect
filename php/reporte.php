<?php
    session_start();
    $titulo="Reporte de viaje";
    require_once('../funciones/funciones.php');
    /* ControlAcceso($titulo); */
    require('../bd/conexion.php');

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['ficha']) && validarFicha ($_POST['ficha'])){
      //Validar si la informacion es enviada por un robot
      if(!empty($_POST['robot'])) {
        return header('Location: error.php');
      }
      $campos = [
        'objetivoParticipacion' => 'El objetivo de la participacion', 
        'resultadosParticipacion' => 'Los resultados de la participacion',
        'impactoCortoPlazo' => 'El impacto a corto plazo',
        'impactoMedioPlazo' => 'El impacto a mediano plazo', 
        'impactoLargoPlazo' => 'El impacto a largo plazo'
      ];
      $errores = validarCampos($campos);
  
      if(isset($_SESSION['idUser'])){
        if(empty($errores)) {
          $errores = registroReportes($_SESSION['idUser']);
        }
      }
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>  
  <?php include_once("../partials/head.php"); ?>
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here -->
  <!-- Page header -->
  <?php include_once("../partials/header.php"); ?>

  <!-- This container has everything apart from the header and the footer -->
  <div class="container-fluid">
    <div class="row">
      <!-- Imagen a la derecha-->
      <div class="col-3 view ml-n1 mr-n1 view overlay">    
        <img src="../img/inverse-plane.jpg" class="img-fluid border border-secondary rounded border-3 img-thumbnail pt-2 pb-2">
      </div>
    <!-- Reporte -->
      <div class="col-9 border border-secondary rounded pl-4 pt-1 pl-2 border-3">
        <form class="md-form mt-n1" id="reporteViaje" method="POST" enctype="multipart/form-data">
          <h2 class="text-center green-text font-weight-bold text-uppercase">Reporte de viaje</h2>
          <!-- Inicio del Reporte -->

          <?php	if(!empty($errores)){
            echo mostrarErrores($errores);
            }?>
          <input type="hidden" name="ficha" value="<?php echo ficha_csrf()?>"/>
          <input type="hidden" name="robot" value=""/>
          
          <div class="row" id="FilaInformacionSustantiva1">
            <h5 class="col-12 purple-text font-weight-bold mb-n2">Información Sustantiva</h5>
            <div class="md-form md-outline col-lg-9 col-sm-12">
            <i class="fas fa-tasks prefix"></i>
              <textarea id="objetivosEvento" class="md-textarea form-control noresize" rows="4" name="objetivoParticipacion" value="<?php echo $_POST['objetivoParticipacion'] ?? '' ?>"></textarea>
              <label class="ml-5" for="objetivosEvento">Objetivo de la participación</label>
              <small id="objetivosEventoHelp" class="form-text text-muted">Redacte las razones por las que realizó el viaje.</small>
            </div>
          </div>
          <div class="row mt-n4" id="FilaInformacionSustantiva2" >
            <div class="md-form md-outline col-lg-9 col-sm-12">
            <i class="fas fa-chart-bar prefix"></i>
              <textarea id="resultadosEvento" class="md-textarea form-control noresize" rows="4" name="resultadosParticipacion" value="<?php echo $_POST['resultadosParticipacion'] ?? '' ?>"></textarea>
              <label class="ml-5" for="resultadosEvento">Resultados (valor agregado en el desempeño de su cargo)</label>
              <small id="resultadosEventoHelp" class="form-text text-muted">Redacte los logros del viaje.</small>
            </div>
          </div>
          <div class="row" id="FilaInformacionSustantiva3 mt-n2">
            <h6 class="col-12 purple-text font-weight-bolder mb-n2">El impacto en las funciones bajo su responsabilidad será:</h6>
            <div class="md-form md-outline col-lg-3 col-sm-12">
            <i class="fas fa-dice-one prefix"></i>
              <textarea id="impactoCortoPlazo" class="md-textarea form-control noresize" rows="3" name="impactoCortoPlazo" value="<?php echo $_POST['impactoCortoPlazo'] ?? '' ?>"></textarea>
              <label class="ml-5" for="impactoCortoPlazo">Corto Plazo</label>
            </div>
            <div class="md-form md-outline col-lg-3 col-sm-12">
            <i class="fas fa-dice-two prefix"></i>
              <textarea id="impactoMedioPlazo" class="md-textarea form-control noresize" rows="3" name="impactoMedioPlazo" value="<?php echo $_POST['impactoMedioPlazo'] ?? '' ?>"></textarea>
              <label class="ml-5" for="impactoMedioPlazo">Medio Plazo</label>
            </div>
            <div class="md-form md-outline col-lg-3 col-sm-12">
            <i class="fas fa-dice-three prefix"></i>
              <textarea id="impactoLargoPlazo" class="md-textarea form-control noresize" rows="3" name="impactoLargoPlazo" value="<?php echo $_POST['impactoLargoPlazo'] ?? '' ?>"></textarea>
              <label class="ml-5" for="impactoLargoPlazo">Largo Plazo</label>
            </div>
            <small id="descripcionEventoHelp" class="form-text text-muted col-md-12 mt-n4 ml-4">Redacte los logros del viaje.Redacte los logros del viaje.Redacte los logros del viaje.Redacte los logros del viaje.</small>
          </div>
          <div class="row" id="FilaInformacionSustantiva4">
          <div class="file-field col-lg-6 mt-3">
          <h6 class="col-12 purple-text font-weight-bolder">Documentos adjuntos</h6>
              <div class="btn blue-gradient btn-sm float-left">
                <span><i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>Seleccione el archivo</span>
                <input type="file" class="form-control" type="file" id="rutaPDF" name="rutaPDF">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Sube un único archivo PDF">
              </div>
              <small id="subirArchivoHelp" class="form-text text-muted mt-1 ml-2">Si la modalidad del viaje fue una capacitación deberá adjuntar copia del certificado que otorga el organismo respecto.
                Además, añada cualquier documento o imagen del evento.
              </small>
              <small id="subirArchivoHelp" class="form-text text-muted mt-1 ml-2">*Anexe todo en un único documento PDF. Si no sabe cómo hacerlo, puede usar <a href="https://smallpdf.com/es/jpg-a-pdf">esta página</a>
              </small>
            </div> 
          </div>

          <button class="btn btn-secondary float-right mb-2" type="submit">Enviar</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
