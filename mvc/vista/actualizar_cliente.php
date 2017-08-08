<?php 

	require ("../modelo/Conexion.php");

	$pdo = new Conexion();
	$IDCliente = $_POST['IDCliente'];
	$ClienteNombre = $_POST['ClienteNombre'];
	$ClienteCuit = $_POST['ClienteCuit'];
	$ClienteDireccion = $_POST['ClienteDireccion'];
	$ClienteTelefono = $_POST['ClienteTelefono'];
	$ClienteCantidadPlantas = $_POST['ClienteCantidadPlantas'];
	$ClienteFechaAlta = $_POST['ClienteFechaAlta'];
	$ClienteFechaBaja = $_POST['ClienteFechaBaja'];
	$ClienteEstado = $_POST['ClienteEstado'];


	try { 

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("UPDATE cliente set ClienteNombre = :ClienteNombre, ClienteCuit = :ClienteCuit, ClienteDireccion =:ClienteDireccion, ClienteTelefono =:ClienteTelefono, ClienteCantidadPlantas =:ClienteCantidadPlantas, ClienteFechaAlta=:ClienteFechaAlta , ClienteFechaBaja=:ClienteFechaBaja , ClienteEstado=:ClienteEstado where IDCliente = :IDCliente");
			$pst->bindParam(":IDCliente",$IDCliente,PDO::PARAM_STR);
			$pst->bindParam(":ClienteNombre",$ClienteNombre,PDO::PARAM_STR);
			$pst->bindParam(":ClienteCuit",$ClienteCuit,PDO::PARAM_STR);
			$pst->bindParam(":ClienteDireccion",$ClienteDireccion,PDO::PARAM_STR);
			$pst->bindParam(":ClienteTelefono",$ClienteTelefono,PDO::PARAM_STR);
			$pst->bindParam(":ClienteCantidadPlantas",$ClienteCantidadPlantas,PDO::PARAM_STR);
			$pst->bindParam(":ClienteFechaAlta",$ClienteFechaAlta,PDO::PARAM_STR);
			$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
			$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);

			
			$pst->execute();

			$pdo->mysql->commit();
				header("Location:ver_cliente.php");
			
		} catch (Exception $e) {
				$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
	}
	 ?>