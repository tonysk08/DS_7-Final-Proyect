<?php
    $servername = "b2vdjpobhtdchvq4s4ff-mysql.services.clever-cloud.com";
    $username = "ul0jkfxdb11tfmvi";
    $password = "SG7R7X63pFXEdUK9ac2I";
    
    $conPDO  = new PDO("mysql:host=$servername;dbname=b2vdjpobhtdchvq4s4ff", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

?>