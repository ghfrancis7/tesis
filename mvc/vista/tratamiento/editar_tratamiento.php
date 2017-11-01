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

?>

<form id=actualizar_tratamiento method="post" action="actualizar_tratamiento.php">
<?php 
	require("../../modelo/Conexion.php");
	$pdo= new Conexion();

		$IDTratamiento = $_GET['IDTratamiento'];
		$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento where IDTratamiento = :IDTratamiento");
		$datosTratamiento->bindParam(":IDTratamiento", $IDTratamiento, PDO::PARAM_INT);
		$datosTratamiento->execute();
		$tratamiento = $datosTratamiento->fetch();

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
				<li><a href="../producto/tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="tablas">
		<tr>
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Editar Planta</h2></td>
		</tr>
    </div>
    <div class="tablas">
       <div class="formularios" style="text-align:center;">
    <table width="100%" style="margin: 0 auto;">


<p>
<label>ID</label>
<br>
<input type="text" name="IDTratamiento" value="<?php echo $IDTratamiento ?>" readonly=true >
</p>
<p>
	<label>Nombre del Tratamiento</label>
	<br>
	<input type="text" name="TrataNombre" required="true" value="<?php echo $tratamiento['TrataNombre']; ?>">
</p>
<p>
	<label>Numero de Analisis</label>
	<br>
	<input type="text" name="TrataNumAnalisis" required="true" value="<?php echo $tratamiento['TrataNumAnalisis']; ?>">
</p>
<p>
	<label>Descripcion</label>
	<br>
	<input type="text" name="TrataDescripcion" required="true" value="<?php echo $tratamiento['TrataDescripcion']; ?>">
</p>

<table width="60%" style="margin:0 auto;"><tbody>
	<tr><td>
<input type="button" name="modificar" style="width: 200px;" id="button" onClick="document.getElementById('actualizar_tratamiento').submit()" value="Modificar">
</td><td>
 <input type="button" value="Cancelar" onclick="history.back(-1)" />

</td></tr>
</tbody></table>
</form> 