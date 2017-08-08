<?php 

		require_once("../modelo/Conexion.php");
		include_once("../modelo/Cliente.php");

		$controlador = new Cliente();
		$sql= $controlador->listarCliente();

			$cuitused="false";
			$ccused="false";

			$pdo=new Conexion();

				$ClienteNombre= $_POST['ClienteNombre'];
				$ClienteCuit= $_POST['ClienteCuit'];
				$ClienteDireccion= $_POST['ClienteDireccion'];
				$ClienteTelefono= $_POST['ClienteTelefono'];
				$ClienteCantidadPlantas= $_POST['ClienteCantidadPlantas'];
				$ClienteFechaAlta= $_POST['ClienteFechaAlta'];
				$ClienteFechaBaja= $_POST['ClienteFechaBaja'];
				$ClienteEstado= $_POST['ClienteEstado'];

		foreach($sql as $row){
 			if ($ClienteNombre==$row['ClienteNombre']) {
 				$ccused='true';
 			}elseif ($ClienteCuit==$row['ClienteCuit']){
 				$cuitused='true' ;
 			}
}


	if ($ClienteNombre=="") {
				echo"<script type=\"text/javascript\">alert('No ingreso un nombre al cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ClienteCuit==""){
				echo"<script type=\"text/javascript\">alert('No ingreso el numero de Cuit del cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ClienteDireccion==""){
				echo"<script type=\"text/javascript\">alert('No ingreso la direccion del cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ccused=="true"){
				echo"<script type=\"text/javascript\">alert('Este cliente ya existe'); window.location='crearCliente.php';</script>"; 
			}elseif ($cuitused=="true") {
				echo"<script type=\"text/javascript\">alert('CUIT ya utilizado'); window.location='crearCliente.php';</script>"; 
			}else {

		try {

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
		}
		
		?>