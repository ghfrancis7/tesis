<?php 

		include_once("Conexion.php");
	class Cliente{

		public $IDCliente;
		public $IDPlanta;
		public $ClienteNombre;
		public $ClienteCuit;
		public $ClienteDireccion;
		public $ClienteTelefono;
		public $ClienteCantidadPlantas;
		public $ClienteFechaAlta;
		public $ClienteFechaBaja;
		public $ClienteEstado;

	private $pdo;


		public function __construct(){
		
 			$pdo = new Conexion();

		}


		public function listarCliente(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM cliente";

					$cliente = $pdo->mysql->query($q);
		
				return $cliente;
			
		}
		public function buscarCliente($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM cliente WHERE IDCliente ='$buscar' OR ClienteNombre='$buscar' OR ClienteCuit = '$buscar'";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		}

		public function set($atributo,$contenido){
			$this->atributo=$contenido;

		}
		public function get($atributo){
			return $this->$atributo;
		}


	public function crearCliente(){

		$pdo=new Conexion();
		$ClienteNombre= $_POST['ClienteNombre'];
		$ClienteCuit= $_POST['ClienteCuit'];
		$ClienteDireccion= $_POST['ClienteDireccion'];
		$ClienteTelefono= $_POST['ClienteTelefono'];
		$ClienteCantidadPlantas= $_POST['ClienteCantidadPlantas'];
		$ClienteFechaAlta= $_POST['ClienteFechaAlta'];
		$ClienteFechaBaja= $_POST['ClienteFechaBaja'];
		$ClienteEstado= $_POST['ClienteEstado'];

		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("INSERT INTO cliente values (:ClienteNombre,:ClienteCuit,:ClienteDireccion,:ClienteTelefono,:ClienteCantidadPlantas,:ClienteFechaAlta,:ClienteFechaBaja,:ClienteEstado");
		$pst->bindParam(":ClienteNombre",$ClienteNombre,PDO::PARAM_STR);
		$pst->bindParam(":ClienteCuit",$ClienteCuit,PDO::PARAM_STR);
		$pst->bindParam(":ClienteDireccion",$ClienteDireccion,PDO::PARAM_STR);
		$pst->bindParam(":ClienteTelefono",$ClienteTelefono,PDO::PARAM_STR);
		$pst->bindParam(":ClienteCantidadPlantas",$ClienteCantidadPlantas,PDO::PARAM_STR);
		$pst->bindParam(":ClienteFechaAlta",$ClienteFechaAlta,PDO::PARAM_STR);
		$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
		$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);

		$pst->execute();

				}
}
	
 ?>