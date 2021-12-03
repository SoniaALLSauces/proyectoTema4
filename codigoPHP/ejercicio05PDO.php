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
        
        <h2 class="centrado"><a href="../indexProyectoTema4.php" style="border-bottom: 2px solid black">TEMA 4:</a>
            Ejercicio 05. Añadir tres registros a nuestra tabla Departamento</h2> 
        <h2 class="centrado" style="color:black">utilizando tres instrucciones insert y una transacción (inserta los tres o ninguno)</h2>
        
        <div>

            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 11-noviembre-2021
             * Ejercicio 05. Pagina web que añade tres registros a nuestra tabla Departamento 
             *   utilizando tres instrucciones insert y una transacción, 
             *   de tal forma que se añadan los tres registros o no se añada ninguno. 
            */
            
                           
                /* LLamo al archivo que contiene los parametros de la conexion */
                    require_once '../config/confDBPDO.php';
                    
                /* try..catch con PDOException para establecer conexión y controlar errores */
                    try {  //Conexión: establezco la conexión y el código que quiero realizar           
                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                        
                        echo "<h4 style=\"color: green;\">CONEXION a Base de Datos ESTABLECIDA</h4>";  //Mensaje si todo es correcto

                        /* INSERT */
                            $sqlInsert1 = <<<EOD
                                            INSERT INTO Departamento  
                                            VALUES ('FIN','Departamento de Financiacion',null,6);
                                            EOD;
                            $filtro1= "FIN";  //guardo en una variable la primary key para después filtrar busqueda de los insertados
                            $sqlInsert2 = <<<EOD
                                            INSERT INTO Departamento  
                                            VALUES ('RRH','Departamento de Recursos Humanos',null,4);
                                            EOD;
                            $filtro2= "RRH";
                            $sqlInsert3 = <<<EOD
                                            INSERT INTO Departamento  
                                            VALUES ('EXT','Departamentos Externos',null,6);
                                            EOD;
                            $filtro3= "EXT";
                        
                        /* TRANSACCION */
                            $miDB ->beginTransaction();  //Comienzo la transacción con beginTransaction()

                            $insert1 = $miDB -> prepare($sqlInsert1);  //Con consultas preparadas
                            $insert2 = $miDB -> prepare($sqlInsert2);
                            $insert3 = $miDB -> prepare($sqlInsert3);

                            $insert1 ->execute();                     //Ejecuto las consultas preparadas
                            $insert2 ->execute(); 
                            $insert3 ->execute(); 

                            $miDB -> commit();  //Confirmo las tres inserciones
                        
            ?>            
                    <!-- Creo una tabla en html con los datos de la base de datos Departamento: -->
                        
                        <h3>Se han añadido tres departamentos. </h3>
                        <table>
                            <tr>
                                <th>Codigo</th>
                                <th>Departamento</th>
                                <th>Fecha Baja</th>
                                <th>Volumen Negocio</th>
                            </tr>
                        
            <?php            
                        $sql = <<<EOD
                                SELECT * FROM Departamento  
                                WHERE codDepartamento='{$filtro1}' OR codDepartamento='{$filtro2}' OR codDepartamento='{$filtro3}';
                                EOD;
                        $consulta = $miDB -> prepare($sql);  //Con consulta preparada, preparo la consulta
                        $consulta ->execute(); 
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
                        if ($miDB ->rollBack()){   //Si ha habido algun error en la transacción revierto todos los cambios
                            echo "<h3>No se ha añadido ningún departamento</h3>";
                        }
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