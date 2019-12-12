

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
    <?php include_once("../partials/head.php"); ?>
</head>
<body>
<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Validar</button>

</body>


</html>

<!-- Modal: modalPoll -->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Validación de la solicitud para atender al evento asdasdasd</h4>
   </div>
   <div class="modal-body">
    <form method="POST" id="insert_form">
     <label>idPeticion</label>
     <input type="text" name="idPeticion" id="idPeticion" class="form-control" />
     <br />
     <label>idUser</label>
     <input type="text" name="idUser" id="idUser" class="form-control" />
     <br />  
     <label>unidadAcademica</label>
     <input type="text" name="unidadAcademica" id="unidadAcademica" class="form-control" />
     <br />
     <input type="submit" name="insert" id="insert" value="Enviar respuesta" class="btn btn-success"/>
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
<!-- Modal: modalPoll -->

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#idPeticion').val() == "")  
  {  
   alert("Inserta el idPeticion");  
  }  
  else if($('#unidadAcademica').val() == '')  
  {  
   alert("unidadAcademica is required");  
  }  
  else if($('#idUser').val() == '')
  {  
   alert("idUser is required");  
  }
  else  
  {  
   $.ajax({  
    url:"pruebaFuncion.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Enviando respuesta...");  
    },  
    success:function(data){  
     $('#add_data_Modal .close').click();
     $('#insert_form')[0].reset();  
     location.reload();
    }  
   });  
  }  
 });

});  
 </script>