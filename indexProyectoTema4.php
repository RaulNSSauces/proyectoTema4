<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Raúl Núñez Sebastián</title>
			<link rel="stylesheet" href="webroot/css/estilos.css">
			<link rel="stylesheet" href="webroot/css/fontello.css">
			<link rel="stylesheet" href="webroot/css/menu.css">
			<link rel="stylesheet" href="webroot/css/banner.css">
			<link rel="stylesheet" href="webroot/css/modulos.css">
		</head>
		<body>
			<header>
				<div class="contenedor">
					<h1 class="icon-rocket">Desarrollo de Aplicaciones Web</h1>
					<input type="checkbox" id="menu-bar">
					<label class="icon-menu" for="menu-bar"></label>
						<nav class="menu">
							<a href="../../index.html">Inicio</a>
							<a href="../proyectoDWES/indexProyectoDWES.php">DWES</a>
							<a href="">DWEC</a>
							<a href="">DAW</a>
							<a href="">DIW</a>
						</nav>
				</div>
			</header>
			<main>
				<section id="banner">
					<img src="webroot/media/banner.jpg" alt="banner">
					<div class="contenedor">
						<h2>Proyecto Web De</h2>
						<p>Raúl Núñez Sebastián</p>
					</div>
				</section>
				<section id="bienvenidos">
					<div class="contenedor">
						<table>
                                                        <tr>
							    <td class="enunciado">Scripts de Base de Datos.</td>
                                                            <td><a href="codigoPHP/ejercicio00.php"><img src="webroot/media/ver.png" alt="ejecutar código" width="40px"></a></td>
							</tr>
                                                        <tr>
							    <td class="enunciado">Constantes de configuración de la Base de Datos MySQLi.</td>
                                                            <td><a href="mostrarcodigo/muestraConfDBMySQLi.php"><img src="webroot/media/ver.png" alt="ejecutar código" width="40px"></a></td>
							</tr>
                                                        <tr>
							    <td class="enunciado">Constantes de configuración de la Base de Datos PDO.</td>
                                                            <td><a href="mostrarcodigo/muestraConfDBPDO.php"><img src="webroot/media/ver.png" alt="ejecutar código" width="40px"></a></td>
							</tr>
							<tr>
                                                            <th><h2>Ejercicios <br> PDO y MYSQLi</h2></th>
                                                            <th><h2>Ejecutar PDO</h2></th>
                                                            <th><h2>Mostrar PDO</h2></th>
                                                            <th><h2>Ejecutar MySqli</h2></th>
                                                            <th><h2>Mostrar MySqli</h2></th>
							</tr>
							<tr>
								<td class="enunciado">01.(ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
								<td><a href="codigoPHP/ejercicio01.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio01.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
                                                                <td><a href="codigoPHP/ejercicio01Mysqli.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio01Mysqli.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
							<tr>
								<td class="enunciado">02.Mostrar el contenido de la tabla Departamento y el número de registros.</td>
								<td><a href="codigoPHP/ejercicio02.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio02.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
							<tr>
								<td class="enunciado">03.Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
								<td><a href="codigoPHP/ejercicio03.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio03.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
							<tr>
								<td class="enunciado">04.Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campoDescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
								<td><a href="codigoPHP/ejercicio04.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio04.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
                                                        <tr>
								<td class="enunciado">05.Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
								<td><a href="codigoPHP/ejercicio05.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio05.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
                                                        </tr>
							<tr>
								<td class="enunciado">06.Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos utilizando una consulta preparada.</td>
								<td><a href="codigoPHP/ejercicio06.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio06.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
						    <!---<tr>
								<td class="enunciado">07.Página web que toma datos (código y descripción) de un fichero xml y los añade a la tablaDepartamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en eldirectorio .../tmp/ del servidor.</td>
								<td><a href="codigoPHP/ejercicio07.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio07.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr>
							<tr>
								<td class="enunciado">08.Página web que toma datos (código y descripción) de la tabla Departamento y guarda en unfichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado seencuentra en el directorio .../tmp/ del servidor.Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,JSON, CSV, TXT,...Si el alumno dispone de tiempo probar a exportar e importar  a o desde un directorio (a elegir) enel equipo cliente.</td>
								<td><a href="codigoPHP/ejercicio08.php"><img src="webroot/media/ejecutar.png" alt="ejecutar código" width="30px"></a></td>
								<td><a href="mostrarcodigo/muestraEjercicio08.php"><img src="webroot/media/ver.png" alt="ver código" width="40px"></a></td>
							</tr> -->              
						</table>
					</div>
				</section>
			<footer>
				<div class="contenedor">
					<p class="copy">Raúl Núñez Sebastián &copy; 2020/2021</p>
						<div class="sociales">
							<a class="icon-github" target="blanc" href="https://github.com/RaulNSSauces"></a>
							<a class="icon-doc-text" target="blanc" href="webroot/curriculum.html"></a>
							<a class="icon-linkedin" target="blanc" href="https://www.linkedin.com/login/es"></a>
						</div>
				</div>
			</footer>
		</body>
	</html>