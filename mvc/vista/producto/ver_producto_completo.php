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
/*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
		include_once("../../modelo/Producto.php");
		$controlador = new Producto();
		$sql= $controlador->listarProducto();
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol: Administrador</td>
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
	<table width="60%" border="1" style="margin: 0 auto;"> 
		<tr><td width="60%">
		<form id="find" action="busquedaProducto.php" method ="get">
			<label>Buscar: <input type="text" name="buscar" ></label>
            </td><td width="40%" valign="middle" class="buttons">
			<input id="button" name="findButton" type="button" onClick="document.getElementById('find').submit()" value="Buscar">
		</form>
        </td></tr>
	</table>
    <br>
	<table width="60%" border="1" style="margin: 0 auto;"> 
 		<thead>
 			<th>ID</th>
 			<th>Nombre</th>
 			<th>Fecha de Alta en DB</th>
 			<th>Fecha de Baja en DB</th>
 			<th>Activo/Inactivo</th>
 			
		</thead>
 		<tbody>
		<?php
 		foreach($sql as $row){?>
 				<tr>
	 			<td><?php echo "{$row['IDProducto']}"; ?></td>
	 			<td><?php echo "{$row['ProductoNombre']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>
	 			<td><a href="editar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar Producto</a></td>
	 			<td><a href="eliminar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"onclick="return confirm('Estas seguro de cambiar el estado del Producto?');"> Cambiar Estado</a></td>
 				</tr>

 		<?php }?>
		</tbody>
	</table>
    </div><br><br>
	<div class="tablas" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="veractivo" action="ver_producto.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Productos Activo"/>
		</form>
        </td><td>
        <form id="verinactivo" action="ver_producto_inactivo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('verinactivo').submit()" value="Ver Productos Inactivos"/>
		</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>