<?php
	$user = $_POST["user"];
	$user = "'".$user."'";
	$pwd = $_POST["password"];
	$pwd = "'".$pwd."'";
	
	$servername = "127.0.0.1";
	$username = "admin";
	$password = "admin";
	$database = "dbtesis";

	$mysqli = new mysqli($servername, $username, $password, $database);
	//Chequea estado de conexion
	if (mysqli_connect_errno()) {
    	printf("Falló la conexión: %s\n", mysqli_connect_error());
    	exit();
	}
	
	$consulta = "SELECT `UsuNombre`,`UsuApellido` FROM  `Usuario` WHERE  `UsuCuenta` =  $user AND `UsuPassword` = $pwd";

	$result = $mysqli -> query($consulta);
	$row_cnt = $result -> num_rows;

	if ($row_cnt == 1){
		while ($fila = $result->fetch_row()) {
        	$username = "$fila[0] $fila[1]";
			setcookie("misitio","$username",time()+3600);
			setcookie("valor",true);
			header ("Location:./SesionIniciada.php");
    	}
		$result->close();
	}else{
		setcookie("valor",false);
		header ("Location:./SesionIniciada.php");
	}
$mysqli->close();
?>