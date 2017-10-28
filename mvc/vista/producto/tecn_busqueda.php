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
		$IDProducto= $_GET['buscar'];
		$sql= $controlador->buscarProducto($IDProducto);
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
				<li><a href="../../../SelectUserOperations/Tecn_Agenda.php"><span class="iconic book"></span> Agenda</a></li>
				<li><a href="../../../SelectUserOperations/Tecn_Cliente.php"><span class="iconic new-window"></span> Clientes</a></li>
				<li><a href="../../../SelectUserOperations/Tecn_Tratamiento.php"><span class="iconic beaker"></span> Tratamiento</a></li>
				<li><a href="tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
	<div class="tablas">
		<tr>
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Productos</h2></td>
		</tr>
    </div>
    <div class="tablas" style="text-align:center;">
		<table width="60%" border="1" style="margin: 0 auto;"> 
            <thead>
                <th>ProductoID</th>
                <th>ProductoNombre</th>
                <th>ProductoFechaAltaDB</th>
                <th>ProductoFechaBajaDB</th>
                <th>ProductoEstado</th>
            </thead>
            <tbody>
			<?php  
                foreach($sql as $row){ ?>
                <tr>
                    <td><?php echo "{$row['IDProducto']}"; ?></td>
                    <td><?php echo "{$row['ProductoNombre']}"; ?></td>
                    <td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
                    <td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
                    <td><?php echo "{$row['ProductoEstado']}"; ?></td>
                </tr>                
        <?php } ?>
		</tbody>
 </table>
    </div><br><br>
	<div class="tablas" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
    <tr><td>
		<form id="veractivo" action="tecn_ver_activo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Producto Activo"/>
		</form>
        </td><td>
        <form id="vertodo" action="tecn_ver_completo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('vertodo').submit()" value="Ver Todos los Productos"/>
		</form>
        </td><td>
        <form id="verinactivo" action="tecn_ver_inactivo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('verinactivo').submit()" value="Ver Producto Inactivo"/>
		</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>