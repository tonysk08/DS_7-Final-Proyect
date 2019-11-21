<?php
    session_start();
    require_once('funciones/funciones.php');
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['ficha']) && validarFicha ($_POST['ficha'])){
    
      //Validar si la informacion es enviada por un robot
      if(!empty($_POST['robot'])) {
        return header('Location: error.php');
      }
      
      $campos = [
        'cedula-email' => 'Nombre de Usuario o Cedula Electronico',
        'clave' => 'Contraseña'
      ];
      
      $errores = validarCampos($campos);
  
      if(empty($errores)) {
        $errores = login();
      }
    }
    $titulo="Login";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/estilo.css" rel="stylesheet">

    <script src="ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <title>Sistema de Solicitud de Apoyo Económico Estudiantil UTP</title>
  </head>

  <body class="cuerpo">
    <section class="login-block">
      <div class="container">
        <div class="row">
          <div class="col-md-4 login-sec">
        
              
              <h2 class="text-center">Iniciar Sesión</h2>
              <?php	if(!empty($errores)){echo mostrarErrores($errores);}?>
              <form method ="POST" class="login-form">
              <input type="hidden" name="ficha" value="<?php echo ficha_csrf()?>">  
              <input type="hidden" name="robot" value="">  
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-uppercase">Cédula del Estudiante</label>
                  <input type="text" class="form-control" name="cedula-email"  value="<?php echo $_POST['cedula-email'] ?? '' ?>" placeholder="Ingrese su cedula o su correo">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
                  <input type="password" class="form-control" name="clave" placeholder="Ingrese su contraseña">
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    <small>Recordarme</small>
                  </label>
                  <button type="submit" class="btn btn-login float-right">Iniciar Sesión</button><br><br> 
                </div>
              </form>
               <div class="copy-text"><a href="html-clone/creditos.php">Creado por <i class="fa fa-bug"></i> MARHA <i class="fa fa-bug"></i></a></div>
          </div>
         
          <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="img/avion.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                      <h2>Sistema de Apoyo Económico Estudiantil</h2>
                      <p align="justify">Los estudiantes interesados en participar en eventos culturales y deportivos (nacionales e internacionales) deberán presentar ante el Secretario de Vida Universitaria, la solicitud de apoyo dispuesta en el formulario RUTP-FV-4, con al menos dos meses y medio de anticipación a la fecha de inicio de la actividad.</p>
                      <a href="http://www.utp.ac.pa/documentos/2014/doc/RUTP-FV-4"><button type="button" class="btn btn-info">Más información</button></a>
                    </div>  
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/avion.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                      <h2>Transparencia</h2>
                      <p align="justify">Contamos con un registro de todas las solicitudes realizadas que cualquier persona puede ver</p>
                      <a href="html/solicitudesPublicas.html"><button type="button" class="btn btn-info">Más información</button></a>
                    </div>  
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/avion.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                      <h2>Créditos</h2>
                      <p align="justify">Este proyecto ha sido creado por estudiantes de la Universidad Tecnológica de Panamá, de la Facultad en Ingeniería en Sistemas Computaciones</p>
                      <a href="html-clone\creditos.php"><button type="button" class="btn btn-info">Más información</button></a>
                    </div>  
                  </div>
                </div>
              </div>               
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include "include/footer.php"; ?>
    
</body>

</html>