<?php

/**
 * Funcion para registrar usuarios 
 * @param  formularioINFO
 * @return any
 */
function registro($idUser){
    require_once('bd/conexion.php');
    $nombreEvento =limpiar($_POST['nombreEvento']); 
    $cedulaEncargado =limpiar($_POST['cedulaEncargado']);
    $descripcion =limpiar($_POST['descripcion']);
    $proyeccion =limpiar($_POST['proyeccion']);
    $alcance =limpiar($_POST['alcance']);
    $tipo = limpiar($_POST['tipo']);
    $fechaInicio = limpiar($_POST['fechaInicio']);
    $fechaFin = limpiar($_POST['fechaFin']);
    $apoyoEvento = limpiar($_POST['apoyoEvento']);
    $inscripcionUTP = limpiar($_POST['inscripcionUTP']);
    $gastosViajeUTP = limpiar($_POST['gastosViajeUTP']);
    $apoyoEconomicoUTP = limpiar($_POST['apoyoEconomicoUTP']);
    $montoInscripcion = limpiar($_POST['montoInscripcion']);
    $montoGastoViaje = limpiar($_POST['montoGastoViaje']);
    $montoApoyoEconomico = limpiar($_POST['montoApoyoEconomico']);
    $justificacionParticipacion = limpiar($_POST['justificacionParticipacion']);
    $rutaPDF =limpiar($_POST['rutaPDF']);

    //Insercion de los datos a la BD
    $dec = $con -> prepare("INSERT INTO peticion (nombreEvento,cedulaEncargado,descripcion,proyeccion,alcance,tipo,fechaInicio,fechaFin, apoyoEvento,inscripcionUTP,gastosViajeUTP,apoyoEconomicoUTP,montoInscripcion,montoGastoViaje,montoApoyoEconomico,justificacionParticipacion,rutaPDF,idUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $dec -> bind_param("sssssssssiiidddssi", $nombre,$cedulaEncargado,$descripcion,$proyeccion,$alcance,$tipo,$fechaInicio,$fechaFin,$apoyoEvento,$inscripcionUTP,$gastosViajeUTP,$apoyoEconomicoUTP,$montoInscripcion,$montoGastoViaje,$montoApoyoEconomico,$justificacionParticipacion,$rutaPDF,$idUser);
    $dec -> execute();
    $resultado = $dec -> affected_rows;
    $dec -> free_result();
    $dec -> close();
    $con -> close(); 

    if($resultado == 1) {
        echo'Datos insertados exitosamente';
        /*
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        //phpMailer($email, $usuario);
        */
    } else {
        $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';
    }
    return $errores;
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
             'clave' => [
                'patron' => '/(?=^[\w\!@#\$%\^&\*\?]{8,30}$)(?=(.*\d){2,})(?=(.*[a-z]){2,})(?=(.*[A-Z]){2,})(?=(.*[\!@#\$%\^&\*\?_]){2,})^-*/', 
                'error' => 'Por favor entre una contraseña valida. La contraseña debe tener por lo menos 2 letras mayuscula, 2 letras minusculas, 2 numeros y 2 simbolos.'
             ],
             'cedula-email' => [
                'patron' => '/(?=^[a-z]+[\w@\.]{2,50}$)/i', 
                'error' => 'Nombre de Usuario o Cedula Electronico invalido'
            ]
        ];
        return $validacion;
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
     *Funcion hacer login en el sistema
     *@param con
     *@return any
     */
    function login() {

        require_once('bd/conexion.php');
        $errores = []; 
        
        $usuario =limpiar($_POST['cedula-email']);
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
            if(password_verify($clave, $linea['clave'])){
                $_SESSION['cedula'] = $linea['cedula'];
                $_SESSION['nombre'] = $linea['nombre'];
                echo("FUNCIONA");
                header('Location: formulario.php');
            }
        } else {
            $errores[] = 'El Nombre de Usuario, Cedula o la contraseña no son validos.';       
        }

         return $errores;
    }

?>