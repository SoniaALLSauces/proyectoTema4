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
        
        <h2 class="centrado">Ejercicio 2. Mostrar el contenido de la tabla Departamento y el número de registros.</h2>
        <h3>Registros Tabla Departamento</h3>
        <h4 style="margin-left: 50px; color: darkblue;">mediante fetch(PDO::FETCH_OBJ)</h4>

        <div>
            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 08-noviembre-2021
             * Ejercicio 2. Mostrar el contenido de la tabla Departamento y el número de registros.
             */
                
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';
                    
                /* try..catch con PDOException para establecer conexión y controlar errores */
                    try {  //Conexión: establezco la conexión y el código que quiero realizar           
                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                        
                        echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";  //Mensaje si todo es correcto

                        $sql = 'SELECT * from Departamento';          //Variable para guardar el query sql
                        //$resultadoConsulta = $miDB -> query($consulta);  //Con consulta PDO, devuelve un objeto PDOStatement
                        $consulta = $miDB -> prepare($sql);  //Con consulta preparada, preparo la consulta
                        $consulta ->execute();                    //ejecuto la consulta
                        
            ?>            
                    <!-- Creo una tabla en html con los datos de la base de datos Departamento: -->
                        <table>
                            <tr>
                                <th>Codigo</th>
                                <th>Departamento</th>
                                <th>Fecha Baja</th>
                                <th>Volumen Negocio</th>
                            </tr>
                        
            <?php            
                        $oRegistro = $consulta->fetch(PDO::FETCH_OBJ);  //guardo en un objeto los datos del primer registro y avanzo puntero
                        while ($oRegistro){  //mientras haya datos (no esté vacio)
                    //Dibujo tabla con los datos que nos devuelve el registro $oRegistro
                            echo '<tr class="tr">';
                                echo "<td>". $oRegistro->codDepartamento ."</td>";
                                echo "<td>". $oRegistro->descDepartamento ."</td>";
                                echo "<td>". $oRegistro->fechaBaja ."</td>";
                                echo "<td>". $oRegistro->volumenNegocio ."</td>";
                            echo "</tr>";
                                //Y avanzo puntero
                            $oRegistro = $consulta->fetch(PDO::FETCH_OBJ);  //avanzo puntero al siguiente registro de la base de datos
                        } 
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