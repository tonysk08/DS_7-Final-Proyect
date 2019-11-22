<?php
include "conexion.php";

// Obtiene la variable de la URL
$cedula=$_GET['id'];

//consulta para eliminar registro
$eliminar = $conexion->prepare("DELETE FROM usuarios WHERE cedula = ?;");

$resultado=$eliminar->execute([$cedula]);


if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";

//Redirección
header('location: consulta_es.php');
?>