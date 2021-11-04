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
    </head>
    <body class="container">
	<header class="header">
            <h1 class="h1">Desarrollo de Aplicaciones Web</h1>
	</header>
	<main class="main">
            <section>
                <h2><a href="../proyectoDWES/indexProyectoDWES.php">DWES - Tema 4. Técnicas de Acceso a Datos en PHP</a></h2>
                <h3>Prácticas con acceso a Bases de Datos</h3>            
                <table>
                    <tr class="tr">
                        <td class="ejercicio"><a href="mostrarCodigo/muestraCreaDAW2SALDBDepartamentos.php">Script CrearDepartamentos</a></td>
                    </tr>
                    <tr class="tr">
                        <td class="ejercicio"><a>Script CargaInicialDepartamentos</a></td>
                    </tr>
                    <tr class="tr">
                        <td class="ejercicio"><a>Script BorrarDepartamentos</a></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th colspan="2">PDO</th>
                        <th colspan="2">MySQL</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Ejecutar</th>
                        <th>Mostrar</th>
                        <th>Ejecutar</th>
                        <th>Mostrar</th>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 01. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 02. Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 03. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 04. Formulario de búsqueda de departamentos por descripción (por una parte del campo
                            DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 05. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 06. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 07.  IMPORTAR: Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla Departamento de nuestra base de datos.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 08. COPIA DE SEGURIDAD / EXPORTAR: Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un fichero departamento.xml.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 09. Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio GIT)</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                    </tr>
                    <tr class="tr"> 
                        <td class="ejercicio">Ejercicio 10. Aplicación resumen MtoDeDepartamentos POO y multicapa.</td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/ejecutar.png" alt="ejecutar"></a></td>
                        <td class="tdimg"><a href=""><img src="webroot/images/mostrar.png" alt="mostrar"></a></td>
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
                    <li class="ftexto"><a href="../index.php">&copy 2020-21. Sonia Anton LLanes</a></li>
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