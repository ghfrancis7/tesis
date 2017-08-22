	<?php 

		require ("../../modelo/Conexion.php");
		$pdo = new Conexion();
		$IDProducto = $_GET['IDProducto'];
		$ProductoFechaBajaDB= date('m/d/Y');

	try {

		$pdo->mysql->beginTransaction();

		$datosProducto = $pdo->mysql->prepare("SELECT * FROM producto where IDProducto = :IDProducto");
		$datosProducto->bindParam(":IDProducto", $IDProducto, PDO::PARAM_INT);
		$datosProducto->execute();
		$prod = $datosProducto->fetch();	

				if ($prod['ProductoEstado']=="Inactivo") {
					$ProductoEstado="Activo";
				}elseif ($prod['ProductoEstado']=="Activo") {
					$ProductoEstado="Inactivo";
				}

		
		$pst = $pdo->mysql->prepare("UPDATE producto set ProductoEstado =:ProductoEstado , ProductoFechaBajaDB =:ProductoFechaBajaDB where IDProducto = :IDProducto");
		$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
		$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);

		if ($ProductoEstado=="Inactivo") {
			$pst->bindParam(":ProductoFechaBajaDB",$ProductoFechaBajaDB,PDO::PARAM_STR);

		}elseif ($ProductoEstado=="Activo") {
			$ProductoFechaBajaDB="";
			$pst->bindParam(":ProductoFechaBajaDB",$ProductoFechaBajaDB,PDO::PARAM_STR);
		}
		
		
		$pst->execute();

		$pdo->mysql->commit();
		header("Location:ver_producto.php");
		
	} catch (Exception $e) {
		$pdo->mysql->rollback();
				echo "No se pudo modificar";
		
	}

		


	 ?>