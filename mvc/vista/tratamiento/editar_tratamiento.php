<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>


<form method="post" action="actualizar_tratamiento.php">
<?php 
	require("../../modelo/Conexion.php");
	$pdo= new Conexion();

		$IDTratamiento = $_GET['IDTratamiento'];
		$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento where IDTratamiento = :IDTratamiento");
		$datosTratamiento->bindParam(":IDTratamiento", $IDTratamiento, PDO::PARAM_INT);
		$datosTratamiento->execute();
		$tratamiento = $datosTratamiento->fetch();

 ?>

<p>
<label>ID</label>
<input type="text" name="IDTratamiento" value="<?php echo $IDTratamiento ?>" readonly=true >
</p>
<p>
	<label>Nombre del Tratamiento</label>
	<input type="text" name="TrataNombre" required="true" value="<?php echo $tratamiento['TrataNombre']; ?>">
</p>
<p>
	<label>Numero de Analisis</label>
	<input type="text" name="TrataNumAnalisis" required="true" value="<?php echo $tratamiento['TrataNumAnalisis']; ?>">
</p>
<p>
	<label>Descripcion</label>
	<input type="text" name="TrataDescripcion" required="true" value="<?php echo $tratamiento['TrataDescripcion']; ?>">
</p>

<input type="submit" name="modificar" value="Modificar">
 <input type="button" value="Cancelar" onclick="history.back(-1)" />

</body>
</html>
</form>