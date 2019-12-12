<?php
    $nombre='antonio Sarmiento';
    $cedula='xx-xxxx-xxxx';
    $fecha='yyyy/mm/dd';
    $monto=100;
    $pais='Pais';
    $nombreMison='mision1';
    $objetivo='objetivo';
    $resultado='result';
    $corto='corto plazo';
    $mediano='meidano plazo';
    $largo='largo plazo';

    require('../fpdf/fpdf.php');
    require('extras.php');

    $defaults = new Extras();

        class pdf extends FPDF
        {
            //Cabecera del documento que se mostrara en cada pagina en caso de que sea una o mas 
            function Header()
            {
                $defaults = new Extras();

                $this->Image('../img/logo_utp.jpg',8,8,20);
                // Select Arial bold 14
                $this->SetFont('Arial','B',14);
                // Framed title
                $this->MultiCell(0,5,utf8_decode($defaults->Head2()),0,'C');
                $this->Ln(6);
                $this->Cell(0,0,'',1,0,'C');
                $this->Ln(5);
            }
        }
        $pdf = new pdf('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $pdf->Cell(90,0,utf8_decode('NOMBRE:'.$nombre),0,0,'L');
        $pdf->Cell(0,0,utf8_decode('CEDULA:'.$cedula),0,0,'L');
        $pdf->Ln(8);
        $pdf->Cell(90,0,utf8_decode('Fecha de la mision  Inicio:'.$fecha),0,0,'L');
        $pdf->Cell(50,0,utf8_decode('Final:'.$fecha),0,0,'L');
        $pdf->Ln(8);
        $pdf->Cell(90,0,utf8_decode('Monto: $'.$monto),0,0,'L');
        $pdf->Cell(50,0,utf8_decode('Pais:'.$pais),0,0,'L');
        $pdf->Ln(8);
        $pdf->Cell(50,0,utf8_decode('Mision:'.$nombreMison),0,0,'L');
        $pdf->Ln(10);
        $pdf->Cell(0,8,utf8_decode('Informacion Sustantiva'),1,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(50,40,utf8_decode('Objetivo de la participacion:'),1,0,'C');
        $pdf->MultiCell(0,5,utf8_decode($objetivo),0,'L');
        $pdf->Ln(37);
        $pdf->MultiCell(0,15,utf8_decode('Resultado (valor agregado en el desempeño de su cargo): '),1,'C');
        $pdf->Ln(5);
        $pdf->MultiCell(0,5,utf8_decode($resultado),0,'L');
        $pdf->Ln(8);
        $pdf->MultiCell(0,15,utf8_decode('Impacto en las funciones bajo su responsabilidad sera: '),1,'C');
        $pdf->Ln(2);
        $pdf->MultiCell(50,15,utf8_decode('Corto Plazo:'),0,'L');
        $pdf->MultiCell(0,3,utf8_decode($corto),0,'L');
        $pdf->MultiCell(50,15,utf8_decode('Mediano Plazo:'),0,'L');
        $pdf->MultiCell(0,3,utf8_decode($mediano),0,'L');
        $pdf->MultiCell(50,15,utf8_decode('Largo Plazo:'),0,'L');
        $pdf->MultiCell(0,3,utf8_decode($mediano),0,'L');
        $pdf->Ln(20);
        $pdf->Cell(90,0,utf8_decode('Presentado por:'.$nombre),0,0,'c');
        $pdf->Cell(90,0,utf8_decode('Fecha:'.$fecha),0,0,'c');
        $pdf-> output('ReporteDeViaje.pdf', 'I');
        $pdf->output('../pdf/ReporteViaje/informeViaje'.$cedula.'.pdf','F');
?>