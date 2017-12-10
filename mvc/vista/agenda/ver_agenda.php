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
		include_once("../../modelo/Agenda.php");
		$controlador = new Agenda();
		$sql= $controlador->listarAgenda($idUsuario);

		date_default_timezone_set ("America/Argentina/Buenos_Aires");
		$today = date("Y-m-d");
	?> 
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Tecnico <?php echo $usuario?>
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
				<li><a href="../producto/tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="tablas">
		<tr>
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Agenda</h2></td>
		</tr>
    </div>
    <div class="tablas">
	<table width="60%" style="margin: 0 auto;">
        <tr><td>
			<table width="100%" border="1" style="margin: 0 auto;"><tbody>
			<tr><td width="60%">
				<form id="find" action="busquedaAgenda.php" method ="get">
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
 		<th>Alerta</th>
 		<th>Nombre de Cita</th>
 		<th>Tratamiento</th>
 		<th>Direccion de Planta</th>
 		<th>Telefono de Planta</th>
 		<th>Fecha</th>
 		<th>Hora</th>
 		<th>Descripcion</th>
 	</thead>
 	<tbody>
 	<?php  
 		foreach($sql as $row){ 
			if ($row['AgendaEstado']=="Activo") { ?>
 				<tr>
 					<?php if ($row['AgendaFecha']==$today){?>
							<td><img src="../../../Images/advertencia.png" width="50" height="50" style="width:30px;height:30px;"></td>
 					<?php }elseif($row['AgendaFecha']<$today){ ?>
 						<td><img src="../../../Images/warning.png" width="50" height="50" style="width:30px;height:30px;"></td>
 					<?php }else { ?>
 					<td></td>
 				
 					<?php 

 					} ?>

	 			<td><?php echo "{$row['AgendaNombre']}"; ?></td>
	 			<td><?php echo "{$row['TrataNombre']}"; ?></td>
	 			<td><?php echo "{$row['PlantaDireccion']}"; ?></td>
	 			<td><?php echo "{$row['PlantaTelefono']}"; ?></td>
	 			<td><?php echo "{$row['AgendaFecha']}"; ?></td>
	 			<td><?php echo "{$row['AgendaHora']}"; ?></td>
	 			<td><?php echo "{$row['AgendaDescripcion']}"; ?></td>
	 			
	 			<td><a href="eliminar_agenda.php?IDAgenda=<?php echo $row['IDAgenda'] ?>" onclick="return confirm('Estas seguro de dar de baja esta cita?');"> Eliminar Cita</a></td>
	 			<td><a target="_blank" href="../tratamiento/ver_tratamiento.php?IDTratamiento=<?php echo $row['IDTratamiento'] ?>"> Ver Tratamiento </a></td>
		 		</tr>
 	<?php } } ?>
 	
		</tbody>
	</table>
    </div>
	<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
		<form id="verinactivo" action="ver_agenda_todas.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('verinactivo').submit()" value="Ver Todas"/>
		</form>
        <form id="pdfagendas"  target="_blank" action="pdfagenda.php" method="post">
			<input style="width: 200px;" id="button" type="button" onClick="document.getElementById('pdfagendas').submit()" value="Generar PDF"/>
		</form>
        </td></tr>
	</tbody></table>
	</div>
</body>
</html>