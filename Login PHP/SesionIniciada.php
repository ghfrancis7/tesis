<!DOCTYPE html>
<html lang="es">
<head>
	<title>SI.GE.CO.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<div class="body">
    </div>
	<div class="header">
		<div>
			<?php
				if (isset($_COOKIE["valor"]) and $_COOKIE == true){
					$username=$_COOKIE["misitio"];
					echo "Bienvenido $username";
				}else{
					echo "no has iniciado sesion<br> <a href=\"../index.html\">Iniciar Sesion</a>";}
			?>
            <br>
		</div>
	</div>
</body>
</html>