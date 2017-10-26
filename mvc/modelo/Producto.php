<?php 

include_once("Conexion.php");

	class Producto{

		private $IDProducto;
		private $IDLote;
		private $IDProductoTratamiento;
		private $ProductoNombre;
		private $ProductoPrecio;
		private $ProductoFechaAltaDB;
		private $ProductoFechaBajaDB;
		private $ProductoEstado;

		private $pdo;


		public function __construct(){
		
 			$pdo = new Conexion();

		}

		public function listarProducto(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM producto";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		}
		public function listarProductoActivo(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM producto WHERE ProductoEstado='Activo'";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		}
		public function buscarProducto($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM producto WHERE IDProducto LIKE '%$buscar%' OR ProductoNombre LIKE '%$buscar%'";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		
		}
	}
 ?>