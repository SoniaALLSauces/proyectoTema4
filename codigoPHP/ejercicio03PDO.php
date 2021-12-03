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
            Ejercicio 3. Formulario para añadir un departamento a la tabla Departamento</h2>
        <h2 class="centrado" style="color:black">con validación de entrada y control de errores.</h2>
        <div>

            <?php

            /* 
             * Author: Sonia Antón Llanes
             * Created on: 09-noviembre-2021
             * Ejercicio 2. Mostrar el contenido de la tabla Departamento y el número de registros.
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
                        'eCodDepartamento' => null,   //E inicializo cada elemento
                        'eDescDepartamento' => null,
                        'eVolumenNegocio' => null,
                        );
                    $aRespuestas = array(     //Array para guardar las entradas del formulario correctas
                        'codDepartamento' => null,   //E inicializo cada elemento
                        'descDepartamento' => null,
                        'fechaBaja' => null,
                        'volumenNegocio' => null,
                        );
                        
                /* FORMULARIO */
                    /* VALIDACIÓN de cada entrada del formulario con la libreria de validación que importamos */
                        if (isset($_POST['submit'])){  //Pulso el boton enviar
                            //Valido cada campo y si hay algun error lo guardo en el array aErrores
                                $aErrores['eCodDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, OBLIGATORIO);
                                $aErrores['eDescDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 50, 1, OBLIGATORIO);
                                $aErrores['eVolumenNegocio']= validacionFormularios::comprobarEntero($_REQUEST['volumenNegocio'], 100, 0, OPCIONAL);
                            //Recorro array errores y compruebo si se ha incluido algún error
                            foreach ($aErrores as $campo => $error){  
                                if ($error!=null){         //si es distinto de null
                                    $entradaOK = false;    //si hay algun error entradaOK es false
                                }
                                else {                     //si no hay errores de entrada compruebo que el departamento no exista
                                    try{
                                        $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                                        $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //y siempre lanzo excepción utilizando manejador propio PDOException cuando se produce un error
                                        //$codigoDepartamento= $_REQUEST['codDepartamento'];  //variable donde guardo el valor codigo del formulario
                                        $sql = <<<EOD
                                                    SELECT codDepartamento FROM Departamento
                                                    where codDepartamento="{$_REQUEST['codDepartamento']}";
                                                    EOD;
                                        $consulta = $miDB -> prepare($sql);  //Con consulta preparada, preparo la consulta
                                        $consulta ->execute();
                                        if($consulta->rowCount() > 0){
                                            $aErrores['eCodDepartamento']= 'El código de departamento ya existe';  //añadimos mensaje al array en eCodDepartamento
                                            $entradaOK = false;                                                    //si el codigo ya existe guardamos el error y entradaOK es false      
                                        }
                                    }
                                    catch (PDOException $excepcion){  //codigo si se produce error utilizando PDOException
                                        echo "<p>Error: ".$excepcion->getCode()."</p>";  //getCode() nos devuelve el codigo del error que salte
                                        echo "<p style='color: red'>Código del error: ".$excepcion->getMessage()."</p>";  //getMessage() nos devuelve el mensaje que genera el error que saltó
                                    }
                                    finally {  
                                        unset($miDB);  //finalizamos conexion con database
                                    }
                                }
                            }
                        }
                        else{  //aun no se ha pulsado el boton enviar
                            $entradaOK = false;   // si no se pulsa enviar, entradaOK es false
                        }

                    /* FORMULARIO Y RESULTADO una vez enviado y con entradas correctas*/
                        if($entradaOK){  //Si todas las entradas son correctas
                            /* GUARDO EN EL ARRAY $aRespuestas LOS DATOS INTRODUCIDOS EN EL FORMULARIO */
                                $aRespuestas['codDepartamento']= $_POST['codDepartamento'];
                                $aRespuestas['descDepartamento']= $_POST['descDepartamento'];
                                $aRespuestas['volumenNegocio']= $_POST['volumenNegocio'];
                            
                            /* ESTABLEZCO CONEXIÓN A LA BASE DE DATOS */
                            try {  //Conexión: establezco la conexión y el código que quiero realizar           
                                $miDB = new PDO (HOST, USER, PASSWORD);  //establezco conexión con objeto PDO 
                                $miDB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //lanzo excepción utilizando manejador propio PDOException cuando se produce un error

                            //Actualizo la base de datos para insertar el nuevo departamento:
                                $sqlInsertarDto = <<<EOD
                                        INSERT INTO Departamento  
                                        VALUES (:codDepartamento,:descDepartamento,:fechaBaja,:volumenNegocio);
                                        EOD;
                                //$sqlInsertarDto = "INSERT INTO Departamento VALUES (:codDepartamento, :descDepartamento, :fechaBaja, :volumenNegocio)";
                                $insertar = $miDB -> prepare($sqlInsertarDto);  //Con consulta preparada, preparo la consulta que devuelve un objeto PDOStatement
/*No es necesario bindear los parámetros, se añaden directamente las variables*/                                
                                $parametros = [ ":codDepartamento" => $aRespuestas['codDepartamento'],
                                                ":descDepartamento" => $aRespuestas['descDepartamento'],
                                                ":fechaBaja" => null,
                                                ":volumenNegocio" => $aRespuestas['volumenNegocio']];
                                $insertar -> execute($parametros);             //ejecuto la consulta
                                
                            //Muestro el departamento insertado

                            //Muestro la tabla Departametos (con el nuevo departamento insertado)
                                $consulta = 'SELECT * FROM Departamento';          //Variable para guardar el query sql
                                $resultadoConsulta = $miDB -> prepare($consulta);  //Con consulta preparada, preparo la consulta que devuelve un objeto PDOStatement
                                $resultadoConsulta ->execute();                    //ejecuto la consulta

                            ?>            
                                <!-- Creo una tabla en html con los datos de la base de datos Departamento: -->
                                    <h3>Tabla Departamento</h3>
                                    <table>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Departamento</th>
                                            <th>Fecha Baja</th>
                                            <th>Volumen Negocio</th>
                                        </tr>
                            <?php
                                        //Recorro los registros de la database
                                    $oRegistro = $resultadoConsulta->fetch(PDO::FETCH_OBJ);  //guardo en un objeto los datos del primer registro y avanzo puntero
                                    while ($oRegistro){  //mientras haya datos (no esté vacio)
                                            //Dibujo tabla con los datos que nos devuelve el registro $oRegistro
                                        echo '<tr class="tr">';
                                            echo "<td>". $oRegistro->codDepartamento ."</td>";
                                            echo "<td>". $oRegistro->descDepartamento ."</td>";
                                            echo "<td>". $oRegistro->fechaBaja ."</td>";
                                            echo "<td>". $oRegistro->volumenNegocio ."</td>";
                                        echo "</tr>";
                                            //Y avanzo puntero
                                        $oRegistro = $resultadoConsulta->fetch(PDO::FETCH_OBJ);  //avanzo puntero al siguiente registro de la base de datos
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
                                        <th colspan="2"><h3>Formulario Nuevo Departamento</h3></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td">
                                            <div class="dato"><label for="LbCodDepartamento">Código del Departamento  <span class="ast">*</span></label></div>
                                            <div class="datoUsu"><input type="text" name="codDepartamento" id="LbCodDepartamento"
                                                   value="<?php  //Si no hay ningun error y se ha enviado mantenerlo
                                                            echo $resultado = ($aErrores['eCodDepartamento']==NULL && isset($_POST['codDepartamento'])) ? $_POST['codDepartamento'] : ""; 
                                                          ?>"></div>
                                            <div class="error"><?php
                                                    if ($aErrores['eCodDepartamento'] != NULL) { //si hay errores muestra el mensaje
                                                        echo "<span style=\"color:red;\">".$aErrores['eCodDepartamento']."</span>"; //aparece el mensaje de error que tiene el array aErrores
                                                    }
                                                 ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td">
                                            <div class="dato"><label for="LbDescDepartamento">Departamento  <span class="ast">*</span></label></div>
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
                                        <td colspan="2" class="td" colspan="2">
                                            <div class="dato"><label for="LbVolumenNegocio">Volumen de Negocio </label></div>
                                            <div class="datoUsu"><input type="text" name="volumenNegocio" id="LbVolumenNegocio"
                                                   value="<?php  //Si no hay ningun error y se ha enviado mantenerlo
                                                            echo $resultado = ($aErrores['eVolumenNegocio']==NULL && isset($_POST['volumenNegocio'])) ? $_POST['volumenNegocio'] : ""; 
                                                          ?>"></div>
                                            <div class="error"><?php
                                                    if ($aErrores['eVolumenNegocio'] != NULL) { //si hay errores muestra el mensaje
                                                        echo "<span style=\"color:red;\">".$aErrores['eVolumenNegocio']."</span>"; //aparece el mensaje de error que tiene el array aErrores
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