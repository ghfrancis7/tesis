<?php 

	require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
			$IDProducto = $_POST['IDProducto'];
			$ProductoNombre = $_POST['ProductoNombre'];
			$ProductoPrecio = $_POST['ProductoPrecio'];
			$ProductoNumeroSerie = $_POST['ProductoNumeroSerie'];

		try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE producto set ProductoNombre = :ProductoNombre, ProductoPrecio = :ProductoPrecio, ProductoNumeroSerie =:ProductoNumeroSerie where IDProducto = :IDProducto");
			$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNombre",$ProductoNombre,PDO::PARAM_STR);
			$pst->bindParam(":ProductoPrecio",$ProductoPrecio,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNumeroSerie",$ProductoNumeroSerie,PDO::PARAM_STR);
			
			$pst->execute();

			$pdo->mysql->commit();
			header("Location:ver_producto.php");
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

		 ?>