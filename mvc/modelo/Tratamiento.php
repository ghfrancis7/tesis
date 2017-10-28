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

		public function listarTratamiento($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario";

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function listarTratamientoActivo($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario AND TrataEstado='Activo'" ;

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function listarTratamientoInactivo($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario AND TrataEstado='Inactivo'" ;

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