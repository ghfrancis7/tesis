<?php 

include_once("Conexion.php");

	class Lote{

		private $IDLote;
		private $IDTratamiento;
		private $IDProducto;
		private $LoteCantidad;
		

		private $pdo;


		public function __construct(){
		
 			$pdo = new Conexion();

		}

		public function listarLote($idtratamiento){

				 $pdo = new Conexion();

				 $q="SELECT * FROM lote L INNER JOIN producto P ON L.IDProducto = P.IDProducto INNER JOIN tratamiento T ON L.IDTratamiento= T.IDTratamiento WHERE L.IDTratamiento= '$idtratamiento'";

					$lote = $pdo->mysql->query($q);
		
				return $lote;
			
		}
		public function productoLote(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM lote L INNER JOIN producto P ON L.IDLote = P.IDProducto";

					$lote = $pdo->mysql->query($q);
		
				return $lote;
			
		}
		 
		public function buscarLote($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM lote WHERE IDLote LIKE '%$buscar%' OR ProductoNombre LIKE '%$buscar%' OR ProductoPrecio LIKE '%$buscar%'";

					$lote = $pdo->mysql->query($q);
		
				return $lote;
			
		
		}
	}
 ?>