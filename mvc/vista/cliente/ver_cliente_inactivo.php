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
    <div class="tablas">
	<table width="60%" border="1" style="margin: 0 auto;"> 
		<tr><td width="60%">
		<form id="find" action="busquedaProducto.php" method ="get">
			<label>Buscar: <input type="text" name="buscar" ></label>
            </td><td width="40%" valign="middle" class="buttons">
			<input id="button" name="findButton" type="button" onClick="document.getElementById('find').submit()" value="Buscar">
		</form>
        </td></tr>
	</table>
    <br/>
	<table width="60%" border="1" style="margin: 0 auto;"> 
<?php 

include_once("../../modelo/Cliente.php");

	$controlador = new Cliente();
	$sql= $controlador->listarCliente();

 ?> 

<table border="1"> 
 	<thead>
 		<th>ID</th>
        <th>Nombre de Cliente</th>
        <th>Cuit</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Cantidad de Plantas</th>
        <th>Fecha de Alta</th>
        <th>Fecha de Baja</th>
        <th>Estado</th>

 	</thead>
 	<tbody>
 <?php  
 		foreach($sql as $row){
 		
 			if (strcasecmp($row['ClienteEstado'],"Inactivo") == 0) { ?>
 			<tr>
 			<td><?php echo "{$row['IDCliente']}"; ?></td>
 			<td><?php echo "{$row['ClienteNombre']}"; ?></td>
 			<td><?php echo "{$row['ClienteCUIT']}"; ?></td>
 			<td><?php echo "{$row['ClienteDireccion']}"; ?></td>
 			<td><?php echo "{$row['ClienteTelefono']}"; ?></td>
 			<td><?php echo "{$row['ClienteCantidadPlantas']}"; ?></td>
 			<td><?php echo "{$row['ClienteFechaAlta']}"; ?></td>
 			<td><?php echo "{$row['ClienteFechaBaja']}"; ?></td>
 			<td><?php echo "{$row['ClienteEstado']}"; ?></td>
 			
 			<td><a href="editar_cliente.php?IDCliente=<?php echo $row['IDCliente'] ?>"> Modificar Cliente</a></td>
 			<td><a href="eliminar_cliente.php?IDCliente=<?php echo $row['IDCliente'] ?>" onclick="return confirm('Estas seguro de cambiar el estado del cliente?');"> Cambiar Estado</a></td>
 		</tr>
 		<?php } } ?>
 		</tbody>
	</table>
    </div><br><br>
<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="veractivo" action="ver_cliente.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Cliente Activo"/>
		</form>
        </td><td>
        <form id="vertodo" action="ver_cliente_completo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('vertodo').submit()" value="Ver Todos los Clientes"/>
		</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>