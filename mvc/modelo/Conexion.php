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
