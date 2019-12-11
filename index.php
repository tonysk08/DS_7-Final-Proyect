<?php
    $titulo="Sistema de Solicitud de Apoyo Económico Estudiantil UTP";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $titulo ?? "SAEE"?></title>

  <!-- CSS del Landing Page -->
  <link href="./css/landingPage.css" rel="stylesheet" type="text/css" />
  <!-- CSS DEL MENÚ -->
  <link href="./css/menu.css" rel="stylesheet">
  <!-- CSS para el footer (entre otras cosas) -->
  <link href="./css/all.min.css" rel="stylesheet">  

  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS  -->
  <link rel="stylesheet" href="./bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Material Design Bootstrap  -->
  <link rel="stylesheet" href="./css/mdb.min.css">

</head>
<body>
<header class="titulo text-center pt-2 pb-2">
    <h1>
      <img align="float-left" src="./img/utplogo.png" alt="Logo" class="responsive" width="100" height="100">
      <span> Sistema de Solicitud de Apoyo Económico Estudiantil UTP</span>
    </h1>
</header>

<!--Barra de navegación de usuario cliente-->
<nav class="navbar navbar-expand-sm bg-menuUTP navbar-dark sticky-top">
  <!-- Logo/Nombre de la página -->
  <a class="navbar-brand" href="./index.php">Sistema de Apoyo Económico Estudiantil</a>
  <!--  -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item right">
    <?php if(isset($_SESSION['idUser'])){ ?>
      <a class="nav-link" href="./php/logout.php">Cerrar Sesión</a>
    <?php } else{ ?>
     <a class="nav-link" href="./php/login.php">Iniciar Sesión</a>
    <?php } ?>

    </li>
  </ul>
</nav>

<div class="accordion">
  <ul>
    <li><a href="./php/login.php">
      <div>
        <h1>Iniciar Sesión</h1>
        <p>Ingresa a la plataforma para realizar tu solicitud de apoyo economico.</p>
      </div>
      </a> </li>
    <li><a href="./php/solicitudesPublicas.php">
      <div>
        <h1>Transparencia</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      </a> </li>
    <li><a href="./php/dashboard.php">
      <div>
        <h1>Dashboard</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      </a> </li>
  </ul>
</div>
</div>

<!-- Footer -->
<footer class="bg-dark">

  <!-- Copyright -->
  <div class="row py-2">
    <div class="col-sm-1 text-center">
      <img src="./img/logo.png" width="100px" height="100px"></img>
    </div>
    <div class="footer-copyright text-center py-3 col-sm-10 white-text">© 2019 Copyright:</br>
      <span>Universidad Tecnológica de Panamá - Todos los derechos reservados <br>Creado por <i class="fa fa-bug"></i> MARHA <i class="fa fa-bug"></i></span>
    </div>
    <div class="col-sm-1 text-center">
      <img src="./img/logo_fisc.png" width="100px" height="100px"></img>
    </div>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>