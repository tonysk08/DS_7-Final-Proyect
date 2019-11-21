<?php
//Desarrollado por Maycol Cuervo 20-14-3690
    $con = new mysqli('b2vdjpobhtdchvq4s4ff-mysql.services.clever-cloud.com', 'ul0jkfxdb11tfmvi', 'SG7R7X63pFXEdUK9ac2I','b2vdjpobhtdchvq4s4ff');

    if($con -> connect_error) {
        die('Error de conexion '. $con -> connect_error);
    } /*else {
        echo 'Conexion exitosa';
    }*/
?>