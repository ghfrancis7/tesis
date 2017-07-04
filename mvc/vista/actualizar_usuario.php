<?php 

	require ("../modelo/Conexion.php");

	$pdo = new Conexion();
		$IDUsuario = $_POST['IDUsuario'];
		$UsuNombre = $_POST['UsuNombre'];
		$UsuApellido = $_POST['UsuApellido'];
		$UsuDNI = $_POST['UsuDNI'];
		$UsuDireccion = $_POST['UsuDireccion'];
		$UsuTelefono = $_POST['UsuTelefono'];
		$UsuMail = $_POST['UsuMail'];
		$UsuFechaNacimiento = $_POST['UsuFechaNacimiento'];
		$UsuLocalidadOpera = $_POST['UsuLocalidadOpera'];
		$UsuCuenta = $_POST['UsuCuenta'];
		$UsuPassword = $_POST['UsuPassword'];
		$UsuFechaIngreso = $_POST['UsuFechaIngreso'];
		$UsuFechaEgreso = $_POST['UsuFechaEgreso'];
		$UsuEstado = $_POST['UsuEstado'];


try {

		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("UPDATE usuario set UsuNombre = :UsuNombre, UsuApellido = :UsuApellido, UsuDNI =:UsuDNI, UsuDireccion =:UsuDireccion, UsuTelefono =:UsuTelefono, UsuMail=:UsuMail , UsuFechaNacimiento=:UsuFechaNacimiento , UsuLocalidadOpera=:UsuLocalidadOpera, UsuCuenta=:UsuCuenta , UsuPassword=:UsuPassword , UsuFechaIngreso=:UsuFechaIngreso , UsuFechaEgreso=:UsuFechaEgreso , UsuEstado=:UsuEstado where IDUsuario = :IDUsuario");
		$pst->bindParam(":IDUsuario",$IDUsuario,PDO::PARAM_STR);
		$pst->bindParam(":UsuNombre",$UsuNombre,PDO::PARAM_STR);
		$pst->bindParam(":UsuApellido",$UsuApellido,PDO::PARAM_STR);
		$pst->bindParam(":UsuDNI",$UsuDNI,PDO::PARAM_STR);
		$pst->bindParam(":UsuDireccion",$UsuDireccion,PDO::PARAM_STR);
		$pst->bindParam(":UsuTelefono",$UsuTelefono,PDO::PARAM_STR);
		$pst->bindParam(":UsuMail",$UsuMail,PDO::PARAM_STR);
		$pst->bindParam(":UsuFechaNacimiento",$UsuFechaNacimiento,PDO::PARAM_STR);
		$pst->bindParam(":UsuLocalidadOpera",$UsuLocalidadOpera,PDO::PARAM_STR);
		$pst->bindParam(":UsuCuenta",$UsuCuenta,PDO::PARAM_STR);
		$pst->bindParam(":UsuPassword",$UsuPassword,PDO::PARAM_STR);
		$pst->bindParam(":UsuFechaIngreso",$UsuFechaIngreso,PDO::PARAM_STR);
		$pst->bindParam(":UsuFechaEgreso",$UsuFechaEgreso,PDO::PARAM_STR);
		$pst->bindParam(":UsuEstado",$UsuEstado,PDO::PARAM_STR);


		$pst->execute();

		$pdo->mysql->commit();
			header("Location:ver_usuario.php");
		
	} catch (Exception $e) {
			$pdo->mysql->rollback();
				echo "No se pudo modificar";
		
}
 ?>