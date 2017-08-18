<?php 

	require_once("../../modelo/Conexion.php");
	include_once("../../modelo/Planta.php");

		$controlador = new Planta();
		$sql= $controlador->listarPlanta();

			$nombreused="false";

			$pdo=new Conexion();

				$PlantaNombre= $_POST['PlantaNombre'];
				$PlantaLocalidad= $_POST['PlantaLocalidad'];
				$PlantaDireccion= $_POST['PlantaDireccion'];
				$PlantaTelefono= $_POST['PlantaTelefono'];
				$PlantaEmail= $_POST['PlantaEmail'];
				$ProductoFechaAltaDB= $_POST['PlantaFechaAlta'];
				$ProductoFechaBajaDB= $_POST['PlantaFechaBaja'];
				$PlantaEstado= $_POST['PlantaEstado'];


		
		foreach($sql as $row){
 			if ($PlantaNombre==$row['PlantaNombre']) {
 				$nombreused='true';
 			}
}
		if ($nombreused=="true") {
			echo"<script type=\"text/javascript\">alert('Ya hay otra planta con este nombre'); window.location='crearPlanta.php';</script>"; 
		}elseif ($PlantaNombre==""){
			echo"<script type=\"text/javascript\">alert('No ingreso el nombre de la planta'); window.location='crearPlanta.php';</script>"; 
		}else {

	try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO planta (PlantaNombre, PlantaLocalidad,PlantaDireccion,PlantaTelefono,PlantaEmail,PlantaFechaAlta,PlantaFechaBaja,PlantaEstado) VALUES (:PlantaNombre,:PlantaLocalidad,:PlantaDireccion,:PlantaTelefono,:PlantaEmail,:PlantaFechaAlta,:PlantaFechaBaja,:PlantaEstado)");
			$pst->bindParam(":PlantaNombre",$PlantaNombre,PDO::PARAM_STR);
			$pst->bindParam(":PlantaLocalidad",$PlantaLocalidad,PDO::PARAM_STR);
			$pst->bindParam(":PlantaDireccion",$PlantaDireccion,PDO::PARAM_STR);
			$pst->bindParam(":PlantaTelefono",$PlantaTelefono,PDO::PARAM_STR);
			$pst->bindParam(":PlantaEmail",$PlantaEmail,PDO::PARAM_STR);
			$pst->bindParam(":PlantaFechaAlta",$PlantaFechaAlta,PDO::PARAM_STR);
			$pst->bindParam(":PlantaFechaBaja",$PlantaFechaBaja,PDO::PARAM_STR);
			$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

		header("Location:crearPlanta.php");
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
			echo "No se pudo agregar la planta";
		
	}
	}
		?>