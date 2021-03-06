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

	include_once("../../modelo/Producto.php");
	include_once("../../modelo/Conexion.php");
	include_once("../../modelo/Lote.php");

	$controlador = new Producto();
	$controladorlote = new Lote();
	$sql= $controlador->listarProducto();
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
		<label>Nombre de Tratamiento:</label>
		<b style="font-size:18px"><u><?php echo $tratamiento['TrataNombre']; ?></u></b><br/><br/>
        <table width="60%" style="margin: 0 auto;">
        <thead>
            <th>Producto</th>
            <th>Cantidad (Kg)</th>
            <th></th>
		</thead>
		<tbody>
            <td width="30%">
                <form id="frmagregaproductos" action="actualizarTratamiento.php" method="post">
                <div class="styled-select" style="margin:0 auto;">
                    <select name="IDProducto" style="color:#FFF">
                        <?php 
                        foreach($sql as $row){ 
                            if (strcasecmp($row['ProductoEstado'],"Activo") == 0) { ?>
                                <option value= <?php echo "{$row['IDProducto']}"; ?> style="color:#000"><?php echo "{$row['ProductoNombre']}"; ?></option>
                        <?php } } ?>
                    </select>
                </div>
            </td>
            <td width="40%">
                <input type="text" style="width:75%" name="LoteCantidad" onkeypress="return valida(event)">
            </td>
            <td width="30%">
                <input type="hidden" name="IDTratamiento" value= <?php echo $IDTratamiento ?> />
                <input id="button" type="button" onClick="document.getElementById('frmagregaproductos').submit()" value="Agregar"><br>
	            </form>
            </td>
        </tbody>
	</table>
	<br/>
	<table width="60%" border="1" style="margin: 0 auto;">
		<thead>
			<th>IDLote</th>	
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Eliminar Producto</th>
		</thead>
		<tbody>
			<?php 
 			foreach($sqlt as $rowl){ ?>
 				<tr>
                    <td><?php echo "{$rowl['IDLote']}"; ?></td>
                    <td><?php echo "{$rowl['ProductoNombre']}"; ?></td>
                    <td><?php echo "{$rowl['LoteCantidad']}"; ?></td>
                    <td><a href="eliminarproducto.php?IDLote=<?php echo $rowl['IDLote'] ?>&IDTratamiento=<?php echo $IDTratamiento ?>" onclick="return confirm('Estas seguro de eliminar este producto?');">Eliminar Producto</a></td>
				</tr>
 			<?php }	?>
		</tbody>
	</table>
	<br/>
	<table width="60%" style="margin: 0 auto; text-align:center;">
		<tr>
        	<td>
                <form id="veractivo" action="ver_activo.php" method="post">
                    <input id="button" type="button" onClick="document.getElementById('veractivo').submit()" value="Aceptar"/>
                </form>
            </td>
		</tr>
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