<!DOCTYPE html>

<!-- Author: Sonia Antón Llanes -->
<!-- Created on: 03-noviembre-2021 -->
<!-- Index Ejercicios del Tema 4 DWES -->

<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Sonia Anton Llanes - index Tema 4</title>
        <meta name="author" content="Sonia Antón Llanes">
        <meta name="description" content="Proyecto DAW2">
        <meta name="keywords" content="">
        <link href="webroot/css/newcss.css" rel="stylesheet" type="text/css">
        <link href="webroot/images/mariposa_vintage.png" rel="icon" type="image/png">	
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <style>
            .sql0{width: 4%;
                  background: white;}
            .sql{width: 32%;
                 background: white;}
            .sql>*{border: 1px solid #BF2411;
                   border-radius: 10px;
                   padding: 5px;}
        </style>
    </head>
    <body class="container">
	<header class="header">
            <h1 class="h1"><a href="../index.html" style="color: white">Desarrollo de Aplicaciones Web</a></h1>
	</header>
	<main class="main">
            <section>
                <h2><a href="../proyectoDWES/indexProyectoDWES.php">DWES</a> - Tema 4. Técnicas de Acceso a Datos en PHP</h2>
                <h3>Prácticas con acceso a Bases de Datos</h3>            
                <table>
                    <tr class="tr">
                        <td class="ejercicio" colspan="4"><a href="mostrarCodigo/muestraCreaDepartamentos.php">Scripts Crear / CargaInicial / Borrar Departamentos</a></td>
                    </tr>
                    <tr class="tr">
                        <th class="ejercicio sql0"></td>
                        <th class="ejercicio sql"><a href="scriptDB/creaDAW219DBDepartamentos1&1.php">CREAR <span>Tabla</span></a></td>
                        <th class="ejercicio sql"><a href="scriptDB/cargaInicialDAW219DBDepartamentos1&1.php">CARGA INICIAL <span>Tabla</span></a></td>
                        <th class="ejercicio sql"><a href="scriptDB/borraDAW219DBDepartamentos1&1.php">BORRAR <span>Tabla</span></a></td>
                    </tr>
                    <tr class="tr">
                        <td class="ejercicio" colspan="4"><a href="mostrarCodigo/muestraConfigDBPDO.php">Fichero de Configuración</a></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th></th>
                        <th colspan="2">PDO</th>
                        <th colspan="2">MySQL</th>
                    </tr>
                    
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 01. CONEXIÓN A LA BASE DE DATOS </h3>
                            <h5>con la cuenta usuario y tratamiento de errores.</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio01PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio01PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 02. MOSTRAR EL CONTENIDO DE LA TABLA</h3>
                            <h5>de la tabla Departamento y el número de registros.</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio02PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio02PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 03. AÑADIR UN REGISTRO A LA TABLA</h3>
                            <h5>Añadir un departamento con validación de entrada y control de errores</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio03PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio03PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 04. BUSQUEDA DE REGISTRO/S</h3>
                            <h5>Búsqueda por descripción (por todo o parte del campo descDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio04PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio04PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 05. TRANSACCIONES: AÑADIR TRES REGISTROS O NINGUNO</h3>
                                <h5>Añadir tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, 
                                    de tal forma que se añadan los tres registros o no se añada ninguno</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio05PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio05PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 06. CARGAR REGISTROS DESDE UN ARRAY</h3>
                            <h5>Pagina que cargue registros en la tabla Departamento desde un array aDepartamentosNuevos utilizando una consulta preparada.</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio06PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio06PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 07.  IMPORTAR: Página web que toma datos de un fichero xml y los añade a la tabla Departamento de nuestra base de datos.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 08. COPIA DE SEGURIDAD / EXPORTAR:</h3>
                            <h5>Página web que toma datos de la tabla Departamento y guarda en un fichero departamento.xml.</h5></td>
                        <td class="tdimg"><a href="codigoPHP/ejercicio08PDO.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href="mostrarCodigo/muestraEjercicio08PDO.php"><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">?</a></td>
                        <td class="tdimg"><a href="">?</a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio"><h3>Ejercicio 09. APLICACIÓN MANTENIMIENTO DE DEPARTAMENTOS</h3>
                            <h5>Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio GIT)</h5></td>
                        <td class="tdimg"><a href="../219DWESMtoDepartamentosTema4/codigoPHP/mtoDepartamentos.php"><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">  </a></td>
                        <td class="tdimg"><a href="">  </a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 10. Aplicación resumen MtoDeDepartamentos POO y multicapa.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href="">  </a></td>
                        <td class="tdimg"><a href="">  </td>
                    </tr>
                    
                    
                    <tr>
                        <td class="trfin">.</td>
                        <td>.</td>
                        <td>.</td>
                    </tr>
                </table>
            </section>
        </main>
        <footer class="footer">
            <nav class="fnav">
                <ul>
                    <li class="ftexto"><a href="indexProyectoDWES.php">&copy 2020-21. Sonia Anton LLanes</a></li>
                    <li>
                        
                        <a class="maxMedia" href="doc/curriculum_SALL.pdf" target="_blank"><img src="webroot/images/CV.png" alt="imagen_CV"></a>
                        <a class="maxMedia" href=""><img src="webroot/images/linkedin.png" alt="imagen_linkedIn"></a>
                        <a class="maxMedia" href="https://github.com/SoniaALLSauces" target="_blank"><img src="webroot/images/github.png" alt="imagen_github"></a>
                    </li>
                </ul>
            </nav>
        </footer>       
    </body>
</html>