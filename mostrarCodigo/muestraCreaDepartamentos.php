<?php

/* 
 * Author: Sonia Antón Llanes
 * Created on: 04-noviembre-2021
 * Script para la crear base de datos con tablas necesarias y el usuario de esa base de datos
 */

    /*highlight_file() - muestra el codigo del fichero al que hacemos referencia*/
    
    echo "<h2>Script CrearDepartamento: </h2>";
    highlight_file('../scriptDB/creaDAW219DBDepartamentos.sql');
    
    echo'<p>---------------------------------------------------*****---------------------------------------------------</p>';
    
    echo "<h2>Script CargaInicialDepartamento: </h2>";
    highlight_file('../scriptDB/cargaInicialDAW219DBDepartamentos.sql');
    
    echo'<p>---------------------------------------------------*****---------------------------------------------------</p>';
    
    echo "<h2>Script BorrarDepartamento: </h2>";
    highlight_file('../scriptDB/cargaInicialDAW219DBDepartamentos.sql');
    
?>