<?php
require_once("../bd/conexion_PDO.php");

if(!empty($_POST))
{
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

    if($idUsuario == 6 && $Estado == 'Si'){
        $consulta1 = $conPDO->prepare("UPDATE administrativo SET fechaActivacion=CURRENT_TIMESTAMP WHERE (idUser=7 OR idUser=8 OR idUser=9) AND idPeticion=$idPeticion");
        $consulta1->execute();
    }elseif(($idUsuario == 7 && $Estado == 'Si') || ($idUsuario == 8 && $Estado == 'Si')|| ($idUsuario == 9 && $Estado == 'Si')){
        $consulta2 = $conPDO->prepare("UPDATE administrativo SET fechaActivacion=CURRENT_TIMESTAMP WHERE idUser=10 AND idPeticion=$idPeticion");
        $consulta2->execute();
    }elseif($idUsuario == 10 && $Estado == 'Si'){
        $consulta3 = $conPDO->prepare("UPDATE peticion SET fechaFinSolicitud=CURRENT_TIMESTAMP, estado='Aprobado' WHERE idPeticion=$idPeticion");
        $consulta3->execute();
    }elseif($idUsuario == 10 && $Estado == 'No'){
        $consulta4 = $conPDO->prepare("UPDATE peticion SET fechaFinSolicitud=CURRENT_TIMESTAMP, estado='Denegado' WHERE idPeticion=$idPeticion");
        $consulta4->execute();
    }else if($idUsuario == 6 && $Estado == 'No'){
        $consulta5 = $conPDO->prepare("UPDATE peticion SET fechaFinSolicitud=CURRENT_TIMESTAMP, estado='Denegado' WHERE idPeticion=$idPeticion");
        $consulta5->execute();
    }

}
else{
    echo "ERROR!";
}
?>