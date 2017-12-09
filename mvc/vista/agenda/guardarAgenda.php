<?php 
 $usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../../../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }


	require_once("../../modelo/Conexion.php");
	include_once("../../modelo/Agenda.php");

		$controlador = new Agenda();
		$sql= $controlador->listarAgenda($idUsuario);

			$nombreused="false";
			$numserieused="false";
			$fechaused="";
			$horaused="";

			$pdo=new Conexion();

				$IDUsuario= $_POST['IDUsuario'];
				$IDTratamiento= $_POST['IDTratamiento'];
				$AgendaNombre= $_POST['AgendaNombre'];
				$AgendaFecha= $_POST['AgendaFecha'];
				$AgendaHora= $_POST['AgendaHora'];
				$AgendaHora.=':00';
				$AgendaDescripcion= $_POST['AgendaDescripcion'];
				$AgendaEstado= $_POST['AgendaEstado'];
				$today=date("Y-m-d");
				


		foreach($sql as $row){
			$estado=$row['AgendaEstado'];
 			if ($AgendaFecha==$row['AgendaFecha'] AND $estado=="Activo") {
 					$fechaused='true';
 				}if ($AgendaHora==$row['AgendaHora']){
 					$horaused='true' ;
 						}if ($AgendaHora==$row['AgendaHora']){
 							$horaused='true' ;
 						}
		}
		
		if ($AgendaNombre==""){
			echo"<script type=\"text/javascript\">alert('No ingreso un nombre a la cita'); window.location='crearAgenda.php';</script>"; 
		}elseif ($AgendaFecha==""){
			echo"<script type=\"text/javascript\">alert('No ingreso una fecha'); window.location='crearAgenda.php';</script>"; 
		}elseif ($AgendaFecha<$today){
			echo"<script type=\"text/javascript\">alert('Esta fecha ya paso'); window.location='crearAgenda.php';</script>"; 
		}elseif ($fechaused=='true' AND $horaused=='true'){
			echo"<script type=\"text/javascript\">alert('Ya tiene una cita en esta fecha'); window.location='crearAgenda.php';</script>"; 
		}else {

	//try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO agenda (IDUsuario,IDTratamiento,AgendaNombre,AgendaFecha,AgendaHora,AgendaDescripcion,AgendaEstado) VALUES (:IDUsuario,:IDTratamiento,:AgendaNombre,:AgendaFecha,:AgendaHora,:AgendaDescripcion,:AgendaEstado)");
			$pst->bindParam(":IDUsuario",$IDUsuario,PDO::PARAM_STR);
			$pst->bindParam(":IDTratamiento",$IDTratamiento,PDO::PARAM_STR);
			$pst->bindParam(":AgendaNombre",$AgendaNombre,PDO::PARAM_STR);
			$pst->bindParam(":AgendaFecha",$AgendaFecha,PDO::PARAM_STR);
			$pst->bindParam(":AgendaHora",$AgendaHora,PDO::PARAM_STR);
			$pst->bindParam(":AgendaDescripcion",$AgendaDescripcion,PDO::PARAM_STR);
			$pst->bindParam(":AgendaEstado",$AgendaEstado,PDO::PARAM_STR);
			
	
		$pst->execute();
		$pdo->mysql->commit() ;

		header("Location:ver_agenda.php");
		
	//} catch (Exception $e) {
	//	$pdo->mysql->rollback();
	//		echo "No se pudo agregar el cliente";
		
	//}
	}
		?>