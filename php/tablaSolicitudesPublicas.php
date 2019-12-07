
    <div class="p-5 mt-n3">
    <h3 class="mt-5">Transparencia - Solicitudes del 2019</h3>
    <table class="table table-bordered table-hover table-responsive-lg table-sm track_tbl mt-3">
        <thead class="thead-dark  my-auto">
            <tr>
                <th>No.</th>
                <th>Evento</th>
                <th>Fecha de Resolución</th>
                <th>Nombres de los estudiantes</th>
                <th>País de destino</th>
                <th>Estado de la resolución</th>
                <th class="fit">Detalles</th> <!--Añadir las cédulas en los detalles. Aquí solo se muestra el reporte de viaje-->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="NoResolucion">1</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">21/10/2019</td>
                <td id="NombresEstudiantes">20-24-3998</td>
                <td id="PaisDestino">España</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">2</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">22/10/2019</td>
                <td id="NombresEstudiantes">20-14-3698</td>
                <td id="PaisDestino">Brazil</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">3</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">23/11/2019</td>
                <td id="NombresEstudiantes">8-935-1097</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
            <tr>
                <td id="NoResolucion">4</td>
                <td id="NombreEvento">Congreso mundial de Python 2019</td>
                <td id="FechaResolucion">23/11/2019</td>
                <td id="NombresEstudiantes">8-935-1097</td>
                <td id="PaisDestino">Estados Unidos</td>
                <td id="EstadoResolucion" class="alert-success">Aprobado</td>
                <td id="MasDetalles" class="text-center"><button type="button" class="btn btn-info">Detalles</button></td>
            </tr>
        </tbody>
    </table>

    <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><u>Solicitud de apoyo económico para IBM Think 2019</u></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nombre del estudiante encargado</h6>
                                <p>Rafael Pérez</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Cédula del estudiante encargado</h6>
                                <p>20-24-3998</p>
                            </div>
                            <div class="col-sm-6">
                                <h6>Unidad Académica</h6>
                                <p>Facultad de Ingeniería de Sistemas Computacionales</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nombre del evento</h6>
                                <p>IBM Think 2019</p>
                            </div>
                            <div class="col-sm-2">
                                <h6>Tipo de evento</h6>
                                <p>Cultural</p>
                            </div>
                            <div class="col-sm-6">
                                <h6>Descripción del evento</h6>
                                <p>IBM Think es una conferencia que se centra en soluciones movilidad, cloud computing, seguridad, inteligencia artificial, machine learning e inteligencia artificial. El objetivo de la edición de este año es ayudar a las empresas a construir «compañías  digitales  verdaderamente cognitivas y orientadas al cliente».</p>
                            </div>
                        </div>
                        <div  class=" form-group shadow-textarea">
                            <h6><label for="comment">Comentario:</label></h6>
                            <textarea class="form-control z-depth-1" rows="5" id="comment">Considero que el estudiante cumple con todos los requisitos pertinentes. Por tanto, apruebo esta solicitud.</textarea>
                        </div>
                    </div>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
        
            </div>
            </div>
        </div>
        </div>