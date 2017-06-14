<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
	<?php
		$usuario="";
		$idUsuario=1;
		session_start();
		if (!isset($_SESSION['id'])){
			header ("Location:../index.html");
		} else {
			$usuario = $_SESSION['nom']." ".$_SESSION['ape'];
			$idUsuario = $_SESSION['id'];
		}
		function closeSession(){
			session_destroy();
			header ("Location:../index.html");
		}
	?>
	<div class="background">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Tecnico</td>
                    <td width="25%">
                    	<input id="button" type="button" onClick="<?php closeSession()?>" value="Logout">
                    </td>
                </tr>
        	</table>
        </header>
    </div>
	<div class="body">
		<div>
			<br><br>Contenido<span>GABY</span>
            <br>
		</div>
	</div>
</body>
</html>