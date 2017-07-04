<?php 

require ("../modelo/Conexion.php");
$pdo = new Conexion();
$IDProducto = $_POST['IDProducto'];
$ProductoEstado = $_POST['ProductoEstado'];

try {

	$pdo->mysql->beginTransaction();
	$pst = $pdo->mysql->prepare("UPDATE producto set ProductoEstado =:ProductoEstado where IDProducto = :IDProducto");
	$pst->bindParam(":IDProducto",$IDProducto,PDO::PARAM_STR);
	$pst->bindParam(":ProductoEstado",$ProductoEstado,PDO::PARAM_STR);
	
	$pst->execute();

	$pdo->mysql->commit();
	header("Location:ver_producto.php");
	
} catch (Exception $e) {
	$pdo->mysql->rollback();
			echo "No se pudo modificar";
	
}

	


 ?>