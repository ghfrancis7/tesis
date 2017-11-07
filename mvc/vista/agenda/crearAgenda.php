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

	//if($_SESSION["recargarDeIndex"] != 1){
	//	echo '<meta http-equiv="refresh" content="1">';
	//	$_SESSION["recargarDeIndex"] = 1;
	//}

	include_once("../../modelo/Tratamiento.php");
	include_once("../../modelo/Conexion.php");
	include_once("../../modelo/Lote.php");

	$controlador = new Tratamiento();
	$controladorlote = new Lote();
	$sql= $controlador->listarTratamientoActivo($idUsuario);
	$sqlp= $controladorlote->productoLote();

	$pdo= new Conexion();
	$IDTratamiento = $_GET['IDTratamiento'];
	$sqlt = $controladorlote->listarLote($IDTratamiento);

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
		<label>Crear una Cita:</label>
		<b style="font-size:18px"><u><?php echo $tratamiento['TrataNombre']; ?></u></b><br/><br/>
        <table width="60%" style="margin: 0 auto;">
       
		<tbody>
            <td width="30%">
                <form id="frmagregaragenda" action="guardarAgenda.php" method="post">
            </td>
            <label>Seleccione el Tratamiento</label><br/>
        <div class="styled-select" style="margin:0 auto;">
           <select name="IDTratamiento" style="color:#FFF">
                        <?php 
                        foreach($sql as $row){ 
                            if (strcasecmp($row['TrataEstado'],"Activo") == 0) { ?>
                                <option value= <?php echo "{$row['IDTratamiento']}"; ?> style="color:#000"><?php echo "{$row['TrataNombre']}"; ?></option>
                        <?php } } ?>
                    </select>
        </div>
            <label>*Nombre de la Cita</label><br/>
            <input type="text" name="AgendaNombre">
            <br/>
            <label>*Fecha</label><br/>
            <input type="date" name="AgendaFecha">
            <br/>
            <br/>
            <label>Hora</label><br/>
            <input type="time" name="AgendaHora">
            <br/>
            <label>Descripcion</label><br/>
            <input type="text" name="AgendaDescripcion">
            <br/>       
            <input type="hidden" value="<?php echo 'Activo';?>" name="AgendaEstado">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="IDUsuario">
            <br/>
        </td>
        </tr>
        <tr>
            <td width="100%">
                 <table width="100%" style="margin: 0 auto;">
                    <tr>
                        <td width="50%">
                        <input id="button" type="button" onClick="document.getElementById('frmagregaragenda').submit()" value="Acept">
                        </form>
                        </td>
                        <td width="50%">
                        <form id="frmcancel" method="post" action="../../../Post_Inicio/sesionTecn.php">
                        <input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Cancel">
                        </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
           </table>
    </div>
</body>
</html>