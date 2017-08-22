<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


	<form method="post" action="actualizar_producto.php">
	<?php 
		require("../../modelo/Conexion.php");
		$pdo= new Conexion();

			$IDProducto = $_GET['IDProducto'];
			$datosProducto = $pdo->mysql->prepare("SELECT * FROM producto where IDProducto = :IDProducto");
			$datosProducto->bindParam(":IDProducto", $IDProducto, PDO::PARAM_INT);
			$datosProducto->execute();
			$producto = $datosProducto->fetch();

 ?>

	<p>
		<label>ID</label>
		<input type="text" name="IDProducto" value="<?php echo $IDProducto ?>" readonly=true >
	</p>
	<p>
		<label>Producto Numero Serie</label>
		<input type="text" name="ProductoNumeroSerie" required="true" placeholder="Numero Serie Producto" value="<?php echo $producto['ProductoNumeroSerie']; ?>">
	</p>
	<p>
		<label>ProductoNombre</label>
		<input type="text" name="ProductoNombre" required="true" value="<?php echo $producto['ProductoNombre']; ?>">
	</p>
	<p>
		<label>ProductoPrecio</label>
		<input type="text" name="ProductoPrecio" required="true" value="<?php echo $producto['ProductoPrecio']; ?>">
	</p>


	<input type="submit" name="modificar" value="Modificar">
 	<input type="button" value="Cancelar" onclick="history.back(-1)" />



		</body>
	</html>
</form>