<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
	<div class="background">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Sistema de Gestion</td>
                    <td width="25%"><input id="button" type="button" onClick="" value="Logout"></td>
                </tr>
        	</table>
        </header>
    </div>
	<div class="body">
		<?php
		$usuario="";
		$idUsuario=1;
			session_start();
			if (!isset($_SESSION["user"])){
				header ("Location:../../index.html");
			} else {
				$usuario = $_COOKIE["name"];
				$idUsuario = $_COOKIE["idUser"];
			}
			echo "Bienvenido ".$usuario."<br>";
			echo "Su ID es: ".$idUsuario."<br>";
		?>
	</div>

</body>
</html>