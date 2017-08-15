<?php 

	require ("../modelo/Conexion.php");
	$pdo = new Conexion();
	$IDUsuario = $_GET['IDUsuario'];
	//$ProductoFechaBajaDB= date('m/d/Y');

		try {

				$pdo->mysql->beginTransaction();

				$datosUsuario = $pdo->mysql->prepare("SELECT * FROM usuario where IDUsuario = :IDUsuario");
				$datosUsuario->bindParam(":IDUsuario", $IDUsuario, PDO::PARAM_INT);
				$datosUsuario->execute();
				$usu = $datosUsuario->fetch();	

						if ($usu['UsuEstado']=="Inactivo") {
							$UsuEstado="Activo";
						}elseif ($usu['UsuEstado']=="Activo") {
							$UsuEstado="Inactivo";
						}

				
				$pst = $pdo->mysql->prepare("UPDATE usuario set UsuEstado =:UsuEstado , UsuFechaEgreso =:UsuFechaEgreso where IDUsuario = :IDUsuario");
				$pst->bindParam(":IDUsuario",$IDUsuario,PDO::PARAM_STR);
				$pst->bindParam(":UsuEstado",$UsuEstado,PDO::PARAM_STR);
				$pst->bindParam(":UsuFechaEgreso",$UsuFechaEgreso,PDO::PARAM_STR);
				
				$pst->execute();

				$pdo->mysql->commit();
					header("Location:ver_usuario.php");
				
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar";	
		}
 ?>