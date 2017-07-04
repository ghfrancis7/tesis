<?php 

		include_once("../modelo/Conexion.php");

		$pdo=new Conexion();

		$UsuNombre= $_POST['UsuNombre'];
		$UsuApellido= $_POST['UsuApellido'];
		$UsuDNI= $_POST['UsuDNI'];
		$UsuDireccion= $_POST['UsuDireccion'];
		$UsuTelefono= $_POST['UsuTelefono'];
		$UsuMail= $_POST['UsuMail'];
		$UsuFechaNacimiento= $_POST['UsuFechaNacimiento'];
		$UsuLocalidadOpera= $_POST['UsuLocalidadOpera'];
		$UsuCuenta= $_POST['UsuCuenta'];
		$UsuPassword= $_POST['UsuPassword'];
		$UsuFechaIngreso= $_POST['UsuFechaIngreso'];
		$UsuFechaEgreso= $_POST['UsuFechaEgreso'];
		$UsuEstado= $_POST['UsuEstado'];



		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("INSERT INTO usuario (UsuNombre, UsuApellido,UsuDNI,UsuDireccion,UsuTelefono,UsuMail,UsuFechaNacimiento,UsuLocalidadOpera,UsuCuenta,UsuPassword,UsuFechaIngreso,UsuFechaEgreso,UsuEstado) VALUES (:UsuNombre,:UsuApellido,:UsuDNI,:UsuDireccion,:UsuTelefono,:UsuMail,:UsuFechaNacimiento,:UsuLocalidadOpera,:UsuCuenta,:UsuPassword,:UsuFechaIngreso,:UsuFechaEgreso,:UsuEstado)");
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
		$pdo->mysql->commit() ;
		
		
		
		?>