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
    $con = require_once('../bd/conexion.php');
    
    $errores = [];
    //$errores= duplicacionCorrreo($con);  ESTA LINEA SE DEBE USAR CUANDO SE VA A INSERTAR UN NUEVO CORREO EN ALGUN REGISTRO DE USUARIO, PARA LLAMAR A LA FUNCION DE VALIDAR LO DE CORREO

    $nombreEvento =limpiar($_POST['nombreEvento']); 
    $cedulaEncargado =limpiar($_POST['cedulaEncargado']);
    $descripcion =limpiar($_POST['descripcion']);
    $proyeccion =limpiar($_POST['proyeccion']);
    $alcance =limpiar($_POST['alcance']);
    $lugarEvento = limpiar($_POST['lugarEvento']);
    $tipo = limpiar($_POST['tipo']);
    $fechaInicio = limpiar($_POST['fechaInicio']);
    $fechaFin = limpiar($_POST['fechaFin']);
    $apoyoEvento = checkBoxArray($_POST['apoyoEvento']);
    $inscripcionUTP = checkBoxArray($_POST['inscripcionUTP']);
    $gastosViajeUTP = checkBoxArray($_POST['gastosViajeUTP']);
    $apoyoEconomicoUTP = checkBoxArray($_POST['apoyoEconomicoUTP']);
    $montoInscripcion = limpiar($_POST['montoInscripcion']);
    $montoGastoViaje = limpiar($_POST['montoGastoViaje']);
    $montoApoyoEconomico = limpiar($_POST['montoApoyoEconomico']);
    $justificacionParticipacion = limpiar($_POST['justificacionParticipacion']);
    $ultimaParticipacion = limpiar($_POST['ultimaParticipacion']);
    $rutaPDF =limpiar($_POST['rutaPDF']);
    
    //Insercion de los datos a la BD

    if($con !== null) {
        $dec = $con -> prepare("INSERT INTO peticion (nombreEvento,cedulaEncargado,descripcion,proyeccion,alcance,lugarEvento,tipo,fechaIncio,fechaFin,apoyoEvento,inscripcionUTP,gastosViajeUTP,apoyoEconomicoUTP,montoInscripcion,montoGastoViaje,montoApoyoEconomico,justificacionParticipacion,ultimaParticipacion,rutaPDF,idUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $dec -> bind_param("ssssssssssiiidddsssi", $nombreEvento,$cedulaEncargado,$descripcion,$proyeccion,$alcance,$lugarEvento,$tipo,$fechaInicio,$fechaFin,$apoyoEvento,$inscripcionUTP,$gastosViajeUTP,$apoyoEconomicoUTP,$montoInscripcion,$montoGastoViaje,$montoApoyoEconomico,$justificacionParticipacion,$ultimaParticipacion,$rutaPDF,$idUser);
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
        $con -> close(); 
        
        if($resultado == 1) {
            echo'Datos insertados exitosamente';
            header('Location: tracking.php');
            //phpMailer($email, $usuario);
        } else {
            $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';
        }
    } else {
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
    $arr = explode('|', $cad);
    return $arr;
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

?>