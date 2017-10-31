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
		public function buscarCliente($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM cliente WHERE IDCliente LIKE '%$buscar%' OR ClienteNombre LIKE '%$buscar%' OR ClienteCUIT LIKE '%$buscar%'";

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