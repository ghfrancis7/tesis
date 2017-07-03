<?php 

	class Conexion{
		
		public $mysql=null;

		 function __construct(){

			$this->mysql = $this->conectar();

		
		}

		public function conectar(){

			$host = "127.0.0.1";
			$user = "root";
			$pw ="";
			$db = "dbtesis";
			$charset="utf8";
			$opt = [PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC];
			$pdo = new pdo("mysql:host={$host};dbname={$db};charset={$charset}",$user,$pw,$opt);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $pdo;

		}
	}

 ?>

 <?php 
			
			//if ($this->conexion->connect_errno){
			//die("Fallo al tratar de conectar con MySQL: (".$this->conexion->connect_errno.")");
		//}

		

			

		/*public function __construct(){

			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->db="dbtesis";

			$con =mysql_connect($this->host, $this->user,$this->pass,$this->db);
			if($con){
				mysql_select_db($this->db,$con);
			}
		}

		public function consultaSimple($sql){
			mysql_query($sql);
		}
		public function consultaRetorno($sql){
			$consulta= mysql_query($sql);
			return $consulta;
		}
*/
	?>