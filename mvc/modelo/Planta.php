<?php 

include_once("Conexion.php");

	class Planta{

		private $IDPlanta;
		private $PlantaNombre;
		private $PlantaLocalidad;
		private $PlantaDireccion;
		private $PlantaTelefono;
		private $PlantaEmail;
		private $PlantaFechaAlta;
		private $PlantaFechaBaja;
		private $PlantaEstado;


		private $pdo;


		public function __construct(){
		
 			$pdo = new Conexion();

		}

		public function listarPlanta(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
		public function buscarPlanta($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta WHERE IDPlanta ='$buscar' OR PlantaNombre ='$buscar' OR PlantaLocalidad = '$buscar'";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
	}