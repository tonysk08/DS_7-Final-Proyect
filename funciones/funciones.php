<?php

/**
 * Funcion para registrar usuarios 
 * @param  userInfo
 * @return any
 */
function registro(){
    require_once('BD/conexion.php');
    //Declaracion de variables
    $errores= duplicacionCorrreo( $con); 

    if(!empty($errores)){ 
        return $errores;
    }
    $nombre =limpiar($_POST['nombre']); q
    $apellido =limpiar($_POST['apellido']);
    $cedula =limpiar($_POST['cedula']);
    $unidadAcademica =limpiar($_POST['unidadAcademica']);
    $descripcionEvento =limpiar($_POST['descripcionEvento']);
    $tipoEvento = limpiar($_POST['tipo']);
    $alcanceEvento =limpiar($_POST['alcance']);
    $proyeccion =limpiar($_POST['proyeccion']);




    //Insercion de los datos a la BD
    $dec = $con -> prepare("INSERT INTO usuario (nombre,apellido,usuario,clave,correo,foto) VALUES (?,?,?,?,?,?)");
    $dec -> bind_param("ssssss", $nombre, $apellido,$usuario,password_hash($clave, PASSWORD_DEFAULT),$email,$target_file);
    $dec -> execute();
    $resultado = $dec -> affected_rows;
    $dec -> free_result();
    $dec -> close();
    $con -> close(); 

    if($resultado == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        phpMailer($email, $usuario);
    } else {
        $errores[] = 'Oops!, hubo algun error en el registro, intente de nuevo';
    }
    return $errores;
}
    

?>