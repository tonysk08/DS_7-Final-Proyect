<?php
session_start();
include "../bd/conexion_PDO.php";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
//Consulta
try {
    $stmt = $conPDO->prepare("SELECT idPeticion, cedulaEncargado, nombreEvento, fechaIncio, fechaFin, lugarEvento FROM peticion");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v){
        echo $v;
    } 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";

//Inserción
/*try {
    $nombre="Hector";
    $apellido="Quintero";
    $correo="hectorq9826@gmail.com";
    $contra="123456";
    $cedula="8938263";

    $stmt = $conPDO->prepare("INSERT INTO usuario
    (nombre, apellido, correo, cedula, contra) 
    VALUES(:nombre,:apellido,:correo,:cedula,:contra)");

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':contra', $contra);

    if($stmt->execute()){
        echo "Datos guardados.";
    }else{
        echo "No se guardo.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}*/
?>