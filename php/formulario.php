<?php
    session_start();
    $titulo="Formulario";

    require_once('../funciones/funciones.php');
    require('../bd/conexion.php');

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['ficha']) && validarFicha ($_POST['ficha'])){
    //Validar si la informacion es enviada por un robot
    if(!empty($_POST['robot'])) {
      return header('Location: error.php');
    }
    $campos = [
      'nombreEvento' => 'Nombre',
      'nombreEncargado' => 'Nombre',
      'cedulaEncargado' => 'Cedula',
      'unidadAcademica' => 'Unidad Academica',
      'descripcion' => 'Descripcion del evento',
      'lugarEvento' => 'Lugar del evento', 
      'fechaInicio' => 'Fecha de inicio del evento',
      'fechaFin' => 'Fecha de culminacion del evento',
      'montoInscripcion' => 'Monto de inscripcion', 
      'montoGastoViaje'=> 'Monto del gasto de viaje',
      'montoApoyoEconomico' => 'Monto de apoyo economico deseado', 
      'justificacionParticipacion' => 'Justificacion de participacion'
    ];
    $errores = validarCampos($campos);

    if(isset($_SESSION['idUser'])){
      if(empty($errores)) {
        $errores = registro($_SESSION['idUser'],$_SESSION['correo'], $_SESSION['nombre']);
      }
    }
  }
?>
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
<div class="container p-4">
  <?php	if(!empty($errores)){echo mostrarErrores($errores);}?>
    <form id="formularioRegistro" method="POST">
      <fieldset id="step_1" class="step">
        <input type="hidden" name="ficha" value="<?php echo ficha_csrf()?>"/>
        <input type="hidden" name="robot" value=""/>
        
        <h2 class="text-center"><span>Formulario de registro de solicitud RUTP-FV-4(M)</span></h2><br><br>
          <h3>Información del evento :</h3>
     
           <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label >Nombre del evento:</label>
                    <input type="text" class="form-control" id="nombreEvento" value="<?php echo $_POST['nombreEvento'] ?? '' ?>" placeholder="Nombre del evento" name="nombreEvento" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Nombre de encargado:</label>
                    <input type="text" class="form-control" id="nombreEncargado" value="<?php echo $_POST['nombreEncargado'] ?? '' ?>" placeholder="Nombre del encargado" name="nombreEncargado" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="ced">Cédula del estudiante:</label>
                    <input type="text" class="form-control" id="cedulaEncargado" value="<?php echo $_POST['cedulaEncargado'] ?? '' ?>" placeholder="Cédula del estudiante" name="cedulaEncargado" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="unac">Unidad académica:</label>
                    <input type="text" class="form-control" id="unidadAcademica" value="<?php echo $_POST['unidadAcademica'] ?? '' ?>"  placeholder="Unidad académica" name="unidadAcademica" required>
                  </div>
              </div>
            <br><h3>Evento en el que desea participar:</h3>
         
           
                    	<div class="form-row">
                          <div class="col-md-8 mb-3">
                              <label for="comment">Describa el evento:</label>
                              <textarea class="form-control" rows="5" id="descripcion" name="descripcion" value="<?php echo $_POST['descripcion'] ?? '' ?>" required></textarea>
                          </div>
                      </div>
        </fieldset>

        <fieldset id="step_2" class="step">
        <h3>Tipo de evento:</h3>

                <div class="form-check-inline">
                  <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="tipo" name="tipo"  <?php if(isset($_POST['tipo'])){echo "checked ='checked'";}?> value="Cultural" >Cultural
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="tipo" name="tipo" <?php if(isset($_POST['tipo'])){echo "checked ='checked'";}?>  value="Deportivo">Deportivo
                  </label>
                  </div>
 
            <br><h3>Alcance del evento:</h3>
                <div class="form-check-inline">
                  <label class="form-check-label" for="radio3">
                    <input type="radio" class="form-check-input" id="alcance" name="alcance"  <?php if(isset($_POST['alcance'])){echo "checked ='checked'";}?> value="Nacional" >Nacional
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class="form-check-label" for="radio4">
                    <input type="radio" class="form-check-input" id="alcance" name="alcance"  <?php if(isset($_POST['alcance'])){echo "checked ='checked'";}?>  value="Internacional">Internacional
                  </label>
                </div>
                <div class="form-check-inline">
                  <label for="comment">Especifique el lugar:</label>
                  <textarea class="form-control" rows="2" id="lugarEvento" name="lugarEvento" value="<?php echo $_POST['lugarEvento'] ?? '' ?>"></textarea>     
                </div>

                      <br><h3>Proyección de la Institución a través del evento:</h3>

            
              <div class="form-check-inline">
                <label class="form-check-label" for="radio5">
                  <input type="radio" class="form-check-input" id="proyeccion" name="proyeccion" <?php if(isset($_POST['proyeccion'])){echo "checked ='checked'";}?>  value="Excelente" >Excelente
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio6">
                  <input type="radio" class="form-check-input" id="proyeccion" name="proyeccion" <?php if(isset($_POST['proyeccion'])){echo "checked ='checked'";}?> value="Buena">Buena
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio7">
                  <input type="radio" class="form-check-input" id="proyeccion" name="proyeccion"  <?php if(isset($_POST['proyeccion'])){echo "checked ='checked'";}?> value="No tiene">No tiene
                </label>
              </div>
            
  

            
        <br><h3>Fecha de la Participación en el Evento:</h3>
    
          
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input id="fechaInicio" name="fechaInicio" value="<?php echo $_POST['fechaInicio'] ?? '' ?>" width="270" placeholder="Inicio" />
                        </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input id="fechaFin" name="fechaFin"  value="<?php echo $_POST['fechaFin'] ?? '' ?>" width="270" placeholder="Fin" />
                    </div>       
     
        </fieldset>
      
      <fieldset id="step_3" class="step">
              <h3>Apoyo ofrecido por organizadores o patrocinadores del evento:</h3>
           
                  
                    <div class="form-check-inline">
                      <label class="form-check-label" for="check1">
                        <input type="checkbox" class="form-check-input" id="apoyoEvento[]" name="apoyoEvento[]"  <?php if(isset($_POST['apoyoEvento'])){echo "checked ='checked'";}?> value="Inscripcion" >Inscripción
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="check2">
                        <input type="checkbox" class="form-check-input" id="apoyoEvento[]" name="apoyoEvento[]"   <?php if(isset($_POST['apoyoEvento'])){echo "checked ='checked'";}?>  value="Hospedaje">Hospedaje
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="check3">
                        <input type="checkbox" class="form-check-input" id="apoyoEvento[]" name="apoyoEvento[]"  <?php if(isset($_POST['apoyoEvento'])){echo "checked ='checked'";}?>  value="Apoyo economico parcial">Apoyo Económico Parcial
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="check4">
                        <input type="checkbox" class="form-check-input" id="apoyoEvento[]" name="apoyoEvento[]"  <?php if(isset($_POST['apoyoEvento'])){echo "checked ='checked'";}?>  value="Gastos de viaje" >Gastos de viaje
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="check5">
                        <input type="checkbox" class="form-check-input" id="apoyoEvento[]" name="apoyoEvento[]"  <?php if(isset($_POST['apoyoEvento'])){echo "checked ='checked'";}?>   value="Manutencion" >Manutención
                      </label>
                    </div>

                <br><h3>Apoyo solicitado a UTP:</h3>
            <div class="form-check-inline">
              <label class="form-check-label" for="check6">
                <input type="checkbox" class="form-check-input" id="inscripcionUTP[]" name="inscripcionUTP[]"  <?php if(isset($_POST['inscripcionUTP'])){echo "checked ='checked'";}?>  value="1" >Inscripción
                <input type="text" class="form-control" id="montoInscripcion" value="<?php echo $_POST['montoInscripcion'] ?? '' ?>"  placeholder="Monto" name="montoInscripcion" required>
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="check7">
                <input type="checkbox" class="form-check-input" id="gastosViajeUTP[]" name="gastosViajeUTP[]" <?php if(isset($_POST['gastosViajeUTP'])){echo "checked ='checked'";}?> value="1" >Gastos de viaje
                <input type="text" class="form-control" id="montoGastoViaje" value="<?php echo $_POST['montoGastoViaje'] ?? '' ?>" placeholder="Monto" name="montoGastoViaje" required>
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="check8">
                <input type="checkbox" class="form-check-input" id="apoyoEconomicoUTP[]" name="apoyoEconomicoUTP[]" <?php if(isset($_POST['apoyoEconomicoUTP'])){echo "checked ='checked'";}?> value="1">Apoyo Económico
                <input type="text" class="form-control" id="montoApoyoEconomico"  value="<?php echo $_POST['montoApoyoEconomico'] ?? '' ?>" placeholder="Monto" name="montoApoyoEconomico" required>
              </label>
            </div>
          
     

        <br><h3>Justificación y beneficios de la participación:</h3>

 
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="justificacion">Justifique aquí:</label>
                    <textarea class="form-control" rows="5" id="justificacionParticipacion"  name="justificacionParticipacion"  value="<?php echo $_POST['justificacionParticipacion'] ?? '' ?>"  required></textarea>
                </div>
                
            </div>  
      </fieldset>

        <fieldset id="step_4" class="step">
              <h3>Última vez que participó en un evento en representación de la UTP:</h3>
    
          
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input id="ultimaParticipacion" name="ultimaParticipacion" width="270" value="<?php echo $_POST['ultimaParticipacion'] ?? '' ?>" placeholder="Seleccione la fecha solicitada" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <h4>Anexe el archivo PDF con todos los documentos solicitados</h4>
                            <input class="form-control" type="file" id="rutaPDF" name="rutaPDF" value="<?php echo $_POST['rutaPDF'] ?? '' ?>" placeholder="Sleccione su archivo"  />
                        </div>
                    </div>
                    <div class="adelanteatras btn-abajo col-md-6 mb-3">
                        <input id="btn-abajo" name="btn-enviar"type="submit"class="btn btn-adelante float-right"/>
                    </div>
      </fieldset>
      </form>
          <div class="adelanteatras">
               <input type="button" id="prev"name="previous" value="Previous" class="btn btn-atras float-left"/>
               <input  type="button" id="next" name="next" value="Next" class="btn btn-adelante float-right"/>
          </div>
      </div>
    </section>



<!--Incluye el footer-->
<?php include_once ("../partials/footer.php"); ?>
<script src="../js/formulario.js"></script>
</body>
</html>