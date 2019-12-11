<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * Funcion para enviar correos
 */
function phpMailer($email, $nombreUser) {
    require_once('../vendor/PHPMailer/src/Exception.php');
    require_once('../vendor/PHPMailer/src/PHPMailer.php');
    require_once('../vendor/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);
    try{
        //server del correo
        $mail -> SMTPDebug = 2;
        $mail -> isSMTP();
        $mail -> Host='in-v3.mailjet.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'aa61a22295cce6a4220bf161a398908f';
        $mail -> Password = 'b1407c4cab5bc2b5cea5da05d357f43d';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;
        //Usuario
        $mail -> setFrom('macuervo84@gmail.com', 'Sistema de Solicitud de Apoyo Económico Estudiantil UTP');
        $mail -> addAddress($email, $nombreUser);
        $mail->addAddress('rafatrik@gmail.com', 'Rafael Perez'); 
        //Contenido
        $mail -> isHTML(true);
        $mail -> Subject = 'Prueba de SAEE UTP';
        $mail -> Body =  'Se ha registrado su solicitud de apoyo economico estudiantil</b> para el estudiante' + $nombreUser;
        $mail -> AltBody = 'Se ha registrado su solicitud de apoyo economico estudiantil';
        $mail -> send();
    } catch (Exception $err) {
        echo 'El mensaje no pudo ser enviado: '.$err -> ErrorInfo;
    }
}
/**
 * Funcion para registrar el formulario
 * @param  formularioINFO
 * @return any
 */
function registro($email,$nombreUser){
    require('../bd/conexion.php');
    
    $errores = [];
  
    $nombreEvento =limpiar($_POST['nombreEvento']); 
    $cedulaEncargado =limpiar($_POST['cedulaEncargado']);
    $unidadAcademica = limpiar($_POST['unidadAcademica']);
    $descripcion =limpiar($_POST['descripcion']);
    $lugarEvento = limpiar($_POST['lugarEvento']);
    $fechaInicio = limpiar($_POST['fechaInicio']);
    $fechaFin = limpiar($_POST['fechaFin']);

    if(!isset($_POST['apoyoEvento'])){
        $errores[] = "Seleccione el tipo de apoyo que brinda el evento";
    }else { 
        $apoyoEvento = implode(', ', $_POST['apoyoEvento']);
    }
    if(!isset($_POST['proyeccion'])){
           
        $errores[] = "Seleccione la proyeccion del evento";
    } else {
        $proyeccion =limpiar($_POST['proyeccion']);
    }

    if(!isset($_POST['tipo'])){
           
        $errores[] = "Seleccione el tipo de evento que tiene";
    } else {
        $tipo = limpiar($_POST['tipo']);
    }

    
    if(!isset($_POST['alcance'])){

     $errores[] = "Seleccione el alcance del evento";
    } else {
        $alcance =limpiar($_POST['alcance']);
    }

     if(isset($_POST['inscripcionUTP'])) {
        $inscripcionUTP = checkBoxArray($_POST['inscripcionUTP']);
    } else {
        $inscripcionUTP = 0; 
    }
    
    if(isset($_POST['gastosViajeUTP'])) {
        $gastosViajeUTP = checkBoxArray($_POST['gastosViajeUTP']);
    } else {
        $gastosViajeUTP = 0; 
    }
    if(isset($_POST['apoyoEconomicoUTP'])) {
        $apoyoEconomicoUTP = checkBoxArray($_POST['apoyoEconomicoUTP']);
        } else {
        $apoyoEconomicoUTP = 0; 
    } 
    
    $montoInscripcion = limpiar($_POST['montoInscripcion']);
    $montoGastoViaje = limpiar($_POST['montoGastoViaje']);
    $montoApoyoEconomico = limpiar($_POST['montoApoyoEconomico']);
    $justificacionParticipacion = limpiar($_POST['justificacionParticipacion']);


    //Inicio del fileUpload
	$target_dir = "../pdf/";
	$target_file = $target_dir . basename($_FILES["rutaPDF"]["name"]);
	$uploadOk = 1;
	$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["rutaPDF"]["tmp_name"]);
	        if($check !== false) {
		        echo "File is a document - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        $errores[] = "File is not a document";
		        $uploadOk = 0;
		    }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $errores[] = "Sorry, file already exists.";
            $uploadOk = 0;
            }
		// Check file size
		if ($_FILES["rutaPDF"]["size"] > 500000) {
		    $errores[] = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($pdfFileType != "pdf") {
		    $errores[] = "Sorry, only PDF files are allowed.";
		    $uploadOk = 0;
        } 
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errores[] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["rutaPDF"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["rutaPDF"]["name"]). " has been uploaded.";
                echo $target_file;
            } else {
                $errores[] = "Sorry, there was an error uploading your file.";
            }
        }
    
    //Insercion de los datos a la BD
    $dec = $con -> prepare("INSERT INTO peticion (nombreEvento,cedulaEncargado,descripcion,proyeccion,alcance,lugarEvento,tipo,fechaIncio,fechaFin,apoyoEvento,inscripcionUTP,gastosViajeUTP,apoyoEconomicoUTP,montoInscripcion,montoGastoViaje,montoApoyoEconomico,justificacionParticipacion,rutaPDF, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $dec -> bind_param("ssssssssssiiidddsss", $nombreEvento,$cedulaEncargado,$descripcion,$proyeccion,$alcance,$lugarEvento,$tipo,$fechaInicio,$fechaFin,$apoyoEvento,$inscripcionUTP,$gastosViajeUTP,$apoyoEconomicoUTP,$montoInscripcion,$montoGastoViaje,$montoApoyoEconomico,$justificacionParticipacion,$target_file, "Pendiente");
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
  
        if($resultado == 1) {
            
            echo'Datos insertados exitosamente';
            $_SESSION['unidadAcademica'] = $unidadAcademica;

            $consultaRellenarCampos = "SELECT idPeticion FROM peticion ORDER BY idPeticion DESC LIMIT 1";

            $result = $con->query($consultaRellenarCampos);    
            $row1 = $result->fetch_assoc();
            $idPeticion = $row1["idPeticion"];

            $unidadAcademica = ' ';
            $unidadAcademica = $_SESSION['unidadAcademica'];
            $idUser = $_SESSION['idUser'];
            
            //Prueba rafa
            $sql3 = 
            "
            INSERT 
            INTO estudiante 
            (idPeticion, idUser, unidadAcademica) 
            VALUES ($idPeticion , $idUser, 'FISC');

            INSERT 
            INTO administrativo 
            (idUser, idPeticion, unidadEncargada) 
            VALUES 
            (6, $idPeticion, 'Vida Universitaria'),
            (7, $idPeticion, 'Comite Evaluador-Vicerrector Academico'),  
            (8, $idPeticion, 'Comite Evaluador-Secretario General'), 
            (9, $idPeticion, 'Comite Evaluador-Coodinador General de los Centros Regionales'), 
            (10, $idPeticion, 'Rectoria');
            
            UPDATE administrativo SET fechaActivacion=CURRENT_TIMESTAMP WHERE idUser=6 AND idPeticion=$idPeticion";
        
            if ($con->multi_query($sql3) === TRUE) {
                phpMailer($email, $nombreUser);
                header('Location: tracking.php');
            } else {
                echo "Error, no se pudieron insertar datos o redireccionar";
            } 

           

        } else {
            echo $con -> error; 
            $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';   
            echo 
            'nombreEvento='.$nombreEvento.'<br>',
            'cedulaEncargado='.$cedulaEncargado.'<br>',
            'descripcion='.$descripcion.'<br>',
            'proyeccion='.$proyeccion.'<br>',
            'alcance='.$alcance.'<br>',
            'lugarEvento='.$lugarEvento.'<br>',
            'tipo='.$tipo.'<br>',
            'fechaIncio='.$fechaInicio.'<br>',
            'fechaFin='.$fechaFin.'<br>',
            'apoyoEvento='.$apoyoEvento.'<br>',
            'inscripcionUTP='.$inscripcionUTP.'<br>',
            'gastosViajeUTP='.$gastosViajeUTP.'<br>',
            'apoyoEconomicoUTP='.$apoyoEconomicoUTP.'<br>',
            'montoInscripcion='.$montoInscripcion.'<br>',
            'montoGastoViaje='.$montoGastoViaje.'<br>',
            'montoApoyoEconomico='.$montoApoyoEconomico.'<br>',
            'justificacionParticipacion='.$justificacionParticipacion.'<br>',
            'target_file='.$target_file.'<br>';
            echo implode(', ', $_POST['apoyoEvento']);
        }
       
        $con -> close(); 
    return $errores;
}


    /**
     * Funcion para obtener el idPeticion
     */
    function EstudentidPeticion($idUser) {
        require_once('../bd/conexion.php'); 

        $dec = $con -> prepare("SELECT peticion.idPeticion FROM estudiante 
        INNER JOIN peticion ON estudiante.idPeticion = peticion.idPeticion 
        WHERE estudiante.idUser = ?  limit 1");
        $dec -> bind_param("i", $idUser); 
        $dec -> execute(); 

        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();

        if($cantidad == 1) {
           
            return $linea['idPeticion'];
        }
        $con -> close(); 
        
        return $linea['idPeticion'];

    }

    /**
     * Funcion para registrar reportes 
     * @return any
     */

     function registroReportes($idUser){ 
        require('../bd/conexion.php');
        
        $errores = [];

        $objetivoParticipacion =limpiar($_POST['objetivoParticipacion']); 
        $resultadosParticipacion =limpiar($_POST['resultadosParticipacion']); 
        $impactoCortoPlazo =limpiar($_POST['impactoCortoPlazo']); 
        $impactoMedioPlazo =limpiar($_POST['impactoMedioPlazo']); 
        $impactoLargoPlazo =limpiar($_POST['impactoLargoPlazo']); 

        //Inicio del fileUpload
        $target_dir = "../pdf/";
        $target_file = $target_dir . basename($_FILES["rutaPDF"]["name"]);
        $uploadOk = 1;
        $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["rutaPDF"]["tmp_name"]);
                if($check !== false) {
                    echo "File is a document - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $errores[] = "File is not a document";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $errores[] = "Sorry, file already exists.";
                $uploadOk = 0;
                }
            // Check file size
            if ($_FILES["rutaPDF"]["size"] > 500000) {
                $errores[] = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($pdfFileType != "pdf") {
                $errores[] = "Sorry, only PDF files are allowed.";
                $uploadOk = 0;
            } 
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $errores[] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["rutaPDF"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["rutaPDF"]["name"]). " has been uploaded.";
                    echo $target_file;
                } else {
                    $errores[] = "Sorry, there was an error uploading your file.";
                }
            }
        

        //Obtencion de idPeticion
            $idPeticion = EstudentidPeticion($idUser);

        //Insercion de los datos a la BD
        $dec = $con -> prepare("UPDATE peticion SET objetivoParticipacion = ? , logrosViaje = ?, logrosCortoPlazo = ?, logrosMedianoPlazo = ? ,LogrosLargoPlazo = ?, rutaReporte = ? WHERE (`idPeticion` = ?)");
        $dec -> bind_param("ssssssi",$objetivoParticipacion,$resultadosParticipacion, $impactoCortoPlazo, $impactoMedioPlazo, $impactoLargoPlazo, $target_file, $idPeticion);
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
      
            if($resultado == 1) {        
                echo'Datos insertados exitosamente';
            }
        $con -> close(); 

        return $errores;
     }
    /**
     *Funcion para validar la existencia de correo del usuario
     *@param con
     *@return any
     */
    function duplicacionCorrreo($con){
        $errores = []; 

        $email =limpiar($_POST['email']);
        
        $dec = $con -> prepare("SELECT correo FROM usuario WHERE correo like ? ");
        $dec -> bind_param("s", $email);
        $dec -> execute();

        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();
        
            if($_POST['email'] == $linea['correo']){
                $errores[] = 'El correo electronico no esta disponible.';
            }
        return $errores;
    }

/**
 * Funcion para concatenar caracteres de los checkbox en el formulario
 * @return arr 
 */
function checkBoxArray($campo) {   
        if($campo == ''){
           $cad = 0;}
           elseif($campo == '0'){
               $cad = 0;
           }
           elseif($campo == '1'){
               $cad = 1;
           }
       else{
        $cad = implode(', ', $campo);}
    return $cad;
}

/**
 * Funcion que limpia caracteres especiales en nuestros formularios
 * @param datos
 * @return datos
 * */
function limpiar($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

/**
 * Funcion para mostrar posibles erorres
 * @param errores
 * @return any
 */
function mostrarErrores($errores){ 
    $resultado = '<div class="alert alert-danger errores"><ul>';
    foreach($errores as $error) {
        $resultado .= '<li>'. htmlspecialchars($error). '</li>';
    }
    $resultado .= '</ul></div>';
    return $resultado;
}  
  /**
     * Funcion para generar csrf
     * @return ficha
     */
    function ficha_csrf() {
        $ficha = bin2hex(random_bytes(32));
        return $_SESSION['ficha'] = $ficha;
    }
    
    /**
     * Funcion para validar la ficha csrf
     *@param ficha
     *@return any
     */
    function validarFicha($ficha) {
        if(isset($_SESSION['ficha']) && hash_equals($_SESSION['ficha'], $ficha)) {
            unset($_SESSION['ficha']);
            return true;
        } else {
            return false;
        }
    }
     /**
     * Funcion para validar campos 
     *@param campos
     *@return any
     */
    function validarCampos ($campos) {
        $errores = []; 
        foreach($campos as $nombre => $mostrar) {
            if(!isset($_POST[$nombre]) || $_POST[$nombre] == null) {
                $errores[] = $mostrar. ' es un campo requerido.';
            } else { 
                $valides= campos();
                foreach($valides as $campo => $opcion){
                    if($nombre == $campo) {
                        if(!preg_match($opcion['patron'], $_POST[$nombre])) {
                            $errores[] = $opcion['error'];
                        }
                    }
                }
            }
        }
        return $errores;
    }
    /**
     *Funcion para validar escritura de los campos
     *@return any
     */
    function campos() {
        $validacion = [
            'nombre' => [
                'patron' => '/^[a-z\s]{2,50}$/i', 
                'error' => 'NOMBRES solo pueden usar letras y espacios. No puede ser mas largo de 50 caracteres.'
            ],
            'nombreEvento' => [
                'patron' => '/^[a-z\s]{2,50}$/i', 
                'error' => 'NOMBRE DEL EVENTO solo pueden usar letras y espacios. No puede ser mas largo de 50 caracteres.'
            ],
            'nombreEncargado' => [
                'patron' => '/^[a-z\s]{2,50}$/i', 
                'error' => 'NOMBRE DEL ENCARGADO solo pueden usar letras y espacios. No puede ser mas largo de 50 caracteres.'
            ],
           'clave' => [
                'patron' => '/(?=^[\w\!@#\$%\^&\*\?]{8,30}$)(?=(.*\d){2,})(?=(.*[a-z]){2,})(?=(.*[A-Z]){2,})(?=(.*[\!@#\$%\^&\*\?_]){2,})^-*/', 
                'error' => 'Por favor entre una contraseña valida. La contraseña debe tener por lo menos 2 letras mayuscula, 2 letras minusculas, 2 numeros y 2 simbolos.'
             ],
             'cedula-email'=> [
                'patron' => '/(?=^[a-z]+[\w@\.]{2,50}$)/i', 
                'error' => 'Email o Cedula invalido'
            ]
        ];
        return $validacion;
    }

  
     /**
     *Funcion hacer login en el sistema
     *@param con
     *@return any
     */
    function login() {

        require_once('../bd/conexion.php');
        $errores = []; 
        
        $usuario = limpiar($_POST['cedula-email']);
        $clave =limpiar($_POST['clave']);
        
        $dec = $con -> prepare("SELECT * FROM usuario WHERE cedula like ? OR correo like ? ");
        $dec -> bind_param("ss", $usuario, $usuario);
        $dec -> execute();

        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();
   

        if($cantidad == 1) {
            if(!empty($errores)){
                  return $errores;
            }
            if(password_verify($clave, $linea['contra'])){
                
                $_SESSION['cedula'] = $linea['cedula'];
                $_SESSION['nombre'] = $linea['nombre'];
                $_SESSION['apellido'] = $linea['apellido'];
                $_SESSION['correo'] = $linea['correo'];
                $_SESSION['idUser'] = $linea['idUser'];
                $_SESSION['sw'] = 1;
                header('Location: formulario.php');
            }
        } else {
            $errores[] = 'El Nombre de Usuario, Cedula o la contraseña no son validos.';       
        }

         return $errores;
    }

    function ControlAcceso($titulo)
    {
        /* 
        Tracking: Si tiene una solicitud en proceso **HARIA FALTA CREAR UN CAMPO LLAMADO fechaAceptacion PARA CUANDO LA PETICIÓN YA FUE ACEPTADA. SI ES NULL, PUEDE LLEVAR A TRACKING*
        Formulario: Si no tiene ninguna solicitud en proceso y la última fue hace más de 2 meses
        */

        $idUser = $_SESSION['idUser'];

        /* FUE NECESARIO HACER LA CONEXIÓN DE NUEVO PORQUE MANDABA ERROR CON LA VARIABLE */

        $dsn = 'mysql:dbname=b2vdjpobhtdchvq4s4ff;host=b2vdjpobhtdchvq4s4ff-mysql.services.clever-cloud.com';
        $dbuser = "ul0jkfxdb11tfmvi";
        $dbpass = "SG7R7X63pFXEdUK9ac2I";

        $conPDO2 = new PDO($dsn, $dbuser, $dbpass);

        //Consulta para comprobar si el usuario tiene que reportar su viaje. Si la fecha del evento es menor a la fecha actual le dice al estudiante que debe hacer el reporte.
        $consulta1 = $conPDO2->prepare("SELECT estudiante.idPeticion, peticion.estado, peticion.fechaFin
        FROM estudiante 
        INNER JOIN peticion ON estudiante.idPeticion = peticion.idPeticion 
        WHERE estudiante.idUser = $idUser
        ORDER BY estudiante.idPeticion DESC
        LIMIT 1");

        $consulta1->execute();
        $fila1 = $consulta1->fetch(); 
        $estado = $fila1['estado'];
        $fechaFin = strtotime($fila1['fechaFin']);

        $fechaActual = strtotime(date("Y-m-d", time()));

        if ($_SESSION["sw"]!=1){
            echo "<script> 
            alert('ERROR: Inicie Sesión') 
            window.location= '../index.php'
            </script>";}

       elseif ($_SESSION['idUser']!=6 && $_SESSION['idUser']!=7 && $_SESSION['idUser']!=8 && $_SESSION['idUser']!=9 && $_SESSION['idUser']!=10){     
        
            if (($titulo == "Formulario" || $titulo== "Seguimiento de la Solicitud") && $estado == 'Aceptado' && $fechaFin<$fechaActual){
                echo "<script>
                alert('ERROR: Su evento ha finalizado. Debe hacer el reporte de viaje') 
                window.location= './reporte.php'
                </script>";
            }
            elseif ($titulo == "Formulario" && ($estado=='Rechazado' || $estado=='Pendiente' || $estado='Aceptado')){
                echo "<script>
                alert('ERROR: Ya tiene una petición pendiente.') 
                window.location= './tracking.php'
                </script>";
            }
            elseif($titulo == "Reporte de viaje" && ($estado=='Rechazado' || $estado=='Pendiente' || $estado='Aceptado')){
                echo "<script>
                alert('ERROR: Aun no debe hacer el reporte de viaje.') 
                window.location= './tracking.php'
                </script>";
            }
            elseif(($titulo == "Reporte de viaje" || $titulo== "Seguimiento de la Solicitud") && $estado!=='Rechazado' && $estado!=='Pendiente' && $estado!=='Aceptado'){
                echo "<script>
                alert('ERROR: Por favor proceda a completar el formulario.') 
                window.location= './formulario.php'
                </script>";
            }
            elseif ($titulo !== "Formulario" && $titulo !== "Seguimiento de la Solicitud" && $titulo !== "Reporte de viaje"){

                if($estado=='Rechazado' || $estado=='Pendiente' || $estado='Aceptado'){
                    echo "<script>
                    alert('ERROR: Acceso denegado.') 
                    window.location= './tracking.php'
                    </script>"; 
                }elseif($estado == 'Aceptado' && $fechaFin<$fechaActual){
                    echo "<script>
                    alert('ERROR: Acceso denegado.') 
                    window.location= './reporte.php'
                    </script>";
                }
                elseif($estado!=='Rechazado' && $estado!=='Pendiente' && $estado!=='Aceptado'){
                    echo "<script>
                    alert('ERROR: Acceso denegado.') 
                    window.location= './formulario.php'
                    </script>";
                }
            }
        }       

        elseif ($_SESSION['idUser']==6 || $_SESSION['idUser']==7 ||$_SESSION['idUser']==8 || $_SESSION['idUser']==9 || $_SESSION['idUser']==10){ 

            if ($titulo !== "Revisión de solicitudes"){
                echo "<script>
                alert('ERROR: Acceso denegado') 
                window.location='./revisionSolicitudes.php'
                </script>";}
        }


    }   

?>