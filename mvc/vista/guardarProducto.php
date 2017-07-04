<?php 

	require("../modelo/Conexion.php");

	try {

			$pdo=new Conexion();

			$ProductoNombre= $_POST['ProductoNombre'];
			$ProductoPrecio= $_POST['ProductoPrecio'];
			$ProductoFechaAltaDB= $_POST['ProductoFechaAltaDB'];
			$ProductoFechaBajaDB= $_POST['ProductoFechaBajaDB'];
			$ProductoEstado= $_POST['ProductoEstado'];


	

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
		?>