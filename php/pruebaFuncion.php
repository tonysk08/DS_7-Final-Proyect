<?php
//insert.php  
require_once("../bd/conexion_PDO.php");

if(!empty($_POST))
{
    echo "Se logró conectar";
    $idPeticion = $_POST["idPeticion"];  
    $idUser =$_POST["idUser"];  
    $unidadAcademica = $_POST["unidadAcademica"];  
    mysqli_query($connect, $query);
    $sql0 = $conPDO->prepare(" INSERT INTO estudiante (idPeticion, idUser, unidadAcademica)  
    VALUES('$idPeticion', '$idUser', '$unidadAcademica')");
    $sql0->execute();


/*   echo '<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Modal Success</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
            ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
            ab officiis totam.</p>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1 text-white"></i></a>
        <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>'; */
}
else{
    echo "ERROR!";
}
?>