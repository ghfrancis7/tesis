<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


	<form method="post" action="actualizar_cliente.php">

	<?php 
	require("../../modelo/Conexion.php");
	$pdo= new Conexion();

		$IDCliente = $_GET['IDCliente'];
		$datosCliente = $pdo->mysql->prepare("SELECT * FROM cliente where IDCliente = :IDCliente");
		$datosCliente->bindParam(":IDCliente", $IDCliente, PDO::PARAM_INT);
		$datosCliente->execute();
		$cliente = $datosCliente->fetch();

	 ?>

	<p>
	<label>ID</label>
	<input type="text" name="IDCliente" value="<?php echo $IDCliente ?>" readonly=true >
	</p>
	<p>
		<label>ClienteNombre</label>
		<input type="text" name="ClienteNombre" required="true" value="<?php echo $cliente['ClienteNombre']; ?>">
	</p>
	<p>
		<label>ClienteCuit</label>
		<input type="text" name="ClienteCUIT" required="true" value="<?php echo $cliente['ClienteCUIT']; ?>">
	</p>
	<p>
		<label>ClienteDireccion</label>
		<input type="text" name="ClienteDireccion" required="true" placeholder="Fecha de Alta" value="<?php echo $cliente['ClienteDireccion']; ?>">
	</p>
	<p>
		<label>ClienteTelefono</label>
		<input type="text" name="ClienteTelefono" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteTelefono']; ?>">
	</p>
	<p>
		<label>ClienteCantidadPlantas</label>
		<input type="text" name="ClienteCantidadPlantas" required="true" placeholder="Estado" value="<?php echo $cliente['ClienteCantidadPlantas']; ?>">
	</p>
	<p>
		<label>ClienteFechaAlta</label>
		<input type="text" name="ClienteFechaAlta" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteFechaAlta']; ?>">
	</p>
	<p>
		<label>ClienteFechaBaja</label>
		<input type="text" name="ClienteFechaBaja" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteFechaBaja']; ?>">
	</p>
	<p>
		<label>ClienteEstado</label>
		<input type="text" name="ClienteEstado" placeholder="Fecha de Baja" value="<?php echo $cliente['ClienteEstado']; ?>">
	</p>



	<input type="submit" name="modificar" value="Modificar">
 	<input type="button" value="Cancelar" onclick="history.back(-1)" />



	</body>
	</html>
	</form>