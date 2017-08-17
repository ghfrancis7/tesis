<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


<form method="post" action="actualizar_producto.php">
<?php 
	require("../modelo/Conexion.php");
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
	<label>ProductoNombre</label>
	<input type="text" name="ProductoNombre" required="true" value="<?php echo $producto['ProductoNombre']; ?>">
</p>
<p>
	<label>ProductoPrecio</label>
	<input type="text" name="ProductoPrecio" required="true" value="<?php echo $producto['ProductoPrecio']; ?>">
</p>
<p>
	<label>ProductoFechaAltaDB</label>
	<input type="text" name="ProductoFechaAltaDB" required="true" placeholder="Fecha de Alta" value="<?php echo $producto['ProductoFechaAltaDB']; ?>">
</p>
<p>
	<label>ProductoFechaBajaDB</label>
	<input type="text" name="ProductoFechaBajaDB" placeholder="Fecha de Baja" value="<?php echo $producto['ProductoFechaBajaDB']; ?>">
</p>
<p>
	<label>ProductoEstado</label>
	<input type="text" name="ProductoEstado" required="true" placeholder="Estado" value="<?php echo $producto['ProductoEstado']; ?>">
</p>

<input type="submit" name="modificar" value="Modificar">
 <input type="button" value="Cancelar" onclick="history.back(-1)" />



</body>
</html>
</form>