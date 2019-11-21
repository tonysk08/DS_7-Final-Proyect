<?php
$titulo = "ERROR";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Créditos</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?? "SAEE"?></title>
    <link href="../css/creditos.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    
    <link href="../css/all.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link href="../css/fontawesome.min.css" rel="stylesheet">

    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
   
    <link href="../bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="../bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="../ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--SE ESTÁ UTILIZANDO EL NAV DE solicitudesPublicas-->
    <!--Incluye el nav-->
    <?php include_once("../partials/navigationpublic.php"); ?>



    <div class="container">
        <h1 class="titulo-pagina">Opps!, hubo algun error desconocido, contactese con servicio al cliente para mas informacion.</h1>
     </div>     
</section>

<?php include_once("../partials/footer.php"); ?>
    
</body>
</html>