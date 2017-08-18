<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


<form method="post" action="actualizar_planta.php">
<?php 
	require("../../modelo/Conexion.php");
	$pdo= new Conexion();

		$IDPlanta = $_GET['IDPlanta'];
		$datosPlanta = $pdo->mysql->prepare("SELECT * FROM planta where IDPlanta = :IDPlanta");
		$datosPlanta->bindParam(":IDPlanta", $IDPlanta, PDO::PARAM_INT);
		$datosPlanta->execute();
		$planta = $datosPlanta->fetch();

 ?>

<p>
<label>ID</label>
<input type="text" name="IDPlanta" value="<?php echo $IDPlanta ?>" readonly=true >
</p>
<p>
	<label>Nombre de Planta</label>
	<input type="text" name="PlantaNombre" required="true" value="<?php echo $planta['PlantaNombre']; ?>">
</p>
<p>
	<label>Localidad de la Panta</label>
	<input type="text" name="PlantaLocalidad" required="true" value="<?php echo $planta['PlantaLocalidad']; ?>">
</p>
<p>
	<label>Direccion de la Planta</label>
	<input type="text" name="PlantaDireccion" required="true" placeholder="Direccion de la Planta" value="<?php echo $planta['PlantaDireccion']; ?>">
</p>
<p>
	<label>Telefono de la Panta</label>
	<input type="text" name="PlantaTelefono" placeholder="Fecha de Baja" value="<?php echo $planta['PlantaTelefono']; ?>">
</p>
<p>
	<label>Email de la Panta</label>
	<input type="text" name="PlantaEmail" required="true" placeholder="Estado" value="<?php echo $planta['PlantaEmail']; ?>">
</p>


<input type="submit" name="modificar" value="Modificar">
 <input type="button" value="Cancelar" onclick="history.back(-1)" />



</body>
</html>
</form>