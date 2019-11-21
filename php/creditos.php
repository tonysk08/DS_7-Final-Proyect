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


<section>
    <div class="container">
      <div class="row">
          
          
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/maicol.jpeg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Maycol Cuervo<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/antonio.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Antonio Sarmiento<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"> <i class="fa fa-twitter-square"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/rafael.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Rafael Pérez<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
                <p class="mt-3 w-100 float-left text-center"><strong></strong></p>
        </div>
        
        <div class="col-md-4">
            <div class="card profile-card-1">
                <img src="../img/hoja.jpg" alt="profile-sample1" class="background"/>
                <img src="../img/hector.jpg" alt="profile-image" class="profile"/>
                    <div class="card-content">
                    <h2>Héctor Quintero<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
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
                    <h2>Alexis Calderón<small>Engineer</small></h3>
                    <div class="icon-block"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
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