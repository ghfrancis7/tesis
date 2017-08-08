<?php 

	require ("../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDProducto = $_POST['IDProducto'];
		$ProductoNombre = $_POST['ProductoNombre'];
		$ProductoPrecio = $_POST['ProductoPrecio'];
		$ProductoFechaAltaDB = $_POST['ProductoFechaAltaDB'];
		$ProductoFechaBajaDB = $_POST['ProductoFechaBajaDB'];
		$ProductoEstado = $_POST['ProductoEstado'];

		try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE producto set ProductoNombre = :ProductoNombre, ProductoPrecio = :ProductoPrecio, ProductoFechaAltaDB =:ProductoFechaAltaDB, ProductoFechaBajaDB =:ProductoFechaBajaDB, ProductoEstado =:ProductoEstado where IDProducto = :IDProducto");
			$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNombre",$ProductoNombre,PDO::PARAM_STR);
			$pst->bindParam(":ProductoPrecio",$ProductoPrecio,PDO::PARAM_STR);
			$pst->bindParam(":ProductoFechaAltaDB",$ProductoFechaAltaDB,PDO::PARAM_STR);
			$pst->bindParam(":ProductoFechaBajaDB",$ProductoFechaBajaDB,PDO::PARAM_STR);
			$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);
			
			$pst->execute();

			$pdo->mysql->commit();
			header("Location:ver_producto.php");
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

			


		 ?>