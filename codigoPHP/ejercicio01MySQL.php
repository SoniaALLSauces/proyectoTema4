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
                    
//-- -----------------------CONEXIÓN CORRECTA----------------------- -->

                    try {  //Conexión: establezco la conexión y el código que quiero realizar
                        /* Establezco la CONEXIÓN a la base de datos con objeto PDO */            
                            $conexion = new PDO (HOST, USER, PASSWORD);

                        /* TRATAMIENTO DE ERRORES: La clase PDO permite definir la fórmula que usará cuando se produzca un error
                         * con el atributo PDO::ATTR_ERRMODE
                         * y PDO::ERRMODE_EXCEPTION lanza una excepcion cuando se produce un error, utilizando el manejador propio PDOException
                         */
                            $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";
                        
                        //Parámetros de la conexión:
                        $atributos = [ //Array inicializado con los atributos
                            "AUTOCOMMIT",
                            "ERRMODE",
                            "CASE",
                            "CLIENT_VERSION",
                            "CONNECTION_STATUS",
                            "ORACLE_NULLS",
                            "PERSISTENT",
                            "SERVER_INFO",
                            "SERVER_VERSION",
                            "TIMEOUT"
                        ];

                        //Muestro los atributos/parámetros de la conexión con un bucle
                        echo "<h3>Atributos de la conexion</h3>";
                        foreach ($atributos as $val) {
                                echo "<b>PDO::ATTR_$val: </b>";
                                echo $conexion->getAttribute(constant("PDO::ATTR_$val")) . "<br>";
                        }
                        
                    }  
                    catch (PDOException $error){  //Excepcion: si se producen errores los gestionamos con PDOException
                        echo "<p>Error".$error->getMessage()."</p>";
                        echo "<p>Código del error".$error->getCode()."</p>";
                    }  
                    finally {  //Desconexión: siempre se finaliza la conexión a la base de datos
                        unset($conexion);
                    }

            ?>
        </div>
        
        <br><br>
        
<!-- -----------------------CONEXIÓN ERRONEA----------------------- -->
    
        <h3>Mensaje de Conexión Erronea</h3>
        <div>
            <?php

                try {
                    $conexion2 = new PDO (HOST, USER, 'passwordErroneo');  //Introducimos password erroneo para que salte el error
                    $conexion2 ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";
                }
                catch (PDOException $excepcion){
                    $error = $excepcion->getCode();        //guardamos en la variable error el error que salte
                    $mensaje = $excepcion->getMessage();  //guardamos en la variable mensaje el mensaje que genera el error que saltó
                    echo "<p>Error".$error."</p>";
                    echo "<p style='color: red'>Código del error".$mensaje."</p>";
                }
                finally {
                    unset($conexion2);
                }

            ?>
        </div>
        
    </body>
</html>
