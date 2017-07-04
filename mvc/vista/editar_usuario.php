<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


<form method="post" action="actualizar_usuario.php">

<?php 
require("../modelo/Conexion.php");
$pdo= new Conexion();

$IDUsuario = $_GET['IDUsuario'];
$datosUsuario = $pdo->mysql->prepare("SELECT * FROM usuario where IDUsuario = :IDUsuario");
$datosUsuario->bindParam(":IDUsuario", $IDUsuario, PDO::PARAM_INT);
$datosUsuario->execute();
$usuario = $datosUsuario->fetch();

 ?>

<p>
<label>IDUsuario</label>
<input type="text" name="IDUsuario" value="<?php echo $IDUsuario ?>" readonly=true >
</p>
<p>
	<label>UsuNombre</label>
	<input type="text" name="UsuNombre" required="true" value="<?php echo $usuario['UsuNombre']; ?>">
</p>
<p>
	<label>UsuApellido</label>
	<input type="text" name="UsuApellido" required="true" value="<?php echo $usuario['UsuApellido']; ?>">
</p>
<p>
	<label>UsuDNI</label>
	<input type="text" name="UsuDNI" required="true" placeholder="Fecha de Alta" value="<?php echo $usuario['UsuDNI']; ?>">
</p>
<p>
	<label>UsuDireccion</label>
	<input type="text" name="UsuDireccion" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuDireccion']; ?>">
</p>
<p>
	<label>UsuTelefono</label>
	<input type="text" name="UsuTelefono" required="true" placeholder="Estado" value="<?php echo $usuario['UsuTelefono']; ?>">
</p>
<p>
	<label>UsuMail</label>
	<input type="text" name="UsuMail" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuMail']; ?>">
</p>
<p>
	<label>UsuFechaNacimiento</label>
	<input type="text" name="UsuFechaNacimiento" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuFechaNacimiento']; ?>">
</p>
<p>
	<label>UsuLocalidadOpera</label>
	<input type="text" name="UsuLocalidadOpera" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuLocalidadOpera']; ?>">
</p>
<p>
	<label>UsuCuenta</label>
	<input type="text" name="UsuCuenta" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuCuenta']; ?>">
</p>
<p>
	<label>UsuPassword</label>
	<input type="text" name="UsuPassword" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuPassword']; ?>">
</p>
<p>
	<label>UsuFechaEgreso</label>
	<input type="text" name="UsuFechaIngreso" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuFechaIngreso']; ?>">
</p>
<p>
	<label>UsuFechaEgreso</label>
	<input type="text" name="UsuFechaEgreso" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuFechaEgreso']; ?>">
</p>
<p>
	<label>UsuEstado</label>
	<input type="text" name="UsuEstado" placeholder="Fecha de Baja" value="<?php echo $usuario['UsuEstado']; ?>">
</p>

<input type="submit" name="modificar" value="Modificar">
<input type="button" name="cancelar" value="Cancelar">



</body>
</html>
</form>