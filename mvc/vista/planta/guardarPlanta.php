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
	include_once("../../modelo/Planta.php");

		$controlador = new Planta();
		$sql= $controlador->listarPlanta($idUsuario);

			$nombreused="false";

			$pdo=new Conexion();

				$IDCliente= $_POST['IDCliente'];
				$PlantaNombre= $_POST['PlantaNombre'];
				$PlantaLocalidad= $_POST['PlantaLocalidad'];
				$PlantaDireccion= $_POST['PlantaDireccion'];
				$PlantaTelefono= $_POST['PlantaTelefono'];
				$PlantaMail= $_POST['PlantaMail'];
				$PlantaFechaAlta= $_POST['PlantaFechaAlta'];
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

	//try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO planta (IDCliente,IDUsuario,PlantaNombre, PlantaLocalidad,PlantaDireccion,PlantaTelefono,PlantaMail,PlantaFechaAlta,PlantaEstado) VALUES (:IDCliente,:IDUsuario,:PlantaNombre,:PlantaLocalidad,:PlantaDireccion,:PlantaTelefono,:PlantaMail,:PlantaFechaAlta,:PlantaEstado)");
			$pst->bindParam(":IDCliente",$IDCliente,PDO::PARAM_STR);
			$pst->bindParam(":IDUsuario",$idUsuario,PDO::PARAM_STR);
			$pst->bindParam(":PlantaNombre",$PlantaNombre,PDO::PARAM_STR);
			$pst->bindParam(":PlantaLocalidad",$PlantaLocalidad,PDO::PARAM_STR);
			$pst->bindParam(":PlantaDireccion",$PlantaDireccion,PDO::PARAM_STR);
			$pst->bindParam(":PlantaTelefono",$PlantaTelefono,PDO::PARAM_STR);
			$pst->bindParam(":PlantaMail",$PlantaMail,PDO::PARAM_STR);
			$pst->bindParam(":PlantaFechaAlta",$PlantaFechaAlta,PDO::PARAM_STR);
			$pst->bindParam(":PlantaEstado",$PlantaEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

		echo"<script type=\"text/javascript\">alert('Se agrego la Planta Correctamente'); window.location='../planta/ver_planta.php';</script>";
		
	//} catch (Exception $e) {
	//	$pdo->mysql->rollback();
	//		echo "No se pudo agregar la planta";
		
	//}
	}
		?>