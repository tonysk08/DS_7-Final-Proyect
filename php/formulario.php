<?php
    session_start();
    $titulo="Formulario";
    require_once('../funciones/funciones.php');
    ControlAcceso($titulo);
    require('../bd/conexion.php');

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['ficha']) && validarFicha ($_POST['ficha'])){
    //Validar si la informacion es enviada por un robot
    if(!empty($_POST['robot'])) {
      return header('Location: error.php');
    }
    $campos = [
      'nombreEvento' => 'Nombre de evento',
      'nombreEncargado' => 'Nombre de encargado',
      'cedulaEncargado' => 'Cedula',
      'unidadAcademica' => 'Unidad Academica',
      'descripcion' => 'Descripcion del evento',
      'lugarEvento' => 'El lugar del evento', 
      'fechaInicio' => 'Fecha de inicio del evento',
      'fechaFin' => 'Fecha de culminacion del evento',
      'montoInscripcion' => 'Monto de inscripcion', 
      'montoGastoViaje'=> 'Monto del gasto de viaje',
      'montoApoyoEconomico' => 'Monto de apoyo economico deseado', 
      'justificacionParticipacion' => 'Justificacion de participacion',
      'alcance' => 'Alcance de evento', 
      'tipo' => 'Tipo de evento', 
      'proyeccion' => 'Proyeccion del evento', 
      'apoyoEvento' => 'Apoyo del evento'
    ];
    $errores = validarCampos($campos);

    if(isset($_SESSION['idUser'])){
      if(empty($errores)) {
        $errores = registro($_SESSION['correo'], $_SESSION['nombre']);
      }
    }
  }
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
    <!-- Imagen a la derecha-->
    <div class="row">
      <div class="col-3 view ml-n1 mr-n1 view overlay">    
        <img src="../img/plane.jpg" class="img-fluid border border-secondary rounded border-3 img-thumbnail pt-2 pb-2">
      </div>
    <!-- Formulario -->
    <div class="col-9 border border-secondary rounded pl-4 pt-1 pl-2 border-3">
    <?php	if(!empty($errores)){
        echo mostrarErrores($errores);
        }?>
      <form class="md-form mt-n1" id="formularioRegistro" method="POST" enctype="multipart/form-data">
      <h2 class="text-center green-text font-weight-bold text-uppercase">Formulario de registro de solicitud RUTP-FV-4(M)</h2>
      <!-- Inicio del formulario -->
      <input type="hidden" name="ficha" value="<?php echo ficha_csrf()?>"/>
      <input type="hidden" name="robot" value=""/>

      <!-- Inicio de la columna datos estudiante -->
      
      <div class="row" id="ColumnaDatosEstudiante">
        <h5 class="col-12 purple-text font-weight-bold mb-n2">Datos del estudiante</h5>
        <div class="md-form md-outline col-lg-4 col-sm-12">
          <i class="fas fa-signature prefix"></i>
          <input type="text" id="nombreEncargado" name="nombreEncargado" value="<?php echo $_POST['nombreEncargado'] ?? '' ?>" class="form-control">
          <label class="ml-5" for="nombreEncargado">Nombre del estudiante</label>
          <small id="nombreEstudianteHelp" class="form-text text-muted">Ingrese correctamente su nombre tal cual aparece en su cédula.</small>
        </div>
        <div class="md-form md-outline col-lg-3 col-sm-12">
          <i class="far fa-id-card prefix"></i>
          <input type="text" id="cedulaEncargado" name="cedulaEncargado" value="<?php echo $_POST['cedulaEncargado'] ?? '' ?>" class="form-control">
          <label class="ml-5" for="cedulaEncargado">Cédula del estudiante</label>
          <small id="cedulaEstudianteHelp" class="form-text text-muted">Ingrese correctamente su cédula.</small>
        </div>
        <div class="md-form md-outline col-lg-4 col-sm-12">
          <i class="fas fa-graduation-cap prefix"></i>
          <input type="text" id="unidadAcademica" name="unidadAcademica" value="<?php echo $_POST['unidadAcademica'] ?? '' ?>"  class="form-control">
          <label class="ml-5" for="unidadAcademica">Unidad Académica o Centro Regional</label>
          <small id="facultadHelp" class="form-text text-muted">Ingrese el nombre de su facultad o centro regional.</small>
        </div>
      </div>
      <!-- Fin de la fila datos del estudiante-->

      <!-- Inicio de la fila datos de evento-->
      <div class="row" id="ColumnaDatosEvento">
        <h5 class="col-12 purple-text font-weight-bold mb-n2">Datos del evento</h5>
        <div class="md-form md-outline col-lg-5 col-sm-12">
          <i class="fas fa-calendar-week prefix"></i>
          <input type="text" id="nombreEvento" name="nombreEvento"  value="<?php echo $_POST['nombreEvento'] ?? '' ?>" class="form-control">
          <label class="ml-5" for="nombreEvento">Nombre del evento</label>
          <small id="nombreEventoHelp" class="form-text text-muted">Ingrese correctamente el nombre del evento al que asistirá.</small>
        </div>
        <div class="md-form md-outline col-lg-3 col-sm-12">
          <i class="fas fa-calendar-alt prefix"></i>
          <input type="text" name="fechaInicio" id="fechaInicioEvento" value="<?php echo $_POST['fechaInicio'] ?? '' ?>" class="form-control datepicker">
          <label class="ml-5" for="fechaInicioEvento">Inicio del Evento</label>
          <small id="fechaInicioEventoHelp" class="form-text text-muted">Ingrese la fecha en la que inicia el evento.</small>
        </div>
        <div class="md-form md-outline col-lg-3 col-sm-12">
          <i class="fas fa-calendar-alt prefix"></i>
          <input type="text" name="fechaFin" id="fechaFinEvento" value="<?php echo $_POST['fechaFin'] ?? '' ?>" class="form-control datepicker">
          <label class="ml-5" for="fechaFinEvento">Fin del evento</label>
          <small id="fechaFinEventoHelp" class="form-text text-muted">Ingrese la fecha en la que finaliza el evento.</small>
        </div>
      </div>

      <!-- Nueva linea de la fila de datos de evento -->
      <div class="row" id="ColumnaDatosEvento">
        <div class="md-form md-outline col-lg-3 col-sm-12 mt-n1">
          <i class="fas fa-align-left prefix"></i>
          <textarea id="descripcionEvento" class="md-textarea form-control noresize" rows="2" name="descripcion" value="<?php echo $_POST['descripcion'] ?? '' ?>"></textarea>
          <label class="ml-5" for="descripcionEvento">Descripción del evento</label>
          <small id="descripcionEventoHelp" class="form-text text-muted">Describa detalladamente el evento.</small>
        </div>
        <div class="col-lg-3 col-sm-12 mt-n1 mr-n5">
          <h6 class="purple-text font-weight-bolder mb-n2">Tipo de evento</h6>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="tipoCultural" name="tipo" value="Cultural" >
            <label class="form-check-label" for="tipoCultural">Cultural</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="tipoDeportivo" name="tipo" value="Deportivo">
            <label class="form-check-label" for="tipoDeportivo">Deportivo</label>
          </div>
          <small id="descripcionEventoHelp" class="form-text text-muted mt-3">Seleccione el tipo de evento</small>
        </div>
        <div class="col-lg-3 ml-n4 mt-n1 mr-n5" id="AlcanceEvento">
          <h6 class="purple-text font-weight-bolder mb-n2">Alcance del evento</h6>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="alcanceNacional" name="alcance" value="Nacional">
            <label class="form-check-label" for="alcanceNacional">Nacional</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="alcanceInternacional" name="alcance" value="Internacional">
            <label class="form-check-label" for="alcanceInternacional">Internacional</label>
          </div>
          <small id="descripcionEventoHelp" class="form-text text-muted mt-3">Seleccione el alcance del evento.</small>
        </div>
        <div class="col-lg-3 col-sm-12 select-outline ml-n5 mt-n2" enabled="false">
          <select class="mdb-select md-form md-outline colorful-select dropdown-primary pl-2" id="lugarEvento" name="lugarEvento" value="<?php echo $_POST['lugarEvento'] ?? '' ?>" searchable=" ">
            <optgroup label="Provincias">
              <option value="Bocas del Toro">Bocas del Toro</option>
              <option value="Coclé">Coclé</option>
              <option value="Colón">Colón</option>
              <option value="Chiriquí">Chiriquí</option>
              <option value="Darién">Darién</option>
              <option value="Herrera">Herrera</option>
              <option value="Los Santos">Los Santos</option>
              <option value="Panamá" selected>Panamá</option>
              <option value="Panamá Oeste">Panamá Oeste</option>
              <option value="Veraguas">Veraguas</option>
            </optgroup>
            <optgroup label="Países">
              <option value="Afganistán">Afganistán </option>
              <option value="Akrotiri">Akrotiri </option>
              <option value="Albania">Albania </option>
              <option value="Alemania">Alemania </option>
              <option value="Andorra">Andorra </option>
              <option value="Angola">Angola </option>
              <option value="Anguila">Anguila </option>
              <option value="Antártida">Antártida </option>
              <option value="Antigua y Barbuda">Antigua y Barbuda </option>
              <option value="Antillas Neerlandesas">Antillas Neerlandesas </option>
              <option value="Arabia Saudí">Arabia Saudí </option>
              <option value="Arctic Ocean">Arctic Ocean </option>
              <option value="Argelia">Argelia </option>
              <option value="Argentina">Argentina </option>
              <option value="Armenia">Armenia </option>
              <option value="Aruba">Aruba </option>
              <option value="Ashmore andCartier Islands">Ashmore andCartier Islands </option>
              <option value="Atlantic Ocean">Atlantic Ocean </option>
              <option value="Australia">Australia </option>
              <option value="Austria">Austria </option>
              <option value="Azerbaiyán">Azerbaiyán </option>
              <option value="Bahamas">Bahamas </option>
              <option value="Bahráin">Bahráin </option>
              <option value="Bangladesh">Bangladesh </option>
              <option value="Barbados">Barbados </option>
              <option value="Bélgica">Bélgica </option>
              <option value="Belice">Belice </option>
              <option value="Benín">Benín </option>
              <option value="Bermudas">Bermudas </option>
              <option value="Bielorrusia">Bielorrusia </option>
              <option value="Birmania Myanmar">Birmania Myanmar </option>
              <option value="Bolivia">Bolivia </option>
              <option value="Bosnia y Hercegovina">Bosnia y Hercegovina </option>
              <option value="Botsuana">Botsuana </option>
              <option value="Brasil">Brasil </option>
              <option value="Brunéi">Brunéi </option>
              <option value="Bulgaria">Bulgaria </option>
              <option value="Burkina Faso">Burkina Faso </option>
              <option value="Burundi">Burundi </option>
              <option value="Bután">Bután </option>
              <option value="Cabo Verde">Cabo Verde </option>
              <option value="Camboya">Camboya </option>
              <option value="Camerún">Camerún </option>
              <option value="Canadá">Canadá </option>
              <option value="Chad">Chad </option>
              <option value="Chile">Chile </option>
              <option value="China">China </option>
              <option value="Chipre">Chipre </option>
              <option value="Clipperton Island">Clipperton Island </option>
              <option value="Colombia">Colombia </option>
              <option value="Comoras">Comoras </option>
              <option value="Congo">Congo </option>
              <option value="Coral Sea Islands">Coral Sea Islands </option>
              <option value="Corea del Norte">Corea del Norte </option>
              <option value="Corea del Sur">Corea del Sur </option>
              <option value="Costa de Marfil">Costa de Marfil </option>
              <option value="Costa Rica">Costa Rica </option>
              <option value="Croacia">Croacia </option>
              <option value="Cuba">Cuba </option>
              <option value="Dhekelia">Dhekelia </option>
              <option value="Dinamarca">Dinamarca </option>
              <option value="Dominica">Dominica </option>
              <option value="Ecuador">Ecuador </option>
              <option value="Egipto">Egipto </option>
              <option value="El Salvador">El Salvador </option>
              <option value="El Vaticano">El Vaticano </option>
              <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos </option>
              <option value="Eritrea">Eritrea </option>
              <option value="Eslovaquia">Eslovaquia </option>
              <option value="Eslovenia">Eslovenia </option>
              <option value="España">España </option>
              <option value="Estados Unidos">Estados Unidos </option>
              <option value="Estonia">Estonia </option>
              <option value="Etiopía">Etiopía </option>
              <option value="Filipinas">Filipinas </option>
              <option value="Finlandia">Finlandia </option>
              <option value="Fiyi">Fiyi </option>
              <option value="Francia">Francia </option>
              <option value="Gabón">Gabón </option>
              <option value="Gambia">Gambia </option>
              <option value="Gaza Strip">Gaza Strip </option>
              <option value="Georgia">Georgia </option>
              <option value="Ghana">Ghana </option>
              <option value="Gibraltar">Gibraltar </option>
              <option value="Granada">Granada </option>
              <option value="Grecia">Grecia </option>
              <option value="Groenlandia">Groenlandia </option>
              <option value="Guam">Guam </option>
              <option value="Guatemala">Guatemala </option>
              <option value="Guernsey">Guernsey </option>
              <option value="Guinea">Guinea </option>
              <option value="Guinea Ecuatorial">Guinea Ecuatorial </option>
              <option value="Guinea-Bissau">Guinea-Bissau </option>
              <option value="Guyana">Guyana </option>
              <option value="Haití">Haití </option>
              <option value="Honduras">Honduras </option>
              <option value="Hong Kong">Hong Kong </option>
              <option value="Hungría">Hungría </option>
              <option value="India">India </option>
              <option value="Indian Ocean">Indian Ocean </option>
              <option value="Indonesia">Indonesia </option>
              <option value="Irán">Irán </option>
              <option value="Iraq">Iraq </option>
              <option value="Irlanda">Irlanda </option>
              <option value="Isla Bouvet">Isla Bouvet </option>
              <option value="Isla Christmas">Isla Christmas </option>
              <option value="Isla Norfolk">Isla Norfolk </option>
              <option value="Islandia">Islandia </option>
              <option value="Islas Caimán">Islas Caimán </option>
              <option value="Islas Cocos">Islas Cocos </option>
              <option value="Islas Cook">Islas Cook </option>
              <option value="Islas Feroe">Islas Feroe </option>
              <option value="Islas Georgia del Sur y Sandwich del Sur">Islas Georgia del Sur y Sandwich del Sur </option>
              <option value="Islas Heard y McDonald">Islas Heard y McDonald </option>
              <option value="Islas Malvinas">Islas Malvinas </option>
              <option value="Islas Marianas del Norte">Islas Marianas del Norte </option>
              <option value="IslasMarshall">IslasMarshall </option>
              <option value="Islas Pitcairn">Islas Pitcairn </option>
              <option value="Islas Salomón">Islas Salomón </option>
              <option value="Islas Turcas y Caicos">Islas Turcas y Caicos </option>
              <option value="Islas Vírgenes Americanas">Islas Vírgenes Americanas </option>
              <option value="Islas Vírgenes Británicas">Islas Vírgenes Británicas </option>
              <option value="Israel">Israel </option>
              <option value="Italia">Italia </option>
              <option value="Jamaica">Jamaica </option>
              <option value="Jan Mayen">Jan Mayen </option>
              <option value="Japón">Japón </option>
              <option value="Jersey">Jersey </option>
              <option value="Jordania">Jordania </option>
              <option value="Kazajistán">Kazajistán </option>
              <option value="Kenia">Kenia </option>
              <option value="Kirguizistán">Kirguizistán </option>
              <option value="Kiribati">Kiribati </option>
              <option value="Kuwait">Kuwait </option>
              <option value="Laos">Laos </option>
              <option value="Lesoto">Lesoto </option>
              <option value="Letonia">Letonia </option>
              <option value="Líbano">Líbano </option>
              <option value="Liberia">Liberia </option>
              <option value="Libia">Libia </option>
              <option value="Liechtenstein">Liechtenstein </option>
              <option value="Lituania">Lituania </option>
              <option value="Luxemburgo">Luxemburgo </option>
              <option value="Macao">Macao </option>
              <option value="Macedonia">Macedonia </option>
              <option value="Madagascar">Madagascar </option>
              <option value="Malasia">Malasia </option>
              <option value="Malaui">Malaui </option>
              <option value="Maldivas">Maldivas </option>
              <option value="Malí">Malí </option>
              <option value="Malta">Malta </option>
              <option value="Man, Isle of">Man, Isle of </option>
              <option value="Marruecos">Marruecos </option>
              <option value="Mauricio">Mauricio </option>
              <option value="Mauritania">Mauritania </option>
              <option value="Mayotte">Mayotte </option>
              <option value="México">México </option>
              <option value="Micronesia">Micronesia </option>
              <option value="Moldavia">Moldavia </option>
              <option value="Mónaco">Mónaco </option>
              <option value="Mongolia">Mongolia </option>
              <option value="Montserrat">Montserrat </option>
              <option value="Mozambique">Mozambique </option>
              <option value="Namibia">Namibia </option>
              <option value="Nauru">Nauru </option>
              <option value="Navassa Island">Navassa Island </option>
              <option value="Nepal">Nepal </option>
              <option value="Nicaragua">Nicaragua </option>
              <option value="Níger">Níger </option>
              <option value="Nigeria">Nigeria </option>
              <option value="Niue">Niue </option>
              <option value="Noruega">Noruega </option>
              <option value="Nueva Caledonia">Nueva Caledonia </option>
              <option value="Nueva Zelanda">Nueva Zelanda </option>
              <option value="Omán">Omán </option>
              <option value="Pacific Ocean">Pacific Ocean </option>
              <option value="Países Bajos">Países Bajos </option>
              <option value="Pakistán">Pakistán </option>
              <option value="Palaos">Palaos </option>
              <option value="Papúa-Nueva Guinea">Papúa-Nueva Guinea </option>
              <option value="Paracel Islands">Paracel Islands </option>
              <option value="Paraguay">Paraguay </option>
              <option value="Perú">Perú </option>
              <option value="Polinesia Francesa">Polinesia Francesa </option>
              <option value="Polonia">Polonia </option>
              <option value="Portugal">Portugal </option>
              <option value="Puerto Rico">Puerto Rico </option>
              <option value="Qatar">Qatar </option>
              <option value="Reino Unido">Reino Unido </option>
              <option value="República Centroafricana">República Centroafricana </option>
              <option value="República Checa">República Checa </option>
              <option value="República Democrática del Congo">República Democrática del Congo </option>
              <option value="República Dominicana">República Dominicana </option>
              <option value="Ruanda">Ruanda </option>
              <option value="Rumania">Rumania </option>
              <option value="Rusia">Rusia </option>
              <option value="Sáhara Occidental">Sáhara Occidental </option>
              <option value="Samoa">Samoa </option>
              <option value="Samoa Americana">Samoa Americana </option>
              <option value="San Cristóbal y Nieves">San Cristóbal y Nieves </option>
              <option value="San Marino">San Marino </option>
              <option value="San Pedro y Miquelón">San Pedro y Miquelón </option>
              <option value="San Vicente y las Granadinas">San Vicente y las Granadinas </option>
              <option value="Santa Helena">Santa Helena </option>
              <option value="Santa Lucía">Santa Lucía </option>
              <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe </option>
              <option value="Senegal">Senegal </option>
              <option value="Seychelles">Seychelles </option>
              <option value="Sierra Leona">Sierra Leona </option>
              <option value="Singapur">Singapur </option>
              <option value="Siria">Siria </option>
              <option value="Somalia">Somalia </option>
              <option value="Southern Ocean">Southern Ocean </option>
              <option value="Spratly Islands">Spratly Islands </option>
              <option value="Sri Lanka">Sri Lanka </option>
              <option value="Suazilandia">Suazilandia </option>
              <option value="Sudáfrica">Sudáfrica </option>
              <option value="Sudán">Sudán </option>
              <option value="Suecia">Suecia </option>
              <option value="Suiza">Suiza </option>
              <option value="Surinam">Surinam </option>
              <option value="Svalbard y Jan Mayen">Svalbard y Jan Mayen </option>
              <option value="Tailandia">Tailandia </option>
              <option value="Taiwán">Taiwán </option>
              <option value="Tanzania">Tanzania </option>
              <option value="Tayikistán">Tayikistán </option>
              <option value="Timor Oriental">Timor Oriental </option>
              <option value="Togo">Togo </option>
              <option value="Tokelau">Tokelau </option>
              <option value="Tonga">Tonga </option>
              <option value="Trinidad y Tobago">Trinidad y Tobago </option>
              <option value="Túnez">Túnez </option>
              <option value="Turkmenistán">Turkmenistán </option>
              <option value="Turquía">Turquía </option>
              <option value="Tuvalu">Tuvalu </option>
              <option value="Ucrania">Ucrania </option>
              <option value="Uganda">Uganda </option>
              <option value="Unión Europea">Unión Europea </option>
              <option value="Uruguay">Uruguay </option>
              <option value="Uzbekistán">Uzbekistán </option>
              <option value="Vanuatu">Vanuatu </option>
              <option value="Venezuela">Venezuela </option>
              <option value="Vietnam">Vietnam </option>
              <option value="Wake Island">Wake Island </option>
              <option value="Wallis y Futuna">Wallis y Futuna </option>
              <option value="West Bank">West Bank </option>
              <option value="Yemen">Yemen </option>
              <option value="Yibuti">Yibuti </option>
              <option value="Zambia">Zambia </option>
              <option value="Zimbabue">Zimbabue </option>
            </optgroup>
          </select>
          <label class="ml-2" for="listaPaises">Lugar de destino</label>
        </div>
      </div>

      <!-- Inicio de la fila beneficio para la universidad -->
      <div class="row mb-1" id="ColumnaProyeccionUniversidad">
        <h5 class="col-12 purple-text font-weight-bold">Beneficio para la universidad</h5>
        <div class="col-lg-5" id="ProyeccionUniversidad">
          <h6 class="purple-text font-weight-bolder mb-n1">Proyección de la Institución a través del evento</h6>
          <div class="form-check form-check-inline ml-n1">
            <input type="radio" class="form-check-input" value="Excelente" name="proyeccion" id="proyeccion1">
            <label class="form-check-label" for="proyeccion1">Excelente</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" value="Buena" name="proyeccion" id="proyeccion2" >
            <label class="form-check-label" for="proyeccion2">Buena</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" value="NoTiene" name="proyeccion" id="proyeccion3">
            <label class="form-check-label" for="proyeccion3">No Tiene</label>
          </div>
        </div>
        <div class="md-form md-outline col-lg-5 col-sm-12 mt-n1 ml-4">
          <i class="fas fa-align-left prefix"></i>
          <textarea id="justificacionParticipacion" class="md-textarea form-control noresize" rows="2" name="justificacionParticipacion"  value="<?php echo $_POST['justificacionParticipacion'] ?? '' ?>"  ></textarea>
          <label class="ml-5" for="justificacionParticipacion">Justificación y beneficios de la participación</label>
          <small id="justificacionParticipacionHelp" class="form-text text-muted">Indique cómo beneficia este viaje a la universidad.</small>
        </div>
      </div>
      <div class="row" id="ColumnaProyeccionUniversidad">
        <div class="col-5 mt-n5">
          <h6 class="col-12 purple-text font-weight-bolder ml-n3 mb-n1 mt-n2">Apoyo ofrecido por organizadores o patrocinadores del evento</h6>
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="apoyoInscripcion" value="Inscripcion" name="apoyoEvento[]">
            <label class="form-check-label" for="apoyoInscripcion">Inscripción</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="apoyoHospedaje" value="Hospedaje" name="apoyoEvento[]">
              <label class="form-check-label" for="apoyoHospedaje">Hospedaje</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="apoyoEconomicoParcial" value="Apoyo economico parcial" name="apoyoEvento[]">
              <label class="form-check-label" for="apoyoEconomicoParcial">Apoyo Económico Parcial</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="apoyoGastosViaje" value="Gastos de viaje" name="apoyoEvento[]">
              <label class="form-check-label" for="apoyoGastosViaje">Gastos de Viaje</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="apoyoManutencion" value="Manutencion" name="apoyoEvento[]">
              <label class="form-check-label" for="apoyoManutencion">Manutención</label>
          </div>
        </div>
        <div class="col-6 ml-5">
            <div class="file-field">
              <div class="btn blue-gradient btn-sm float-left">
                <span><i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>Seleccione el archivo</span>
                <input type="file" class="form-control" type="file" id="rutaPDF" name="rutaPDF">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Sube un único archivo PDF">
              </div>
              <small id="subirArchivoHelp" class="form-text text-muted mt-1 ml-2">Anexe carta de invitación, programa del evento, carta de objetivos y resultados esperados del evento, redactada por los estudiantes y dirigida al Secretario de Vida Universitaria y cualquier otro documento adicional de sustento.</small>
              <small id="subirArchivoHelp" class="form-text text-muted mt-1 ml-2">*Anexe todo en un único documento PDF. Si no sabe cómo hacerlo, puede usar <a href="https://smallpdf.com/es/jpg-a-pdf">esta página</a></small>
            </div> 
        </div>
      </div>
      <div class="row mt-n5" id="ColumnaProyeccionUniversidad">
        <!--Otra fila-->
        <h6 class="col-12 purple-text font-weight-bolder mt-n4">Apoyo solicitado a la Universidad Tecnológica de Panamá</h6>
        <div class="col-12 mt-n3">
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="inscripcionUTP[]" value="1" name="inscripcionUTP[]" <?php if(isset($_POST['inscripcionUTP'])){echo "checked ='checked'";}?>>
            <label class="form-check-label" for="inscripcionUTP[]" >Inscripción</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="gastosViajeUTP[]" value="1" name="gastosViajeUTP[]" <?php if(isset($_POST['gastosViajeUTP'])){echo "checked ='checked'";}?>>
              <label class="form-check-label" for="gastosViajeUTP[]">Gastos Viaje</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="apoyoEconomicoUTP[]" value="1" name="apoyoEconomicoUTP[]" <?php if(isset($_POST['apoyoEconomicoUTP'])){echo "checked ='checked'";}?> >
              <label class="form-check-label" for="apoyoEconomicoUTP[]">Apoyo Económico Parcial</label>
          </div>
        </div>
        <div class="md-form md-outline form-sm col-2 mr-n4">
          <input type="text" id="montoApoyoInscripcionUTP" name="montoInscripcion" value="<?php echo $_POST['montoInscripcion'] ?? '' ?>" class="form-control-sm">
          <label class="ml-3" for="montoApoyoInscripcionUTP">Monto Inscripcion</label>
        </div>
        <div class="md-form md-outline form-sm col-2 mr-n4">
          <input type="text" id="montoGastoViajeUTP" name="montoGastoViaje" value="<?php echo $_POST['montoGastoViaje'] ?? '' ?>" class="form-control-sm">
          <label class="ml-3" for="montoGastoViajeUTP" >Monto Gastos Viaje</label>
        </div>
        <div class="md-form md-outline form-sm col-2 mr-n4">
          <input type="text" id="montoApoyoParcialUTP" name="montoApoyoEconomico" value="<?php echo $_POST['montoApoyoEconomico'] ?? '' ?>" class="form-control-sm">
          <label class="ml-3" for="montoApoyoParcialUTP">Monto Apoyo Parcial</label>
        </div>
      </div>
      <button class="btn btn-secondary float-right mb-2"  type="submit">Enviar</button>
    </form>
    </div>
    </div>
    </div>

  <!-- JavaScript personalizado -->
  <script type="text/javascript" src="../js/form.js"></script>

</body>

</html>
