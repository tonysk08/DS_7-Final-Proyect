<?php

    //pensado para leer archivos que tienen partes del formulario para incluir
    //estas partes se pueden escribir todas de golpe.
    class Extras{

        //funcion que retorna el header del formulario
       function Head(){
           
            $fp = fopen("../partialsText/header.txt", "r");
            $header = null;

            while(!feof($fp)) {

                $header=$header.fgets($fp);  

            }
            fclose($fp);

            return $header;
       }
       function Head2(){
           
        $fp = fopen("../partialsText/header2.txt", "r");
        $header = null;

        while(!feof($fp)) {

            $header=$header.fgets($fp);  

        }
        fclose($fp);

        return $header;
   }
    }
    
?>