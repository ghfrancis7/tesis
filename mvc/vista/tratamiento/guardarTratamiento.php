<?php 

	require_once("../../modelo/Conexion.php");
	include_once("../../modelo/Tratamiento.php");

		$controlador = new Tratamiento();
		$sql= $controlador->listarTratamiento();

			$nombreused="false";

			$pdo=new Conexion();

				$TrataNombre= $_POST['TrataNombre'];
				$IDUsuario=$_POST['IDUsuario'];
				$TrataFecha= $_POST['TrataFecha'];
				$TrataNumAnalisis= $_POST['TrataNumAnalisis'];
				$TrataDescripcion= $_POST['TrataDescripcion'];
				$TrataEstado= $_POST['TrataEstado'];


	try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO tratamiento (TrataNombre, TrataFecha,TrataNumAnalisis,TrataDescripcion,TrataEstado) VALUES (:TrataNombre,:TrataFecha,:TrataNumAnalisis,:TrataDescripcion,:TrataEstado)");
			$pst->bindParam(":TrataNombre",$TrataNombre,PDO::PARAM_STR);
			$pst->bindParam(":TrataFecha",$TrataFecha,PDO::PARAM_STR);
			$pst->bindParam(":TrataNumAnalisis",$TrataNumAnalisis,PDO::PARAM_STR);
			$pst->bindParam(":TrataDescripcion",$TrataDescripcion,PDO::PARAM_STR);
			$pst->bindParam(":TrataEstado",$TrataEstado,PDO::PARAM_STR);
		$pst->execute();
		$pdo->mysql->commit() ;

		echo"<script type=\"text/javascript\">alert('Se agrego el Tratamiento Correctamente'); window.location='../tratamiento/ver_tratamiento.php';</script>";
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
			echo "No se pudo agregar la planta";
		
	}
	}
		?>