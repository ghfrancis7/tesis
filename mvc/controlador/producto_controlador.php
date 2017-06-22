<?php 

include_once("../modelo/Producto.php");

	class controladorProducto{

		private $producto;
	}

public function ver($IDProducto){
			$producto->set("IDProducto", $IDProducto);
			$datos = $producto->ver();
			return $datos;
		}
 ?>