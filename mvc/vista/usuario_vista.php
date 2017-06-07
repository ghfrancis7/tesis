<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		td{
			border:1px dotted #FF0000;
		}
		
	</style>
</head>
<body>

<table>
	
	<tr><td>Nombre Del Usuario</td>

</table>

<?php 

	foreach($matrizUsuarios as $registro){

		echo "<tr><td>".$registro["IDUsuario"] . "</td></tr> <br>";
		echo "<tr><td>".$registro["IDRol"] . "</td></tr><br>";
		echo "<tr><td>".$registro["IDPlanta"] . "</td></tr><br>";
		echo "<tr><td>".$registro["IDTratamiento"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuNombre"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuApellido"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuDNI"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuDireccion"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuMail"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuFechaNacimiento"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuLocalidadOpera"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuCuenta"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuPassword"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuFechaIngreso"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuFechaEgreso"] . "</td></tr><br>";
		echo "<tr><td>".$registro["UsuEstado"] . "</td></tr><br><br><br>";

}

 ?>
</tr>
	
</body>
</html>