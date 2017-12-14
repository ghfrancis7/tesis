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

		public function listarPlanta($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta P INNER JOIN cliente C ON P.IDCliente = C.IDCliente
				 	INNER JOIN usuario U ON U.IDUsuario = P.IDUsuario WHERE P.IDUsuario = $idusuario AND P.IDCliente=C.IDCliente";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
		public function listarPlantaActivo($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta P INNER JOIN cliente C ON P.IDCliente = C.IDCliente
				 	INNER JOIN usuario U ON U.IDUsuario = P.IDUsuario WHERE P.IDUsuario = $idusuario AND P.IDCliente=C.IDCliente AND PlantaEstado='Activo'";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
		public function listarPlantaInactivo($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta P INNER JOIN cliente C ON P.IDCliente = C.IDCliente
				 	INNER JOIN usuario U ON U.IDUsuario = P.IDUsuario WHERE P.IDUsuario = $idusuario AND P.IDCliente=C.IDCliente AND PlantaEstado='Inactivo'";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
		
		public function buscarPlanta($buscar,$idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM planta P INNER JOIN cliente C ON P.IDCliente = C.IDCliente
				 	INNER JOIN usuario U ON U.IDUsuario = P.IDUsuario WHERE P.IDUsuario = $idusuario AND IDPlanta LIKE '%$buscar%' OR PlantaNombre LIKE '%$buscar%' OR PlantaLocalidad LIKE '%$buscar%'OR ClienteNombre LIKE '%$buscar%'OR PlantaTelefono LIKE '%$buscar%' OR PlantaFechaAlta LIKE '%$buscar%'";

					$planta = $pdo->mysql->query($q);
		
				return $planta;
			
		}
	}