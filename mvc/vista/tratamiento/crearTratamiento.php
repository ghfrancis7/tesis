<?php 
 include_once("../../modelo/Usuario.php");
 include_once("../../modelo/Planta.php");
		$controlador = new Usuario();
		$sql= $controlador->listarUsuario();

		$control = new Planta();
		$sqlp= $control->listarPlanta();

?>
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
                <li><a href="../../../SelectUserOperations/Tecn_Producto.php"><span class="iconic cog"></span> Producto</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
	</div>
	<div class="tablas">
		<tr>
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Crear un nuevo Tratamiento</h2></td>
		</tr>
    </div>
	    <div class="formularios">

 <br>
<form action="guardarTratamiento.php" method="post">
		<div class="styled-select" style="margin:0 auto;">
			<select name="IDUsuario">
				<?php 
					foreach($sql as $row){ if (strcasecmp($row['UsuEstado'],"Activo") == 0) {
						?>
						<option value= <?php echo "{$row['IDUsuario']}"; ?>><?php echo "{$row['UsuNombre']}"; ?></option>
				<?php } }
					?>

			</select>	
		 </div>
<br></br>
		<div class="styled-select" style="margin:0 auto;">
			<select name="IDPlanta">
				<?php 
					foreach($sqlp as $rowp){ if (strcasecmp($rowp['PlantaEstado'],"Activo") == 0) {
						?>
						<option value= <?php echo "{$rowp['IDPlanta']}"; ?>><?php echo "{$rowp['PlantaNombre']}"; ?></option>
				<?php } }
					?>
			</select>	
		</div>
	
	<table width="100%">
		<tr><td><form id="frmnewtrata" action="guardarTratamiento.php" method="post"></td></tr>
		<tr><td>
		<label>Nombre de Tratamiento</label><br/>
        <input type="text" name="TrataNombre">
		<br/>
        <label>Fecha de Inicio del Tratamiento</label><br/>
		<input type="text" name="TrataFecha">
		<br/>
        <label>Numero de Analisis</label><br/>
		<input type="text" name="TrataNumAnalisis">
		<br/>
        <label>Descripcion</label><br/>
        <input type="text" name="TrataDescripcion">
		<input type="hidden" value="Activo" name="ClienteEstado">
		<br/>
        </td></tr>
		<tr><td>
        	<table width="100%" style="margin: 0 auto;">
				<tr><td width="50%">
        			<input id="button" type="button" onClick="document.getElementById('frmnewtrata').submit()" value="Acept">
					</form>
                    </td>
            		  <td width="50%">
                    <form id="frmcancel" method="post" action="../../../Post_Inicio/sesionTecn.php">
                        <input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Cancel">
                    </form>
				</td></tr>
			</table>
        </td></tr>
    </table>
    </div>
</body>
</html>