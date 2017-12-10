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
        }
		//Determina dia actual
		date_default_timezone_set ("America/Argentina/Buenos_Aires");
		$today = date( "d/m/Y");
		//Formulario
		include_once("../../modelo/Conexion.php");
		$pdo= new Conexion();
		$IDUsuario = $_GET['IDUsuario'];
		$datosUsuario = $pdo->mysql->prepare("SELECT * FROM usuario where IDUsuario = :IDUsuario");
		$datosUsuario->bindParam(":IDUsuario", $IDUsuario, PDO::PARAM_INT);
		$datosUsuario->execute();
		$usuario = $datosUsuario->fetch();
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Administrador <?php echo $_SESSION['nom']." ".$_SESSION['ape']?></td>
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
            <form id="frmeditar" method="post" action="actualizar_usuario.php">

	            <label>ID Usuario</label>
                <input type="text" name="IDUsuario" value="<?php echo $usuario['IDUsuario']; ?>"readonly=true >

                <label>Nombre</label>
                <input type="text" name="UsuNombre" required value="<?php echo $usuario['UsuNombre']; ?>">
				<br/>
                <label>Apellido</label>
                <input type="text" name="UsuApellido" required value="<?php echo $usuario['UsuApellido']; ?>">
				<br/>
                <label>Documento</label>
                <input type="text" name="UsuDNI" onkeypress="return valida(event)" required value="<?php echo $usuario['UsuDNI']; ?>">
				<br/>
                <label>Direccion</label>
                <input type="text" name="UsuDireccion" value="<?php echo $usuario['UsuDireccion']; ?>">
				<br/>
                <label>Telefono</label>
                <input type="text" name="UsuTelefono" onkeypress="return valida(event)" required value="<?php echo $usuario['UsuTelefono']; ?>">
			</td>
            <td width="20%">
            </td>
            <td width="40%">
                <label>Mail</label>
                <input type="text" name="UsuMail" value="<?php echo $usuario['UsuMail']; ?>">
				<br/>
                <label>Fecha Nac.</label>
                <input type="text" name="UsuFechaNacimiento" value="<?php echo $usuario['UsuFechaNacimiento']; ?>">
				<br/>
                <label>Zona Laboral</label>
                <input type="text" name="UsuLocalidadOpera" value="<?php echo $usuario['UsuLocalidadOpera']; ?>">
				<br/>
                <label>Cuenta</label>
                <input type="text" name="UsuCuenta" value="<?php echo $usuario['UsuCuenta']; ?>">
				<br/>
                <label>Password</label>
                <input type="password" name="UsuPassword" value="<?php echo $usuario['UsuPassword']; ?>">
				<br/><br/><br/><br/><br/><label></label>
			</td>
		</tr>
		<tr>
			<td width="45%">

            	<input id="button" type="button" onClick="document.getElementById('frmeditar').submit()" value="Acept">

                </form>
			</td>
			<td width="10%">
			</td>
            <td width="45%">
            	<form id="frmcancel" method="post" action="ver_usuario.php">
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