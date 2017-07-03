<?php 

include_once("modelo/Producto.php");

	class controladorProducto{

		private $producto;

		public function __construct(){

			$producto= new Producto();

			}
			public function crearProducto($ProductoNombre,$ProductoPrecio,$ProductoFechaAltaDB,$ProductoFechaBajaDB,$ProductoEstado){

				$producto= new Producto();

				$resultado=$producto->crearProducto($ProductoNombre,$ProductoPrecio,$ProductoFechaAltaDB,$ProductoFechaBajaDB,$ProductoEstado);
				return $resultado;

		}
		public function listarProducto(){
			$producto=new Producto();

			$resultado=$this->producto->listarProducto();
			return $resultado;
		}

	}

 ?>