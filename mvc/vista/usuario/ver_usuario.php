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
            header ("Location:../../../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }
		include_once("../../modelo/Usuario.php");
		$controlador = new Usuario();
		$sql= $controlador->listarUsuario();
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Administrador <?php echo $usuario?>
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
    <div class="tablas" style="text-align:center;">
    <table border="1" style="margin: 0 auto;"> 
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>DNI</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Mail</th>
			<th>Fecha Nac.</th>
			<th>Zona Laboral</th>
			<th>Cuenta</th>
			<th>Fecha Ingreso</th>
			<th>Fecha Egreso</th>
			<th>Estado</th>
		</thead>
		<tbody>
 			<?php  
			foreach($sql as $row){ ?>
			<tr>
				<td><?php echo "{$row['IDUsuario']}"; ?></td>
				<td><?php echo "{$row['UsuNombre']}"; ?></td>
				<td><?php echo "{$row['UsuApellido']}"; ?></td>
				<td><?php echo "{$row['UsuDNI']}"; ?></td>
				<td><?php echo "{$row['UsuDireccion']}"; ?></td>
				<td><?php echo "{$row['UsuTelefono']}"; ?></td>
 				<td><?php echo "{$row['UsuMail']}"; ?></td>
 				<td><?php echo "{$row['UsuFechaNacimiento']}"; ?></td>
 				<td><?php echo "{$row['UsuLocalidadOpera']}"; ?></td>
 				<td><?php echo "{$row['UsuCuenta']}"; ?></td>
 				<td><?php echo "{$row['UsuFechaIngreso']}"; ?></td>
 				<td><?php echo "{$row['UsuFechaEgreso']}"; ?></td>
 				<td><?php echo "{$row['UsuEstado']}"; ?></td>
				<td><a href="editar_usuario.php?IDUsuario=<?php echo $row['IDUsuario'] ?>"> Modificar </a></td>
				<td><a href="eliminar_usuario.php?IDUsuario=<?php echo $row['IDUsuario'] ?>" onclick="return confirm('Estas seguro de cambiar el estado del usuario?');">Cambiar Estado</a></td>
 			</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
	<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="vertecnico" action="ver_tecnico.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('vertecnico').submit()" value="Ver Usuarios Tecnicos"/>
		</form>
        </td><td>
        <form id="veradmin" action="ver_admin.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veradmin').submit()" value="Ver Usuarios Administradores"/>
		</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>