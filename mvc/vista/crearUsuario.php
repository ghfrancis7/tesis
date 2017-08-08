<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
	<?php
	//Sesion
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
		$today = date( "d/m/Y");
		//Formulario
	
    ?>
	<div class="background">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Administrador</td>
                    <td width="25%">
                    <form id="frmLogin" action="../../Login PHP/logout.php" method="post">
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
				<li><a href="../../Post_Inicio/sesionAdmin.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../../SelectUserOperations/ABMUsuario.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> ABM Usuarios</a></li>
                <li><a href="../../mvc/vista/crearProducto.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Productos</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="formularios">
    <table width="100%">
		<tr>

			<td width="40%">
            <form id="frmCrear" action="guardarUsuario.php" method="post">
                <input type="text" placeholder="Nombre" name="UsuNombre">
                <br />
                <input type="text" placeholder="Apellido" name="UsuApellido" requrired>
                <br />
                <input type="text" placeholder="DNI" name="UsuDNI" requrired>
                <br />
                <input type="text" placeholder="Direccion" name="UsuDireccion" requrired>
                <br />
                <input type="text" placeholder="Telefono" name="UsuTelefono" requrired>
                <br />
                
            </td>
            <td width="20%">
            </td>
            <td width="40%">
                
                <input type="text" placeholder="Mail" name="UsuMail" requrired>
                <br />
                <input type="date" placeholder="Fecha Nacimiento" name="UsuFechaNacimiento" requrired>
                <br />
                <input type="text" placeholder="Localidad Opera" name="UsuLocalidadOpera" requrired>
                <br />
                <input type="text" placeholder="Cuenta Usuario" name="UsuCuenta" requrired>
                <br />
                <input type="text" placeholder="Password Usuario" name="UsuPassword" requrired>
                <input type="hidden" value="<?php $today?>" name="UsuFechaIngreso" requrired>
                <input type="hidden" value="<?php ''?>" name="UsuFechaEgreso" requrired>
                <input type="hidden" value="<?php 'activo'?>" name="UsuEstado" requrired>
                <br />
                
            </td>
		</tr>
        <tr>
            <td width="25%">
            </td>
        	<td width="50%">            	
                <input id="button" type="button" onClick="document.getElementById('frmCrear').submit()" value="Crear">
            </form>
            </td>
            <td width="25%">
            </td>
        </tr>
    </table>
    </div>
</body>
</html>