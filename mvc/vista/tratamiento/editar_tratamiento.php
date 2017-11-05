<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link href="../../../CSS/style.css" rel="stylesheet" type="text/css">
</head>
	<link rel="stylesheet" href="../../../CSS/style.css">
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
        <table width="60%" style="margin: 0 auto;">
        <form id="edittrata" method="post" action="actualizar_tratamiento.php">
        	<tr>
        		<td colspan="2"v>
                	<label>ID</label><br/>
                    <input type="text" name="IDTratamiento" value="<?php echo $IDTratamiento ?>" readonly=true>
				</td>
			</tr>
            <tr>
        		<td colspan="2">
                	<label>Nombre del Tratamiento</label><br/>
                	<input type="text" name="TrataNombre" required value="<?php echo $tratamiento['TrataNombre']; ?>">
				</td>
			</tr>
            <tr>
                <td colspan="2">
                    <label>Numero de Analisis</label><br/>
                    <input type="text" name="TrataNumAnalisis" required value="<?php echo $tratamiento['TrataNumAnalisis']; ?>">
				</td>
			</tr>
            <tr>
                <td colspan="2">
            		<label>Descripcion</label><br/>	
                    <input type="text" name="TrataDescripcion" required value="<?php echo $tratamiento['TrataDescripcion']; ?>">
				</td>
			</tr>
            <tr>
            <td width="50%"><input id="button" type="button" onClick="document.getElementById('edittrata').submit()" value="Aceptar"></td>
		</form>
		  <td width="50%">
        	<form id="frmcancel" method="post" action="ver_activo.php">
				<input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Cancelar">
            </form>
        </td>
        </table>
    </div>
</body>
</html>