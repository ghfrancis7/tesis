<?php 

	include_once("Conexion.php");
		class Cliente{

			public $IDCliente;
			public $IDPlanta;
			public $ClienteNombre;
			public $ClienteCuit;
			public $ClienteDireccion;
			public $ClienteTelefono;
			public $ClienteFechaAlta;
			public $ClienteFechaBaja;
			public $ClienteEstado;

		private $pdo;

			public function __construct(){
			
	 			$pdo = new Conexion();

			}

		public function listarCliente($idusuario){

				 $pdo = new Conexion();


				 $q="SELECT * FROM cliente WHERE IDUsuario='$idusuario'";

					$cliente = $pdo->mysql->query($q);
		
				return $cliente;
			
		}
		public function listarClienteActivo($idusuario){

				 $pdo = new Conexion();


				 $q="SELECT * FROM cliente WHERE IDUsuario='$idusuario' AND ClienteEstado='Activo'";

					$cliente = $pdo->mysql->query($q);
		
				return $cliente;
			
		}
		public function listarClienteInactivo($idusuario){

				 $pdo = new Conexion();


				 $q="SELECT * FROM cliente WHERE IDUsuario='$idusuario' AND ClienteEstado='Inactivo'";

					$cliente = $pdo->mysql->query($q);
		
				return $cliente;
			
		}
		public function buscarCliente($buscar,$idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM cliente WHERE IDUsuario=$idusuario AND IDCliente LIKE '%$buscar%' OR IDUsuario=$idusuario AND ClienteNombre LIKE '%$buscar%' OR IDUsuario=$idusuario AND ClienteCUIT LIKE '%$buscar%'";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		}

		public function set($atributo,$contenido){
			$this->atributo=$contenido;

		}
		public function get($atributo){
			return $this->$atributo;
		}
}
	
 ?>