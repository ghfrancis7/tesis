<?php 

	require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
			$IDProducto = $_POST['IDProducto'];
			$ProductoNombre = $_POST['ProductoNombre'];
			$ProductoNumeroSerie = $_POST['ProductoNumeroSerie'];
			$ProductoPrecio = $_POST['ProductoPrecio'];
			
			

		try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE producto set ProductoNombre = :ProductoNombre,ProductoNumeroSerie =:ProductoNumeroSerie,ProductoPrecio=:ProductoPrecio where IDProducto = :IDProducto");
			$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNombre",$ProductoNombre,PDO::PARAM_STR);
			$pst->bindParam(":ProductoNumeroSerie",$ProductoNumeroSerie,PDO::PARAM_STR);
			$pst->bindParam(":ProductoPrecio",$ProductoPrecio,PDO::PARAM_STR);

			$pst->execute();

			$pdo->mysql->commit();
			header("Location:ver_producto.php");
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

		 ?>