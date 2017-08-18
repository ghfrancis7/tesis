
 <br>
<h3>Crear un nuevo Cliente</h3>
<form action="guardarCliente.php" method="post">
	<input type="text" placeholder="ClienteNombre" name="ClienteNombre">
	<br><br>
	<input type="text" placeholder="ClienteCuit" name="ClienteCuit">
	<br><br>
	<input type="text" placeholder="ClienteDireccion" name="ClienteDireccion">
	<br><br>
	<input type="text" placeholder="ClienteTelefono" name="ClienteTelefono">
	<br><br>
	<input type="text" placeholder="ClienteCantidadPlantas" name="ClienteCantidadPlantas">
	<br><br>
	<input type="date" placeholder="ClienteFechaAlta" name="ClienteFechaAlta">
	<br><br>
	<input type="date" placeholder="ClienteFechaBaja" name="ClienteFechaBaja">
	<br><br>
	<input type="text" placeholder="ClienteEstado" name="ClienteEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear Tecnico">
	<input type="button" value="Atras" onclick="history.back(-1)" />
	
</form>
