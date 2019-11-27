<?php

//Desarrollado por Maycol Cuervo 20-14-3690
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * Funcion para enviar correos
 */
function phpMailer($email, $usuario) {
    require_once('vendor/PHPMailer/src/Exception.php');
    require_once('vendor/PHPMailer/src/PHPMailer.php');
    require_once('vendor/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);
    try{
        //server del correo
        $mail -> SMTPDebug = 2;
        $mail -> isSMTP();
        $mail -> Host='in-v3.mailjet.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = '833b051aa3ca5aa16b55cca33f85975d';
        $mail -> Password = '2ba4dd4b58b87667e5bd22a653c9b344';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;
        //Usuario
        $mail -> setFrom('macuervo84@gmail.com', 'Sistema de Solicitud de Apoyo Económico Estudiantil UTP');
        $mail -> addAddress($email, $usuario);
        //Contenido
        $mail -> isHTML(true);
        $mail -> Subject = 'Prueba de SAEE UTP';
        $mail -> Body =  'Se ha registrado su solicitud de apoyo economico estudiantil</b>';
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
function registro($idUser,$email,$usuario){
    require('../bd/conexion.php');
    
    $errores = [];
  
    $nombreEvento =limpiar($_POST['nombreEvento']); 
    $cedulaEncargado =limpiar($_POST['cedulaEncargado']);
    $unidadAcademica = limpiar($_POST['unidadAcademica']);
    $descripcion =limpiar($_POST['descripcion']);
    $proyeccion =limpiar($_POST['proyeccion']);
    $alcance =limpiar($_POST['alcance']);
    $lugarEvento = limpiar($_POST['lugarEvento']);
    $tipo = limpiar($_POST['tipo']);
    $fechaInicio = limpiar($_POST['fechaInicio']);
    $fechaFin = limpiar($_POST['fechaFin']);
    $apoyoEvento = checkBoxArray($_POST['apoyoEvento']); 
    
    if(isset($_POST['inscripcionUTP'])) {
        $inscripcionUTP = checkBoxArray($_POST['inscripcionUTP']);
    } else {
        $inscripcionUTP = 0; 
    }
    if(isset($_POST['inscripcionUTP'])) {
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
    $ultimaParticipacion = limpiar($_POST['ultimaParticipacion']);

    //Inicio del fileUpload
	$target_dir = "pdf/";
	$target_file = $target_dir.basename($_FILES["rutaPDF"]["name"]);
	$uploadOk = 1;
	$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["rutaPDF"]["tmp_name"]);
	        if($check !== false) {
		        echo "File is a document - ".$check["mime"].".";
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
                echo "The file ".basename( $_FILES["rutaPDF"]["name"])." has been uploaded.";
            } else {
                $errores[] = "Sorry, there was an error uploading your file.";
            }
        }
    
    //fin del fileUpload
    
    //Insercion de los datos a la BD

   if($con){

    $dec = $con -> prepare("INSERT INTO peticion (nombreEvento,cedulaEncargado,descripcion,proyeccion,alcance,lugarEvento,tipo,fechaIncio,fechaFin,apoyoEvento,inscripcionUTP,gastosViajeUTP,apoyoEconomicoUTP,montoInscripcion,montoGastoViaje,montoApoyoEconomico,justificacionParticipacion,ultimaParticipacion,rutaPDF,idUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $dec -> bind_param("ssssssssssiiidddsssi", $nombreEvento,$cedulaEncargado,$descripcion,$proyeccion,$alcance,$lugarEvento,$tipo,$fechaInicio,$fechaFin,$apoyoEvento,$inscripcionUTP,$gastosViajeUTP,$apoyoEconomicoUTP,$montoInscripcion,$montoGastoViaje,$montoApoyoEconomico,$justificacionParticipacion,$ultimaParticipacion,$target_file,$idUser);
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
       /*  $con -> close();  */
        
        if($resultado == 1) {
            echo'Datos insertados exitosamente';
            header('Location: tracking.php');
            phpMailer($email, $usuario);
        } else {
            $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';
        }
    }else {
        $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';
    }
    
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
   if(isset($_POST['btn-enviar'])){
       if($campo == ''){
           $campo = 0;
       }
    $cad = '';
    foreach($campo as $cadena) {
        $s = ',';
        if($cad == '') {
            $cad = $cadena;
                } else  {
                $cad .= $s.$cadena;
                }
            }
        }
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
                $errores[] = $mostrar. ' Es un campo requerido.';
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
            'descripcion' => [
                'patron' => '/^[a-z\s]{2,350}$/i', 
                'error' => 'LA DESCRIPCION solo pueden usar letras y espacios. No puede ser mas largo de 350 caracteres.'
            ],
           'clave' => [
                'patron' => '/(?=^[\w\!@#\$%\^&\*\?]{8,30}$)(?=(.*\d){2,})(?=(.*[a-z]){2,})(?=(.*[A-Z]){2,})(?=(.*[\!@#\$%\^&\*\?_]){2,})^-*/', 
                'error' => 'Por favor entre una contraseña valida. La contraseña debe tener por lo menos 2 letras mayuscula, 2 letras minusculas, 2 numeros y 2 simbolos.'
             ],
             'cedula-email'=> [
                'patron' => '/(?=^[a-z]+[\w@\.]{2,50}$)/i', 
                'error' => 'Nombre de Usuario o Cedula invalido'
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

        require_once('bd/conexion.php');
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
                header('Location: php/formulario.php');
            }
        } else {
            $errores[] = 'El Nombre de Usuario, Cedula o la contraseña no son validos.';       
        }

         return $errores;
    }

    function creacionDatos($idUser) {
        
    require('../bd/conexion.php');    
    $unidadAcademica = limpiar($_POST['unidadAcademica']);

    //Consulta para captar el idPeticion que se acaba de crear
    $consultaRellenarCampos = "SELECT idPeticion FROM peticion ORDER BY idPeticion DESC LIMIT 1";

    $result = $con->query($consultaRellenarCampos);    
    $row1 = $result->fetch_assoc();
    $idPeticion = $row1["idPeticion"];

    //Llamada al procedimiento almacenado FieldsCreationAfterForm
    //Llamada al comando procedimiento almacenado

    $sql = 
    "INSERT 
    INTO administrativo 
    (idUser, idPeticion, unidadEncargada) 
    VALUES 
    (6, $idPeticion, 'Vida Universitaria'), 
    (7, $idPeticion, 'Comite Evaluador-Vicerrector Academico'),  
    (8, $idPeticion, 'Comite Evaluador-Secretario General'), 
    (9, $idPeticion, 'Comite Evaluador-Coodinador General de los Centros Regionales'), 
    (10, $idPeticion, 'Rectoria')
    
    INSERT 
    INTO estudiante 
    (idPeticion, idUser, unidadAcademica) 
    VALUES ($idPeticion , $idUser, $unidadAcademica)";

    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        $errores = "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    //-Fin de Llamada al procedimiento almacenado FieldsCreationAfterForm

    return $errores;

}

    

?>