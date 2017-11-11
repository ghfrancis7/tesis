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
		public function listarTratamientoActivoPlanta($idusuario,$idtratamiento){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario AND TrataEstado='Activo' AND T.IDTratamiento=$idtratamiento" ;

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function listarTratamientoInactivo($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario AND TrataEstado='Inactivo'" ;

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function listarTratamientoPendiente($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta INNER JOIN usuario U ON T.IDUsuario = U.IDUsuario WHERE T.IDUsuario=$idusuario AND TrataEstado='Pendiente'" ;

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function buscarTratamiento($buscar,$idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento WHERE IDUsuario=$idusuario AND IDTratamiento LIKE '%$buscar%' OR IDUsuario=$idusuario AND TrataNombre LIKE '%$buscar%' OR IDUsuario=$idusuario AND TrataNumAnalisis LIKE '%$buscar%'";

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}
		public function buscarTratamientoporplanta($idusuario,$idplanta){

				 $pdo = new Conexion();

				 $q="SELECT * FROM tratamiento WHERE IDUsuario=$idusuario AND IDPlanta=$idplanta";

					$tratamiento = $pdo->mysql->query($q);
		
				return $tratamiento;
			
		}

	}