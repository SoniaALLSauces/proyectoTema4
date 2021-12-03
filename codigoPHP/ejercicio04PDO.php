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
        <h2></h2>
        <h2 class="centrado"><a href="../indexProyectoTema4.php" style="border-bottom: 2px solid black">TEMA 4:</a>
            Ejercicio 04. Formulario de búsqueda de departamentos por descripción</h2>
        <h2 class="centrado" style="color:black">(si el usuario no pone nada deben aparecer todos los departamentos)</h2>
        <div>

            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 11-noviembre-2021
             * Ejercicio 04. Formulario de búsqueda de departamentos por descripción 
             *  (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)
             */
                
                /* Importamos archivos necesarios */
                    require_once '../config/confDBPDO.php';  //archivo que contiene los parametros de la conexion
                    require_once '../core/210322ValidacionFormularios.php'; //libreria Validación para errores

                /* VARIABLES: */
                    $entradaOK = true;  //Variable que indica que todo va bien
                    //Constantes para la libreria de validacion
                    define('OBLIGATORIO', 1);
                    define('OPCIONAL', 0);
                    
                /* ARRAY DE ERRORES Y ENTRADAS DEL FORMULARIO*/
                    $aErrores = array(     //Array para guardar los errores del formulario
                        'eDescDepartamento' => null   //E inicializo cada elemento
                        );
                    $aRespuestas = array(     //Array para guardar las entradas del formulario correctas
                        'descDepartamento' => null   //E inicializo cada elemento
                        );
                        
                /* FORMULARIO */
                    /* VALIDACIÓN de cada entrada del formulario con la libreria de validación que importamos */
                        if (isset($_POST['submit'])){  //Pulso el boton enviar
                            //Valido cada campo y si hay algun error lo guardo en el array aErrores
                                $aErrores['eDescDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 50, 1, OPCIONAL);
                                //Recorro array errores y compruebo si se ha incluido algún error
                            foreach ($aErrores as $campo => $error){  
                                if ($error!=null){         //si es distinto de null
                                    $entradaOK = false;    //si hay algun error entradaOK es false
                                }
                            }     
                        }
                        else{  //aun no se ha pulsado el boton enviar
                            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
                        }

                    /* FORMULARIO Y RESULTADO una vez enviado y con entradas correctas */
                        if($entradaOK){  //Si todas las entradas son correctas
                            /* GUARDO EN EL ARRAY $aRespuestas LOS DATOS INTRODUCIDOS EN EL FORMULARIO */
                                $aRespuestas['descDepartamento']= $_POST['descDepartamento'];
                            
                            /* ESTABLEZCO CONEXIÓN A LA BASE DE DATOS */
                            try {  //Conexión: establezco la conexión y el código que quiero realizar           
                                $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                                $miDB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //lanzo excepción utilizando manejador propio PDOException cuando se produce un error

                            //Busco si existe algun departamento que coincida con la descripción introducida en el formulario:
                                $sqlBuscarDto = <<<EOD
                                        SELECT * FROM Departamento  
                                        WHERE descDepartamento LIKE '%{$aRespuestas['descDepartamento']}%';
                                        EOD;
                                $sqlBuscar = $miDB -> prepare($sqlBuscarDto);  //Con consulta preparada, preparo la consulta que devuelve un objeto PDOStatement
                                $sqlBuscar -> execute();             //ejecuto la consulta

                            //Si no encuentra ningún departamento nos muestra todos, entonces preparamos otra consulta para mostrar por pantalla
                                if ($sqlBuscar->rowCount()==0){
                                    $sqlBuscarDto = 'SELECT * FROM Departamento';   //cambiamos el valor del query de busqueda a todos los departamentos
                                    $sqlBuscar = $miDB -> prepare($sqlBuscarDto);   //Con consulta preparada
                                    $sqlBuscar ->execute();                         //ejecuto la consulta
                                }

                            ?>            
                                <!-- Creo una tabla en html con los datos de la base de datos Departamento: -->
                                    <h3>Departamentos Encontrados</h3>
                                    <table>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Departamento</th>
                                            <th>Fecha Baja</th>
                                            <th>Volumen Negocio</th>
                                        </tr>
                            <?php
                                        //Recorro los registros de la database
                                        //Y Muestro la tabla Departametos con los encontrados o entera
                                    $oRegistro = $sqlBuscar->fetch(PDO::FETCH_OBJ);  //guardo en un objeto los datos del primer registro y avanzo puntero
                                    while ($oRegistro){  //mientras haya datos (no esté vacio)
                                            //Dibujo tabla con los datos que nos devuelve el registro $oRegistro
                                        echo '<tr class="tr">';
                                            echo "<td>". $oRegistro->codDepartamento ."</td>";
                                            echo "<td>". $oRegistro->descDepartamento ."</td>";
                                            echo "<td>". $oRegistro->fechaBaja ."</td>";
                                            echo "<td>". $oRegistro->volumenNegocio ."</td>";
                                        echo "</tr>";
                                            //Y avanzo puntero
                                        $oRegistro = $sqlBuscar->fetch(PDO::FETCH_OBJ);  //avanzo puntero al siguiente registro de la base de datos
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

                        }
                        else{//Si las respuestas no son correctas o aun no se ha pulsado enviar      
            ?>
                            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <table class="table">
                                    <tr>
                                        <th colspan="2"><h3>Formulario Buscar por Descripción del Departamento</h3></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td">
                                            <div class="dato"><label for="LbDescDepartamento">Descripción del Departamento  <span class="ast">*</span></label></div>
                                            <div class="datoUsu"><input type="text" name="descDepartamento" id="LbDescDepartamento"
                                                   value="<?php  //Si no hay ningun error y se ha enviado mantenerlo
                                                            echo $resultado = ($aErrores['eDescDepartamento']==NULL && isset($_POST['descDepartamento'])) ? $_POST['descDepartamento'] : ""; 
                                                          ?>"></div>
                                            <div class="error"><?php
                                                    if ($aErrores['eDescDepartamento'] != NULL) { //si hay errores muestra el mensaje
                                                        echo "<span style=\"color:red;\">".$aErrores['eDescDepartamento']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                                    }
                                                 ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><input id="submit" name="submit" type="submit" value="Enviar"></th>
                                        <th><input id="value" name="reset" type="reset" value="Borrar"></th>
                                    </tr>
                                </table>
                            </form>
                        <?php
                        }
                        ?>    

        </div>
        
    </body>
</html>