<?php 

	require ("../../modelo/Conexion.php");

	$pdo = new Conexion();
	$IDCliente = $_GET['IDCliente'];
	$idUsuario = $_GET['IDUsuario'];
	$ClienteFechaBaja= date('m/d/Y');

		try {

				$pdo->mysql->beginTransaction();

				$datosCliente = $pdo->mysql->prepare("SELECT * FROM cliente where IDCliente = :IDCliente");
				$datosCliente->bindParam(":IDCliente", $IDCliente, PDO::PARAM_INT);
				$datosCliente->execute();
				$cliente = $datosCliente->fetch();
				
						if ($cliente['ClienteEstado']=="Inactivo") {
							$ClienteEstado="Activo";
							$ClienteFechaAlta=date('Y/m/d');
							$ClienteFechaBaja=NULL;
							
							$pst = $pdo->mysql->prepare("INSERT INTO cliente (IDUsuario,ClienteNombre,	ClienteCUIT,ClienteDireccion,ClienteTelefono,ClienteFechaAlta,ClienteFechaBaja,ClienteEstado) VALUES (:IDUsuario,:ClienteNombre,:ClienteCUIT,:ClienteDireccion,:ClienteTelefono,:ClienteFechaAlta,:ClienteFechaBaja,:ClienteEstado)");
							
							$pst->bindParam(":IDUsuario",$idUsuario,PDO::PARAM_STR);
							$pst->bindParam(":ClienteNombre",$cliente['ClienteNombre'],PDO::PARAM_STR);
							$pst->bindParam(":ClienteCUIT",$cliente['ClienteCUIT'],PDO::PARAM_STR);
							$pst->bindParam(":ClienteDireccion",$cliente['ClienteDireccion'],PDO::PARAM_STR);
							$pst->bindParam(":ClienteTelefono",$cliente['ClienteTelefono'],PDO::PARAM_STR);
							$pst->bindParam(":ClienteFechaAlta",$ClienteFechaAlta,PDO::PARAM_STR);
							$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
							$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);
							
							$pst->execute();
							
							$pst = $pdo->mysql->prepare("UPDATE planta set IDCliente = (SELECT Max(IDCliente) FROM cliente WHERE ClienteCUIT=:ClienteCUIT) WHERE IDCliente LIKE $IDCliente");
							
							$pst->bindParam(":ClienteCUIT",$cliente['ClienteCUIT'],PDO::PARAM_STR);

							$pst->execute();

							$pdo->mysql->commit();
							
						}elseif ($cliente['ClienteEstado']=="Activo") {
							$ClienteEstado="Inactivo";
							$ClienteFechaBaja=date('Y/m/d');
							$pst = $pdo->mysql->prepare("UPDATE cliente set ClienteEstado =:ClienteEstado , ClienteFechaBaja =:ClienteFechaBaja where IDCliente = :IDCliente");
							$pst->bindParam(":IDCliente",$IDCliente,PDO::PARAM_STR);
							$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);
							$pst->bindParam(":ClienteFechaBaja",$ClienteFechaBaja,PDO::PARAM_STR);
							
							$pst->execute();
							$pdo->mysql->commit();
						}

					header("Location:ver_cliente.php");
				
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";			
		}

 ?>