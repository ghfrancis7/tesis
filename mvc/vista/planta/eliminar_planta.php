	<?php 

		require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDPlanta = $_GET['IDPlanta'];
		$PlantaFechaBaja= date('Y/m/d');
		$PlantaFechaAlta= date('Y/m/d');

	try {

		$pdo->mysql->beginTransaction();

		$datosPlanta = $pdo->mysql->prepare("SELECT * FROM planta where IDPlanta = :IDPlanta");
		$datosPlanta->bindParam(":IDPlanta", $IDPlanta, PDO::PARAM_INT);
		$datosPlanta->execute();
		$plantita = $datosPlanta->fetch();	

				if ($plantita['PlantaEstado']=="Inactivo") {
					$PlantaFechaBaja=NULL;
					$PlantaEstado="Activo";

					$pst = $pdo->mysql->prepare("INSERT INTO planta (IDCliente,IDUsuario,PlantaNombre, PlantaLocalidad,PlantaDireccion,PlantaTelefono,PlantaMail,PlantaFechaAlta,PlantaEstado) VALUES (:IDCliente,:IDUsuario,:PlantaNombre,:PlantaLocalidad,:PlantaDireccion,:PlantaTelefono,:PlantaMail,:PlantaFechaAlta,:PlantaEstado)");

								$pst->bindParam(":IDCliente",$plantita['IDCliente'],PDO::PARAM_STR);
								$pst->bindParam(":IDUsuario",$plantita['IDUsuario'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaNombre",$plantita['PlantaNombre'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaLocalidad",$plantita['PlantaLocalidad'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaDireccion",$plantita['PlantaDireccion'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaTelefono",$plantita['PlantaTelefono'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaMail",$plantita['PlantaMail'],PDO::PARAM_STR);
								$pst->bindParam(":PlantaFechaAlta",$PlantaFechaAlta,PDO::PARAM_STR);
								$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

				}elseif ($plantita['PlantaEstado']=="Activo") {
						$PlantaEstado="Inactivo";

						$pst = $pdo->mysql->prepare("UPDATE planta set PlantaEstado =:PlantaEstado , PlantaFechaBaja =:PlantaFechaBaja where IDPlanta = :IDPlanta");
						$pst->bindParam(":IDPlanta",$IDPlanta,PDO::PARAM_STR);
						$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);
						$pst->bindParam(":PlantaFechaBaja",$PlantaFechaBaja,PDO::PARAM_STR);
		
				$pst->execute();

				$pdo->mysql->commit();

						}
		header("Location:ver_planta.php");
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
				echo "No se pudo modificar";
		
	}
	 ?>