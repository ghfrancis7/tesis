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
		include_once("../../modelo/Planta.php");
		$controlador = new Planta();
		$IDPlanta= $_GET['buscar'];
		$sql= $controlador->buscarPlanta($IDPlanta);
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
				<li><a href="../../../Post_Inicio/sesionTecn.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../../../SelectUserOperations/Tecn_Agenda.php"><span class="iconic book"></span> Agenda</a></li>
				<li><a href="../../../SelectUserOperations/Tecn_Cliente.php"><span class="iconic new-window"></span> Clientes</a></li>
				<li><a href="../../../SelectUserOperations/Tecn_Tratamiento.php"><span class="iconic beaker"></span> Tratamiento</a></li>
				<li><a href="tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
	<div class="tablas" style="text-align:center;">
		<table width="60%" border="1" style="margin: 0 auto;"> 	
 			<thead>
            <th>ID Planta</th>
            <th>Nombre de Planta</th>
            <th>Localidad de la Panta</th>
            <th>Direccion de la Planta</th>
            <th>Telefono de la Panta</th>
            <th>Email de la Panta</th>
            <th>Fecha de baja de la Planta</th>
            <th>Estado de la Planta</th>
			</thead>
 		<tbody>
 		<?php  
 		foreach($sql as $row){  ?>
			<tr>
 			<td><?php echo "{$row['IDPlanta']}"; ?></td>
 			<td><?php echo "{$row['PlantaNombre']}"; ?></td>
 			<td><?php echo "{$row['PlantaLocalidad']}"; ?></td>
 			<td><?php echo "{$row['PlantaDireccion']}"; ?></td>
 			<td><?php echo "{$row['PlantaTelefono']}"; ?></td>
 			<td><?php echo "{$row['PlantaMail']}"; ?></td>
 			<td><?php echo "{$row['PlantaFechaBaja']}"; ?></td>
 			<td><?php echo "{$row['PlantaEstado']}"; ?></td>
 			<td><a href="editar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Modificar Planta</a></td>
 			<td><a href="eliminar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Eliminar Planta</a></td>
	 		</tr>
 		<?php } ?>
		</tbody>
	</table>
    </div>
	<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="veractivo" action="ver_planta_inactivo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Plantas Inactivas"/>
		</form>
        </td><td>
        <form id="vertodo" action="ver_planta.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('vertodo').submit()" value="Ver Plantas Activas"/>
		</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>