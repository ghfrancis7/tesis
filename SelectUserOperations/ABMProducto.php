<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../CSS/style.css">
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
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Administrador</td>
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
				<li><a href="../Post_Inicio/sesionAdmin.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../SelectUserOperations/ABMUsuario.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> ABM Usuarios</a></li>
                <li><a href="../SelectUserOperations/ABMProducto.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Productos</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="buttons">
        	<table>
                <tr>
                    <td width="45%" align="center">
                    <form id="Crear" action="../mvc/vista/producto/crearProducto.php" method="get">
                    	<input  type="hidden" value="<?php 'cargar';?>" />
                        <input id="button" type="button" onClick="document.getElementById('Crear').submit()" value="Crear"/>
                    </form>
                    </td>
                    <td width="10%" align="center">
                    </td>
                    <td width="45%" align="center">
                    <form id="Modificar" action="../mvc/vista/producto/ver_producto.php" method="post">
                        <input id="button" type="button" onClick="document.getElementById('Modificar').submit()" value="Modificar/Eliminar"/>
                    </form>
                    </td>
                </tr>
        	</table>
    </div>
</body>
</html>