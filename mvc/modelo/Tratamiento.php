<?php 

include_once("Conexion.php");

	class Tratamiento{

		private $IDTratamiento;
		private $IDUsuario;
		private $IDPlanta;
		private $TrataNombre;
		private $TrataFecha;
		private $TrataNumAnalisis;
		private $TrataDescripcion;


		private $pdo;


		public function __construct(){
		
 			$pdo = new Conexion();

		}

		public function listarTratamiento(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDTratamiento = P.IDPlanta";

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function buscarTratamiento($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento WHERE IDTratamiento LIKE '%$buscar%' OR TrataNombre LIKE '%$buscar%' OR TrataNumAnalisis LIKE '%$buscar%'";

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}

	}