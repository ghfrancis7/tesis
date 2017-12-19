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
		$sql= $controlador->listarPlanta($idUsuario);
	?> 
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Técnico <?php echo $usuario?>
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
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Plantas Inactivas</h2></td>
		</tr>
    </div>
    <div class="tablas">
	<table width="60%" style="margin: 0 auto;">
    	<tr><td>
			<table width="100%" border="1" style="margin: 0 auto;"><tbody>
			<tr><td width="60%">
				<form id="find" action="busquedaPlanta.php" method ="get">
				<label>Buscar: <input type="text" name="buscar" ></label>
            </td><td width="40%" valign="middle" class="buttons">
				<input id="button" name="findButton" type="button" onClick="document.getElementById('find').submit()" value="Buscar">
				</form>
			</td></tr>
            </tbody></table>
      </td></tr>
	</table>
    <br/>
	<table width="60%" border="1" style="margin: 0 auto;"> 
        <thead>
            <th>ID</th>
            <th>Nombre de Planta</th>
            <th>Cliente</th>
            <th>Localidad de la Panta</th>
            <th>Dirección de la Planta</th>
            <th>Teléfono de la Panta</th>
            <th>Email de la Panta</th>
            <th>Fecha de alta de la Planta</th>
            <th>Fecha de baja de la Planta</th>
            <th>Estado de la Planta</th>
        </thead>
        <tbody>
        <?php  
        foreach($sql as $row){ 
            if (strcasecmp($row['PlantaEstado'],"Inactivo") == 0) { ?>
                <tr>
                <td><?php echo "{$row['IDPlanta']}"; ?></td>
                <td><?php echo "{$row['PlantaNombre']}"; ?></td>
                <td><?php echo "{$row['ClienteNombre']}"; ?></td>
                <td><?php echo "{$row['PlantaLocalidad']}"; ?></td>
                <td><?php echo "{$row['PlantaDireccion']}"; ?></td>
                <td><?php echo "{$row['PlantaTelefono']}"; ?></td>
                <td><?php echo "{$row['PlantaMail']}"; ?></td>
                <td><?php echo "{$row['PlantaFechaAlta']}"; ?></td>
                <td><?php echo "{$row['PlantaFechaBaja']}"; ?></td>
                <td><?php echo "{$row['PlantaEstado']}"; ?></td>
                <td><a href="editar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Modificar Planta</a></td>
                </tr>
        <?php } } ?>
        </tbody>
    </table>
    </div>
	<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="veractivo" action="ver_planta.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Ver Plantas Activas"/>
		</form>
        </td><td>
        <form id="vertodo" action="ver_planta_completo.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('vertodo').submit()" value="Ver Todas las Plantas"/>
		</form>
    </td><td>
        <form id="pdfplantainactivo"  target="_blank" action="pdfplantainactivo.php" method="post">
            <input style="width: 200px;" id="button" type="button" onClick="document.getElementById('pdfplantainactivo').submit()" value="Generar PDF"/>
        </form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>