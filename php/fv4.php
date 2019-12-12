<?php
    function GenerarPDF($idPeticion, $nombre,$apellido,$unidadAcademica,$fechaInicioSolicitud,$nombreEvento,$cedulaEncargado,$descripcion,$proyeccion,$alcance,$lugarEvento,$tipo,$fechaInicio,$fechaFin,$apoyoEvento,$inscripcionUTP,$gastosViajeUTP,$apoyoEconomicoUTP,$montoInscripcion,$montoGastoViaje,$montoApoyoEconomico,$justificacionParticipacion)
    {
        require('../fpdf/fpdf.php');
        require('extras.php');
        
        // Clase pensada para incluir partes repetitivas del formulario footer,header, etc
        $defaults = new Extras();

        class pdf extends FPDF
        {
            //Cabecera del documento que se mostrara en cada pagina en caso de que sea una o mas 
            function Header()
            {
                $defaults = new Extras();

                $this->Image('../img/logo_utp.jpg',8,8,20);
                // Select Arial bold 14
                $this->SetFont('Arial','B',10);
                // Move to the right
                $this->Cell(80);
                // Framed title
                $this->Cell(0,0,'RUTP-FV-4',0,0,'R');
                $this->Ln(12);
                $this->MultiCell(0,5,utf8_decode($defaults->Head()),0,'C');
                $this->Ln(5);
                $this->Cell(0,0,'',1,0,'C');
                $this->Ln(5);
            }
        }
        $pdf = new pdf('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Times','b',11);
    
        //cuerpo del formulario
        $pdf->SetFont('Times','',12);
        $pdf->Ln(5);
        //ID DE LA SOLICITUD
        $pdf->Cell(100,0,utf8_decode('SOLICITUD N°:'.$idPeticion),0,0,'l');
        $pdf->Cell(0,0,utf8_decode('FECHA DE LA SOLICITUD:'.$fechaInicioSolicitud),0,0,'r');
        $pdf->Ln(10);
        $pdf->SetFont('Times','b',12);
        $pdf->Cell(0,0,utf8_decode('INFORMACIÓN DE LOS ESTUDIANTES: '),0,0,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Ln(10);
       
        //Informaciond del o los estudiantes que recibiran la ayuda con su NOMBRE , CEDULA Y UNIDAD ACADEMICA
        $pdf->Cell(0,0,utf8_decode('NOMBRE:'.$nombre.$apellido.'     CÉDULA:'.$cedulaEncargado.'     UNIDAD ACADÉMICA:'.$unidadAcademica),0,0,'L');
        $pdf->Ln(5);
        //NOMBRE DEL EVENTO en el que se desea participar
        $pdf->MultiCell(0,8,utf8_decode('EVENTO EN EL QUE SE DESEA PARTICIPAR:'.$nombreEvento),0,'L');
        $pdf->Ln(3);
        $pdf->SetFont('Times','b',12);
        $pdf->Cell(0,0,utf8_decode('DESCRIPCION DEL EVENTO:'),0,0,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Ln(10);
        $pdf->MultiCell(0,0,utf8_decode($descripcion),0,'L');
        $pdf->Ln(10);
        //CALIFICACION DEL EVENTO
        $pdf->cell(0,0,utf8_decode('TIPO DE EVENTO:   '.$tipo),0,0,'L');   
        $pdf->Ln(8);
        //ALCANCE DEL EVENTO segun el solicitante
        $pdf->cell(90,0,utf8_decode('ALCANCE DEL EVENTO:   '.$alcance),0,0,'c');
        //lUGAR  del evento pais, provincia, etc
        $pdf->cell(90,0,utf8_decode('ESPECIFIQUE LUGAR:   '.$lugarEvento),0,0,'R');
        $pdf->Ln(8);
        //PROYECCION  que piensa tiene el evento
        $pdf->cell(0,0,utf8_decode('PROYECCIÓN DE LA INSTITUCIÓN A TRAVÉS DEL EVENTO:    '.$proyeccion),0,0,'L');
        $pdf->Ln(8);
        //FECHA DE INICIO Y FINAL DEL EVENTO
        $pdf->cell(100,0,utf8_decode('FECHA DE LA PARTICIPACIÓN EN EL EVENTO: '),0,0,'L');
        $pdf->cell(50,0,utf8_decode('INICIO:'.$fechaInicio),0,0,'L');
        $pdf->cell(0,0,utf8_decode('FINAL:'.$fechaFin),0,0,'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times','b',12);
        //APOYO OFCRECIDO POR LOS ORGANIZADORES 
        $pdf->cell(0,0,utf8_decode('APOYO OFRECIDO POR ORGANIZADORES O PATROCINADORES DEL EVENTO:'),0,0,'L');
        $pdf->SetFont('Times','',12);
        $pdf->Ln(8);
        $pdf->cell(0,0,utf8_decode($apoyoEvento),0,0,'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times','b',12);
        //APOYO SOLICITADO A LA UTP
        $pdf->cell(0,0,utf8_decode('APOYO SOLICITADO A LA UTP:'),0,0,'L');
        $pdf->SetFont('Times','',12);
        $pdf->Ln(8);
        $pdf->cell(95,0,utf8_decode('INSCRIPCIÓN: (MONTO: $'.$montoInscripcion.')'),0,0,'L');
        $pdf->cell(0,0,utf8_decode('GASTOS DE VIAJE: (MONTO: $'.$montoGastoViaje.')'),0,0,'C');
        $pdf->Ln(8);
        $pdf->cell(0,0,utf8_decode('APOYO ECONÓMICO PARCIAL: (MONTO: $'.$montoApoyoEconomico.')'),0,0,'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times','b',12);
        //JUSTIFICAION DE LA PARTICIPACION DESCRIPCION
        $pdf->cell(0,0,utf8_decode('JUSTIFICACIÓN Y BENEFICIOS DE LA PARTICIPACIÓN:'),0,0,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Ln(4);
        $pdf->SetFont('Times','U',12);
        //descripcion
        $pdf->MultiCell(0,5,utf8_decode($justificacionParticipacion),0,'L'); 
        $pdf->Ln(8);
        //$pdf-> output('formulario'.$nombre.$apellido.'.pdf', 'I');
        //para guardar en el servidor
        $pdf->output('../pdf/RUTP-FV-4/formulario'.$idPeticion.'.pdf','F');
    }
?>