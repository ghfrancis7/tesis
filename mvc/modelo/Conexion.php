<?php 

	class Conexion{

		private $host;
		private $user;
		private $pass;
		private $db;

		public function __construct(){

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

	}

 ?>