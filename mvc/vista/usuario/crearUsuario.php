<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../../../CSS/style.css">
</head>

<body>
	<?php
	//Sesion
    $usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }
		//Determina dia actual
		date_default_timezone_set ("America/Argentina/Buenos_Aires");
		$today = date( "Y/m/d");
		//Formulario
	
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Administrador <?php echo $usuario?></td>
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
				<li><a href="../../../Post_Inicio/sesionAdmin.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../../../SelectUserOperations/ABMUsuario.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> ABM Usuarios</a></li>
                <li><a href="../../../SelectUserOperations/ABMProducto.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Productos</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="formularios">
    <table width="100%">
		<tr>
			<td width="40%">
            <form id="frmCrear" action="guardarUsuario.php" method="post">
            	<label>Nombre</label>
                <input type="text" name="UsuNombre">
                <br />
                <label>Apellido</label>
                <input type="text" name="UsuApellido" requrired>
                <br />
                <label>DNI</label>
                <input type="text" name="UsuDNI" onkeypress="return valida(event)" requrired>
                <br />
                <label>Dirección</label>
                <input type="text" name="UsuDireccion" requrired>
                <br />
                <label>Teléfono</label>
                <input type="text" name="UsuTelefono" onkeypress="return valida(event)" requrired>
                <br />
            </td>
            <td width="20%">
            </td>
            <td width="40%">
            	<label>Mail</label>
                <input type="text" name="UsuMail" requrired>
                <br />
                <label>Fecha Nacimiento</label>
                <input type="date" name="UsuFechaNacimiento" requrired>
                <br />
                <label>Zona en que Opera</label>
                <input type="text" name="UsuLocalidadOpera" requrired>
                <br />
                <label>Cuenta</label>
                <input type="text" name="UsuCuenta" requrired>
                <br />
                <label>Password</label>
                <input type="password" name="UsuPassword" requrired>
                <input type="hidden" value="<?php echo $today;?>" name="UsuFechaIngreso" requrired>
                <input type="hidden" value="<?php echo '';?>" name="UsuFechaEgreso" requrired>
                <input type="hidden" value="<?php echo 'Activo';?>" name="UsuEstado" requrired>
                <br />
            </td>
		</tr><tr>
        <label>Rol de Usuario</label>
            <div class="styled-select" style="margin:0 auto;">
                <select name="UsuRol" style="color:#FFF">
					<option value="admin" style="color:#000">Administrador</option>
					<option value="tecn" style="color:#000">Tecnico</option>
                </select>
            </div>
        </tr><tr>
            <td width="40%">
            <input id="button" type="button" onClick="document.getElementById('frmCrear').submit()" value="Crear">
            </form>
            </td>
        	<td width="20%">
            </td>
            <td width="40%">
            <form id="frmcancel" method="post" action="../../../Post_Inicio/sesionAdmin.php">
				<input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Cancel">
			</form>
            </td>
        </tr>
    </table>
    </div>
</body>
<script>
	function valida(e){
		tecla = (document.all) ? e.keyCode : e.which;
	
		//Tecla de retroceso para borrar, siempre la permite
		if (tecla==8){
			return true;
		}
			
		// Patron de entrada, en este caso solo acepta numeros
		patron =/[0-9]/;
		tecla_final = String.fromCharCode(tecla);
		return patron.test(tecla_final);
	}
</script>
</html>