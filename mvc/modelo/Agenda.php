<?php 

include_once("Conexion.php");

	class Agenda{
		
		private $IDPlanta;
		private $IDUsuario;
		private $Titulo;
		private $Descripcion;
		private $Inicio;
		private $Fin;
		private $start;

		private $pdo;

		public function __construct(){
		
 			$pdo = new Conexion();

		}

		public function VerTodasCita($start, $iduser){

				 $pdo = new Conexion();
				 $start1 = $start.' + 3 day';
				 
				 $q="SELECT * FROM cita WHERE (InicioCita BETWEEN $start AND $start1) AND IDUsuario LIKE $iduser";

					$cita = $pdo->mysql->query($q);
		
				//return $cita;
				return $cita;
			
		}
		
		public function CuentaCita($month, $dia, $iduser){

				$pdo = new Conexion();
				
				$start="'".$month."-".$dia."'";
				$end = "'".$month."-".($dia+1)."'";	 
				
				$q="SELECT COUNT(*) FROM cita WHERE (InicioCita BETWEEN $start AND $end) AND IDUsuario LIKE $iduser";

				$cuentaCitas = $pdo->mysql->query($q);
				$cuentaCitas=$cuentaCitas." ".$end;
				
				return $cuentaCitas;
		}
	}
 ?>