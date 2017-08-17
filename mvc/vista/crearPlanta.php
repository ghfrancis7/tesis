<br>
<h3>Crear una Planta</h3>
<form action="guardarPlanta.php" method="post">
	<input type="text" placeholder="Nombre de Planta" name="PlantaNombre">
	<br><br>
	<input type="text" placeholder="Localidad de la Panta" name="PlantaLocalidad">
	<br><br>
	<input type="text" placeholder="Direccion de la Planta" name="PlantaDireccion">
	<br><br>
	<input type="text" placeholder="Telefono de la Panta" name="PlantaTelefono">
	<br><br>
	<input type="text" placeholder="Email de la Panta" name="PlantaEmail">
	<br><br>
	<input type="date" name="PlantaFechaAlta">
	<br><br>
	<input type="date" placeholder="Fecha de baja de la Planta" name="PlantaFechaBaja">
	<br><br>
	<input type="text" placeholder="Estado de la Planta" name="PlantaEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear Planta">
	<input type="button" value="Atras" onclick="history.back(-1)" />
	
</form>