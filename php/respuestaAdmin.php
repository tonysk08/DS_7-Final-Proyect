<?php
require_once("../bd/conexion_PDO.php");

if(!empty($_POST))
{
    echo "Se logró conectar";
    $Relevancia = $_POST["selectRelevancia"];  
    $Proyeccion =$_POST["selectProyeccion"];  
    $Estado = $_POST["selectEstado"];  
    $Justificacion = $_POST["comentarioAdministrador"];  
    $idPeticion = $_POST["idPeticion"];  
    $idUsuario = $_POST["idUsuario"];  

    $stmt = $conPDO->prepare("UPDATE administrativo
    SET relevancia='$Relevancia', proyeccion='$Proyeccion', estado='$Estado', comentario='$Justificacion', fechaFin=CURRENT_TIMESTAMP()
    WHERE idPeticion = $idPeticion AND idUser = $idUsuario");

    $stmt->execute();

}
else{
    echo "ERROR!";
}
?>