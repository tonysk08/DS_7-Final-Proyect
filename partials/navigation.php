<!--Barra de navegación de usuario cliente-->
<nav class="navbar navbar-expand-sm bg-menuUTP navbar-dark sticky-top ">

<!-- Logo/Nombre de la página -->
<a class="navbar-brand" href="#">Sistema de Apoyo Económico Estudiantil</a>

<!-- Enlaces -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="formulario.php">Formulario RUTP-FV-4</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tracking.html">Solicitud Pendiente</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../html-clone/creditos.php">Créditos</a>
    </li>
</ul>
<?php 
    if($titulo=='')
?>
<!--  -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item right">
        <a class="nav-link" href="../index.php">Cerrar Sesión</a>
    </li>
</ul>
</nav>