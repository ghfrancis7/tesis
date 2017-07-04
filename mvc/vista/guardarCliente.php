<?php 

		include_once("../modelo/Conexion.php");
		try {

			$pdo=new Conexion();
		$ClienteNombre= $_POST['ClienteNombre'];
		$ClienteCuit= $_POST['ClienteCuit'];
		$ClienteDireccion= $_POST['ClienteDireccion'];
		$ClienteTelefono= $_POST['ClienteTelefono'];
		$ClienteCantidadPlantas= $_POST['ClienteCantidadPlantas'];
		$ClienteFechaAlta= $_POST['ClienteFechaAlta'];
		$ClienteFechaBaja= $_POST['ClienteFechaBaja'];
		$ClienteEstado= $_POST['ClienteEstado'];

		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("INSERT INTO cliente (ClienteNombre, ClienteCuit,ClienteDireccion,ClienteTelefono,ClienteCantidadPlantas,ClienteFechaAlta,ClienteFechaBaja,ClienteEstado) VALUES (:ClienteNombre,:ClienteCuit,:ClienteDireccion,:ClienteTelefono,:ClienteCantidadPlantas,:ClienteFechaAlta,:ClienteFechaBaja,:ClienteEstado)");
		$pst->bindParam(":ClienteNombre",$ClienteNombre,PDO::PARAM_STR);
		$pst->bindParam(":ClienteCuit",$ClienteCuit,PDO::PARAM_STR);
		$pst->bindParam(":ClienteDireccion",$ClienteDireccion,PDO::PARAM_STR);
		$pst->bindParam(":ClienteTelefono",$ClienteTelefono,PDO::PARAM_STR);
		$pst->bindParam(":ClienteCantidadPlantas",$ClienteCantidadPlantas,PDO::PARAM_STR);
		$pst->bindParam(":ClienteFechaAlta",$ClienteFechaAlta,PDO::PARAM_STR);
		$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
		$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);
		echo "<script>alert('registro guardado')</script>" ;
		$pst->execute();
		$pdo->mysql->commit() ;
		
		header("Location:crearCliente.php");

		
			
		} catch (Exception $e) {
			$pdo->mysql->rollback();
			echo "No se pudo agregar el cliente";
			
		}

		
		?>