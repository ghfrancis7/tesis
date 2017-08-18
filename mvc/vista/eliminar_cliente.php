<?php 

	require ("../modelo/Conexion.php");
	$pdo = new Conexion();
	$IDCliente = $_GET['IDCliente'];
	$ClienteFechaBaja= date('m/d/Y');

		try {

				$pdo->mysql->beginTransaction();

				$datosCliente = $pdo->mysql->prepare("SELECT * FROM cliente where IDCliente = :IDCliente");
				$datosCliente->bindParam(":IDCliente", $IDCliente, PDO::PARAM_INT);
				$datosCliente->execute();
				$cliente = $datosCliente->fetch();	

						if ($cliente['ClienteEstado']=="Inactivo") {
							$ClienteEstado="Activo";
							$ClienteFechaBaja="";
						}elseif ($cliente['ClienteEstado']=="Activo") {
							$ClienteEstado="Inactivo";
						}

				
				$pst = $pdo->mysql->prepare("UPDATE cliente set ClienteEstado =:ClienteEstado , ClienteFechaBaja =:ClienteFechaBaja where IDCliente = :IDCliente");
				$pst->bindParam(":IDCliente",$IDCliente,PDO::PARAM_STR);
				$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);
				$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
				
				$pst->execute();

				$pdo->mysql->commit();
					header("Location:ver_cliente.php");
				
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";
			
		}

	


 ?>