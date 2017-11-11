	<?php 

		require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDProducto = $_GET['IDProducto'];

		$ProductoFechaBajaDB= date('Y/m/d');

		$ProductoFechaAltaDB=date("Y/m/d");

	try {

		$pdo->mysql->beginTransaction();

		$datosProducto = $pdo->mysql->prepare("SELECT * FROM producto where IDProducto = :IDProducto");
		$datosProducto->bindParam(":IDProducto", $IDProducto, PDO::PARAM_INT);
		$datosProducto->execute();
		$producto = $datosProducto->fetch();	


		if ($producto['ProductoEstado']=="Inactivo") {
			$ProductoEstado="Activo";
			$ProductoFechaBajaDB = NULL;

				$pst = $pdo->mysql->prepare("INSERT INTO producto (ProductoNombre,ProductoNumeroSerie,ProductoPrecio,ProductoFechaAltaDB,ProductoDescripcion,ProductoEstado) VALUES (:ProductoNombre,:ProductoNumeroSerie,:ProductoPrecio,:ProductoFechaAltaDB,:ProductoDescripcion,:ProductoEstado)");
				$pst->bindParam(":ProductoNombre",$producto['ProductoNombre'],PDO::PARAM_STR);
				$pst->bindParam(":ProductoNumeroSerie",$producto['ProductoNumeroSerie'],PDO::PARAM_STR);
				$pst->bindParam(":ProductoPrecio",$producto['ProductoPrecio'],PDO::PARAM_STR);
				$pst->bindParam(":ProductoFechaAltaDB",$ProductoFechaAltaDB,PDO::PARAM_STR);
				$pst->bindParam(":ProductoDescripcion",$producto['ProductoDescripcion'],PDO::PARAM_STR);
				$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);

			$pst->execute();
			$pdo->mysql->commit() ;
			
					}elseif ($producto['ProductoEstado']=="Activo") {
						$ProductoEstado="Inactivo";

						$pst = $pdo->mysql->prepare("UPDATE producto set ProductoEstado =:ProductoEstado , ProductoFechaBajaDB =:ProductoFechaBajaDB where IDProducto = :IDProducto");
						$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
						$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);
						$pst->bindParam(":ProductoFechaBajaDB",$ProductoFechaBajaDB,PDO::PARAM_STR);
		
		
				$pst->execute();

				$pdo->mysql->commit();

						}
		
				header("Location:ver_producto.php");
		
		} catch (Exception $e) {
				$pdo->mysql->rollback();
					echo "No se pudo modificar";
	}

	 ?>