<?php 




	require("../modelo/Conexion.php");
	include_once("../modelo/Producto.php");

		$controlador = new Producto();
		$sql= $controlador->listarProducto();

			$nombreused="false";

			$pdo=new Conexion();

				$ProductoNombre= $_POST['ProductoNombre'];
				$ProductoPrecio= $_POST['ProductoPrecio'];
				$ProductoFechaAltaDB= $_POST['ProductoFechaAltaDB'];
				$ProductoFechaBajaDB= $_POST['ProductoFechaBajaDB'];
				$ProductoEstado= $_POST['ProductoEstado'];

		
		foreach($sql as $row){
 			if ($ProductoNombre==$row['ProductoNombre']) {
 				$nombreused='true';
 			}
}
if ($nombreused=="true") {
			echo"<script type=\"text/javascript\">alert('Ya hay otro producto con este nombre'); window.location='crearProducto.php';</script>"; 
		}else{

	try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO producto (ProductoNombre, ProductoPrecio,ProductoFechaAltaDB,ProductoFechaBajaDB,ProductoEstado) VALUES (:ProductoNombre,:ProductoPrecio,:ProductoFechaAltaDB,:ProductoFechaBajaDB,:ProductoEstado)");
			$pst->bindParam(":ProductoNombre",$ProductoNombre,PDO::PARAM_STR);
			$pst->bindParam(":ProductoPrecio",$ProductoPrecio,PDO::PARAM_STR);
			$pst->bindParam(":ProductoFechaAltaDB",$ProductoFechaAltaDB,PDO::PARAM_STR);
			$pst->bindParam(":ProductoFechaBajaDB",$ProductoFechaBajaDB,PDO::PARAM_STR);
			$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);
	

		$pst->execute();
		$pdo->mysql->commit() ;

		header("Location:crearProducto.php");
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
			echo "No se pudo agregar el cliente";
		
	}
}
		?>