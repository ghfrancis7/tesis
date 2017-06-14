<?php 

	include("conexiontesis.php");

	$conexion=mysql_connect($host,$user,$pw) or die ("probelmas al conectar");
	mysql_select_db($db,$conexion) or die ("no se encuentra al DB");


	$consulta="SELECT * FROM Producto";

	$resultados=mysql_query($consulta,$conexion);

		while (($fila=mysql_fetch_assoc($resultados))) {

			echo "ProductoNombre :".$fila['ProductoNombre'] . "<br> ";
			echo "ProductoPrecio :".$fila['ProductoPrecio'] . "<br> ";
			echo "ProductoFechaAltaDB :".$fila['ProductoFechaAltaDB'] . "<br> ";
			echo "ProductoFechaBajaDB :".$fila['ProductoFechaBajaDB'] . " <br>";
			echo "ProductoEstado :".$fila['ProductoEstado'] . " <br>";


		}

		mysql_close($conexion);

 ?>