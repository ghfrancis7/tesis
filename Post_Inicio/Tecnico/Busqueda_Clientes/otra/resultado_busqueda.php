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


		$consulta="SELECT * FROM Usuario WHERE UsuNombre='$labusqueda' OR UsuApellido='$labusqueda' OR UsuDNI='$labusqueda' OR UsuCuenta='$labusqueda' OR UsuEstado='%$labusqueda%'";

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