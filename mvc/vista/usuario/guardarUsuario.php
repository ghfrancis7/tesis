<?php 

		include_once("../../modelo/Conexion.php");
		include_once("../../modelo/Usuario.php");

	$controlador = new Usuario();
	$sql= $controlador->listarUsuario();

	$dniused="false";
	$accused="false";
 	
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
		$UsuRol= $_POST['UsuRol'];
		$UsuEstado= $_POST['UsuEstado'];

		foreach($sql as $row){
 			if ($UsuDNI==$row['UsuDNI']) {
 				$dniused='true';
 			}elseif ($UsuCuenta==$row['UsuCuenta']){
 				$accused='true' ;
 			}
}
 			 
		if ($UsuCuenta=="") {
			echo"<script type=\"text/javascript\">alert('No ingreso una cuenta'); window.location='crearUsuario.php';</script>"; 
		}elseif($UsuPassword==""){
			echo"<script type=\"text/javascript\">alert('No ingreso contraseña'); window.location='crearUsuario.php';</script>"; 
		}elseif($UsuNombre==""){
			echo"<script type=\"text/javascript\">alert('No ingreso un nombre de usuario'); window.location='crearUsuario.php';</script>"; 
		}elseif($accused=="true"){
			echo"<script type=\"text/javascript\">alert('Este usuario ya existe'); window.location='crearUsuario.php';</script>"; 
		}elseif ($dniused=="true") {
			echo"<script type=\"text/javascript\">alert('DNI ya utilizado'); window.location='crearUsuario.php';</script>"; 
		}else {

		$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO usuario (UsuNombre, UsuApellido,UsuDNI,UsuDireccion,UsuTelefono,UsuMail,UsuFechaNacimiento,UsuLocalidadOpera,UsuCuenta,UsuPassword,UsuFechaIngreso,UsuFechaEgreso,UsuEstado,UsuRol) VALUES (:UsuNombre,:UsuApellido,:UsuDNI,:UsuDireccion,:UsuTelefono,:UsuMail,:UsuFechaNacimiento,:UsuLocalidadOpera,:UsuCuenta,:UsuPassword,:UsuFechaIngreso,:UsuFechaEgreso,:UsuEstado,:UsuRol)");
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
			$pst->bindParam(":UsuRol",$UsuRol,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;

			echo"<script type=\"text/javascript\">alert('Se registro correctamente'); window.location='ver_usuario.php';</script>"; 
		//header("Location:ver_usuario.php")
			}
		?>