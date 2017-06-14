<?php 

	include("conexiontesis.php");

	$conexion=mysql_connect($host,$user,$pw) or die ("probelmas al conectar");
	mysql_select_db($db,$conexion) or die ("no se encuentra al DB");


	$consulta="SELECT * FROM Usuario";

	$resultados=mysql_query($consulta,$conexion);

		while (($fila=mysql_fetch_row($resultados))) {
			echo "Nombre :".$fila[4] . "<br> ";
			echo "Apellido :".$fila[5] . "<br> ";
			echo "DNI :".$fila[6] . "<br> ";
			echo "Domicilio :".$fila[7] . " <br>";
			echo "Telefono :".$fila[8] . " <br>";
			echo "Email :".$fila[9] . " <br>";


		}

		mysql_close($conexion);

 ?>