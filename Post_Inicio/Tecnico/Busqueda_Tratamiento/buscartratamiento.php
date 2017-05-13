<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<?php 

		function ejecuta_consulta($labusqueda){

		include("conexiontesis.php");

		$conexion=mysql_connect($host,$user,$pw) or die ("probelmas al conectar");
		mysql_select_db($db,$conexion) or die ("no se encuentra al DB");


		$consulta="SELECT * FROM Tratamiento WHERE TrataNombre='$labusqueda' OR TrataFecha='$labusqueda' OR TrataNumAnalisis='$labusqueda' OR TrataDescripcion='$labusqueda' ";

		$resultados=mysql_query($consulta,$conexion);

			while (($fila=mysql_fetch_assoc($resultados))) {
				echo "Nombre de Tratamiento :".$fila['TrataNombre'] . "<br> ";
				echo "Fecha de Tratamiento :".$fila['TrataFecha'] . "<br> ";
				echo "Numero de Analisis del Tratamiento :".$fila['TrataNumAnalisis'] . "<br> ";
				echo "Descripcion del Tratamiento :".$fila['TrataDescripcion'] . " <br>";


			}

		mysql_close($conexion);

	}
 ?>


</head>
<body>
	<?php 


		$mipagina=$_SERVER["PHP_SELF"];

		if(isset($_GET["buscar"])==false){
				echo("<form action='".$mipagina . "'method = 'get'>
				<label>Buscar:<input type='text' name='buscar'></label>
				<input type='submit' name='enviando' value='Enviar!'>
				</form>");

		}else{
			ejecuta_consulta($_GET["buscar"]);
		}
	 ?>
	
</body>
</html>