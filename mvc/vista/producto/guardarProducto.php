<?php 

	require_once("../../modelo/Conexion.php");
	include_once("../../modelo/Producto.php");

		$controlador = new Producto();
		$sql= $controlador->listarProducto();

			$nombreused="false";

			$pdo=new Conexion();

				$ProductoNombre= $_POST['ProductoNombre'];
				$ProductoPrecio= $_POST['ProductoPrecio'];
				$ProductoNumeroSerie= $_POST['ProductoNumeroSerie'];
				$ProductoFechaAltaDB= $_POST['ProductoFechaAltaDB'];
				$ProductoDescripcion= $_POST['ProductoDescripcion'];
				$ProductoEstado= $_POST['ProductoEstado'];

		
		foreach($sql as $row){
 			if ($ProductoNombre==$row['ProductoNombre']) {
 				$nombreused='true';
 			}
}
		if ($nombreused=="true") {
			echo"<script type=\"text/javascript\">alert('Ya hay otro producto con este nombre'); window.location='crearProducto.php';</script>"; 
		}elseif ($ProductoNombre==""){
			echo"<script type=\"text/javascript\">alert('No ingreso el nombre del producto'); window.location='crearProducto.php';</script>"; 
		}else {

	//try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO producto (ProductoNombre, ProductoPrecio,ProductoNumeroSerie,ProductoFechaAltaDB,ProductoDescripcion,ProductoEstado) VALUES (:ProductoNombre,:ProductoPrecio,:ProductoNumeroSerie,:ProductoFechaAltaDB,:ProductoDescripcion,:ProductoEstado)");
			$pst->bindParam(":ProductoNombre",$ProductoNombre,PDO::PARAM_STR);
			$pst->bindParam(":ProductoPrecio",$ProductoPrecio,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNumeroSerie",$ProductoNumeroSerie,PDO::PARAM_STR);
			$pst->bindParam(":ProductoFechaAltaDB",$ProductoFechaAltaDB,PDO::PARAM_STR);
			$pst->bindParam(":ProductoDescripcion",$ProductoDescripcion,PDO::PARAM_STR);
			$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);
			
	
		$pst->execute();
		$pdo->mysql->commit() ;

		header("Location:crearProducto.php");
		
	//} catch (Exception $e) {
	//	$pdo->mysql->rollback();
	//		echo "No se pudo agregar el cliente";
		
	//}
	}
		?>