<?php
    session_start();
    $titulo="Seguimiento de la Solicitud";

    include "../bd/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?php include_once("../partials/head.php"); ?>

      <!--CSS de tablas para ajustar los botones-->
    <link href="../css/tablas.css" rel="stylesheet">
    

    <!--CSS del menú-->
    <link href="../css/menu.css" rel="stylesheet" type="text/css" />
    <link href="../css/general.css" rel="stylesheet">
</head>
<body>
        <!--Incluye el header-->
        <?php include_once("../partials/header.php"); ?>

<div class="col-md-12">

<h2 class="my-4 dark-grey-text font-weight-bold">Seguimiento de la Solicitud</h2>

<!-- <div class="card">
  <div class="card-body table-responsive ">
    <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Name
          </th>
          <th>Position
          </th>
          <th>Office
          </th>
          <th>Age
          </th>
          <th>Start date
          </th>
          <th>Salary
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tiger Nixon</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
        </tr>
        <tr>
          <td>Garrett Winters</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>63</td>
          <td>2011/07/25</td>
          <td>$170,750</td>
        </tr>
        <tr>
          <td>Ashton Cox</td>
          <td>Junior Technical Author</td>
          <td>San Francisco</td>
          <td>66</td>
          <td>2009/01/12</td>
          <td>$86,000</td>
        </tr>
        <tr>
          <td>Cedric Kelly</td>
          <td>Senior Javascript Developer</td>
          <td>Edinburgh</td>
          <td>22</td>
          <td>2012/03/29</td>
          <td>$433,060</td>
        </tr>
        <tr>
          <td>Airi Satou</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>33</td>
          <td>2008/11/28</td>
          <td>$162,700</td>
        </tr>
        <tr>
          <td>Brielle Williamson</td>
          <td>Integration Specialist</td>
          <td>New York</td>
          <td>61</td>
          <td>2012/12/02</td>
          <td>$372,000</td>
        </tr>
        <tr>
          <td>Herrod Chandler</td>
          <td>Sales Assistant</td>
          <td>San Francisco</td>
          <td>59</td>
          <td>2012/08/06</td>
          <td>$137,500</td>
        </tr>
        <tr>
          <td>Rhona Davidson</td>
          <td>Integration Specialist</td>
          <td>Tokyo</td>
          <td>55</td>
          <td>2010/10/14</td>
          <td>$327,900</td>
        </tr>
        <tr>
          <td>Colleen Hurst</td>
          <td>Javascript Developer</td>
          <td>San Francisco</td>
          <td>39</td>
          <td>2009/09/15</td>
          <td>$205,500</td>
        </tr>
        <tr>
          <td>Sonya Frost</td>
          <td>Software Engineer</td>
          <td>Edinburgh</td>
          <td>23</td>
          <td>2008/12/13</td>
          <td>$103,600</td>
        </tr>
        <tr>
          <td>Jena Gaines</td>
          <td>Office Manager</td>
          <td>London</td>
          <td>30</td>
          <td>2008/12/19</td>
          <td>$90,560</td>
        </tr>
        <tr>
          <td>Quinn Flynn</td>
          <td>Support Lead</td>
          <td>Edinburgh</td>
          <td>22</td>
          <td>2013/03/03</td>
          <td>$342,000</td>
        </tr>
        <tr>
          <td>Charde Marshall</td>
          <td>Regional Director</td>
          <td>San Francisco</td>
          <td>36</td>
          <td>2008/10/16</td>
          <td>$470,600</td>
        </tr>
        <tr>
          <td>Haley Kennedy</td>
          <td>Senior Marketing Designer</td>
          <td>London</td>
          <td>43</td>
          <td>2012/12/18</td>
          <td>$313,500</td>
        </tr>
        <tr>
          <td>Tatyana Fitzpatrick</td>
          <td>Regional Director</td>
          <td>London</td>
          <td>19</td>
          <td>2010/03/17</td>
          <td>$385,750</td>
        </tr>
        <tr>
          <td>Michael Silva</td>
          <td>Marketing Designer</td>
          <td>London</td>
          <td>66</td>
          <td>2012/11/27</td>
          <td>$198,500</td>
        </tr>
        <tr>
          <td>Paul Byrd</td>
          <td>Chief Financial Officer (CFO)</td>
          <td>New York</td>
          <td>64</td>
          <td>2010/06/09</td>
          <td>$725,000</td>
        </tr>
        <tr>
          <td>Gloria Little</td>
          <td>Systems Administrator</td>
          <td>New York</td>
          <td>59</td>
          <td>2009/04/10</td>
          <td>$237,500</td>
        </tr>
        <tr>
          <td>Bradley Greer</td>
          <td>Software Engineer</td>
          <td>London</td>
          <td>41</td>
          <td>2012/10/13</td>
          <td>$132,000</td>
        </tr>
        <tr>
          <td>Dai Rios</td>
          <td>Personnel Lead</td>
          <td>Edinburgh</td>
          <td>35</td>
          <td>2012/09/26</td>
          <td>$217,500</td>
        </tr>
        <tr>
          <td>Jenette Caldwell</td>
          <td>Development Lead</td>
          <td>New York</td>
          <td>30</td>
          <td>2011/09/03</td>
          <td>$345,000</td>
        </tr>
        <tr>
          <td>Yuri Berry</td>
          <td>Chief Marketing Officer (CMO)</td>
          <td>New York</td>
          <td>40</td>
          <td>2009/06/25</td>
          <td>$675,000</td>
        </tr>
        <tr>
          <td>Caesar Vance</td>
          <td>Pre-Sales Support</td>
          <td>New York</td>
          <td>21</td>
          <td>2011/12/12</td>
          <td>$106,450</td>
        </tr>
        <tr>
          <td>Doris Wilder</td>
          <td>Sales Assistant</td>
          <td>Sidney</td>
          <td>23</td>
          <td>2010/09/20</td>
          <td>$85,600</td>
        </tr>
        <tr>
          <td>Angelica Ramos</td>
          <td>Chief Executive Officer (CEO)</td>
          <td>London</td>
          <td>47</td>
          <td>2009/10/09</td>
          <td>$1,200,000</td>
        </tr>
        <tr>
          <td>Gavin Joyce</td>
          <td>Developer</td>
          <td>Edinburgh</td>
          <td>42</td>
          <td>2010/12/22</td>
          <td>$92,575</td>
        </tr>
        <tr>
          <td>Jennifer Chang</td>
          <td>Regional Director</td>
          <td>Singapore</td>
          <td>28</td>
          <td>2010/11/14</td>
          <td>$357,650</td>
        </tr>
        <tr>
          <td>Brenden Wagner</td>
          <td>Software Engineer</td>
          <td>San Francisco</td>
          <td>28</td>
          <td>2011/06/07</td>
          <td>$206,850</td>
        </tr>
        <tr>
          <td>Fiona Green</td>
          <td>Chief Operating Officer (COO)</td>
          <td>San Francisco</td>
          <td>48</td>
          <td>2010/03/11</td>
          <td>$850,000</td>
        </tr>
        <tr>
          <td>Shou Itou</td>
          <td>Regional Marketing</td>
          <td>Tokyo</td>
          <td>20</td>
          <td>2011/08/14</td>
          <td>$163,000</td>
        </tr>
        <tr>
          <td>Michelle House</td>
          <td>Integration Specialist</td>
          <td>Sidney</td>
          <td>37</td>
          <td>2011/06/02</td>
          <td>$95,400</td>
        </tr>
        <tr>
          <td>Suki Burks</td>
          <td>Developer</td>
          <td>London</td>
          <td>53</td>
          <td>2009/10/22</td>
          <td>$114,500</td>
        </tr>
        <tr>
          <td>Prescott Bartlett</td>
          <td>Technical Author</td>
          <td>London</td>
          <td>27</td>
          <td>2011/05/07</td>
          <td>$145,000</td>
        </tr>
        <tr>
          <td>Gavin Cortez</td>
          <td>Team Leader</td>
          <td>San Francisco</td>
          <td>22</td>
          <td>2008/10/26</td>
          <td>$235,500</td>
        </tr>
        <tr>
          <td>Martena Mccray</td>
          <td>Post-Sales support</td>
          <td>Edinburgh</td>
          <td>46</td>
          <td>2011/03/09</td>
          <td>$324,050</td>
        </tr>
        <tr>
          <td>Unity Butler</td>
          <td>Marketing Designer</td>
          <td>San Francisco</td>
          <td>47</td>
          <td>2009/12/09</td>
          <td>$85,675</td>
        </tr>
        <tr>
          <td>Howard Hatfield</td>
          <td>Office Manager</td>
          <td>San Francisco</td>
          <td>51</td>
          <td>2008/12/16</td>
          <td>$164,500</td>
        </tr>
        <tr>
          <td>Hope Fuentes</td>
          <td>Secretary</td>
          <td>San Francisco</td>
          <td>41</td>
          <td>2010/02/12</td>
          <td>$109,850</td>
        </tr>
        <tr>
          <td>Vivian Harrell</td>
          <td>Financial Controller</td>
          <td>San Francisco</td>
          <td>62</td>
          <td>2009/02/14</td>
          <td>$452,500</td>
        </tr>
        <tr>
          <td>Timothy Mooney</td>
          <td>Office Manager</td>
          <td>London</td>
          <td>37</td>
          <td>2008/12/11</td>
          <td>$136,200</td>
        </tr>
        <tr>
          <td>Jackson Bradshaw</td>
          <td>Director</td>
          <td>New York</td>
          <td>65</td>
          <td>2008/09/26</td>
          <td>$645,750</td>
        </tr>
        <tr>
          <td>Olivia Liang</td>
          <td>Support Engineer</td>
          <td>Singapore</td>
          <td>64</td>
          <td>2011/02/03</td>
          <td>$234,500</td>
        </tr>
        <tr>
          <td>Bruno Nash</td>
          <td>Software Engineer</td>
          <td>London</td>
          <td>38</td>
          <td>2011/05/03</td>
          <td>$163,500</td>
        </tr>
        <tr>
          <td>Sakura Yamamoto</td>
          <td>Support Engineer</td>
          <td>Tokyo</td>
          <td>37</td>
          <td>2009/08/19</td>
          <td>$139,575</td>
        </tr>
        <tr>
          <td>Thor Walton</td>
          <td>Developer</td>
          <td>New York</td>
          <td>61</td>
          <td>2013/08/11</td>
          <td>$98,540</td>
        </tr>
        <tr>
          <td>Finn Camacho</td>
          <td>Support Engineer</td>
          <td>San Francisco</td>
          <td>47</td>
          <td>2009/07/07</td>
          <td>$87,500</td>
        </tr>
        <tr>
          <td>Serge Baldwin</td>
          <td>Data Coordinator</td>
          <td>Singapore</td>
          <td>64</td>
          <td>2012/04/09</td>
          <td>$138,575</td>
        </tr>
        <tr>
          <td>Zenaida Frank</td>
          <td>Software Engineer</td>
          <td>New York</td>
          <td>63</td>
          <td>2010/01/04</td>
          <td>$125,250</td>
        </tr>
        <tr>
          <td>Zorita Serrano</td>
          <td>Software Engineer</td>
          <td>San Francisco</td>
          <td>56</td>
          <td>2012/06/01</td>
          <td>$115,000</td>
        </tr>
        <tr>
          <td>Jennifer Acosta</td>
          <td>Junior Javascript Developer</td>
          <td>Edinburgh</td>
          <td>43</td>
          <td>2013/02/01</td>
          <td>$75,650</td>
        </tr>
        <tr>
          <td>Cara Stevens</td>
          <td>Sales Assistant</td>
          <td>New York</td>
          <td>46</td>
          <td>2011/12/06</td>
          <td>$145,600</td>
        </tr>
        <tr>
          <td>Hermione Butler</td>
          <td>Regional Director</td>
          <td>London</td>
          <td>47</td>
          <td>2011/03/21</td>
          <td>$356,250</td>
        </tr>
        <tr>
          <td>Lael Greer</td>
          <td>Systems Administrator</td>
          <td>London</td>
          <td>21</td>
          <td>2009/02/27</td>
          <td>$103,500</td>
        </tr>
        <tr>
          <td>Jonas Alexander</td>
          <td>Developer</td>
          <td>San Francisco</td>
          <td>30</td>
          <td>2010/07/14</td>
          <td>$86,500</td>
        </tr>
        <tr>
          <td>Shad Decker</td>
          <td>Regional Director</td>
          <td>Edinburgh</td>
          <td>51</td>
          <td>2008/11/13</td>
          <td>$183,000</td>
        </tr>
        <tr>
          <td>Michael Bruce</td>
          <td>Javascript Developer</td>
          <td>Singapore</td>
          <td>29</td>
          <td>2011/06/27</td>
          <td>$183,000</td>
        </tr>
        <tr>
          <td>Donna Snider</td>
          <td>Customer Support</td>
          <td>New York</td>
          <td>27</td>
          <td>2011/01/25</td>
          <td>$112,000</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Name
          </th>
          <th>Position
          </th>
          <th>Office
          </th>
          <th>Age
          </th>
          <th>Start date
          </th>
          <th>Salary
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
</div> -->

<?php


    //Asignamos el idUser guardado en la sesión a una variable
     $idUser = $_SESSION['idUser'];


    $sql = "SELECT estudiante.idPeticion, peticion.nombreEvento FROM estudiante INNER JOIN peticion ON estudiante.idPeticion = peticion.idPeticion WHERE estudiante.idUser = $idUser";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        $idPeticion = $row1["idPeticion"];
        $nombreEvento = $row1["nombreEvento"];
    

    
    //Hacemos una consulta para recibir el ultimo formulario de ese id

    // FETCH_ASSOC
        $consulta1 = "SELECT administrativo.idUser, administrativo.unidadEncargada, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombreAdministrativo, DATE_FORMAT(administrativo.fechaActivacion, '%d/%m/%Y') as fechaActivacion, DATE_FORMAT(administrativo.fechaFin, '%d/%m/%Y') as fechaFin, administrativo.estado AS estado, administrativo.comentario FROM administrativo INNER JOIN usuario ON administrativo.idUser = usuario.idUser WHERE administrativo.idPeticion = $idPeticion";
        $consulta = $con->query($consulta1);
    

        if ($consulta->num_rows > 0) {
            echo "
            <div class='card'>
            <div class='card-body table-responsive'>
            <table id='dtMaterialDesignExample' class='table table-bordered table-hover table-responsive-lg table-sm track_tbl' cellspacing='0' width='100%'>
            <thead class='thead-dark'>
                <tr>
                    <th class='pl-2'>Unidad Encargada</th>
                    <th class='pl-2'>Nombre del Encargado</th>
                    <th class='pl-2'>Fecha de Recibimiento</th>
                    <th class='pl-2'>Fecha de Resolución</th>
                    <th class='pl-2'>Estado</th>
                    <th class='fit pl-2'>Detalles</th>
                </tr>
            </thead>
            <tbody>
            ";
            // output data of each row
            while($fila = $consulta->fetch_assoc()) {

                if($fila["fechaActivacion"] === NULL)
                {
                    $fechaActivacion = "Aún no recibe el documento";
                }
                else{
                    $fechaActivacion = $fila["fechaActivacion"];
                }

                if($fila["fechaFin"] === NULL)
                {
                    $fechaFin = "Aún no finaliza su decisión";
                }
                else{
                    $fechaFin = $fila["fechaFin"];
                }

                if(($fila["estado"] === NULL) and $fila["fechaActivacion"] != NULL)
                {
                    $estado = " id='Estado' class='alert-primary pl-2'>Recibido";
                    $estadoTexto = "Recibido";
                }
                else if($fila["estado"] === "Si"){
                    $estado = " id='Estado' class='alert-success pl-2'>Aprobado";
                    $estadoTexto = "Aprobado";
                }
                else if($fila["estado"] === "No")
                {
                    $estado = " id='Estado' class='alert-danger pl-2'>Denegado";
                    $estadoTexto = "Denegado";
                }
                else{
                    $estado = " id='Estado' class='alert-warning pl-2'>Pendiente";
                    $estadoTexto = "Pendiente";
                }

                if($fila["nombreAdministrativo"] === NULL){
                    $nombreAdministrativo = "- - - - - - - - - - - - - -";
                }
                else{
                    $nombreAdministrativo = $fila["nombreAdministrativo"];
                }

                if($fila["comentario"] === NULL){
                    $comentario = "Sin comentarios de momento";
                }
                else{
                    $comentario = $fila["comentario"];
                }

                echo "
                <tr>
                <td class='pl-2'>".$fila["unidadEncargada"]."</td>
                <td class='pl-2'>".$nombreAdministrativo."</td>
                <td class='pl-2'>".$fechaActivacion."</td>
                <td class='pl-2'>".$fechaFin."</td>
                <td ".$estado."</td>
                <td id='MasDetalles' class='text-center'><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal".$fila["idUser"]."'>Detalles</button></td>
                </tr>";

                echo "<div class='modal' id='myModal".$fila["idUser"]."'>
                <div class='modal-dialog modal-dialog-centered modal-xl'>
                <div class='modal-content'>
            
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'><u>Solicitud de apoyo económico para ".$nombreEvento."    </u></h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class='modal-body'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-4'>
                                    <h6>Unidad Encagada</h6>
                                    <p>".$fila["unidadEncargada"]."</p>
                                </div>
                                <div class='col-sm-4'>
                                    <h6>Nombre del encargado</h6>
                                    <p>".$nombreAdministrativo."</p>
                                </div>
                                <div class='col-sm-2'>
                                    <h6>Fecha de Resolución</h6>
                                    <p>".$fechaFin."</p>
                                </div>
                                <div class='col-sm-2'>
                                    <h6>Estado</h6>
                                    <p>".$estadoTexto."</p>
                                </div>
                            </div>
                            <div  class=' form-group shadow-textarea'>
                                <h6><label for='comment'>Comentario:</label></h6>
                                <p>".$comentario."</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Modal footer -->
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                    </div>
            
                </div>
                </div>
            </div>";

            }
            echo "
            </tbody>
            <tfoot class='thead-dark''>
            <tr>
                <th class='pl-2'>Unidad Encargada</th>
                <th class='pl-2'>Nombre del Encargado</th>
                <th class='pl-2'>Fecha de Recibimiento</th>
                <th class='pl-2'>Fecha de Resolución</th>
                <th class='pl-2'>Estado</th>
                <th class='fit pl-2'>Detalles</th>
            </tr>
            </tfoot>
            </table>
            </div>
            </div>
            ";

        } else {
            echo "No hay ninguna petición creada hasta ahora. Error 101.   ";
        }

    }else {
        echo "No hay ninguna petición creada hasta ahora. Error 102.     ";

        $consultaRellenarCampos = "SELECT idPeticion FROM peticion ORDER BY idPeticion DESC LIMIT 1";

        $result = $con->query($consultaRellenarCampos);    
        $row1 = $result->fetch_assoc();
        $idPeticion = $row1["idPeticion"];

        
        $unidadAcademica = $_SESSION['unidadAcademica'];
        $idUser = $_SESSION['idUser'];

        $fechaActivacion = date('Y/m/d');
        
         //Prueba rafa
        $sql3 = 
        "
        INSERT 
        INTO estudiante 
        (idPeticion, idUser, unidadAcademica) 
        VALUES ($idPeticion , $idUser, 'FISC');

        INSERT 
        INTO administrativo 
        (idUser, idPeticion, unidadEncargada) 
        VALUES 
        (6, $idPeticion, 'Vida Universitaria'),
        (7, $idPeticion, 'Comite Evaluador-Vicerrector Academico'),  
        (8, $idPeticion, 'Comite Evaluador-Secretario General'), 
        (9, $idPeticion, 'Comite Evaluador-Coodinador General de los Centros Regionales'), 
        (10, $idPeticion, 'Rectoria');
        
        UPDATE administrativo SET fechaActivacion=CURRENT_TIMESTAMP WHERE idUser=6 AND idPeticion=$idPeticion";
    
        if ($con->multi_query($sql3) === TRUE) {
            echo "Filas creadas y actualizadas correctamente";
            header('Location: tracking.php');
        } else {
        echo "Error: " . $sql3 . "<br>" . $con->error;
        } 
    }


    ?>

</div>
    <!--Incluye el footer-->
    <?php include_once("../partials/footer.php"); ?>
    <?php include_once("../partials/tablas.php"); ?>
  </body>

</html>