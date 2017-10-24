<?php 

	require ("../../modelo/Conexion.php");
	$pdo = new Conexion();
	$IDLote = $_GET['IDLote'];

			$pdo->mysql->beginTransaction();

				$pst = $pdo->mysql->prepare("DELETE FROM lote WHERE IDLote = $IDLote");

				$pst->execute();
		$pdo->mysql->commit() ;

	?>