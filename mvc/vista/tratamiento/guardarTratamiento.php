<?php 
	$usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }

	require_once("../../modelo/Conexion.php");
	include_once("../../modelo/Tratamiento.php");

		$controlador = new Tratamiento();
		$sql= $controlador->listarTratamiento($idUsuario);

			$nombreused="false";

			$pdo=new Conexion();

				$IDPlanta= $_POST['IDPlanta'];
				$TrataNombre= $_POST['TrataNombre'];
				$TrataFecha= $_POST['TrataFecha'];
				$TrataNumAnalisis= $_POST['TrataNumAnalisis'];
				$TrataDescripcion= $_POST['TrataDescripcion'];
				$TrataEstado= $_POST['TrataEstado'];


	try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO tratamiento (IDPlanta,TrataNombre,IDUsuario, TrataFecha,TrataNumAnalisis,TrataDescripcion,TrataEstado) VALUES (:IDPlanta,:TrataNombre,:IDUsuario,:TrataFecha,:TrataNumAnalisis,:TrataDescripcion,:TrataEstado)");
			$pst->bindParam(":IDPlanta",$IDPlanta,PDO::PARAM_STR);
			$pst->bindParam(":TrataNombre",$TrataNombre,PDO::PARAM_STR);
			$pst->bindParam(":IDUsuario",$idUsuario,PDO::PARAM_STR);
			$pst->bindParam(":TrataFecha",$TrataFecha,PDO::PARAM_STR);
			$pst->bindParam(":TrataNumAnalisis",$TrataNumAnalisis,PDO::PARAM_STR);
			$pst->bindParam(":TrataDescripcion",$TrataDescripcion,PDO::PARAM_STR);
			$pst->bindParam(":TrataEstado",$TrataEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

		echo"<script type=\"text/javascript\">alert('Se agrego el Tratamiento Correctamente'); window.location='ver_activo.php';</script>";
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
			echo "No se pudo agregar la planta";
		
	}
	
		?>