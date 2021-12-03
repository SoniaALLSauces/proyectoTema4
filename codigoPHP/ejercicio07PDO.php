<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sonia Anton Llanes - Ejercicio 07</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto DAW2">
        <meta name="keywords" content="">
        <link href="../webroot/css/estiloej.css" rel="stylesheet" type="text/css">
        <link href="../webroot/images/mariposa_vintage.png" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <style>
            p{padding-top: 20px;}
            .span{font-size: 1.5rem;}
        </style>
    </head>
    <body>
        
        <h2 class="centrado">Ejercicio 07. IMPORTAR</h2> 
        <h2 class="centrado" style="color:black">Página que toma datos de un fichero xml
            y los añade a la tabla Departamento de nuestra base de datos.</h2>
        
        <div>

            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 16-noviembre-2021
             * Ejercicio 07. IMPORTAR: Página web que toma datos (código y descripción) de un fichero xml 
             *    y los añade a la tabla Departamento de nuestra base de datos. 
             *    El fichero importado se encuentra en el directorio .../tmp/ del servidor.
            */
            
                           
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';
                    
                /* Compruebo que existe el archivo desde el que importar */
                    $archivoXML = '../tmp/departamento.xml';
                        if (file_exists($archivoXML)) {
                            $xml = simplexml_load_file($archivoXML);
                        } else {
                            exit("<p>Error al intentar abrir el fichero  $archivoXML</p>");
                        }
                    
                    
                /* try..catch con PDOException para establecer conexión y controlar errores */
                    try {  //Código que se realiza si todo es correcto           
                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                        
                        
                        
                        
                        
                        
                        
                        /* INSERT: CONSULTA PREPARADA: recorremos todos los registros de la tabla que queremos exportar */
                            $sqlConsulta = <<<EOD
                                        SELECT * FROM Departamento;
                                        EOD;
                            $consulta = $miDB -> prepare($sqlConsulta);  //preparo la consulta que devuelve un objeto PDOStatement
                            $consulta -> execute();             //ejecuto la consulta
                        
                        /* CREACIÓN DOCUMENTO XML */
                            $documentoXML = new DOMDocument("1.0","utf-8");   //creo un objeto de la clase DOMDocument, pasandole como parámetros versión y en que código lo guardamos
                            $documentoXML -> formatOutput = true;  //damos formato a la salida
                                       
                        /*Creamos los elementos del archivo, sabiendo que debe contener el archivo XML*/
                            $departamentos = $documentoXML ->createElement('departamentos');  //creo elemento XML principal
                            $departamentos = $documentoXML ->appendChild($departamentos);     //appendChild() -> le indicamos donde añado el hijo
                            //$departamentos = $documentoXML -> appendChild ( $documentoXML->createElement('departamentos') );  =>se podria enlazar en una sola línea
                            
                            /*ForEach para recorrer la tabla y crear cada departamento usando la consulta sql anterior*/
                            /* PDO::FETCH-OBJ -> nos devuelve un objeto de la clase PDOStatement */
                                $oRegistro = $consulta->fetch(PDO::FETCH_OBJ);  //guardo en un objeto los datos del primer registro y avanzo puntero
                                while ($oRegistro){  //mientras haya datos (no esté vacio)
                                    $departamento = $documentoXML ->createElement('departamento');  //elemento departamento que cuelga de departamentos, tantos como registros haya (foreach)
                                    $departamento = $departamentos ->appendChild($departamento);    //añado este hijo a departamentos (principal)
                                    
                                    $codDepartamento = $documentoXML ->createElement('codDepartamento',$oRegistro->codDepartamento);   //creo los elementos que descienden de departamento
                                    $codDepartamento = $departamento ->appendChild($codDepartamento);                                  //agrego el elemento y el valor de cada elemento
                                    $descDepartamento = $documentoXML ->createElement('descDepartamento',$oRegistro->descDepartamento);
                                    $descDepartamento = $departamento ->appendChild($descDepartamento);
                                    $fechaBaja = $documentoXML ->createElement('fechaBaja',$oRegistro->fechaBaja);
                                    $fechaBaja = $departamento ->appendChild($fechaBaja);
                                    $volumenNegocio = $documentoXML ->createElement('volumenNegocio',$oRegistro->volumenNegocio);
                                    $volumenNegocio = $departamento ->appendChild($volumenNegocio);
                                    
                                    $oRegistro = $consulta->fetch(PDO::FETCH_OBJ);  //avanzo puntero al siguiente registro de la base de datos
                                } 
                            
                                $documentoXML -> save('../tmp/exportar.xml');  //guardo el documento xml generado en la ruta indicada
                            
                                echo "<p style='color:green;'>EXPORTACION REALIZADA CORRECTAMENTE</p>";
                                echo "<p> Contenido del archivo <span class='span'>exportar.xml</span> : </p>";
                                highlight_file('../tmp/exportar.xml');  //muestro el archivo exportado
                            
                    }  
                    catch (PDOException $excepcion){  //Codigo si se produce algún error
                        $error = $excepcion->getCode();        //guardamos en la variable error el error que salte
                        $mensaje = $excepcion->getMessage();  //guardamos en la variable mensaje el mensaje que genera el error que saltó
                        echo "<p>Error".$error."</p>";
                        echo "<p style='color: red'>Código del error".$mensaje."</p>";
                    }
                    finally {
                        unset($miDB);
                    }

            ?>
        </div>
        
        
        
    </body>
</html>