<?php 
include_once("controlador/producto_controlador.php");

	$controlador = new controladorProducto();
	if(isset($_POST['enviar'])){
		$r=$controlador->crearProducto($_POST['ProductoNombre'],$_POST['ProductoPrecio'],$_POST['ProductoFechaAltaDB'],$_POST['ProductoFechaBajaDB'],$_POST['ProductoEstado']);
		if($r){
			echo "Se ha registrado un nuevo producto";
		}else{
			echo"Ya existe el producto";
		}
	}

 ?>

<br>
<h3>Crear un nuevo Producto</h3>
<form action="" method="post">
	<label>ProductoNombre</label> <br>
	<input type="text" name="ProductoNombre">
	<br><br>
	<label>ProductoPrecio</label> <br>
	<input type="text" name="ProductoPrecio">
	<br><br>
	<label>ProductoFechaAltaDB</label> <br>
	<input type="date" name="ProductoFechaAltaDB">
	<br><br>
	<label>ProductoFechaBajaDB</label> <br>
	<input type="date" name="ProductoFechaBajaDB">
	<br><br>
	<label>ProductoEstado</label> <br>
	<input type="text" name="ProductoEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear">
	<ul>
			<li><a href="index.php">Inicio</a></li>
		</ul>
</form>