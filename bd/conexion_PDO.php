<?php
    $dsn = 'mysql:dbname=b2vdjpobhtdchvq4s4ff;host=b2vdjpobhtdchvq4s4ff-mysql.services.clever-cloud.com';
    $dbuser = "ul0jkfxdb11tfmvi";
    $dbpass = "SG7R7X63pFXEdUK9ac2I";

    $conPDO = new PDO($dsn, $dbuser, $dbpass);
    //$conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $dbh = new PDO($dsn, $dbuser, $dbpass);
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>