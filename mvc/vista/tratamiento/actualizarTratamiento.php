<?php 

	require ("../../modelo/Conexion.php");
	include_once("../../modelo/Tratamiento.php");

	$pdo = new Conexion();

	$IDTratamiento = $_POST['IDTratamiento'];
	$IDProducto = $_POST['IDProducto'];
	$LoteCantidad = $_POST['LoteCantidad'];

	include_once("../../modelo/Lote.php");
        $controlador = new Lote();
        $sql= $controlador->listarLote($IDTratamiento);
        $bandera="";

 		foreach($sql as $row){
 			if ($row['IDProducto']==$IDProducto) {
 				$bandera="false";
 				
 			}
 			}

 			
 			$pdo->mysql->beginTransaction();
		if ($bandera=="") {
			
		$pst = $pdo->mysql->prepare("INSERT INTO lote (IDProducto,IDTratamiento,LoteCantidad) VALUES (:IDProducto,:IDTratamiento,:LoteCantidad)");
		$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
		$pst->bindParam(":IDTratamiento",$IDTratamiento,PDO::PARAM_STR);
		$pst->bindParam(":LoteCantidad",$LoteCantidad,PDO::PARAM_STR);


		$pst->execute();
		$pdo->mysql->commit();

		echo"<script type=\"text/javascript\">alert('Se agrego el producto correctamente'); window.location='agregarproductos?IDTratamiento=$IDTratamiento';</script>";
			

			}else{
				
		$pdo->mysql->rollback();
			echo"<script type=\"text/javascript\">alert('No se agrego,ya existe un producto igual'); window.location='agregarproductos?IDTratamiento=$IDTratamiento';</script>";
		
		}
			
	
		

	
	?>