<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sonia Anton Llanes - Ejercicio creaDAW219DBDepartamentos1&1</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto DAW2">
        <meta name="keywords" content="">
        <link href="../webroot/css/estiloej.css" rel="stylesheet" type="text/css">
        <link href="../webroot/images/mariposa_vintage.png" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <h2 class="centrado"><a href="../indexProyectoTema4.php" style="border-bottom: 2px solid black">TEMA 4:</a>
            Script Crear Base de Datos, Usuario y Tabla Departamentos</h2>
        

        <div>
            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 03-diciembre-2021
             * Ejercicio Script Uso la Base de Datos y Usuario asignado en 1&1, y crear la Tabla Departamentos
             */
                
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';
                    
                /* Query para usar la base de datos asignada, y crear la tabla Departamentos */
                    $sqlCrear = <<<EOD
                            USE dbs4868815; 
                            CREATE table IF NOT EXISTS Departamento(  
                                codDepartamento varchar(3) primary key not null,
                                descDepartamento varchar(255),
                                fechaBaja date,
                                volumenNegocio float) engine=innodb;
                            EOD;
                    
                /* try..catch con PDOException para establecer conexión y controlar errores */
                    try {  //Conexión: establezco la conexión y el código que quiero realizar           
                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                        
                        $crear = $miDB -> prepare($sqlCrear);  //Con consulta preparada, preparo la consulta
                        $crear ->execute();                    //ejecuto la consulta
                        
                        echo "TABLA DEPARTAMENTOS ha sido creada";
                        
                    }  
                    catch (PDOException $excepcion){
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