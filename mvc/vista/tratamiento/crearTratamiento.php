
 <br>
<h3>Crear un nuevo Tratamiento</h3>
<form action="guardarTratamiento.php" method="post">
	<input type="text" placeholder="Nombre de Tratamiento" name="TrataNombre">
	<br><br>
	<input type="text" placeholder="Fecha de Tratamiento" name="TrataFecha">
	<br><br>
	<input type="text" placeholder="Numero de Analisis" name="TrataNumAnalisis">
	<br><br>
	<input type="text" placeholder="Descripcion" name="TrataDescripcion">
	<br><br>
	<input type="text" placeholder="Estado de Tratamiento" name="TrataEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear Tratamiento">
	<input type="button" value="Atras" onclick="history.back(-1)" />
	
</form>
