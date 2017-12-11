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
	<form id=actualizar_cliente method="post" action="actualizar_cliente.php">

	<?php 
	require("../../modelo/Conexion.php");
	$pdo= new Conexion();

		$IDCliente = $_GET['IDCliente'];
		$datosCliente = $pdo->mysql->prepare("SELECT * FROM cliente where IDCliente = :IDCliente");
		$datosCliente->bindParam(":IDCliente", $IDCliente, PDO::PARAM_INT);
		$datosCliente->execute();
		$cliente = $datosCliente->fetch();

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
        	<td><h2 style="font-size:24px; font-family:'Exo', sans-serif;">Editar Planta</h2></td>
		</tr>
    </div>
    <div class="tablas">
       <div class="formularios" style="text-align:center;">
    <table width="100%" style="margin: 0 auto;">

	<p>
	<label>ID</label>
	<br>
	<input type="text" name="IDCliente" value="<?php echo $IDCliente ?>" readonly=true >
	</p>
	<p>
		<label>ClienteNombre</label>
		<br>
		<input type="text" name="ClienteNombre" required="true" value="<?php echo $cliente['ClienteNombre']; ?>">
	</p>
	<p>
		<label>ClienteCuit</label>
		<br>
		<input type="text" name="ClienteCUIT" required="true" value="<?php echo $cliente['ClienteCUIT']; ?>" onkeypress="return valida(event)">
	</p>
	<p>
		<label>ClienteDireccion</label>
		<br>
		<input type="text" name="ClienteDireccion" required="true" placeholder="Fecha de Alta" value="<?php echo $cliente['ClienteDireccion']; ?>">
	</p>
	<p>
		<label>ClienteTelefono</label>
		<br>
		<input type="text" name="ClienteTelefono" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteTelefono']; ?>" onkeypress="return valida(event)">
	</p>
	<p>
		<label>ClienteFechaAlta</label>
		<br>
		<input type="date" name="ClienteFechaAlta" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteFechaAlta']; ?>">
	</p>

<table width="60%" style="margin:0 auto;"><tbody>
	<tr><td>
	<input type="button" name="modificar" style="width: 200px;" id="button" onClick="document.getElementById('actualizar_cliente').submit()" value="Modificar">
 	<input type="button" value="Cancelar" onclick="history.back(-1)" />

</td></tr>
</tbody></table>
</form> 
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