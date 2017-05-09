<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<?php
		session_start();
		if (!isset($_SESSION["user"])){
			header ("Location:../index.html");
		} else {
			$usuario=$_COOKIE["usuario"];
		}
	?>
	<div class="body">
    </div>
	<div class="header">
		<div>
			Bienvenido Usuario Tecnico;
            <br>
            <span>
            	$usuario;
            </span>
		</div>
	</div>
</body>
</html>