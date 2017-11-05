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
		
		if($_SESSION["recargarDeIndex"] != 1){
		  echo '<meta http-equiv="refresh" content="1">';
		  $_SESSION["recargarDeIndex"] = 1;
		}
/*- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

		include_once("../../modelo/Producto.php");
		include_once("../../modelo/Conexion.php");
		include_once("../../modelo/Lote.php");
		
		$controlador = new Producto();
		$sql= $controlador->listarProducto();
		
		$controladorlote = new Lote();
		$sqlp= $controladorlote->productoLote();
		
		$pdo= new Conexion();
		$IDTratamiento = $_GET['IDTratamiento'];
		$sqlt = $controladorlote->listarLote($IDTratamiento);

		$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta where IDTratamiento = :IDTratamiento");
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
    	<table width="60%" style="margin: 0 auto; text-align:left;">
            <tr><td><label style="text-align:left">Planta: </label><?php echo $tratamiento['PlantaNombre']; ?></td></tr>
            <tr><td><label style="text-align:left">Nombre de Tratamiento: </label><?php echo $tratamiento['TrataNombre']; ?></td></tr>
            <tr><td><label style="text-align:left">Fecha de Inicio: </label><?php echo $tratamiento['TrataFecha']; ?></td></tr>
            <tr><td><label style="text-align:left">Descripcion: </label><?php echo $tratamiento['TrataDescripcion']; ?></td></tr>
        </table>
		<br/>
        <table width="60%" border="1" style="margin: 0 auto;"> 
		<thead>
			<th>Producto</th>
			<th>Dosificacion Semanal</th>
			<th>Dosificacion Anual aprox.</th>
		</thead>
		<tbody>
			<?php 
 			foreach($sqlt as $rowl){ ?>
 				<tr>
 					<td><?php echo "{$rowl['ProductoNombre']}"; ?></td>
		 			<td><?php echo "{$rowl['LoteCantidad']}"; ?></td>
		 			<td><?php echo ("{$rowl['LoteCantidad']}")*52; ?></td>
 				</tr>
 			<?php } ?>
		</tbody>
	</table>

</form>
<td><a href="pdftratamientosporplanta.php?IDTratamiento=<?php echo $tratamiento['IDTratamiento'] ?> & PlantaNombre=<?php echo $tratamiento['PlantaNombre'] ?>"> Generar PDF </a></td>
    </div><br><br>
<div class="header" style="text-align:center;">
	<table width="60%" style="margin: 0 auto;"><tbody>
		<tr><td>
			<form id="veractivo" action="ver_activo.php" method="post">
				<input id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Aceptar"/>
			</form>
        </td></tr>
	</tbody></table>
    </div>
</body>
</html>