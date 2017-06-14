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


		$consulta="SELECT * FROM Producto WHERE ProductoNombre='$labusqueda' OR ProductoPrecio='$labusqueda' OR ProductoEstado='$labusqueda'";

		$resultados=mysql_query($consulta,$conexion);

			while (($fila=mysql_fetch_assoc($resultados))) {
				echo "ProductoNombre :".$fila['ProductoNombre'] . "<br> ";
				echo "ProductoPrecio :".$fila['ProductoPrecio'] . "<br> ";
				echo "ProductoFechaAltaDB :".$fila['ProductoFechaAltaDB'] . "<br> ";
				echo "ProductoFechaBajaDB :".$fila['ProductoFechaBajaDB'] . " <br>";
				echo "ProductoEstado :".$fila['ProductoEstado'] . " <br>";


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
				<input type='submit' name='enviando' value='Buscar!'>
				</form>");

		}else{
			ejecuta_consulta($_GET["buscar"]);
		}
	 ?>
	
</body>
</html>