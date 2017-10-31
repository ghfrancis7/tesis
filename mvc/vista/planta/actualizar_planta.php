<?php 

	require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
			$IDPlanta = $_POST['IDPlanta'];
			$PlantaNombre = $_POST['PlantaNombre'];
			$PlantaLocalidad = $_POST['PlantaLocalidad'];
			$PlantaDireccion = $_POST['PlantaDireccion'];
			$PlantaTelefono = $_POST['PlantaTelefono'];
			$PlantaMail = $_POST['PlantaMail'];

		try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE planta set PlantaNombre = :PlantaNombre, PlantaLocalidad = :PlantaLocalidad, PlantaDireccion =:PlantaDireccion, PlantaTelefono =:PlantaTelefono, PlantaMail =:PlantaMail where IDPlanta = :IDPlanta");
			$pst->bindParam(":IDPlanta",$IDPlanta,PDO::PARAM_STR);
			$pst->bindParam(":PlantaNombre",$PlantaNombre,PDO::PARAM_STR);
			$pst->bindParam(":PlantaLocalidad",$PlantaLocalidad,PDO::PARAM_STR);
			$pst->bindParam(":PlantaDireccion",$PlantaDireccion,PDO::PARAM_STR);
			$pst->bindParam(":PlantaTelefono",$PlantaTelefono,PDO::PARAM_STR);
			$pst->bindParam(":PlantaMail",$PlantaMail,PDO::PARAM_STR);
			
			$pst->execute();

			$pdo->mysql->commit();
			header("Location:ver_planta.php");
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

		 ?>