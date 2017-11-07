<?php 

	include_once("Conexion.php");
		class Agenda{

			public $IDAgenda;
			public $IDUsuario;
			public $IDTratamiento;
			public $AgendaNombre;
			public $AgendaFecha;
			public $AgendaHora;
			public $AgendaDescripcion;
			public $AgendaEstado;


			private $pdo;

			public function __construct(){
			
	 			$pdo = new Conexion();

			}

		public function listarAgenda($idusuario){

				 $pdo = new Conexion();


				 $q="SELECT * FROM agenda A INNER JOIN Tratamiento T ON A.IDTratamiento=T.IDTratamiento INNER JOIN Planta P ON P.IDPlanta= T.IDPlanta WHERE A.IDUsuario = $idusuario";

					$agenda = $pdo->mysql->query($q);
		
				return $agenda;
			
		}
		public function buscarAgenda($buscar,$idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM agenda A INNER JOIN Tratamiento T ON A.IDTratamiento=T.IDTratamiento INNER JOIN Planta P ON P.IDPlanta= T.IDPlanta WHERE A.IDUsuario = $idusuario AND IDAgenda LIKE '%$buscar%' OR AgendaNombre LIKE '%$buscar%' OR AgendaFecha LIKE '%$buscar%'";

					$agenda = $pdo->mysql->query($q);
		
				return $agenda;
			
		}
	}