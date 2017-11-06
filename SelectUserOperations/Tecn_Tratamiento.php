<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link href="../CSS/style.css" rel="stylesheet" type="text/css">
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
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
            <table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Tecnico <?php echo $usuario?></td>
                    <td width="25%">
                    <form id="frmLogin" action="../Login PHP/logout.php" method="post">
                        <input name="return" type="hidden" value="<?php echo urlencode($_SERVER["PHP_SELF"]);?>" />
                        <input id="button" type="button" onClick="document.getElementById('frmLogin').submit()" value="Sign Out"/>
                    </form>
                    </td>
                </tr>
            </table>
        </header>
    </div>
    <div class="wrap">
        <nav>
            <ul class="menu">
                <li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic home"></span> Home</a></li>
                <li><a href="Tecn_Agenda.php"><span class="iconic book"></span> Agenda</a></li>
                <li><a href="Tecn_Cliente.php"><span class="iconic new-window"></span> Clientes</a></li>
                <li><a href="Tecn_Tratamiento.php"><span class="iconic beaker"></span> Tratamiento</a></li>
                <li><a href="../mvc/vista/producto/tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
	</div>
    <div class="buttons">
        	<table>
                <tr>
                    <td width="45%" align="center">
                    <form id="nuevo" action="../mvc/vista/tratamiento/crearTratamiento" method="GET">
                    	<input  type="hidden" value="<?php ?>" />
                        <input id="button" type="button" onClick="document.getElementById('nuevo').submit()" value="Nuevo"/>
                    </form>
                    </td>
                    <td width="10%" align="center">
                    </td>
                    <td width="45%" align="center">
					<form id="consulta" action="../mvc/vista/tratamiento/ver_activo.php" method="GET">
                        <input id="button" type="button" onClick="document.getElementById('consulta').submit()" value="Consulta"/>
                    </form>
                    </td>
                </tr>
        	</table>
    </div>
</body>
</html>