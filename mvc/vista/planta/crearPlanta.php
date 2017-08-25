<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link href="../../../CSS/style.css" rel="stylesheet" type="text/css">
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
		//Determina dia actual
		date_default_timezone_set ("America/Argentina/Buenos_Aires");
		$today = date( "Y/m/d");
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Tecnico</td>
                    <td width="25%">
                    <form id="frmLogin" action="../../../Login PHP/logout.php" method="post">
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
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic book"></span> Agenda</a>
					<ul>
						<li><a href="../../../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar"></span> Mensual</a></li>
						<li><a href="../../../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar-alt"></span> Semanal</a></li>
					</ul>
				</li>
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic new-window"></span> Clientes</a>
					<ul>
						<li><a href="../mvc/vista/cliente/crearCliente.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> Crear</a></li>
                        <li><a href="ver_cliente.php"><span class="iconic magnifying-glass"></span><span class="iconic user"></span> Consulta Datos</a></li>
                        <li><a href="../../../SelectUserOperations/ABMPlanta.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Planta</a></li>
						<li><a href="../planta/ver_planta.php"><span class="iconic magnifying-glass"></span><span class="iconic box"></span> Consulta Stock</a></li>
					</ul>
				</li>
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic beaker"></span> Tratamiento</a>
					<ul>
						<li><a href="../../../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic beaker"></span> Nuevo</a></li>
						<li><a href="../../../UnderConstruction/UnderConstrTecn.php"><span class="iconic magnifying-glass"></span><span class="iconic beaker"></span> Consulta</a></li>
					</ul>
				</li>
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic cog"></span> Producto</a>
					<ul>
						<li><a href="../../../UnderConstruction/UnderConstrTecn.php"><span class="iconic pencil-alt"></span><span class="iconic document"></span> Alta Pedido Cotizacion</a></li>
						<li><a href="../../../mvc/vista/producto/ver_producto.php"><span class="iconic magnifying-glass"></span><span class="iconic info"></span> Lista Productos en Venta</a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
	<div class="formularios">
    <table width="100%">
		<tr>
			<td width="60%">
			<form id="frmcreapla" action="guardarPlanta.php" method="post">
            <label>Nombre de la Planta</label><br/>
            <input type="text" name="PlantaNombre">
            <br/>
            <label>Localidad de la Panta</label><br/>
            <input type="text" name="PlantaLocalidad">
            <br/>
            <label>Direccion de la Planta</label><br/>
            <input type="text" name="PlantaDireccion">
            <br/>
            <label>Telefono de la Panta</label><br/>
            <input type="text" name="PlantaTelefono">
            <br/>
            <label>Email de la Panta</label><br/>
            <input type="text" name="PlantaEmail">
            <input type="hidden" value="<?php echo $today;?>" name="PlantaFechaAlta">
            <input type="hidden" value="<?php echo NULL;?>" name="PlantaFechaBaja">
            <input type="hidden" value="<?php echo "Activo";?>" name="PlantaEstado">
            <br/></td>
		</tr>
        <tr>
        	<td width="100%">
            	 <table width="100%" style="margin: 0 auto;">
					<tr>
						<td width="50%">
						<input id="button" type="button" onClick="document.getElementById('frmcreapla').submit()" value="Acept">
                		</form>
						</td>
            			<td width="50%">
                        <form id="frmcancel" method="post" action="../../../Post_Inicio/sesionTecn.php">
                        <input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Cancel">
                        </form>
                		</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
	</div>
</body>
</html>