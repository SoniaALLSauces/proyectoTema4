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
    </head>
    <body>
        
        <h2>Ejercicio 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores</h2>
        <h3>Mensaje de Conexión Correcta</h3>
        <div>
            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 04-noviembre-2021
             * Ejercicio 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.
             */
                
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';

                /* Establezco la CONEXIÓN a la base de datos con objeto PDO */            
                    $conexion = new PDO (HOST, USER, PASSWORD);
                
                /* TRATAMIENTO DE ERRORES: La clase PDO permite definir la fórmula que usará cuando se produzca un error
                 * con el atributo PDO::ATTR_ERRMODE
                 * y PDO::ERRMODE_EXCEPTION lanza una excepcion cuando se produce un error, utilizando el manejador propio PDOException
                 */
                    $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    try {
                        echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";
                        
                    }
                    catch (PDOException $error){
                        echo "<p>Error".$error->getMessage()."</p>";
                    }
                    finally {
                        unset($conexion);
                    }

            ?>
        </div>
        
        <h3>Mensaje de Conexión Erronea</h3>
        <div>
            <?php

                /* Establezco la CONEXIÓN ERRONEA a la base de datos con objeto PDO */            
                    $conexion = new PDO (HOST, USER, 'passwordErroneo');
                
                /* TRATAMIENTO DE ERRORES: La clase PDO permite definir la fórmula que usará cuando se produzca un error
                 * con el atributo PDO::ATTR_ERRMODE
                 * y PDO::ERRMODE_EXCEPTION lanza una excepcion cuando se produce un error, utilizando el manejador propio PDOException
                 */
                    $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    try {
                        echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";
                    }
                    catch (PDOException $error){
                        echo "<p>Error".$error->getMessage()."</p>";
                    }
                    finally {
                        unset($conexion);
                    }

            ?>
        </div>
        
    </body>
</html>
