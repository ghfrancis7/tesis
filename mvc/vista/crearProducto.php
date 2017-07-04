<br>
<h3>Crear un nuevo Producto</h3>
<form action="guardarProducto.php" method="post">
	<input type="text" placeholder="ProductoNombre" name="ProductoNombre">
	<br><br>
	<input type="text" placeholder="ProductoPrecio" name="ProductoPrecio">
	<br><br>
	<input type="date" name="ProductoFechaAltaDB">
	<br><br>
	<input type="date" placeholder="ProductoFechaBajaDB" name="ProductoFechaBajaDB">
	<br><br>
	<input type="text" placeholder="ProductoEstado" name="ProductoEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear Producto">
	<input type="button" value="Atras" onclick="history.back(-1)" />
	
</form>