<?php 

	require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
			$IDTratamiento = $_POST['IDTratamiento'];
			$TrataNombre = $_POST['TrataNombre'];
			$TrataNumAnalisis = $_POST['TrataNumAnalisis'];
			$TrataDescripcion = $_POST['TrataDescripcion'];

		try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE tratamiento set TrataNombre = :TrataNombre, TrataNumAnalisis = :TrataNumAnalisis,TrataDescripcion =:TrataDescripcion where IDTratamiento = :IDTratamiento");
			$pst->bindParam(":IDTratamiento",$IDTratamiento,PDO::PARAM_STR);
			$pst->bindParam(":TrataNombre",$TrataNombre,PDO::PARAM_STR);
			$pst->bindParam(":TrataNumAnalisis",$TrataNumAnalisis,PDO::PARAM_STR);
			$pst->bindParam(":TrataDescripcion",$TrataDescripcion,PDO::PARAM_STR);
			
			$pst->execute();

			$pdo->mysql->commit();
			header("Location:ver_activo.php");
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

		 ?>