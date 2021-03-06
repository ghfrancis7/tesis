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
            header ("Location:../index.html");
/*        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];*/
        }
		//Determina dia actual
		date_default_timezone_set ("America/Argentina/Buenos_Aires");
		$today = date( "Y/m/d");
		?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Administrador <?php echo $_SESSION['nom']." ".$_SESSION['ape']?></td>
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
				<li><a href="../../../Post_Inicio/sesionAdmin.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="../../../SelectUserOperations/ABMUsuario.php"><span class="iconic pencil-alt"></span><span class="iconic user"></span> ABM Usuarios</a></li>
                <li><a href="../../../SelectUserOperations/ABMProducto.php"><span class="iconic pencil-alt"></span><span class="iconic box"></span> ABM Productos</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="formularios">
	
	<table width="100%">
		<tr><td><form id="frmnewprod" action="guardarProducto.php" method="post"></td></tr>
        <tr><td>
        	<label>*Número de Serie</label><br/>
            <input type="text" name="ProductoNumeroSerie">
			<br/>
			<label>*Nombre del Producto</label><br/>
			<input type="text" name="ProductoNombre">
            <br/>
            <label>Precio del Producto</label><br/>
            <input type="text" name="ProductoPrecio" onkeypress="return valida(event)">
            <br/>
            <label>Descripción de Producto</label><br/>
            <textarea name="ProductoDescripcion" style="height:150px"></textarea>
            <input type="hidden" value="<?php echo $today; ?>" name="ProductoFechaAltaDB">
            <input type="hidden" value="<?php echo NULL; ?>" name="ProductoFechaBajaDB" requrired>
            <input type="hidden" value="Activo" name="ProductoEstado">
		</td></tr>
		<tr><td>
        	<table width="100%" style="margin: 0 auto;">
				<tr><td width="50%">
        			<input id="button" type="button" onClick="document.getElementById('frmnewprod').submit()" value="Acept">
					</form>
                    </td>
            		<td width="50%">
                    <form id="frmcancel" method="post" action="../../../Post_Inicio/sesionAdmin.php">
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