<?php

require_once('bd/conexion.php');

echo '<table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl">';
echo '<thead class="thead-dark"><tr><th>Cargo del Encargado</th><th>Nombre del Encargado</th><th>Fecha de Inicio</th><th>Fecha de Finalización</th><th>Estado</th><th class="fit">Detalles</th></tr></thead>';

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

try {
    $stmt = $con->prepare("SELECT idPeticion, cedulaEncargado, nombreEvento, descripcion, proyeccion, alcance, tipo, fechaIncio, fechaFin, apoyoEvento, inscripcionUTP, gastosViajeUTP, apoyoEconomicoUTP, montoInscripcion, montoGastoViaje, montoApoyoEconomico, justificacionParticipacion, rutaPDF, idUser FROM peticion")
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$con = null;
echo "</table>";





?>