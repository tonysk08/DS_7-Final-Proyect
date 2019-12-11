<!-- CSS DEL MENÚ -->
<link href="../css/menu.css" rel="stylesheet">

<!--Barra de navegación de usuario cliente-->
<nav class="navbar navbar-expand-sm bg-menuUTP navbar-dark sticky-top ">

<!-- Logo/Nombre de la página -->
<a class="navbar-brand" href="../php/landingPage.php">Sistema de Apoyo Económico Estudiantil</a>
<!--  -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item right">
    <?php if(isset($_SESSION['idUser'])){ ?>
        <a class="nav-link" href="../php/logout.php">Cerrar Sesión</a>
    <?php } else{ ?>
        <a class="nav-link" href="../index.php">Iniciar Sesión</a>
    <?php } ?>
        
    </li>
</ul>
</nav>