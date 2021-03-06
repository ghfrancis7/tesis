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

		include_once("../../modelo/Usuario.php");
		include_once("../../modelo/Planta.php");
		include_once("../../modelo/Producto.php");
		$controlador = new Usuario();
		$sql= $controlador->listarUsuario();

		$controlpl = new Planta();
		$sqlpl= $controlpl->listarPlanta($idUsuario);

		$controlpr = new Producto();
		$sqlpr= $controlpr->listarProducto();
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
                <li><a href="../producto/tecn_ver_activo.php"><span class="iconic cog"></span> Producto</a></li>
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
<form id="frmnewtrata" action="guardarTratamiento.php" method="post">
</br>
    <label>Seleccione la Planta</label><br/>
		<div class="styled-select" style="margin:0 auto;">
			<select name="IDPlanta" style="color:#FFF">
				<?php 
					foreach($sqlpl as $rowpl){ if (strcasecmp($rowpl['PlantaEstado'],"Activo") == 0) {
						?>
						<option value= <?php echo "{$rowpl['IDPlanta']}"; ?> style="color:#000"><?php echo "{$rowpl['PlantaNombre']}"; ?></option>
				<?php } }
					?>
			</select>	
        </br>

            </table>   
        </div>
	
	<table width="100%">
		<tr><td><form id="frmnewtrata" action="guardarTratamiento.php" method="post"></td></tr>
		<tr><td>
		<label>*Nombre de Tratamiento</label><br/>
        <input type="text" name="TrataNombre">
		<br/>
        <label>Fecha de Inicio del Tratamiento</label><br/>
		<input type="date" name="TrataFecha">
		<br/>
        <label>*Número de Analisis</label><br/>
		<input type="text" name="TrataNumAnalisis" onkeypress="return valida(event)">
		<br/>
        <label>Descripción</label><br/>
        <input type="text" name="TrataDescripcion">
		<input type="hidden" value="<?php echo 'Pendiente';?>" name="TrataEstado">
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
<script>
	function valida(e){
		tecla = (document.all) ? e.keyCode : e.which;
	
		//Tecla de retroceso para borrar, siempre la permite
		if (tecla==8){
			return true;
		}
			
		// Patron de entrada, en este caso solo acepta numeros
		patron =/[0-9]/;
		tecla_final = String.fromCharCode(tecla);
		return patron.test(tecla_final);
	}
</script>
</html>