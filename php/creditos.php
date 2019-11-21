<?php

    $titulo="Creditos"
?>

<!DOCTYPE html>
<html>

<head>
    <!--Incluye el head-->
    <?php include_once("../partials/head.php"); ?>
    <title><?php echo $titulo ?? "SAEE"?></title>
    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/creditos.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/all.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link href="../css/fontawesome.min.css" rel="stylesheet"> 


    
</head>
<body>
    <!--Incluye el header-->
    <?php include_once("../partials/header.php"); ?>

    <!--SE ESTÁ UTILIZANDO EL NAV DE solicitudesPublicas-->
    <!--Incluye el nav-->
    <?php include_once("../partials/navigationpublic.php"); ?>


<section>
    <div class="container">
      <div class="row">
          
          
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/maicol.jpeg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Maycol Cuervo<small>Junior Developer</small></h3>
                    <div class="icon-block"></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/antonio.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Antonio Sarmiento<small>Junior Developer, Senior Dancer</small></h3>
                    <div class="icon-block"></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/rafael.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Rafael Pérez<small>Newbie</small></h3>
                    <div class="icon-block"></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/hector.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Héctor Quintero<small>Sick junior developer</small></h3>
                    <div class="icon-block"></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>

        <!-- <div class="col-md-4"></div> -->

        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/alexis.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Alexis Calderón<small>Just Alexis</small></h3>
                    <div class="icon-block"></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
      </div>
    </div>
    
</section>

<?php include_once("../partials/footer.php"); ?>
    
</body>
</html>