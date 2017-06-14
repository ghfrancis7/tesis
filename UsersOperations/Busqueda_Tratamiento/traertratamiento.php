<?php 

	include("conexiontesis.php");

	$conexion=mysql_connect($host,$user,$pw) or die ("probelmas al conectar");
	mysql_select_db($db,$conexion) or die ("no se encuentra al DB");


	$consulta="SELECT * FROM Tratamiento";

	$resultados=mysql_query($consulta,$conexion);

		while (($fila=mysql_fetch_assoc($resultados))) {
			
			echo "Nombre de Tratamiento :".$fila['TrataNombre'] . "<br> ";
			echo "Fecha de Tratamiento :".$fila['TrataFecha'] . "<br> ";
			echo "Numero de Analisis del Tratamiento :".$fila['TrataNumAnalisis'] . "<br> ";
			echo "Descripcion del Tratamiento :".$fila['TrataDescripcion'] . " <br>";

		}

		mysql_close($conexion);

 ?>