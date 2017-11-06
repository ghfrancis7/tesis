	<?php 

		require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDAgenda = $_GET['IDAgenda'];
		$AgendaFechaBaja= date('Y/m/d');
		$AgendaFecha= date('Y/m/d');

	try {

		$pdo->mysql->beginTransaction();

		$datosAgenda = $pdo->mysql->prepare("SELECT * FROM agenda where IDAgenda = :IDAgenda");
		$datosAgenda->bindParam(":IDAgenda", $IDAgenda, PDO::PARAM_INT);
		$datosAgenda->execute();
		$agenda = $datosAgenda->fetch();	

				
				if ($agenda['AgendaEstado']=="Activo") {
						$AgendaEstado="Inactivo";

						$pst = $pdo->mysql->prepare("UPDATE agenda set AgendaEstado =:AgendaEstado , AgendaFechaBaja =:AgendaFechaBaja where IDAgenda = :IDAgenda");
						$pst->bindParam(":IDAgenda",$IDAgenda,PDO::PARAM_STR);
						$pst->bindParam(":AgendaEstado",$AgendaEstado,PDO::PARAM_STR);
						$pst->bindParam(":AgendaFechaBaja",$AgendaFechaBaja,PDO::PARAM_STR);
		
				$pst->execute();

				$pdo->mysql->commit();

						}
		header("Location:ver_agenda_todas.php");
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
				echo "No se pudo modificar";
		
	}
	 ?>