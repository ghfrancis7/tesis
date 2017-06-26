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
	<div class="background">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Tecnico</td>
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
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic book"></span> Agenda</a>
					<ul>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar"></span> Mensual</a></li>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar-alt"></span> Semanal</a></li>
					</ul>
				</li>
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic new-window"></span> Clientes</a>
					<ul>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> ABM Datos</a></li>
                        <li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic magnifying-glass"></span><span class="iconic user"></span> Consulta Datos</a></li>
                        <li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Stock</a></li>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic magnifying-glass"></span><span class="iconic box"></span> Consulta Stock</a></li>
					</ul>
				</li>
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic beaker"></span> Tratamiento</a>
					<ul>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic beaker"></span> Nuevo</a></li>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic magnifying-glass"></span><span class="iconic beaker"></span> Consulta</a></li>
					</ul>
				</li>
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic cog"></span> Producto</a>
					<ul>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic document"></span> Alta Pedido Cotizacion</a></li>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic magnifying-glass"></span><span class="iconic info"></span> Lista Productos en Venta</a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="buttons">
        	<table>
                <tr>
                    <td width="33%" align="center">
                    <form id="Crear" action="../mvc/vista/crear.php" method="get">
                    	<input name="return" type="hidden" value="<?php 'cargar'?>" />
                        <input id="button" type="button" onClick="document.getElementById('Crear').submit()" value="Crear"/>
                    </form>
                    </td>
                    <td width="34%" align="center">
                    <form id="Modificar" action="#" method="post">
                        <input name="return" type="hidden" value="<?php 'Modificar'?>" />
                        <input id="button" type="button" onClick="document.getElementById('Modificar').submit()" value="Modificar"/>
                    </form>
                    </td>
                    <td width="33%" align="center">
                    <form id="Eliminar" action="#" method="post">
                        <input name="return" type="hidden" value="<?php 'Eliminar'?>" />
                        <input id="button" type="button" onClick="document.getElementById('Eliminar').submit()" value="Eliminar"/>
                    </form>
                    </td>
                </tr>
        	</table>
    </div>
</body>
</html>