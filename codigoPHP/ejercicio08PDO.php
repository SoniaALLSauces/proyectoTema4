<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sonia Anton Llanes - Ejercicio 00</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto DAW2">
        <meta name="keywords" content="">
        <link href="../webroot/css/estiloej.css" rel="stylesheet" type="text/css">
        <link href="../webroot/images/mariposa_vintage.png" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <style>
            .table{width: 50%;
                  margin: auto;
                  margin-top: 50px;
                  text-align: center;}
            th{border: none;}
            .td{width: 25%;
                height: 60px;
                border: 1px solid gray;
                padding: 2px 10px;}
            div{width: 90%;
                margin: 8px;}
            .dato, .error{width: 100%;
                          height: 15px;
                          font-size: 18px;}
            .datoUsu>input{width: 100%;
                           height: 30px;
                           font-size: 20px;
                           border: none;
                           border-bottom: 1px solid black;
                           padding: 0 10px;}
            #submit, #value{border: 1px solid black;
                            width: 50%;
                            margin: 20px;
                            padding: 5px;
                            font-size: 1.1rem;}
            .ast{color: #bb1212;}
        </style>
    </head>
    <body>
        
        <h2 class="centrado">Ejercicio 08. COPIA DE SEGURIDAD / EXPORTAR</h2> 
        <h2 class="centrado" style="color:black">Página que toma datos de la tabla Departamento y guarda en un
            fichero departamento.xml, El fichero exportado se encuentra en el directorio .../tmp/ del servidor.</h2>
        
        <div>

            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 11-noviembre-2021
             * Ejercicio 08. COPIA DE SEGURIDAD / EXPORTAR 
             * Página que toma datos de la tabla Departamento y guarda en un fichero departamento.xml, 
             * El fichero exportado se encuentra en el directorio .../tmp/ del servidor.
            */
            
                           
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';
                    
                /* try..catch con PDOException para establecer conexión y controlar errores */
                    try {  //Código que se realiza si todo es correcto           
                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                        
                        /* CONSULTA PREPARADA: recorremos todos los registros de la tabla que queremos exportar */
                            $sqlConsulta = <<<EOD
                                        SELECT * FROM Departamento;
                                        EOD;
                            $consulta = $miDB -> prepare($sqlConsulta);  //preparo la consulta que devuelve un objeto PDOStatement
                            $consulta -> execute();             //ejecuto la consulta
                        
                        /* CREACIÓN DOCUMENTO XML */
                            
                        
            
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