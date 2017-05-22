<?php
	$user = $_POST["user"];
	$user = "'".$user."'";
	$pwd = $_POST["password"];
	$pwd = "'".$pwd."'";
	
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "dbtesis";

	$mysqli = new mysqli($servername, $username, $password, $database);
	//Chequea estado de conexion
	if (mysqli_connect_errno()) {
    	printf("Falló la conexión: %s\n", mysqli_connect_error());
    	exit();
	}
	
	$consulta = "SELECT `UsuNombre`,`UsuApellido`,`UsuRol`,`IdUsuario` FROM  `Usuario` WHERE  `UsuCuenta` =  $user AND `UsuPassword` = $pwd";

	$result = $mysqli -> query($consulta);
	$row_cnt = $result -> num_rows;

	if ($row_cnt == 1){
		while ($fila = $result->fetch_row()) {
        	$nombre = "$fila[0] $fila[1]";
			$IDUsuario = "$fila[3]";
    	}
			//Setea cookies que seran usadas en paginas post inicio de sesion
			setcookie("usuario","$nombre",time()+3600);
			setcookie("idUsuario", "$IDUsuario", time() + 3600); 
			
			session_start ();
			$_SESSION["user"]=$_POST["user"];
			
			$rol = $fila[2];
			if ($rol == 0 ){
				header("location:../Post_Inicio/Admin/sesionAdmin.html");
			} else {
				header("location:../Post_Inicio/Tecnico/sesionTecnico.php");
			}
		$result->close();
	}else{
		header ("Location:../index.html");
	}
$mysqli->close();
?>