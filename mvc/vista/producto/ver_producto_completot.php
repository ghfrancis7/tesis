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
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol:Tecnico</td>
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
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic book"></span> Agenda</a>
					<ul>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar"></span> Mensual</a></li>
						<li><a href="../UnderConstruction/UnderConstrTecn.php"><span class="iconic calendar-alt"></span> Semanal</a></li>
					</ul>
				</li>
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic new-window"></span> Clientes</a>
					<ul>
						<li><a href="../mvc/vista/cliente/crearCliente.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> Crear</a></li>
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
						<li><a href="../mvc/vista/producto/ver_producto_tecnico.php"><span class="iconic magnifying-glass"></span><span class="iconic info"></span> Lista Productos en Venta</a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
	<br><br><br>
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
 			<th>Precio</th>
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
	 			<td><?php echo "{$row['ProductoPrecio']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>
 				</tr>

 		<?php }?>
		</tbody>
	</table>
    </div><br><br>
	<div class="tablas" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
			<form id="veractivo" action="ver_producto_tecnico.php" method="post">
				<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Productos Activo"/>
			</form>
		</td></tr>
	</tbody></table>
    </div>
</body>
</html>