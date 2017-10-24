<?php 

	require ("../../modelo/Conexion.php");
	include_once("../../modelo/Tratamiento.php");

	$pdo = new Conexion();

	$IDTratamiento = $_POST['IDTratamiento'];
	$IDProducto = $_POST['IDProducto'];
	$LoteCantidad = $_POST['LoteCantidad'];

	try {

	$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("INSERT INTO lote (IDTratamiento,IDProducto,LoteCantidad) VALUES (:IDTratamiento,:IDProducto,:LoteCantidad)");
		$pst->bindParam(":IDTratamiento",$IDTratamiento,PDO::PARAM_STR);
		$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
		$pst->bindParam(":LoteCantidad",$LoteCantidad,PDO::PARAM_STR);


		$pst->execute();
		$pdo->mysql->commit();

		echo"<script type=\"text/javascript\">alert('Se agrego el producto correctamente'); window.location='agregarproductos?IDTratamiento=$IDTratamiento.php';</script>";
			

			} catch (Exception $e) {
		$pdo->mysql->rollback();
			echo"<script type=\"text/javascript\">alert('No se agrego,ya existe un producto igual'); window.location='agregarproductos?IDTratamiento=$IDTratamiento.php';</script>";
		
		}
	
	?>