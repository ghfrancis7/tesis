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
		//Formulario
		include_once("../../modelo/Conexion.php");
		$pdo= new Conexion();
		$IDProducto = $_GET['IDProducto'];
		$datosProducto = $pdo->mysql->prepare("SELECT * FROM producto where IDProducto = :IDProducto");
		$datosProducto->bindParam(":IDProducto", $IDProducto, PDO::PARAM_INT);
		$datosProducto->execute();
		$producto = $datosProducto->fetch();
 ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../../../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $_SESSION['nom']." ".$_SESSION['ape']?><br>Rol: Administrador</td>
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
    <div class="formularios" style="text-align:center;">
    <table width="100%" style="margin: 0 auto;">
		<tr>
			<td width="100%">
            	<form id="frmeditar" method="post" action="actualizar_producto.php">
				<label>ID</label>
                <br/>
				<input type="text" name="IDProducto" value="<?php echo $IDProducto ?>" readonly=true >
				<br/>
				<label>Producto Numero Serie</label>
                <br/>
				<input type="text" name="ProductoNumeroSerie" required placeholder="Numero Serie Producto" value="<?php echo $producto['ProductoNumeroSerie']; ?>">
				<br/>
				<label>ProductoNombre</label>
                <br/>
				<input type="text" name="ProductoNombre" required value="<?php echo $producto['ProductoNombre']; ?>">
				<br/>
			</td>
		</tr>
        <tr>
        	<td width="100%">
            	 <table width="100%" style="margin: 0 auto;">
					<tr>
						<td width="50%">
				<input id="button" type="button" onClick="document.getElementById('frmeditar').submit()" value="Acept">
                </form>
						</td>
            			<td width="50%">
            	<form id="frmcancel" method="post" action="ver_producto.php">
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