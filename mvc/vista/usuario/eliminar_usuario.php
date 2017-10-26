<?php 

	require ("../../modelo/Conexion.php");
	$pdo = new Conexion();
	$IDUsuario = $_GET['IDUsuario'];
	$UsuFechaEgreso= date('Y/m/d');
	$UsuFechaIngreso =date('Y/m/d');

		try {

				$pdo->mysql->beginTransaction();

				$datosUsuario = $pdo->mysql->prepare("SELECT * FROM usuario where IDUsuario = :IDUsuario");
				$datosUsuario->bindParam(":IDUsuario", $IDUsuario, PDO::PARAM_INT);
				$datosUsuario->execute();
				$usu = $datosUsuario->fetch();	
				
				if ($usu['UsuEstado']=="Inactivo") {
					$UsuEstado="Activo";
					$UsuFechaEgreso=NULL;

							$pst = $pdo->mysql->prepare("INSERT INTO usuario (UsuNombre, UsuApellido,UsuDNI,UsuDireccion,UsuTelefono,UsuMail,UsuFechaNacimiento,UsuLocalidadOpera,UsuCuenta,UsuPassword,UsuFechaIngreso,UsuEstado,UsuRol) VALUES (:UsuNombre,:UsuApellido,:UsuDNI,:UsuDireccion,:UsuTelefono,:UsuMail,:UsuFechaNacimiento,:UsuLocalidadOpera,:UsuCuenta,:UsuPassword,:UsuFechaIngreso,:UsuEstado,:UsuRol)");
						$pst->bindParam(":UsuNombre",$usu['UsuNombre'],PDO::PARAM_STR);
						$pst->bindParam(":UsuApellido",$usu['UsuApellido'],PDO::PARAM_STR);
						$pst->bindParam(":UsuDNI",$usu['UsuDNI'],PDO::PARAM_STR);
						$pst->bindParam(":UsuDireccion",$usu['UsuDireccion'],PDO::PARAM_STR);
						$pst->bindParam(":UsuTelefono",$usu['UsuTelefono'],PDO::PARAM_STR);
						$pst->bindParam(":UsuMail",$usu['UsuMail'],PDO::PARAM_STR);
						$pst->bindParam(":UsuFechaNacimiento",$usu['UsuFechaNacimiento'],PDO::PARAM_STR);
						$pst->bindParam(":UsuLocalidadOpera",$usu['UsuLocalidadOpera'],PDO::PARAM_STR);
						$pst->bindParam(":UsuCuenta",$usu['UsuCuenta'],PDO::PARAM_STR);
						$pst->bindParam(":UsuPassword",$usu['UsuPassword'],PDO::PARAM_STR);
						$pst->bindParam(":UsuFechaIngreso",$UsuFechaIngreso,PDO::PARAM_STR);
						$pst->bindParam(":UsuEstado",$UsuEstado,PDO::PARAM_STR);
						$pst->bindParam(":UsuRol",$usu['UsuRol'],PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;



				}elseif ($usu['UsuEstado']=="Activo") {
					$UsuEstado="Inactivo";

					$pst = $pdo->mysql->prepare("UPDATE usuario set UsuEstado =:UsuEstado , UsuFechaEgreso =:UsuFechaEgreso where IDUsuario = :IDUsuario");
				$pst->bindParam(":IDUsuario",$IDUsuario,PDO::PARAM_STR);
				$pst->bindParam(":UsuEstado",$UsuEstado,PDO::PARAM_STR);
				$pst->bindParam(":UsuFechaEgreso",$UsuFechaEgreso,PDO::PARAM_STR);

				
				$pst->execute();

				$pdo->mysql->commit();
				}
				
					header("Location:ver_usuario.php");
				
		} catch (Exception $e) {
			$pdo->mysql->rollback();
					echo "No se pudo modificar el estado";	
		}
 ?>