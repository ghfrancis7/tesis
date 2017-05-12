<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 

	$busqueda="$_GET[buscar]";

	include("conexiontesis.php");

	$conexion=mysql_connect($host,$user,$pw) or die ("probelmas al conectar");
	mysql_select_db($db,$conexion) or die ("no se encuentra al DB");


	$consulta="SELECT * FROM Usuario WHERE UsuNombre='$busqueda' OR UsuApellido='$busqueda' OR UsuDNI='$busqueda' OR UsuCuenta='$busqueda' OR UsuEstado='%$busqueda%'";

	$resultados=mysql_query($consulta,$conexion);

		while (($fila=mysql_fetch_assoc($resultados))) {
			echo "Nombre :".$fila['UsuNombre'] . "<br> ";
			echo "Apellido :".$fila['UsuApellido'] . "<br> ";
			echo "DNI :".$fila['UsuDNI'] . "<br> ";
			echo "Domicilio :".$fila['UsuFechaNacimiento'] . " <br>";
			echo "Telefono :".$fila['UsuCuenta'] . " <br>";
			echo "Email :".$fila['UsuEstado'] . " <br>";


		}

		mysql_close($conexion);

 ?>

 </body>
</html>