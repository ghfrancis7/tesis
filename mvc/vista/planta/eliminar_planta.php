	<?php 

		require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDPlanta = $_GET['IDPlanta'];
		$PlantaFechaBaja= date('m/d/Y');
		$PlantaFechaAlta= date('m/d/Y');

	//try {

		$pdo->mysql->beginTransaction();

		$datosPlanta = $pdo->mysql->prepare("SELECT * FROM planta where IDPlanta = :IDPlanta");
		$datosPlanta->bindParam(":IDPlanta", $IDPlanta, PDO::PARAM_INT);
		$datosPlanta->execute();
		$prod = $datosPlanta->fetch();	

				if ($prod['PlantaEstado']=="Inactivo") {
					$PlantaEstado="Activo";

					$pst = $pdo->mysql->prepare("INSERT INTO planta (PlantaNombre, PlantaLocalidad,PlantaDireccion,PlantaTelefono,PlantaEmail,PlantaFechaAlta,PlantaEstado) VALUES (:PlantaNombre,:PlantaLocalidad,:PlantaDireccion,:PlantaTelefono,:PlantaEmail,:PlantaFechaAlta,:PlantaEstado)");
								$pst->bindParam(":PlantaNombre",$PlantaNombre,PDO::PARAM_STR);
								$pst->bindParam(":PlantaLocalidad",$PlantaLocalidad,PDO::PARAM_STR);
								$pst->bindParam(":PlantaDireccion",$PlantaDireccion,PDO::PARAM_STR);
								$pst->bindParam(":PlantaTelefono",$PlantaTelefono,PDO::PARAM_STR);
								$pst->bindParam(":PlantaEmail",$PlantaEmail,PDO::PARAM_STR);
								$pst->bindParam(":PlantaFechaAlta",$PlantaFechaAlta,PDO::PARAM_STR);
								$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

				}elseif ($prod['PlantaEstado']=="Activo") {
					$PlantaEstado="Inactivo";
				}

		
		$pst = $pdo->mysql->prepare("UPDATE planta set PlantaEstado =:PlantaEstado , PlantaFechaBaja =:PlantaFechaBaja where IDPlanta = :IDPlanta");
		$pst->bindParam(":IDPlanta",$IDPlanta,PDO::PARAM_STR);
		$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);

		if ($PlantaEstado=="Inactivo") {
			$pst->bindParam(":PlantaFechaBaja",$PlantaFechaBaja,PDO::PARAM_STR);

		}elseif ($PlantaEstado=="Activo") {
			$PlantaFechaBaja="";
			$pst->bindParam(":PlantaFechaBaja",$PlantaFechaBaja,PDO::PARAM_STR);
		}
		
		$pst->execute();

		$pdo->mysql->commit();
		header("Location:ver_planta.php");
		
	//} catch (Exception $e) {
	//	$pdo->mysql->rollback();
		//		echo "No se pudo modificar";
		
	//}

		


	 ?>